@extends('layouts.client')
@section('content')
  <section class="wrapper">
    <div class="container">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
        <form action="{{ route('postForgotPassword') }}" method="POST" class="rounded bg-white p-5 shadow">
          @csrf
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="{{ asset('storage/images/logo.webp') }}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <h3 class="text-dark fw-bolder fs-4 mb-2">Quên mật khẩu</h3>

          <div class="fw-normal text-muted mb-4">
            Nhập email để cập nhật mật khẩu
          </div>

          <div class="fw-normal text-success mb-4">
            {{ session('status') }}
          </div>

          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <button type="submit" class="btn btn-primary submit_btn w-100 my-4" id="btnSubmit">Gửi email xác nhận</button>
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
