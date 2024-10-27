@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
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
                        <form action="{{ isset($beneficiaire) ? route('beneficiares.update', $beneficiaire->id) : route('beneficiaires.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($beneficiaire))
                                @method('PUT')
                            @endif

                            <!-- Beneficiaire Name -->
                            <div class="form-group mb-3">
                                <label for="name" class="form-label"><i class="mdi mdi-storefront"></i> Beneficiaire Name</label>
                                <input type="text" name="nom" class="form-control rounded-pill shadow-sm" value="{{ old('nom', $beneficiaire->nom ?? '') }}" >
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Besoins -->
                            <div class="form-group mb-3">
                                <label for="besoins" class="form-label"><i class="mdi mdi-map-marker"></i> Besoins</label>
                                <input type="text" name="besoins" class="form-control rounded-pill shadow-sm" value="{{ old('besoins', $beneficiaire->besoins ?? '') }}" >
                                @error('besoins')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Association Selection -->
                            <div class="form-group mb-3">
                                <label for="associationId" class="form-label"><i class="mdi mdi-account"></i> Association</label>
                                <select name="associationId" class="form-control rounded-pill shadow-sm">
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
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    <i class="mdi mdi-send"></i> {{ isset($beneficiaire) ? 'Update' : 'Submit' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-lg text-center">
                    <div class="card-body">
                        <h5 class="card-title">Why We Should Help?</h5>
                        <p class="card-text">These groups provide support, encourage collaboration, and ultimately enrich our lives through shared experiences and a sense of belonging.</p>
                        <img src="{{ asset('assets/images/helping.jpg') }}" class="img-fluid rounded shadow-sm mt-3" alt="Helping Hands">
                    </div>
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
