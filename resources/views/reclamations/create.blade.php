@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
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
