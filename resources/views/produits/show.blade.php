@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Détails du Produit</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID :</strong> {{ $produit->id }}</li>
        <li class="list-group-item"><strong>Nom :</strong> {{ $produit->nom }}</li>
        <li class="list-group-item"><strong>Prix :</strong> {{ $produit->prix }}</li>
        <li class="list-group-item"><strong>Quantité :</strong> {{ $produit->qte }}</li>
        <li class="list-group-item"><strong>Description :</strong> {{ $produit->description }}</li>
    </ul>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
