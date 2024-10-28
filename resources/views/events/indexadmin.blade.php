@extends('layouts.app')

@section('content')
@include('partials._navbar')

<div class="container">
<div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My Events</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage Event Details</p>
    </div>

    <form action="{{ route('events.adminindex') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Rechercher un événement..." value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>
<div class="input-group">
        <label for="sort" class="form-label me-2">Trier par titre :</label>
        <select name="sort" id="sort" class="form-select" onchange="this.form.submit()">
            <option value="asc" {{ request()->query('sort') == 'asc' ? 'selected' : '' }}>Ascendant</option>
            <option value="desc" {{ request()->query('sort') == 'desc' ? 'selected' : '' }}>Descendant</option>
        </select>
    </div>
    
    <div class="row">
        @forelse ($events as $event)
        <div class="col-md-4">
            <div class="card event-card mb-4 position-relative">
                <!-- Event Image -->
                @if ($event->image)
                    <div class="event-image-wrapper" style="background-image: url('{{ asset('storage/' . $event->image) }}');"></div>
                @else
                    <div class="event-image-wrapper" style="background-image: url('{{ asset('default-image.jpg') }}');"></div>
                @endif
                
                <!-- Overlay for 'See Details' -->
                <div class="overlay">
                    <a href="#" class="btn btn-light see-details-btn" data-bs-toggle="modal" data-bs-target="#eventModal-{{ $event->id }}">See Details</a>
                </div>

                <div class="card-body text-center">
                    <!-- Event Title and Category -->
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text"><strong>Category: {{ $event->evenementCategory->name }}</strong></p>

                    <!-- Buttons for Edit and Delete -->
                    <div class="button-group">
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i>Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Event Details -->
        <div class="modal fade" id="eventModal-{{ $event->id }}" tabindex="-1" aria-labelledby="eventModalLabel-{{ $event->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-custom"> <!-- Custom class for width -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel-{{ $event->id }}">{{ $event->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- Event Image -->
                                @if ($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('default-image.jpg') }}" alt="Default Image" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-12">
                                <!-- Event Details -->
                                <p><strong>Description:</strong> {{ $event->description }}</p>
                                <p><strong>Location:</strong> {{ $event->location }}</p>
                                <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
                                <p><strong>End Date:</strong> {{ $event->end_date }}</p>
                                <p><strong>Category:</strong> {{ $event->evenementCategory->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i> Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i>Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <strong>No events found.</strong> Please add an Event or try a different filter!
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection

<!-- Add some custom styles -->
<style>
    .event-card {
        position: relative;
        border: none;
        overflow: hidden;
    }

    .event-image-wrapper {
        width: 100%;
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
    }

    .event-card:hover .overlay {
        opacity: 1;
    }

    .see-details-btn {
        font-size: 18px;
        color: white;
    }

    .see-details-btn:hover {
        color: #ccc;
    }

    .button-group {
        margin-top: 10px;
    }

    .modal-dialog-custom {
        max-width: 500px; /* Set custom width */
    }
</style>

<!-- Include Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
