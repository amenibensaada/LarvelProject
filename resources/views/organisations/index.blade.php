@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/organisations/organisations.css') }}">

@if($organisations->isEmpty())
    <p>No organisations found.</p>
@else
<section class="light">
    <div class="container py-2">
        <div class="h1 text-center text-dark" id="pageHeaderTitle">Organisations</div>

        @foreach($organisations as $index => $organisation)  
            @if($index % 2 == 0)
                <article class="postcard light blue">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="{{asset('storage/'.$organisation->image)}}" alt="Image Title" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h1 class="postcard__title blue"><a href="#">{{$organisation->name}}</a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="{{ $organisation->created_at->toDateString() }}">
                                <i class="fas fa-calendar-alt mr-2"></i>{{ $organisation->created_at->format('D, M jS Y') }}
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-phone me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Phone Number:</span>
                            <span class="ms-2">{{ $organisation->phone }}</span>
                        </div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-email me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Email:</span>
                            <span class="ms-2">{{ $organisation->email }}</span>
                        </div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-map-marker me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Address:</span>
                            <span class="ms-2">{{ $organisation->address }}</span>
                        </div>
                    </div>
                
                    <!-- Semi-Circle Button Container -->
                    <div class="semi-circle-container col-7 d-flex justify-content-center">
                        <div class="semi-circle">
                            <button class="button quarter-button button1 btn btn-primary">
                                <span class="mdi mdi-information-slab-box-outline costum-icon"></span><br>
                                Details
                            </button>
                            <button class="button quarter-button button2 btn btn-success" 
                            onclick="window.location.href='{{ route('organisations.edit', $organisation->id) }}'">
                                <span class="mdi mdi-pencil-box-outline costum-icon"></span><br>
                                Edit
                            </button>
                            <!-- Delete Button triggers modal -->
                            <button class="btn btn-danger button3 d-flex justify-content-center" 
                            data-bs-toggle="modal" data-bs-target="#deleteModal{{$index}}">
                                <span class="mdi mdi-trash-can-outline costum-icon"></span>
                            </button>
                        </div>
                    </div>
                </article>
            @else
                <article class="postcard light blue">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="{{asset('storage/'.$organisation->image)}}" alt="Image Title" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h1 class="postcard__title blue"><a href="#">{{$organisation->name}}</a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="{{ $organisation->created_at->toDateString() }}">
                                <i class="fas fa-calendar-alt mr-2"></i>{{ $organisation->created_at->format('D, M jS Y') }}
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-phone me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Phone Number:</span>
                            <span class="ms-2">{{ $organisation->phone }}</span>
                        </div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-email me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Email:</span>
                            <span class="ms-2">{{ $organisation->email }}</span>
                        </div>
                
                        <div class="d-flex align-items-center">
                            <span class="mdi mdi-map-marker me-2" aria-hidden="true"></span>
                            <span class="fw-bold">Address:</span>
                            <span class="ms-2">{{ $organisation->address }}</span>
                        </div>
                    </div>
                
                    <!-- Semi-Circle Button Container -->
                    <div class="semi-circle-container col-7 d-flex justify-content-center">
                        <div class="semi-circle">
                            <button class="button quarter-button button1 btn btn-primary">
                                <span class="mdi mdi-information-slab-box-outline costum-icon"></span><br>
                                Details
                            </button>
                            <button class="button quarter-button button2 btn btn-success"
                            onclick="window.location.href='{{ route('organisations.edit', $organisation->id) }}'">
                                <span class="mdi mdi-pencil-box-outline costum-icon"></span><br>
                                Edit
                            </button>
                            <!-- Delete Button triggers modal -->
                            <button class="btn btn-danger button3 d-flex justify-content-center" 
                            data-bs-toggle="modal" data-bs-target="#deleteModal{{$index}}">
                                <span class="mdi mdi-trash-can-outline costum-icon"></span>
                            </button>
                        </div>
                    </div>
                </article>
            @endIf

            <!-- Modal HTML for Deletion -->
            <div id="deleteModal{{$index}}" class="modal fade">
                <div class="modal-dialog modal-dialog-centered  modal-confirm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title d-flex mx-auto">Are you sure?</h4>
                    </div>
                    <div class="modal-body text-danger">
                      <p>Do you really want to delete this organisation? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('organisations.destroy', $organisation->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@endif  <!-- End of if statement -->

@endsection
