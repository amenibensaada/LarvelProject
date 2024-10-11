@extends('layouts.app_front')

@section('content')
    <h1>Edit Product Stock</h1>
    <form action="{{ route('product_stocks.update', $productStock) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $productStock->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" step="0.01" value="{{ $productStock->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <select name="unit" id="unit" class="form-control" required>
                @foreach($units as $unit)
                    <option value="{{ $unit }}" {{ $productStock->unit == $unit ? 'selected' : '' }}>{{ ucfirst($unit) }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Product Stock</button>
    </form>
@endsection