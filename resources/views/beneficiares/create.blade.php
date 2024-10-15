@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<!-- Hero Section with Form -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/aziz2.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
    <!-- Overlay -->
     <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
    
        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
            <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">Partner with Us to Help the Homeless</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Join our community by adding your restaurant to help distribute surplus food to those in need.</p>
        </div>

    
    <!-- Content with Form -->
    <div class="container text-white position-relative">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-8">
                <div class="card shadow-lg">
                   
                    <div class="card-body p-4">
                    <form action="{{ route('beneficiares.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                        <!-- Nom -->
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                        </div>

                        <!-- Besoins -->
                        <div class="form-group mb-3">
                            <label for="besoins" class="form-label">Besoins</label>
                            <input type="text" name="besoins" class="form-control" value="{{ old('besoins') }}" required>
                        </div>

                        <!-- Association ID (Liste déroulante) -->
                        <div class="form-group mb-3">
                            <label for="associationId" class="form-label">Association</label>
                            <select name="associationId" class="form-control" required>
                                <option value="">Sélectionnez une association</option>
                                @foreach ($associations as $association)
                                    <option value="{{ $association->id }}">{{ $association->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-success">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
