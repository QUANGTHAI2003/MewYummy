@extends('layouts.client')
@section('content')
  <section class="wrapper">
    <div class="container">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
        <form action="{{ route('authenticate') }}" method="POST" class="rounded bg-white px-4 py-5 shadow" id="form"
          spellcheck="false" autocomplete="off">
          @csrf
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="{{ asset('storage/images/logo.webp') }}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <h3 class="text-dark fw-bolder fs-4 mb-2">Đăng nhập vào Mew Yummy</h3>
          <div class="fw-normal text-muted mb-4">Chưa có tài khoản?
            <a href="{{ route('register') }}" class="text-primary fw-bold">Tạo mới tài khoản</a>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">Email</label>
            <small></small>
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Mật khẩu</label>
            <small></small>
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mt-4 d-flex justify-content-between text-end">
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" name="terms_of_service" type="checkbox" id="gridCheck" required>
                <label class="form-check-label ms-2" for="gridCheck">Ghi nhớ</label>
              </div>
            <a href="#" class="text-primary fw-bold">Quên mật khẩu?</a>
          </div>
          <button type="submit" class="btn btn-primary submit_btn w-100 my-4" id="btnSubmit">Đăng nhập</button>
          <div class="other text-muted text-uppercase mb-3 text-center"><span>hoặc</span></div>
          <div class="social-account">
            <a href="{{ route('login.google') }}" class="btn btn-light login_with w-100 mb-3">
              <img alt="Logo" src="{{ asset('storage/images/google.png') }}" class="img-fluid me-3">Google</a>
            {{-- <a href="{{ route('login.facebook') }}" class="btn btn-light login_with w-100 mb-3">
              <img alt="Logo" src="{{ asset('storage/images/facebook.png') }}" class="img-fluid me-3">Facebook</a> --}}
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //   form.addEventListener('keyup', function(e) {
    //     e.preventDefault();
    //     checkEmptyError([email, password]);
    //     checkEmailError(email)
    //     checkLength(password, 6, 20);
    //   })
    // })
  </script>
@endpush
