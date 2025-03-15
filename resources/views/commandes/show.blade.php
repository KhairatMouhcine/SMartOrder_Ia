@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <h1>Produits de la Commande #{{ $commande->id }}</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Client :</strong> {{ $commande->user->name }}</li>
        <li class="list-group-item"><strong>Total :</strong> {{ $commande->total }} dhs</li>
    </ul>

    <h3>Produits commandés :</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom Produit</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commande->produitCommandes as $produitCommande)
            <tr>
                <td>{{ $produitCommande->produit->nom }}</td>
                <td>{{ $produitCommande->qte }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('commandes.index') }}" class="btn btn-secondary mt-3">Retour aux Commandes</a>
</div>

@endsection
