@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    .card-footer .btn {
        width: 100px; /* Adjust the width as needed */
        height: 40px; /* Adjust the height as needed */
        display: flex;
        align-items: center;
        justify-content: center;
    }</style>
@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Livraisons</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('livraisons.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i> Ajouter une Livraison
    </a>

    <div class="row">
        @forelse($livraisons as $livraison)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Livraison du {{ \Carbon\Carbon::parse($livraison->date_livraison)->format('d/m/Y') }}</h5>
                    <p class="card-text"><strong>Status : </strong>{{ $livraison->status }}</p>
                    <p class="card-text"><strong>Quantité Livrée : </strong>{{ $livraison->quantite_livree }}</p>
                    <p class="card-text"><strong>Transporteur : </strong>{{ $livraison->transporteur->nom }}</p>
                    {{-- <p class="card-text"><strong>Association : </strong>{{ $livraison->association }}</p>
                    <p class="card-text"><strong>Produit Alimentaire : </strong>{{ $livraison->produitAlimentaire }}</p> --}}
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('livraisons.edit', $livraison->id) }}" class="btn btn-warning me-2 action-btn">
                        <i class="fas fa-edit"></i> Modifier
                    </a>

                    <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" class="d-inline action-btn-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger me-2 action-btn">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>

                    <a href="{{ route('reclamations.index', $livraison->id) }}" class="btn btn-info me-2 action-btn">
                        <i class="fas fa-exclamation-circle"></i> Réclamations
                    </a>
                </div>

            </div>
        </div>
        @empty
            <p>Aucune livraison trouvée pour cet utilisateur.</p>
        @endforelse
    </div>
</div>
@endsection
