@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifier une Réservation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du client</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $reservation->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="jour" class="form-label">Jour</label>
            <input type="date" name="jour" class="form-control" value="{{ old('jour', $reservation->jour) }}" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" value="{{ old('heure', $reservation->heure) }}" required>
        </div>

        <div class="mb-3">
            <label for="nbre_personnes" class="form-label">Nombre de personnes</label>
            <input type="number" name="nbre_personnes" class="form-control" value="{{ old('nbre_personnes', $reservation->nbre_personnes) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_restaurant" class="form-label">Restaurant</label>
            <select name="id_restaurant" class="form-control" required>
                <option value="">Sélectionnez un restaurant</option>
                @foreach ($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ $reservation->id_restaurant == $restaurant->id ? 'selected' : '' }}>
                        {{ $restaurant->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
