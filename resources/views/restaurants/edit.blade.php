@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifier le Restaurant</h2>

    <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du Restaurant</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $restaurant->nom) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
