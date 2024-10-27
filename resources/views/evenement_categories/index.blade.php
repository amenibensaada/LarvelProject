@extends('layouts.app')

@section('content')
@include('partials._navbar')

<div class="container">
    <h2>Event Categories</h2>
    <!-- <a href="{{ route('evenement-categories.create') }}" class="btn btn-primary">Add Category</a> -->
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('evenement-categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('evenement-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
