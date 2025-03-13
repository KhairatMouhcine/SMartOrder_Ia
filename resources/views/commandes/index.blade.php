




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
                            <h5>Liste des Commandes</h5>
                        </div>
                   </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
        <thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID Commande</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nom Utilisateur</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Total</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($commandes as $commande)
    <tr>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $commande->id }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $commande->user->name }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $commande->total }} dhs</p>
        </td>
        <td class="text-center">
            <a href="{{ route('commandes.show', $commande->id) }}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Voir la commande">
                <i class="fas fa-eye text-info"></i>
            </a>
            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent p-0" onclick="return confirm('Confirmer la suppression ?')">
                    <i class="fas fa-trash text-danger"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>


                        </table>
                        <div class="d-flex justify-content-center mt-3">
                           {{ $commandes->links() }}

</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection