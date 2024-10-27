@extends('back.dashboard')

@section('content')
<div class="container-fluid">
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Association</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class=" font-weight-bold text-primary mb-20">All Beneficiaires</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Besoins</th>
                            <th>AssociationId</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiaires as $beneficiaire)
                        <tr>
                            <td>{{ $beneficiaire->id }}</td>
                            <td>{{ $beneficiaire->nom }}</td>
                            <td> {{ $beneficiaire->besoins }}</td>
                            <td>{{ $beneficiaire->associationId }}</td>
                            <td>
                            <form action="{{ route('beneficiairesBack.destroy', $beneficiaire->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                     @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this beneficiare?');">Delete</button>
                            </form>
                          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection