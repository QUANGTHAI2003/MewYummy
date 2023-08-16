@extends('layouts.client')
@section('content')
  <section class="wrapper">
    <div class="container">
      <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
        <form action="{{ route('resetPassword', $user->token) }}" method="POST" class="rounded bg-white p-5 shadow">
          @csrf
          <div class="logo">
            <a href="{{ route('home') }}">
              <img src="{{ asset('storage/images/logo.webp') }}" class="img-fluid" alt="Logo">
            </a>
          </div>
          <h3 class="text-dark fw-bolder fs-4 mb-2">Đổi mật khẩu</h3>

          <div class="fw-normal text-muted mb-4">
            Đổi mật khẩu mới
          </div>

          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Nhập mật khẩu mới</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Xác nhận mật khẩu</label>
          </div>
          <button type="submit" class="btn btn-primary submit_btn w-100 my-4" id="btnSubmit">Đổi mật khẩu</button>
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
