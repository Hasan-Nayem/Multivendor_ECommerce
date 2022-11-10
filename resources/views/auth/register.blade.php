@extends('auth.layout.auth-template')

@section('auth-body')
    

    <form method="POST" action="{{ route('register') }}" class="form-body">
        @csrf
        <div class="d-grid">
            <a class="btn btn-white radius-30" href="javascript:;">
                <span class="d-flex justify-content-center align-items-center">
                    <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="">
                    <span>Sign up with Google</span>
                </span>
            </a>
        </div>
                      
        <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
            <hr>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="row g-3">
            <div class="col-12 ">
                <label for="name" class="form-label">Name</label>
                <div class="ms-auto position-relative">
                  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-person-circle"></i></div>
                  <input type="text" class="form-control radius-30 ps-5" id="name" name="name" placeholder="Enter Your Name" value="{{ old('name') }}" required autofocus>
                </div>
           </div>

           <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <div class="ms-auto position-relative">
                  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                  <input type="email" class="form-control radius-30 ps-5" id="email" name="email" placeholder="Email Address" required>
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Enter Password</label>
                <div class="ms-auto position-relative">
                  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                  <input type="password" class="form-control radius-30 ps-5" name="password" id="password" placeholder="Enter Password">
                </div>
            </div>

            <div class="col-12">
                <label for="password_confirmation" class="form-label">Enter Password</label>
                <div class="ms-auto position-relative">
                  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                  <input type="password" class="form-control radius-30 ps-5" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password">
                </div>
            </div>

            <div class="col-12">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to the Trems & Conditions</label>
                </div>
            </div>

            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary radius-30">Sign Up</button>
                </div>
            </div>
                          
            <div class="col-12">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign In here</a></p>
            </div>
        </div>

    </form>

@endsection