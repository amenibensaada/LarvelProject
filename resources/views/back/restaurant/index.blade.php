@extends('back.dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">All Restaurants</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Restaurant Button -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRestaurantModal">
            <i class="mdi mdi-plus-circle"></i> Add New Restaurant
        </button>

        <!-- Sort Dropdown -->
        <form method="GET" action="{{ route('back.restaurant.index') }}" class="d-flex align-items-center bg-white p-2 rounded shadow-sm border border-dark" style="width: fit-content;">
            <label for="sort" class="me-3 text-dark fw-semibold">Sort by Items:</label>
            <div class="input-group" style="width: 200px;">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white">
                        <i class="mdi mdi-sort-variant"></i>
                    </span>
                </div>
                <select name="sort" id="sort" class="form-select" style="border-radius: 0 4px 4px 0;" onchange="this.form.submit()">
                    <option value="" disabled selected>Choose...</option>
                    <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
        </form>
        
        
    </div>

    <!-- Restaurants List -->
    <div class="row">
        @foreach($restaurants as $restaurant)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <!-- Restaurant Image (Optional) -->
                    @if($restaurant->image)
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('storage/restaurant_images/default.jpg') }}" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <!-- Restaurant Details -->
                        <span class="badge rounded-pill bg-gradient-primary text-white shadow position-absolute top-0 end-0 m-3 px-3 py-2" style="z-index: 1; font-size: 0.85rem;">
                            <i class="mdi mdi-package-variant-closed"></i> {{ $restaurant->items_count }} Items
                        </span>
                        
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">
                            <strong>Address:</strong> {{ $restaurant->address }}<br>
                            <strong>Phone:</strong> {{ $restaurant->phone }}<br>
                            <strong>Email:</strong> {{ $restaurant->email }}<br>
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="card-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editRestaurantModal-{{ $restaurant->id }}">
                            <i class="mdi mdi-pencil"></i> Edit
                        </button>
                        <form action="{{ route('back.restaurant.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this restaurant?')">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Restaurant Modal -->
<div class="modal fade" id="editRestaurantModal-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="editRestaurantModalLabel-{{ $restaurant->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRestaurantModalLabel-{{ $restaurant->id }}">Edit Restaurant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('back.restaurant.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="restaurant-name-{{ $restaurant->id }}" class="form-label">Restaurant Name</label>
                        <input type="text" class="form-control" id="restaurant-name-{{ $restaurant->id }}" name="name" value="{{ $restaurant->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-address-{{ $restaurant->id }}" class="form-label">Address</label>
                        <input type="text" class="form-control" id="restaurant-address-{{ $restaurant->id }}" name="address" value="{{ $restaurant->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-phone-{{ $restaurant->id }}" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="restaurant-phone-{{ $restaurant->id }}" name="phone" value="{{ $restaurant->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-email-{{ $restaurant->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="restaurant-email-{{ $restaurant->id }}" name="email" value="{{ $restaurant->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-image-{{ $restaurant->id }}" class="form-label">Image</label>
                        <input type="file" class="form-control" id="restaurant-image-{{ $restaurant->id }}" name="image" accept="image/*">
                        @if($restaurant->image)
                            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}" style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update Restaurant</button>
                </form>
            </div>
        </div>
    </div>
</div>
        @endforeach
    </div>
</div>



<!-- Add Restaurant Modal -->
<div class="modal fade" id="addRestaurantModal" tabindex="-1" aria-labelledby="addRestaurantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRestaurantModalLabel">Add New Restaurant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('back.restaurant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="restaurant-name" class="form-label">Restaurant Name</label>
                        <input type="text" class="form-control" id="restaurant-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="restaurant-address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="restaurant-phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="restaurant-email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="restaurant-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="restaurant-image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Restaurant</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
