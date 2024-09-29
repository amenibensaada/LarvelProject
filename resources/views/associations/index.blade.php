@extends('layouts.app_front')

@section('content')
<div class="container mt-5">
     <!-- Text Content -->
     <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My Associations</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your Associations details for our platform.</p>
    </div>
    <h1 class="text-center mb-4"></h1>

    <div class="row">
        @foreach ($associations as $association)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- association Image -->
                     @if($association->image)
                        <img src="{{ asset('storage/' . $association->image) }}" alt="{{ $association->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/association/default.jpg') }}" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif 
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $association->nom }}</h5>
                        <p class="card-text">
                            <strong>addresse:</strong> {{ $association->adresse }}<br>
                            <strong>Phone:</strong> {{ $association->telephone }}<br>
                            <strong>Email:</strong> {{ $association->email }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                    <div class="card-footer d-flex justify-content-between">
                        
         <form action="{{ route('associations.destroy', $association->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="mdi mdi-delete"></i> Delete
                    </button>
        </form>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- No restaurants fallback -->
    @if($associations->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>No associations found.</strong> Please add a association to get started!
        </div>
    @endif
</div>
@endsection

