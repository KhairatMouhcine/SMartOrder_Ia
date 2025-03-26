#!/bin/bash

# Activer l'environnement virtuel situé dans scripts/venv
source scripts/venv/bin/activate

# Lancer les scripts Python en arrière-plan
python3 scripts/serveur.py &
python3 scripts/ServeurYoussef.py&

# Lancer le serveur Laravel
php artisan serve