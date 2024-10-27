@extends('layouts.app_front')

@section('content')
<div class="container mt-5">
     <!-- Text Content -->
     <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My Associations</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your Associations details for our platform.</p>
    </div>

    <div class="row">
        @foreach ($beneficiaires as $beneficiaire)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <!-- Association Image -->
                    <img src="{{ asset('assets/images/aziz2.png') }}" alt="Association Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body text-center" style="background-color: #f8f9fa;">
                        <h5 class="card-title" style="font-weight: bold; color: #333;">{{ $beneficiaire->nom }}</h5>
                        <p class="card-text">
                            <strong>Besoins:</strong> {{ $beneficiaire->besoins }}<br>
                            <strong>Association:</strong> {{ $associations->find($beneficiaire->associationId)->nom ?? 'Non spécifiée' }}
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between" style="background-color: #f1f1f1;">
                        <a href="{{ route('beneficiares.edit', $beneficiaire->id) }}" class="btn btn-sm btn-warning" style="border-radius: 8px;">
                            <i class="mdi mdi-pencil"></i> Modifier
                        </a>
                        
                        <form action="{{ route('beneficiares.destroy', $beneficiaire->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 8px;">
                                <i class="mdi mdi-delete"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- No associations fallback -->
    @if($associations->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>No associations found.</strong> Please add an association to get started!
        </div>
    @endif
</div>

<style>
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
