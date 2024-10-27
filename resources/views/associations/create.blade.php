@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/aziz2.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>
    
    <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">Partner with Us to Help the Homeless</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Join our community by adding your restaurant to help distribute surplus food to those in need.</p>
    </div>

    <div class="container text-white position-relative">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                       
                        
                     <form action="{{ route('associations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Association Name -->
                            <div class="form-group mb-3">
                                <label for="name" class="form-label"><i class="mdi mdi-storefront"></i> Association Name</label>
                                <input type="text" name="nom" class="form-control rounded-pill shadow-sm @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="form-group mb-3">
                                <label for="address" class="form-label"><i class="mdi mdi-map-marker"></i> Address</label>
                                <input type="text" name="addresse" class="form-control rounded-pill shadow-sm @error('addresse') is-invalid @enderror" value="{{ old('addresse') }}" required>
                                @error('addresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label"><i class="mdi mdi-phone"></i> Phone</label>
                                <input type="text" name="telephone" class="form-control rounded-pill shadow-sm @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" required>
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label"><i class="mdi mdi-email"></i> Email</label>
                                <input type="text" name="email" class="form-control rounded-pill shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group mb-3">
                                <label for="image" class="form-label"><i class="mdi mdi-image"></i> Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    <i class="mdi mdi-send"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar with Info -->
            <div class="col-md-4">
                <div class="card shadow-lg text-center">
                    <div class="card-body">
                        <h5 class="card-title">Why We Should help ?</h5>
                        <p class="card-text">These groups provide support, encourage collaboration, and ultimately enrich our lives through shared experiences and a sense of belonging.</p>
                        <img src="{{ asset('assets/images/aziz.jpg') }}" class="img-fluid rounded shadow-sm mt-3" alt="Helping Hands">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
