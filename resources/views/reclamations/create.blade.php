@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Réclamation pour la livraison {{ $livraison->id }}</h1>

    <form action="{{ route('reclamations.store', $livraison->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description de la réclamation</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Soumettre la réclamation</button>
    </form>
</div>
@endsection
