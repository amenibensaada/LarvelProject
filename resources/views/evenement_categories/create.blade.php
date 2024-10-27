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
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h2 class="text-center">Add Event Category</h2>
                        <form action="{{ route('evenement-categories.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                            <div class="text-center d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    Save Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
