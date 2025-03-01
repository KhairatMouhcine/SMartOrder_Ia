<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;

class dashboardmanger extends Controller
{
    public function __invoke(Request $request)
    {
        $today = Carbon::today();

        $chiffreAffaires = Commande::whereDate('created_at', $today)->sum('total');
        $commandesToday = Commande::whereDate('created_at', $today)->count();
        $nouveauxClients = User::whereDate('created_at', $today)->count();
        $totalUsers = User::count();
        $reservationsJour = Reservation::whereDate('created_at', $today)->count();

       $moisLabels = collect([
    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
    5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
    9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
]);

        $ventesParMois = Commande::selectRaw('MONTH(created_at) as mois, SUM(total) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'mois');

        // Combler les mois vides avec 0
        $ventesCompletes = $moisLabels->map(function ($label, $mois) use ($ventesParMois) {
            return $ventesParMois[$mois] ?? 0;
        });

        $labels = $moisLabels->values();
        $totals = $ventesCompletes->values();


        // 🧾 Dernières commandes et réservations
        $lastOrders = Commande::latest()->take(5)->get();
        $lastReservations = Reservation::latest()->take(5)->get();

        return view('dashboard', compact(
            'chiffreAffaires',
            'commandesToday',
            'nouveauxClients',
            'totalUsers',
            'reservationsJour',
            'labels',
            'totals',
            'lastOrders',
            'lastReservations'
        ));
    }
}
