@extends('layouts.app')

@section('content')


    <div class="container mt-5">
        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5"
            style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px; background-image: url('https://blog.ipleaders.in/wp-content/uploads/2021/09/register-company-online-1.png'); min-height:300px;  background-repeat: no-repeat; background-size: cover;">

            <h1 class="display-4 text-white"
                style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                Manage Reviews
            </h1>

            <p class="lead text-white" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">
                Manage your Reviews details for our platform.
            </p>

        </div>





        @foreach ($reviews as $review)
            <div class="row mb-4 bg-white p-4 my-3 position-relative">

                
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST"
                        class="position-absolute d-flex justify-content-end " style="top: -15px; right: -25px;">
                        @csrf
                        @method('DELETE') <!-- This adds the DELETE method to the form -->
                        <button type="submit" class="btn btn-danger rounded-circle"
                            style="width: 40px; height: 40px; border-radius: 50%; padding: 0;">
                            <i class="menu-icon mdi mdi-delete"></i>
                        </button>
                    </form>
                

                <div class="col-12 d-flex align-items-center">

                    <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI="
                        alt="User Avatar" class="rounded-circle me-3" style="width: 60px; height: 60px;">

                    <!-- Profile Image -->

                    <div class="col-auto">
                        <h5 class="mb-1">{{ $review->title }}
                            @if ($review->user->id == auth()->id())
                            <a href="{{ route('reviews.edit', $review->id) }}" style="text-decoration: none;">
                                (<span style="text-decoration: underline">Edit</span>)
                            </a>
                        @endif
                        </h5>
                        <!-- Static Review Title -->
                        <div class="mb-0">{!! $review->text !!}</div> <!-- Static Review Text -->
                    </div>

                    <div class="col-auto ms-auto">
                        <img src="{{ asset('storage/' . $review->image) }}" alt="Association Image" class="rounded me-3"
                            style="width: 90px; height: 90px;">
                    </div>
                </div>
            </div>
        @endforeach


    </div>

@endsection
