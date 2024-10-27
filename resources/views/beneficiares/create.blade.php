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


                      <!-- Beneficiaire Name -->
<div class="form-group mb-3">
    <label for="name" class="form-label"><i class="mdi mdi-storefront"></i> Beneficiaire Name</label>
    <input type="text" name="nom" class="form-control rounded-pill shadow-sm" value="{{ old('nom', $beneficiaire->nom ?? '') }}" required>
    @error('nom')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Besoins -->
<div class="form-group mb-3">
    <label for="besoins" class="form-label"><i class="mdi mdi-map-marker"></i> Besoins</label>
    <input type="text" name="besoins" class="form-control rounded-pill shadow-sm" value="{{ old('besoins', $beneficiaire->besoins ?? '') }}" required>
    @error('besoins')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Association Selection -->
<div class="form-group mb-3">
    <label for="associationId" class="form-label"><i class="mdi mdi-account"></i> Association</label>
    <select name="associationId" class="form-control rounded-pill shadow-sm" required>
        <option value="">Select Association</option>
        @foreach($associations as $association)
            <option value="{{ $association->id }}" {{ (old('associationId', $beneficiaire->associationId ?? '') == $association->id) ? 'selected' : '' }}>
                {{ $association->nom }}
            </option>
        @endforeach
    </select>
    @error('associationId')
        <div class="text-danger">{{ $message }}</div>
    @enderror
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
@endsection
