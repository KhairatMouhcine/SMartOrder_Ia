from flask import Flask, request, jsonify, render_template
from flask_cors import CORS
import re
import mysql.connector
from datetime import datetime, date

app = Flask(__name__)
CORS(app)

# Connexion à MySQL
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="SmartOrderIa"
)
cursor = db.cursor()

# Contexte global
context = {
    'intent': None,
    'name': None,
    'time': None,
    'products': [],
    'people': None,
    'restaurant': None
}
expected_field = None
panier = []
pending_products = False


@app.route('/chat', methods=['POST'])
def chat():
    global context, expected_field, panier, pending_products

    user_input = request.json.get('message', '').strip()
    response = ""

    if user_input.lower() in ("exit", "quit", "merci", "bye", "au revoir"):
        return jsonify({'response': "Au revoir. Bonne journée!"})

    if any(x in user_input.lower() for x in ["restaurant", "restaurants", "restos", "voir restos", "voir restaurants", "liste des restaurants"]):
        cursor.execute("SELECT nom FROM restaurants")
        restaurants = cursor.fetchall()
        if restaurants:
            response += "🍽️ Voici les restaurants disponibles  :\n"
            for idx, (nom,) in enumerate(restaurants, start=1):
                response += f"{idx}. {nom}\n"
        else:
            response += "❌ Aucun restaurant trouvé."

    elif "menu" in user_input.lower() or "produits" in user_input.lower():
        cursor.execute("SELECT nom, prix, description FROM produits")
        produits = cursor.fetchall()
        if produits:
            response += "📋 Menu :\n"
            for nom, prix, desc in produits:
                response += f"- {nom} ({prix:.2f} MAD)\n  {desc}\n"
        else:
            response += "❌ Aucun produit disponible."

    elif "voir" in user_input.lower() and "panier" in user_input.lower():
        if not panier:
            response += "🧺 Votre panier est vide."
        else:
            response += "🧾 Contenu du panier :\n"
            total = 0
            for item in panier:
                sous_total = item['quantite'] * item['prix']
                total += sous_total
                response += f"- {item['quantite']} x {item['nom']} = {sous_total:.2f} MAD\n"
            response += f"💰 Total : {total:.2f} MAD"

    elif user_input.lower() == "valider" and context['intent'] == 'commande' and pending_products:
        pending_products = False
        expected_field = 'time'
        response += "Pour quelle heure souhaitez-vous récupérer la commande ?"

    elif "voir" in user_input.lower() or "consulter" in user_input.lower():
        nom_recherche = re.search(r"au nom de ([a-zA-ZÀ-ÿ\s'-]+)", user_input.lower())
        if nom_recherche:
            nom = nom_recherche.group(1).strip().title()
            response += f"🔎 Recherche des informations pour {nom}...\n"
            cursor.execute("SELECT id, heure, total FROM commandes WHERE nom = %s", (nom,))
            commandes = cursor.fetchall()
            if commandes:
                for commande_id, heure, total in commandes:
                    response += f"Commande prévue pour {heure} :\n"
                    cursor.execute("""
                        SELECT p.nom, cp.quantite, p.prix 
                        FROM commandes_produits cp
                        JOIN produits p ON cp.produit_id = p.id
                        WHERE cp.commande_id = %s
                    """, (commande_id,))
                    produits = cursor.fetchall()
                    for nom_prod, qte, prix in produits:
                        response += f"- {qte} x {nom_prod} = {qte * prix:.2f} MAD\n"
                    response += f"💰 Total : {total:.2f} MAD\n"
            else:
                response += "❌ Aucune commande trouvée.\n"
            cursor.execute("""
                SELECT r.personnes, r.heure, s.nom 
                FROM reservations r
                JOIN restaurants s ON r.restaurant_id = s.id
                WHERE r.nom_client = %s
            """, (nom,))
            reservations = cursor.fetchall()
            if reservations:
                for p, h, rest in reservations:
                    response += f"📌 Réservation : {p} personnes à {h} au restaurant {rest}\n"
            else:
                response += "❌ Aucune réservation trouvée."

    elif expected_field:
        if expected_field == 'people':
            match = re.search(r'(\d+)', user_input)
            if match:
                context['people'] = int(match.group(1))
                expected_field = 'time'
                response += "Pour quelle heure souhaitez-vous réserver ?"
            else:
                response += "Combien de personnes ?"

        elif expected_field == 'time':
            match = re.search(r'(\d{1,2})\s*h\s*(\d{0,2})', user_input.lower())
            if match:
                heures = int(match.group(1))
                minutes = int(match.group(2)) if match.group(2) else 0
                context['time'] = f"{heures:02d}:{minutes:02d}:00"
                expected_field = 'name'
                if context['intent'] == 'commande':
                    response += "À quel nom dois-je enregistrer la commande ?"
                else:
                    response += "À quel nom dois-je faire la réservation ?"
            else:
                response += "Pour quelle heure ? (ex: 20h ou 19h30)"

        elif expected_field == 'name':
            name = re.sub(r"(au nom de|c'est|c est|pour|s'il vous plaît)", "", user_input, flags=re.I).strip()
            if name:
                context['name'] = name.title()
                if context['intent'] == 'reservation':
                    expected_field = 'restaurant'
                    response += "Dans quel restaurant souhaitez-vous réserver ?"
                else:
                    expected_field = None  # commande
            else:
                response += "Quel est le nom ?"

        elif expected_field == 'restaurant':
            restaurant_name = user_input.strip()
            cursor.execute("SELECT id FROM restaurants WHERE LOWER(nom) = %s", (restaurant_name.lower(),))
            result = cursor.fetchone()
            if result:
                context['restaurant'] = result[0]
                cursor.execute(
    "INSERT INTO reservations (id_restaurant, nom, nbre_personnes, heure, jour, created_at, updated_at) VALUES (%s, %s, %s, %s, %s, NOW(), NOW())",
    (context['restaurant'], context['name'], context['people'], context['time'], date.today())
)
                db.commit()
                response += f"✅ Réservation confirmée pour {context['name']} à {context['time']} pour {context['people']} personnes."
                context = {'intent': None, 'name': None, 'time': None, 'products': [], 'people': None, 'restaurant': None}
                expected_field = None
            else:
                response += "❌ Restaurant introuvable."

        elif expected_field == 'product':
            items = re.split(r',| et ', user_input)
            for item in items:
                m = re.search(r"(\d+)\s+(.+)", item.strip())
                if m:
                    quantite = int(m.group(1))
                    nom_produit = m.group(2).strip().lower()
                    cursor.execute("SELECT id, nom, prix, qte FROM produits WHERE LOWER(nom) = %s", (nom_produit,))
                    result = cursor.fetchone()
                    if result:
                        pid, nom, prix, stock = result
                        if quantite <= stock:
                            panier.append({'id': pid, 'nom': nom, 'prix': prix, 'quantite': quantite})
                            response += f"✅ {quantite} x {nom} ajouté(s) au panier.\n"
                            pending_products = True
                        else:
                            response += f"❌ Stock insuffisant pour {nom}. Stock : {stock}\n"
                    else:
                        response += f"❌ Produit {nom_produit} introuvable.\n"
            response += "✅ Tapez 'valider' lorsque vous avez terminé vos ajouts."
            expected_field = None

    elif context['intent'] is None:
        if "command" in user_input:
            context['intent'] = 'commande'
            expected_field = 'product'
            response += "Que souhaitez-vous commander ? (ex: 2 pizza margherita)"
        elif "reserv" in user_input or "table" in user_input:
            context['intent'] = 'reservation'
            expected_field = 'people'
            response += "D'accord, pour combien de personnes ?"
        else:
            response += "Souhaitez-vous passer une commande ou faire une réservation ?"

    elif context['intent'] == 'commande' and not expected_field and not pending_products:
        if not context['time']:
            expected_field = 'time'
            response += "Pour quelle heure souhaitez-vous récupérer la commande ?"
        elif not context['name']:
            expected_field = 'name'
            response += "À quel nom dois-je enregistrer la commande ?"
        else:
            heure = context['time']
            total = sum(item['quantite'] * item['prix'] for item in panier)
            cursor.execute("INSERT INTO commandes (nom, heure, total, created_at) VALUES (%s, %s, %s, %s)", (context['name'], heure, total, datetime.now()))
            commande_id = cursor.lastrowid
            for item in panier:
                cursor.execute("INSERT INTO commandes_produits (commande_id, produit_id, quantite) VALUES (%s, %s, %s)", (commande_id, item['id'], item['quantite']))
                cursor.execute("UPDATE produits SET qte = qte - %s WHERE id = %s", (item['quantite'], item['id']))
            db.commit()
            response += f"✅ Commande enregistrée pour {context['name']} à {heure} :\n"
            for item in panier:
                response += f"- {item['quantite']} x {item['nom']} = {item['quantite'] * item['prix']:.2f} MAD\n"
            response += f"💰 Total : {total:.2f} MAD"
            context = {'intent': None, 'name': None, 'time': None, 'products': [], 'people': None, 'restaurant': None}
            panier.clear()
            expected_field = None

    return jsonify({'response': response.strip()})


if __name__ == '__main__':
    app.run(debug=True, port=5001)
