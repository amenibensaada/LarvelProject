@extends('layouts.auth') 

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-lg-6 col-md-8 col-12">
        <div class="card shadow-lg border-0 rounded-3 p-4" style="background-color: #f8f9fa;">
            <div class="card-header bg-transparent text-center border-0 pb-3">
                <h3 class="mb-0 font-weight-bold">{{ __('Register') }}</h3>
                <p class="text-muted small">Create your account to get started</p>
            </div>

            <div class="card-body px-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label text-muted">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror rounded-pill" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-pill" name="email" value="{{ old('email') }}" required placeholder="name@example.com">

                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill" name="password" required placeholder="Choose a secure password">

                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label text-muted">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control rounded-pill" name="password_confirmation" required placeholder="Re-enter your password">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary rounded-pill py-2 shadow-sm">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
