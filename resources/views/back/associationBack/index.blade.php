@extends('back.dashboard')

@section('content')
<div class="container-fluid">
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800">Association</h1>
     <!-- Formulaire de recherche -->
     <form method="GET" action="{{ route('associationsBack.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class=" font-weight-bold text-primary mb-20">All Associations</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Phone</th>
                            <th>email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($associations as $association)
                        <tr>
                            <td>{{ $association->id }}</td>
                            <td>{{ $association->nom }}</td>
                            <td> {{ $association->adresse }}</td>
                            <td> {{ $association->telephone }}</td>
                            <td>{{ $association->email }}</td>
                            <td>
                            <form action="{{ route('associationsBack.destroy', $association->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                     @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this association?');">Delete</button>
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