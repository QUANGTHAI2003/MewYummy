@extends('layouts.client')
@section('content')
  <!-- Breadcrumb -->
  <x-breadcrumb currentLink="#" currentPageName="Cập nhật thông tin tài khoản" />

  <!-- Info Section -->
  <section class="account">
    <div class="container">
      <div class="row">
        @include('clients.shared.menu_account')
        <div class="col-12 col-lg-8">
          <div class="update__info mt-lg-0 mt-4 rounded p-3">
            <h1 class="update__info-title">Cập nhật tài khoản</h1>
            <form action="{{ route('account.postUpdateInfo', $user->id) }}" method="POST" enctype="multipart/form-data" id="form" spellcheck="false"
              autocomplete="off">
              @csrf
              @method('PUT')
              <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
              <div class="row">
                <div class="col-12 col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                      class="form-control" id="username" placeholder="Username">
                    <label for="username">Tên đăng nhập</label>
                    <small></small>
                    @error('username')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                      id="email" placeholder="Email">
                    <label for="email">Email address</label>
                    <small></small>
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control"
                      id="address" placeholder="Address">
                    <label for="address">Địa chỉ</label>
                    <small></small>
                    @error('address')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"
                      id="name" placeholder="Name">
                    <label for="name">Họ và tên</label>
                    <small></small>
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}"
                      class="form-control" id="phone" placeholder="Phone">
                    <label for="phone">Số điện thoại</label>
                    <small></small>
                    @error('phone_number')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <input type="file" name="avatar" value="{{ old('avatar', $user->avatar) }}" class="form-control form-control-lg"
                      id="file" >
                    @error('avatar')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
              <button type="submit" class="button btn btn-primary" id="btnSubmit">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
