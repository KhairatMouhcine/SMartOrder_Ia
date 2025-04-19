@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <h1>Éditer l'Utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user-management.update', ['user_management' => $user_management->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="name" value="{{ old('name', $user_management->name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" value="{{ old('email', $user_management->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Mot de passe (laisser vide si inchangé) :</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Confirmer le mot de passe :</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label>Téléphone :</label>
            <input type="text" name="phone" value="{{ old('phone', $user_management->phone) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Localisation :</label>
            <input type="text" name="location" value="{{ old('location', $user_management->location) }}" class="form-control">
        </div>

        <div class="form-group">
            <label>À propos :</label>
            <textarea name="about_me" class="form-control">{{ old('about_me', $user_management->about_me) }}</textarea>
        </div>

        <div class="form-group">
        <label>Rôle :</label>
            <select name="role" class="form-control" required>
                <option value="User" {{ old('role', $user_management->role) == 'User' ? 'selected' : '' }}>Utilisateur</option>
                <option value="Admin" {{ old('role', $user_management->role) == 'Admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
    </form>
</div>

@endsection