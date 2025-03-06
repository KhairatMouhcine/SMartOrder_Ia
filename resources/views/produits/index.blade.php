


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
                            <h5 class="mb-0">All Products</h5>
                        </div>
<a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un Produit</a>                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
        <thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">ID</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nom</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Prix</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Quantité</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Description</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($produits as $produit)
    <tr>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $produit->id }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $produit->nom }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $produit->prix }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs font-weight-bold mb-0">{{ $produit->qte }}</p>
        </td>
        <td class="text-center">
            <p class="text-xs mb-0">{{ $produit->description }}</p>
        </td>
        <td class="text-center">
            <a href="{{ route('produits.show', $produit->id) }}" class="mx-2" data-bs-toggle="tooltip" data-bs-original-title="Éditer le produit">
                <i class="fas fa-edit text-warning"></i>
            </a>
            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent p-0" onclick="return confirm('Êtes-vous sûr ?')">
                    <i class="fas fa-trash text-danger"></i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>


                        </table>
                        
                        <div class="d-flex justify-content-center mt-3">
                           
{{ $produits->links() }}
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection