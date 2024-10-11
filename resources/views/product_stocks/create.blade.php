@extends('layouts.app_front')

@section('content')
    <h1>Add New Product Stock</h1>
    <form action="{{ route('product_stocks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <select name="unit" id="unit" class="form-control" required>
                @foreach($units as $unit)
                    <option value="{{ $unit }}">{{ ucfirst($unit) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product Stock</button>
    </form>
@endsection