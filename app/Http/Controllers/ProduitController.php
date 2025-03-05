<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Afficher tous les produits.
     */
    public function index()
    {
        $produits = Produit::paginate(10);
        return view('produits.index', compact('produits'));
    }

    /**
     * Afficher le formulaire de création de produit.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Enregistrer un nouveau produit.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'qte' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('succes', 'Produit créé avec succès.');
    }

    /**
     * Afficher un seul produit.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Afficher le formulaire d'édition du produit.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    /**
     * Mettre à jour un produit existant.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'qte' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('succes', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprimer un produit.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('succes', 'Produit supprimé avec succès.');
    }
}
