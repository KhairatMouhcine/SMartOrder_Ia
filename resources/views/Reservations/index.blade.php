@extends('layouts.user_type.auth')

@section('content')

<div>
    @if (session('success'))
        <div class="alert alert-success mx-4" role="alert">
            <span class="text-white">
                {{ session('success') }}
            </span>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Reservations</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nom</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Jour</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Heure</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Restaurant</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Personnes</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
    </tr>
</thead>
<tbody>
    @forelse($reservations as $res)
        <tr>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $res->id }}</p>
            </td>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $res->nom }}</p>
            </td>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $res->jour }}</p>
            </td>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $res->heure }}</p>
            </td>
            <td class="text-center">
                @php
                    $restaurant = \App\Models\Restaurant::find($res->id_restaurant);
                @endphp
                <p class="text-xs font-weight-bold mb-0">{{ $restaurant ? $restaurant->nom : 'Inconnu' }}</p>
            </td>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $res->nbre_personnes }}</p>
            </td>
            <td class="text-center">
                <a href="{{ route('reservations.show', $res->id) }}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Modifier la réservation">
                    <i class="fas fa-edit text-warning"></i>
                </a>
                <form action="{{ route('reservations.destroy', $res->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border-0 bg-transparent p-0" onclick="return confirm('Supprimer cette réservation ?')">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Aucune réservation trouvée.</td>
        </tr>
    @endforelse
</tbody>
                        </table>
                                                <div class="d-flex justify-content-center mt-3">
{{ $reservations->links() }}
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
