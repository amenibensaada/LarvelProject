@extends('layouts.app_front')

@section('content')
@include('partials._navbar')


<div class="container">
    <h1 class="text-center">Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add Product</a>
    
    <div class="row ">
        @foreach ($products as $product)
        <div class="col-md-4 " >
            <div class="card mb-4"">
                @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 370px; height: 200px; object-fit: cover;"> <!-- Ensures image fits properly -->
                @else
                    <img src="{{ asset('default-image.jpg') }}" style="width: 20px; height: 20px; " class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Description: {{ $product->description }}</p>
                    <p class="card-text"><strong>Category: {{ $product->category->name }}</strong></p>
                    <p class="card-text">Stock: {{ $product->stock }}</p>
                    <p class="card-text">expiration_date: {{ $product->expiration_date }}</p>

                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>No products found.</strong> Please add a product to get started!
        </div>
    @endif
</div>
@endsection
