@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Livraisons</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <span>Date de Livraison </span>
        <a href="{{ route('livraisons.livraison', ['sort' => 'asc']) }}" class="btn btn-link">
            <i class="fas fa-sort-up"></i>
        </a>
        <a href="{{ route('livraisons.livraison', ['sort' => 'desc']) }}" class="btn btn-link">
            <i class="fas fa-sort-down"></i>
        </a>
    </div>

    <div class="row">
        @foreach($livraisons as $livraison)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Livraison du {{ \Carbon\Carbon::parse($livraison->date_livraison)->format('d/m/Y') }}</h5>
                    <p class="card-text"><strong>Status : </strong>{{ $livraison->status }}</p>
                    <p class="card-text"><strong>Quantité Livrée : </strong>{{ $livraison->quantite_livree }}</p>
                    <p class="card-text"><strong>Transporteur : </strong>{{ $livraison->transporteur->nom }}</p>
                    <p class="card-text"><strong>Association : </strong>{{ $livraison->association }}</p>
                    <p class="card-text"><strong>Produit Alimentaire : </strong>{{ $livraison->produitAlimentaire }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
