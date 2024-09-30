@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Transporteurs</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transporteurs.create') }}" class="btn btn-primary mb-3">Ajouter un Transporteur</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transporteurs as $transporteur)
                <tr>
                    <td>{{ $transporteur->nom }}</td>
                    <td>{{ $transporteur->telephone }}</td>
                    <td>{{ $transporteur->email }}</td>
                    <td>
                        <a href="{{ route('transporteurs.edit', $transporteur->id) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('transporteurs.destroy', $transporteur->id) }}" method="POST" class="d-inline">
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
