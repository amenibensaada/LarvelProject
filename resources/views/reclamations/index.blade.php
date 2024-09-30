@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Réclamations pour la livraison {{ $livraison->id }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('reclamations.create', $livraison->id) }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus"></i> Ajouter une Réclamation
    </a>

    <div class="row">
        @foreach($reclamations as $reclamation)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Réclamation</h5>
                    <p class="card-text"><strong>Description : </strong>{{ $reclamation->description }}</p>
                    <p class="card-text"><strong>Status : </strong>{{ $reclamation->status }}</p>
                    <p class="card-text"><strong>Date : </strong>{{ $reclamation->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('reclamations.edit', [$livraison->id, $reclamation->id]) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Modifier
                    </a>

                    <form action="{{ route('reclamations.destroy', [$livraison->id, $reclamation->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
