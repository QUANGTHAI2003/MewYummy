@extends('layouts.client')
@section('content')
    <!-- Breadcrumb -->
    <x-breadcrumb currentLink="#" currentPageName="Cập nhật thông tin tài khoản"/>

    <!-- Info Section -->
    <section class="account">
      <div class="container">
        <div class="row">
          @include('clients.shared.menu_account')
          <div class="col-12 col-lg-8">
            <div class="update__info rounded p-3 mt-4 mt-lg-0">
              <h1 class="update__info-title">Cập nhật tài khoản</h1>
              <form id="form" spellcheck="false" autocomplete="off">
                <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" placeholder="Username">
                      <label for="username">Tên đăng nhập</label>
                      <small></small>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" placeholder="Email">
                      <label for="email">Email address</label>
                      <small></small>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="address" placeholder="Address">
                      <label for="address">Địa chỉ</label>
                      <small></small>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="name" placeholder="Name">
                      <label for="name">Họ và tên</label>
                      <small></small>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control" id="phone" placeholder="Phone">
                      <label for="phone">Số điện thoại</label>
                      <small></small>
                    </div>
                    <div class="mb-3">
                      <input class="form-control form-control-lg" id="file" type="file">
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
