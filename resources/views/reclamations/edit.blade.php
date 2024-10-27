@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
@section('content')
<div class="container">
    <h1 class="mb-4">Modifier la Réclamation</h1>

    <!-- Afficher les erreurs de validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de modification -->
    <form action="{{ route('reclamations.update', [$livraison->id, $reclamation->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Détaillez la réclamation..." required>{{ old('description', $reclamation->description) }}</textarea>
        </div>

        <div class="form-group mt-4">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control">
                <option value="en attente" {{ $reclamation->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="résolue" {{ $reclamation->status == 'résolue' ? 'selected' : '' }}>Résolue</option>
                <option value="rejetée" {{ $reclamation->status == 'rejetée' ? 'selected' : '' }}>Rejetée</option>
            </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check"></i> Mettre à jour
            </button>
            <a href="{{ route('reclamations.index', $livraison->id) }}" class="btn btn-secondary ms-3">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </form>
</div>
@endsection
