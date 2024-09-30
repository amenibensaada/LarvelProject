@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Livraison</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livraisons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date_livraison">Date de Livraison</label>
            <input type="date" name="date_livraison" class="form-control" value="{{ old('date_livraison') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}" required>
        </div>
        <div class="form-group">
            <label for="quantite_livree">Quantité Livrée</label>
            <input type="number" name="quantite_livree" class="form-control" value="{{ old('quantite_livree') }}" required>
        </div>
        <div class="form-group">
            <label for="transporteur_id">Transporteur</label>
            <select name="transporteur_id" class="form-control" required>
                <!-- Boucle pour afficher les transporteurs disponibles -->
                @foreach($transporteurs as $transporteur)
                    <option value="{{ $transporteur->id }}">{{ $transporteur->nom }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="association_id">Association</label>

        </div>
        <div class="form-group">
            <label for="produit_alimentaire_id">Produit Alimentaire</label>

        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
