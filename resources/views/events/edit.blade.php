@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="text-center">Edit Event</h2>
                    
                    <!-- Form to Edit Event -->
                    <form action="{{ route('events.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- This is required for updating a resource -->
                        
                        <!-- Event Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $evenement->title) }}" required>
                        </div>

                        <!-- Event Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $evenement->description) }}</textarea>
                        </div>

                        <!-- Event Location -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $evenement->location) }}" required>
                        </div>

                        <!-- Event Category -->
                        <div class="mb-3">
                            <label for="evenement_category_id" class="form-label">Category</label>
                            <select class="form-select" id="evenement_category_id" name="evenement_category_id" required>
                                <option value="" disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $evenement->evenement_category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

<!-- Event Start Date -->
<div class="mb-3">
    <label for="start_date" class="form-label">Start Date</label>
    <input type="date" class="form-control" id="start_date" name="start_date" 
           value="{{ old('start_date', isset($evenement->start_date) ? date('Y-m-d', strtotime($evenement->start_date)) : '') }}" required>
</div>

<!-- Event End Date -->
<div class="mb-3">
    <label for="end_date" class="form-label">End Date</label>
    <input type="date" class="form-control" id="end_date" name="end_date" 
           value="{{ old('end_date', isset($evenement->end_date) ? date('Y-m-d', strtotime($evenement->end_date)) : '') }}">
</div>



                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Event Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($evenement->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $evenement->image) }}" alt="Current Image" class="img-thumbnail" width="150">
                                    <p class="mt-2">Current Image</p>
                                </div>
                            @endif
                        </div>

                        <!-- Save Button -->
                        <div class="text-center d-grid">
                            <button type="submit" class="btn btn-lg btn-primary rounded-pill shadow-sm">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
