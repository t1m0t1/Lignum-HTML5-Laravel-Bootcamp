@extends('layouts.template')

@section('content')
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem; opacity: 80%;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your E-mail and password!</p>
                    
                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                        <label class="form-label" for="email">{{ __('Email Address') }}</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>


                    <button class="btn btn-outline-light btn-lg px-5" type="submit">{{ __('Login') }}</button>
  
                </form>

              </div>
  
              <div>
                <p class="mb-0">Don't have an account? <a href="{{url('register')}}" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
