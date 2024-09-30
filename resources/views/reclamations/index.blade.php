@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Réclamations pour la livraison {{ $livraison->id }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('reclamations.create', $livraison->id) }}" class="btn btn-primary mb-3">Ajouter une Réclamation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ $reclamation->status }}</td>
                    <td>{{ $reclamation->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('reclamations.edit', [$livraison->id, $reclamation->id]) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('reclamations.destroy', [$livraison->id, $reclamation->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
