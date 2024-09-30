@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Réclamation</h1>

    <form action="{{ route('reclamations.update', [$livraison->id, $reclamation->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $reclamation->description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="status">Statut</label>
            <select name="status" id="status" class="form-control">
                <option value="en attente" {{ $reclamation->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="résolue" {{ $reclamation->status == 'résolue' ? 'selected' : '' }}>Résolue</option>
                <option value="rejetée" {{ $reclamation->status == 'rejetée' ? 'selected' : '' }}>Rejetée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
