@extends('layouts.app_front')

@section('content')
    <h1>Product Stocks</h1>
    <a href="{{ route('product_stocks.create') }}" class="btn btn-primary">Add New Product Stock</a>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productStocks as $productStock)
                <tr>
                    <td>{{ $productStock->product->name }}</td>
                    <td>{{ $productStock->quantity }}</td>
                    <td>{{ $productStock->unit }}</td>
                    <td>
                        <a href="{{ route('product_stocks.edit', $productStock) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('product_stocks.destroy', $productStock) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection