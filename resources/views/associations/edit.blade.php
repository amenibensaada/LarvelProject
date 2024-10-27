@extends('layouts.app_front')

@section('content')
<!-- Hero Section -->
<!-- Hero Section with Form -->
<div class="hero-section position-relative" style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
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
                    <form action="{{ isset($association) ? route('associations.update', $association->id) : route('associations.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                            @if(isset($association))
                                @method('PUT')
                            @endif
    <!-- Association Name -->
    <div class="form-group mb-3">
        <label for="name" class="form-label"><i class="mdi mdi-storefront"></i> Association Name</label>
        <input type="text" name="nom" class="form-control rounded-pill shadow-sm" value="{{ old('nom', $association->nom ?? '') }}" required>
    </div>

    
    <!-- Address -->
    <div class="form-group mb-3">
        <label for="adress" class="form-label"><i class="mdi mdi-map-marker"></i> Address</label>
        <input type="text" name="adresse" class="form-control rounded-pill shadow-sm" value="{{ old('adresse', $association->adresse ?? '') }}" required>
    </div>
    

    <!-- Phone -->
    <div class="form-group mb-3">
        <label for="phone" class="form-label"><i class="mdi mdi-phone"></i> Phone</label>
        <input type="text" name="telephone" class="form-control rounded-pill shadow-sm" value="{{ old('telephone', $association->telephone ?? '') }}" required>
    </div>

    <!-- Email -->
    <div class="form-group mb-3">
        <label for="email" class="form-label"><i class="mdi mdi-email"></i> Email</label>
        <input type="email" name="email" class="form-control rounded-pill shadow-sm" value="{{ old('email', $association->email ?? '') }}" required>
    </div>
   <!-- Image Upload -->
   <div class="form-group mb-3">
    <label for="image" class="form-label"><i class="mdi mdi-image"></i> Image</label>
    <input type="file" name="image" class="form-control" accept="image/*"> <!-- Ajoute accept pour restreindre le type -->
</div>

    <div class="d-grid">
        <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
            <i class="mdi mdi-send"></i>  {{ isset($association) ? 'Update' : 'Submit' }}
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
