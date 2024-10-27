@extends('layouts.app_front')
<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></head>
@section('content')
<div class="container">
    <h1 class="mb-4 text-center">
        <i class="fas fa-truck text-primary me-2"></i> Modifier Transporteur
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-exclamation-circle"></i> Des erreurs ont été trouvées :</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('transporteurs.update', $transporteur->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label"><i class="fas fa-user text-primary me-2"></i>Nom</label>
            <div class="input-group">
                <span class="input-group-text bg-primary text-white"><i class="fas fa-user-tag"></i></span>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $transporteur->nom) }}" placeholder="Entrez le nom" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label"><i class="fas fa-phone-alt text-primary me-2"></i>Téléphone</label>
            <div class="input-group">
                <span class="input-group-text bg-primary text-white"><i class="fas fa-phone"></i></span>
                <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $transporteur->telephone) }}" placeholder="Entrez le numéro de téléphone" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label"><i class="fas fa-envelope text-primary me-2"></i>Email</label>
            <div class="input-group">
                <span class="input-group-text bg-primary text-white"><i class="fas fa-at"></i></span>
                <input type="email" name="email" class="form-control" value="{{ old('email', $transporteur->email) }}" placeholder="Entrez l'adresse e-mail" required>
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i>Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
