@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2 class="mb-4">Ajouter une Réservation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du client</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>

        <div class="mb-3">
            <label for="jour" class="form-label">Jour</label>
            <input type="date" name="jour" class="form-control" value="{{ old('jour') }}" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" value="{{ old('heure') }}" required>
        </div>

        <div class="mb-3">
            <label for="nbre_personnes" class="form-label">Nombre de personnes</label>
            <input type="number" name="nbre_personnes" class="form-control" value="{{ old('nbre_personnes') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_restaurant" class="form-label">Restaurant</label>
            <select name="id_restaurant" class="form-control" required>
                <option value="">Sélectionnez un restaurant</option>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
