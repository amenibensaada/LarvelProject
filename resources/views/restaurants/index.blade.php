@extends('layouts.app_front')

@section('content')
<div class="container mt-5">
     <!-- Text Content -->
     <div class="container text-center text-white position-relative mb-5" style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
        <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My Restaurants</h1>
        <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your restaurant details and items for donation on our platform.</p>
    </div>

   
        <!-- Search Bar -->
        <form action="{{ route('restaurants.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a restaurant..." value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    
       
    

    <!-- Restaurant Cards -->
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Restaurant Image -->
                    @if($restaurant->image)
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/restaurant_images/default.jpg') }}" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif
                    
                    <!-- Restaurant Details -->
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">
                            <strong><i class="mdi mdi-map-marker me-2"></i> Address:</strong> {{ $restaurant->address }}<br>
                            <strong><i class="mdi mdi-phone me-2"></i> Phone:</strong> {{ $restaurant->phone }}<br>
                            <strong><i class="mdi mdi-email me-2"></i> Email:</strong> {{ $restaurant->email }}
                        </p>
                        

                        <!-- Accordion for Items -->
                        <div class="accordion" id="accordion-{{ $restaurant->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $restaurant->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $restaurant->id }}" aria-expanded="true" aria-controls="collapse-{{ $restaurant->id }}">
                                        Items for Donation
                                    </button>
                                </h2>
                                <div id="collapse-{{ $restaurant->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $restaurant->id }}" data-bs-parent="#accordion-{{ $restaurant->id }}">
                                    <div class="accordion-body">
                                        <!-- Display Restaurant Items -->
                                        <ul class="list-group mb-3">
                                            @foreach ($restaurant->items as $item)
                                                <li class="list-group-item">
                                                    <div class="d-flex align-items-start">
                                                        @if($item->image)
                                                            <!-- Larger image size -->
                                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail me-3" style="width: 100px; height: 100px; object-fit: cover;">
                                                        @endif
                                                        <div>
                                                            <!-- Larger font for item name -->
                                                            <strong style="font-size: 1.2rem;">{{ $item->name }}</strong> <br>
                                                            quantity :<span class="text-success fw-bold">({{ $item->quantity }})</span><br>

                                                            
                                                            <!-- Buttons directly under quantity -->
                                                            <div class="btn-group mt-2">
                                                                <button type="button" class="btn btn-sm btn-warning rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#editItemModal-{{ $item->id }}">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </button> 
                                                                <form action="{{ route('restaurant_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- Modal for Editing Item (Move this inside the foreach loop) -->
                                            <div class="modal fade" id="editItemModal-{{ $item->id }}" tabindex="-1" aria-labelledby="editItemModalLabel-{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editItemModalLabel-{{ $item->id }}">Edit Item for {{ $restaurant->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('restaurant_items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                
                                                                <!-- Display Validation Errors in Modal -->
                                                                @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                                <li>{{ $error }}</li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endif

                                                                <div class="mb-3">
                                                                    <label for="edit-item-name-{{ $item->id }}" class="form-label">Item Name</label>
                                                                    <input type="text" class="form-control" id="edit-item-name-{{ $item->id }}" name="name" value="{{ $item->name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="edit-item-description-{{ $item->id }}" class="form-label">Description</label>
                                                                    <textarea class="form-control" id="edit-item-description-{{ $item->id }}" name="description">{{ $item->description }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="edit-item-quantity-{{ $item->id }}" class="form-label">Quantity</label>
                                                                    <input type="number" class="form-control" id="edit-item-quantity-{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="edit-item-image-{{ $item->id }}" class="form-label">Item Image</label>
                                                                    <input type="file" class="form-control" id="edit-item-image-{{ $item->id }}" name="image" accept="image/*">
                                                                    @if($item->image)
                                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                                                                    @endif
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update Item</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- Add New Item Button -->
                                            <li class="list-group-item text-center">
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal-{{ $restaurant->id }}">
                                                    <i class="mdi mdi-plus"></i> Add New Item
                                                </button>
                                            </li>
                                        </ul>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer with Edit and Delete Restaurant -->
                    <div class="card-footer d-flex justify-content-between">
                        <!-- Trigger for Edit Modal -->
                          
                            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-sm btn-warning">
                                <i class="mdi mdi-pencil"></i> Edit
                            </a>
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- No restaurants fallback -->
    @if($restaurants->isEmpty())
        <div class="alert alert-warning text-center">
            <strong>No restaurants found.</strong> Please add a restaurant to get started!
        </div>
    @endif
</div>






<!-- Modal for Adding New Items -->
@foreach ($restaurants as $restaurant)
    <div class="modal fade" id="addItemModal-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="addItemModalLabel-{{ $restaurant->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel-{{ $restaurant->id }}">Add New Item for {{ $restaurant->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('restaurant_items.store', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="item-name-{{ $restaurant->id }}" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item-name-{{ $restaurant->id }}" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-description-{{ $restaurant->id }}" class="form-label">Description</label>
                            <textarea class="form-control" id="item-description-{{ $restaurant->id }}" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="item-quantity-{{ $restaurant->id }}" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="item-quantity-{{ $restaurant->id }}" name="quantity" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="item-image-{{ $restaurant->id }}" class="form-label">Item Image</label>
                            <input type="file" class="form-control" id="item-image-{{ $restaurant->id }}" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
