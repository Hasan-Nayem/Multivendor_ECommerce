@extends('auth.layout.auth-template')

@section('auth-body')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}" class="form-body">
        @csrf
        <div class="d-grid">
            <a class="btn btn-white radius-30" href="javascript:;">
                <span class="d-flex justify-content-center align-items-center">
                    <img class="me-2" src="{{ asset('backend/assets/images/icons/search.svg') }}" width="16" alt="">
                    <span>Sign in with Google</span>
                </span>
            </a>
        </div>

        <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
            <hr>
        </div>


        <div class="row g-3">
            <div class="col-12">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                    <input type="email" id="email" name="email" class="form-control radius-30 ps-5" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">{{ __('Enter Password') }}</label>
                <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                    <input type="password" id="password" name="password" class="form-control radius-30 ps-5" value="{{ old('password') }}" placeholder="Current Password" required autofocus>
                </div>
            </div>

            <div class="col-6">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="remember_me" checked="">
                  <label class="form-check-label" for="remember_me">{{ __('Remember Me') }}</label>
                </div>
            </div>

            <div class="col-6 text-end">    
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
                
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary radius-30">{{ __('Sign In') }}</button>
                </div>
            </div>

            <div class="col-12">
                <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a></p>
            </div>
        </div>
    </form>
@endsection