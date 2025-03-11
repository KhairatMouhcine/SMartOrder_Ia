@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>Ajouter un Produit</h1>

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Prix :</label>
            <input type="number" step="0.01" name="prix" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Quantité :</label>
            <input type="number" name="qte" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description :</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>
@endsection
