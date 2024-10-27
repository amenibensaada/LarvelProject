@extends('layouts.auth') 

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card shadow-lg border-0 rounded-4 p-5" style="background-color: #f8f9fa;">
            <div class="card-header bg-transparent text-center border-0 pb-4">
                <h2 class="mb-1 font-weight-bold">{{ __('Login') }}</h2>
                <p class="text-muted">Welcome back! Please login to your account</p>
            </div>

            <div class="card-body px-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label text-muted">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror rounded-pill" name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com">
                        
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror rounded-pill" name="password" required placeholder="Enter your password">
                        
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted small" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill py-3 shadow">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
