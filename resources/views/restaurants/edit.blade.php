@extends('layouts.app_front')

@section('content')
<div class="container">
    <h1>{{ isset($restaurant) ? 'Edit Restaurant' : 'Add Restaurant' }}</h1>

    <form action="{{ isset($restaurant) ? route('restaurants.update', $restaurant->id) : route('restaurants.store') }}" method="POST">
        @csrf
        @if(isset($restaurant))
            @method('PUT')
        @endif
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $restaurant->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $restaurant->address ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $restaurant->phone ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $restaurant->email ?? '') }}" required>
        </div>

        <!-- Hidden field for user_id -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <!-- Status dropdown for admins (if editing and user is admin) -->
        @if(isset($restaurant) && auth()->user()->role == 'admin')
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ old('status', $restaurant->status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status', $restaurant->status ?? '') == 'approved' ? 'selected' : '' }}>Approved</option>
            </select>
        </div>
        @endif

        <button type="submit" class="btn btn-success">{{ isset($restaurant) ? 'Update' : 'Submit' }}</button>
    </form>
</div>
@endsection
