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
        @foreach ($beneficiaires as $beneficiaire)
            <div class="col-md-4 mb-4">
                <div class="carad shadow-sm">
                    <!-- association Image -->
                    
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $beneficiaire->nom }}</h5>
                        <p class="card-text">
                            <strong>besoins:</strong> {{ $beneficiaire->besoins }}<br>
                            <p><strong>Association:</strong> {{ $associations->find($beneficiaire->associationId)->nom ?? 'Non spécifiée' }}</p>
                                </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('beneficiares.edit', $beneficiaire->id) }}" class="btn btn-sm btn-warning">
                            <i class="mdi mdi-pencil"></i> Modifier
                        </a>
                        
                        <form action="{{ route('beneficiares.destroy', $beneficiaire->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i> Supprimer
                            </button>
                        </form>
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

