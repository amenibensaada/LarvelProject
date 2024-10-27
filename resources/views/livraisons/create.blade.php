@extends('layouts.app_front')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><i class="fas fa-shipping-fast"></i> Ajouter une Livraison</h2>
        </div>
        <div class="card-body">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Livraison Form -->
            <form action="{{ route('livraisons.store') }}" method="POST">
                @csrf

                <!-- Date de Livraison -->
                <div class="form-group mb-3">
                    <label for="date_livraison">
                        <i class="fas fa-calendar-alt"></i> Date de Livraison
                    </label>
                    <input type="date" name="date_livraison" class="form-control" value="{{ old('date_livraison') }}" required placeholder="Sélectionnez la date">
                </div>

                <!-- Status -->
                <div class="form-group mb-3">
                    <label for="status">
                        <i class="fas fa-info-circle"></i> Status
                    </label>
                    <input type="text" name="status" class="form-control" value="{{ old('status') }}" required placeholder="Entrez le status">
                </div>

                <!-- Quantité Livrée -->
                <div class="form-group mb-3">
                    <label for="quantite_livree">
                        <i class="fas fa-box"></i> Quantité Livrée
                    </label>
                    <input type="number" name="quantite_livree" class="form-control" value="{{ old('quantite_livree') }}" required placeholder="Entrez la quantité">
                </div>

                <!-- Transporteur -->
                <div class="form-group mb-3">
                    <label for="transporteur_id">
                        <i class="fas fa-truck"></i> Transporteur
                    </label>
                    <select name="transporteur_id" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez un transporteur</option>
                        @foreach($transporteurs as $transporteur)
                            <option value="{{ $transporteur->id }}">{{ $transporteur->nom }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <!-- Association -->
                <div class="form-group mb-3">
                    <label for="association_id">
                        <i class="fas fa-users"></i> Association
                    </label>
                    <select name="association_id" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez une association</option>
                        @foreach($associations as $association)
                            <option value="{{ $association->id }}">{{ $association->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Produit Alimentaire -->
                <div class="form-group mb-3">
                    <label for="produit_alimentaire_id">
                        <i class="fas fa-utensils"></i> Produit Alimentaire
                    </label>
                    <select name="produit_alimentaire_id" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez un produit alimentaire</option>
                        @foreach($produits_alimentaires as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
