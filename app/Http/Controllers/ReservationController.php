<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Affiche toutes les réservations
    public function index()
    {
        $reservations = Reservation::latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    // Affiche le formulaire d'ajout
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('reservations.create', compact('restaurants'));
    }

    // Enregistre une nouvelle réservation
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'jour' => 'required|date',
            'heure' => 'required',
            'nbre_personnes' => 'required|integer|min:1',
            'id_restaurant' => 'required|exists:restaurants,id',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Réservation enregistrée avec succès.');
    }

    // Affiche le formulaire d'édition
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        $restaurants = Restaurant::all();
        return view('reservations.edit', compact('reservation', 'restaurants'));
    }
    // Met à jour la réservation
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'jour' => 'required|date',
            'heure' => 'required',
            'nbre_personnes' => 'required|integer|min:1',
            'id_restaurant' => 'required|exists:restaurants,id',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    // Supprime une réservation
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée.');
    }
}
