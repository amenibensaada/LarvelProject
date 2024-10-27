    @extends('layouts.app_front')

    @section('content')
        <div class="container mt-5">
            <!-- Text Content -->
            <div class="container text-center text-white position-relative mb-5"
                style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
                <h1 class="display-4"
                    style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">My
                    donations</h1>
                <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Manage your
                    donations
                    details for our platform.</p>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <form action="{{ route('donations.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search donations"
                                value="{{ request()->query('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @foreach ($donations as $donation)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <!-- Donation Image -->
                            <img src="https://media.istockphoto.com/id/1391095869/vector/box-with-different-food-donation-food-for-needy-and-poor-people-food-delivery-support-and.jpg?s=612x612&w=0&k=20&c=ZueV_EtHnk1kY4OzWFBnWt4aWGEhc36_O6TRdaRVo0Q="
                                alt="{{ $donation->name }}" class="card-img-top" style="height: 220px; object-fit: cover;">

                            <div class="card-body">
                                <h5
                                    class="{{ $donation->status == 'pending' ? 'card-title text-warning' : 'card-title text-success' }}">
                                    {{ $donation->status }}
                                </h5>

                                <div class="card-text row align-items-start mb-3">
                                    <!-- Column for From and To details -->
                                    <div class="col-5">
                                        <p class="mb-1">
                                            <strong>From:</strong> {{ $donation->restaurant->name }}
                                        </p>
                                        <p>
                                            <strong>To:</strong> {{ $donation->association->nom }}
                                        </p>
                                    </div>

                                    <!-- Vertical divider between the columns -->
                                    <div class="col-auto">
                                        <div class="vr bg-dark" style="height: 100%; width: 2px; background-color: #ddd;">
                                        </div>
                                    </div>

                                    <!-- Column for Items list -->
                                    <div class="col-6">
                                        <ul class="list-unstyled ps-2">
                                            @foreach ($donation->restaurantItems as $item)
                                                <li>
                                                    <strong>{{ $item->name }}</strong>
                                                    <span class="text-muted">({{ $item->quantity }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>


                                <div class="accordion" id="accordion-{{ $donation->id }}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{ $donation->id }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $donation->id }}" aria-expanded="true"
                                                aria-controls="collapse-{{ $donation->id }}">
                                                Items for Donation
                                            </button>
                                        </h2>
                                        <div id="collapse-{{ $donation->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading-{{ $donation->id }}"
                                            data-bs-parent="#accordion-{{ $donation->id }}">
                                            <div class="accordion-body">
                                                <!-- Display Restaurant Items -->
                                                <ul class="list-group mb-3">
                                                    @foreach ($donation->restaurant->items as $item)
                                                        @if (!$item->donation_id | ($item->donation_id == $donation->id))
                                                            <li class="list-group-item">
                                                                <div class="d-flex align-items-start">
                                                                    @if ($item->image)
                                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                                            alt="{{ $item->name }}"
                                                                            class="img-thumbnail me-3"
                                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                                    @endif
                                                                    <div>
                                                                        <strong
                                                                            style="font-size: 1.2rem;">{{ $item->name }}</strong><br>
                                                                        Quantity: <span
                                                                            class="text-success fw-bold">({{ $item->quantity }})</span><br>

                                                                        <div class="btn-group mt-2">


                                                                            <form class="me-2"
                                                                                action="{{ route('donations.remove_from_donation', ['itemId' => $item->id, 'donationId' => $donation->id]) }}"
                                                                                method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('put')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-secondary">
                                                                                    <i class="mdi mdi-plus"></i>
                                                                                </button>
                                                                            </form>

                                                                            <form
                                                                                action="{{ route('donations.add_to_donation', ['itemId' => $item->id]) }}"
                                                                                method="POST" style="display:inline;">
                                                                                @csrf
                                                                                @method('put')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-danger">
                                                                                    <i class="mdi mdi-minus"></i>
                                                                                </button>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                        <!-- Modal for Editing Item -->
                                                        <div class="modal fade" id="editItemModal-{{ $item->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="editItemModalLabel-{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editItemModalLabel-{{ $item->id }}">
                                                                            Edit Item for {{ $donation->restaurant->name }}
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data">
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
                                                                                <label
                                                                                    for="edit-item-name-{{ $item->id }}"
                                                                                    class="form-label">Item Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="edit-item-name-{{ $item->id }}"
                                                                                    name="name"
                                                                                    value="{{ $item->name }}" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    for="edit-item-description-{{ $item->id }}"
                                                                                    class="form-label">Description</label>
                                                                                <textarea class="form-control" id="edit-item-description-{{ $item->id }}" name="description">{{ $item->description }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    for="edit-item-quantity-{{ $item->id }}"
                                                                                    class="form-label">Quantity</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="edit-item-quantity-{{ $item->id }}"
                                                                                    name="quantity"
                                                                                    value="{{ $item->quantity }}"
                                                                                    min="1" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    for="edit-item-image-{{ $item->id }}"
                                                                                    class="form-label">Item Image</label>
                                                                                <input type="file" class="form-control"
                                                                                    id="edit-item-image-{{ $item->id }}"
                                                                                    name="image" accept="image/*">
                                                                                @if ($item->image)
                                                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                                                        alt="{{ $item->name }}"
                                                                                        style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                                                                                @endif
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update
                                                                                Item</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <!-- Add New Item Button -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                @if ($donation->user->id == auth()->id())
                                    @if ($donation->status == 'pending')
                                        <a href="{{ route('donations.edit', $donation->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('donations.destroy', $donation->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="mdi mdi-delete"></i> Delete
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- No donations fallback -->
            @if ($donations->isEmpty())
                <div class="alert alert-warning text-center">
                    <strong>No donations found.</strong> Please donate to an organisation!
                </div>
            @endif

            <!-- No donations fallback -->

        </div>
    @endsection
