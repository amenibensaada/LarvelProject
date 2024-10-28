@extends('layouts.app')

@section('content')
@include('partials._navbar')

<div class="hero-section position-relative" style="padding: 80px 0 120px;">
    
    <div style="background: url('{{ asset('assets/images/donnation/ev3.jpg') }}') no-repeat center center;
     background-size: cover; position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.7; 
     z-index: 0;"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center">Add Event</h2>
                        <form id="eventForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="evenement_category_id" class="form-label">Category</label>
                                    <select class="form-select" id="evenement_category_id" name="evenement_category_id" required>
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    <div id="startDateError" class="text-danger" style="display: none;"></div> <!-- Error message container -->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                                <div id="endDateError" class="text-danger" style="display: none;"></div> <!-- Error message container -->
                                </div>

                                <div class="col-md-6">
                                    <label for="image" class="form-label">Event Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                            <div class="text-center d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    Save Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.getElementById('eventForm').addEventListener('submit', function(event) {
    // Get values from the form
    const title = document.getElementById('title').value.trim();
    const location = document.getElementById('location').value.trim();
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    // Reset error messages
    document.getElementById('startDateError').style.display = 'none';
    document.getElementById('endDateError').style.display = 'none';

    // Validation checks
    const today = new Date();
    const start = new Date(startDate);
    const end = endDate ? new Date(endDate) : null;

    let hasError = false;

    // Check if start date is in the past
    if (start < today) {
        event.preventDefault();
        document.getElementById('startDateError').textContent = "The start date cannot be in the past.";
        document.getElementById('startDateError').style.display = 'block';
        hasError = true;
    }

    // Check if end date is before the start date
    if (end && start > end) {
        event.preventDefault();
        document.getElementById('endDateError').textContent = "End date cannot be before the start date.";
        document.getElementById('endDateError').style.display = 'block';
        hasError = true;
    }

    if (!hasError) {
        // If no errors, allow form submission
        this.submit();
    }
});
</script>

@endsection

@endsection
