@extends('layouts.app_front')

@section('content')
<div class="container">
    <h1>Restaurants</h1>
    <a href="{{ route('restaurants.create') }}" class="btn btn-primary mb-3">Add New Restaurant</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th> <!-- New column for Image -->
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>
                        <!-- Display restaurant image or a default placeholder if not available -->
                        @if($restaurant->image)
                            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" style="width: 100px; height: auto;">
                        @else
                            <img src="{{ asset('storage/restaurant_images/default.jpg') }}" alt="No Image" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->email }}</td>
                    <td>
                        <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline-block;">
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
