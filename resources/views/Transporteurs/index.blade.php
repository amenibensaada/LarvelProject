@extends('layouts.app_front')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
.card-footer .btn {
    width: 100px; /* Adjust the width as needed */
    height: 40px; /* Adjust the height as needed */
    display: flex;
    align-items: center;
    justify-content: center;
}</style>
@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Liste des Transporteurs</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de recherche -->
    <form action="{{ route('transporteurs.index') }}" method="GET" class="d-flex justify-content-center mb-4">
        <input type="text" name="search" class="form-control w-50 me-2" placeholder="Rechercher par nom" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('transporteurs.create') }}" class="btn btn-primary">Ajouter un Transporteur</a>
    </div>

    <div class="row">
        @foreach($transporteurs as $transporteur)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h5 class="card-title mb-0">{{ $transporteur->nom }}</h5>
                        </div>
                        <p class="card-text"><i class="fas fa-phone me-2 text-secondary"></i>{{ $transporteur->telephone }}</p>
                        <p class="card-text"><i class="fas fa-envelope me-2 text-secondary"></i>{{ $transporteur->email }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                        <a href="{{ route('transporteurs.edit', $transporteur->id) }}" class="btn btn-outline-warning btn-sm d-flex align-items-center">
                            <i class="fas fa-edit me-1"></i> Modifier
                        </a>

                        <form action="{{ route('transporteurs.destroy', $transporteur->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center">
                                <i class="fas fa-trash-alt me-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
