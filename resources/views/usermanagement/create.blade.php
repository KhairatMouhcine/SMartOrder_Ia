@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <h1>Ajouter un Utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user-management.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Mot de passe :</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Confirmer mot de passe :</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Téléphone :</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label>Localisation :</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="form-group">
            <label>À propos :</label>
            <textarea name="about_me" class="form-control">{{ old('about_me') }}</textarea>
        </div>

        <div class="form-group">
            <label>Rôle :</label>
            <select name="role" class="form-control" required>
                <option value="">-- Choisir un rôle --</option>
                <option value="User" {{ old('role') == 'client' ? 'selected' : '' }}>client</option>
                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>
</div>

@endsection