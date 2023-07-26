@extends('layouts.client')
@section('content')
  <section class="wrapper">
    <div class="container">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 size text-center">
        <form action="{{ route('postRegister') }}" method="POST" class="rounded bg-white p-5 shadow" id="form"
          spellcheck="false" autocomplete="off">
          @csrf
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="{{ asset('storage/images/logo.webp') }}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>
          <div class="fw-normal text-muted mb-2"> Already have an account?
            <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Sign in here</a>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control"
                  placeholder="Name">
                <label for="floatingLastName">Name</label>
                <small></small>
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control"
                  placeholder="Email address">
                <label for="floatingInput">Email address</label>
                <small></small>
                @error('email')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <small></small>
                @error('password')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password_confirmation" id="cfpassword" class="form-control"
                  placeholder="Confirm Password">
                <label for="floatingPassword">Confirm Password</label>
                <small></small>
              </div>
            </div>
          </div>
          <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
            <div class="col-md-6">
              {!! RecaptchaV3::field('postRegister') !!}
              @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">
                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="other text-muted text-uppercase mb-2 text-center"><span>or</span></div>
          <div class="social-account">
            <a href="#" class="btn btn-light login_with w-100 mb-3">
              <img alt="Logo" src="{{ asset('storage/images/google.png') }}" class="img-fluid me-3">Google</a>
            <a href="#" class="btn btn-light login_with w-100 mb-3">
              <img alt="Logo" src="{{ asset('storage/images/facebook.png') }}" class="img-fluid me-3">Facebook</a>
          </div>
          <div class="form-check d-flex align-items-center">
            <input class="form-check-input" name="terms_of_service" type="checkbox" id="gridCheck" required>
            <label class="form-check-label ms-2" for="gridCheck"> I Agree
              <a href="#">Terms and conditions</a>. </label>
          </div>
          @error('terms_of_service')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          {!! RecaptchaV3::field('postRegister') !!}
          <button type="submit" class="btn btn-primary submit_btn w-100 my-4" id="btnSubmit">Sign Up</button>
        </form>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
  <script>
    form.addEventListener('keyup', function(e) {
      e.preventDefault();
      checkEmptyError([name, email, password, cfPassword]);
      checkLength(name, 6, 20);
      checkLength(password, 6, 20);
      checkEmailError(email);
      checkMatchPasswordError(password, cfPassword);
    })
  </script>
@endpush
