@extends('layouts.app')

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
            <label for="date_livraison">Date de Livraison</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" name="date_livraison" class="form-control" value="{{ old('date_livraison', $livraison->date_livraison) }}" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                </div>
                <input type="text" name="status" class="form-control" value="{{ old('status', $livraison->status) }}" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="quantite_livree">Quantité Livrée</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                </div>
                <input type="number" name="quantite_livree" class="form-control" value="{{ old('quantite_livree', $livraison->quantite_livree) }}" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="transporteur_id">Transporteur</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-truck"></i></span>
                </div>
                <select name="transporteur_id" class="form-control">
                    @foreach($transporteurs as $transporteur)
                        <option value="{{ $transporteur->id }}" {{ $livraison->transporteur_id == $transporteur->id ? 'selected' : '' }}>
                            {{ $transporteur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="association_id">Association</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-hand-holding-heart"></i></span>
                </div>

            </div>
        </div>

        <div class="form-group mb-4">
            <label for="produit_alimentaire_id">Produit Alimentaire</label>
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
