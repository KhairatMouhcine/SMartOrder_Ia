@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    @if (session('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1>Éditer le Produit</h1>

    <form action="{{ route('produits.update', $produit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Prix :</label>
            <input type="number" step="0.01" name="prix" value="{{ $produit->prix }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Quantité :</label>
            <input type="number" name="qte" value="{{ $produit->qte }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description :</label>
            <textarea name="description" class="form-control">{{ $produit->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
