@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
@section('content')
<div class="container">
    <h1 class="mb-4">Modifier Livraison</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livraisons.update', $livraison->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="date_livraison">
                <i class="fas fa-calendar-alt"></i> Date de Livraison
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" name="date_livraison" class="form-control" value="{{ old('date_livraison', $livraison->date_livraison) }}" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="status">
                <i class="fas fa-info-circle"></i> Status
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                </div>
                <input type="text" name="status" class="form-control" value="{{ old('status', $livraison->status) }}" required placeholder="Entrez le status">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="quantite_livree">
                <i class="fas fa-box"></i> Quantité Livrée
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <input type="number" name="quantite_livree" class="form-control" value="{{ old('quantite_livree', $livraison->quantite_livree) }}" required placeholder="Entrez la quantité">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="transporteur_id">
                <i class="fas fa-truck"></i> Transporteur
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-truck"></i></span>
                </div>
                <select name="transporteur_id" class="form-control" required>
                    @foreach($transporteurs as $transporteur)
                        <option value="{{ $transporteur->id }}" {{ $livraison->transporteur_id == $transporteur->id ? 'selected' : '' }}>
                            {{ $transporteur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="association_id">
                <i class="fas fa-hand-holding-heart"></i> Association
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-holding-heart"></i></span>
                </div>

            </div>
        </div>

        <div class="form-group mb-4">
            <label for="produit_alimentaire_id">
                <i class="fas fa-apple-alt"></i> Produit Alimentaire
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-apple-alt"></i></span>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Mettre à jour
        </button>
    </form>
</div>
@endsection
