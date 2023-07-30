@extends('layouts.client')
@section('content')
  <x-breadcrumb currentLink="#" currentPageName="Thông tin tài khoản" />

  <!-- Info Section -->
  <section class="account">
    <div class="container">
      <div class="row">
        @include('clients.shared.menu_account')
        <div class="col-12 col-lg-8">
          <nav class="mt-lg-0 mt-4">
            <div class="nav nav-tabs nav-account" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info"
                type="button" role="tab" aria-controls="nav-info" aria-selected="true">
                <img src="{{ asset('storage/images/user.webp') }}" alt="User">
                <span class="mt-2">Thông tin tài khoản</span>
              </button>
              <button class="nav-link" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders"
                type="button" role="tab" aria-controls="nav-orders" aria-selected="false">
                <img src="{{ asset('storage/images/orders.webp') }}" alt="Order">
                <span class="position-relative mt-2"> Lịch sử đơn hàng <span class="total-order">3</span>
                </span>
              </button>
            </div>
          </nav>
          <div class="tab-content nav-info" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"
              tabindex="0">
              <div class="account__info row mt-4 rounded">
                <div class="account__info-image col-lg-4">
                  @php
                    $avatar = auth()->user()->avatar;

                    if (file_exists(public_path('storage/images/avatars/' . auth()->user()->avatar))) {
                        $avatar = auth()->user()->avatar;
                    } else {
                        $avatar = asset('storage/' . auth()->user()->avatar);
                    }
                  @endphp
                  <div class="account-image">
                    <img src="{{ $avatar }}" alt="{{ $user->name }}">
                  </div>
                </div>
                <div class="account__info-content col-lg-8 mt-lg-0 mt-4">
                  <h2 class="account__info-title fw-bold">Thông tin tài khoản</h2>
                  <div class="account__detail">
                    <div class="account__detail-item">
                      <span class="account__detail-label">Tên đăng nhập:</span>
                      <span class="account__detail-value">{{ $user->username ?: 'Chờ cập nhật' }}</span>
                    </div>
                  </div>
                  <div class="account__detail">
                    <div class="account__detail-item">
                      <span class="account__detail-label">Họ và tên:</span>
                      <span class="account__detail-value">{{ $user->name ?: 'Chờ cập nhật' }}</span>
                    </div>
                  </div>
                  <div class="account__detail">
                    <div class="account__detail-item">
                      <span class="account__detail-label">Email:</span>
                      <span class="account__detail-value">{{ $user->email ?: 'Chờ cập nhật' }}</span>
                    </div>
                  </div>
                  <div class="account__detail">
                    <div class="account__detail-item">
                      <span class="account__detail-label">Số điện thoại:</span>
                      <span class="account__detail-value">{{ $user->phone_number ?: 'Chờ cập nhật' }}</span>
                    </div>
                  </div>
                  <div class="account__detail">
                    <div class="account__detail-item">
                      <span class="account__detail-label">Địa chỉ:</span>
                      <span class="account__detail-value">{{ $user->address ?: 'Chờ cập nhật' }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab" tabindex="0">
              <div class="order__info mt-4 rounded">
                <h1 class="order__info-title">Danh sách đơn hàng</h1>
                <div class="order__info-recent">
                  <div class="item-order mt-3 rounded border">
                    <a href="#" class="row">
                      <div class="col-12 col-md-8">
                        <div class="status-order">
                          <b class="order-id">#1032</b> - <span class="span_pending text-danger">Chưa thanh toán</span> -
                          <span class="span_ text-danger">Chưa giao hàng</span>
                        </div>
                        <div class="addr_order">
                          <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                        </div>
                        <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                      </div>
                      <div class="col-12 col-md-4 text-end">
                        <b class="price">105.000₫</b>
                      </div>
                    </a>
                  </div>
                  <div class="item-order mt-3 rounded border">
                    <a href="#" class="row">
                      <div class="col-12 col-md-8">
                        <div class="status-order">
                          <b class="order-id">#1032</b> - <span class="span_pending text-danger">Chưa thanh toán</span> -
                          <span class="span_ text-danger">Chưa giao hàng</span>
                        </div>
                        <div class="addr_order">
                          <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                        </div>
                        <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                      </div>
                      <div class="col-12 col-md-4 text-end">
                        <b class="price">105.000₫</b>
                      </div>
                    </a>
                  </div>
                  <div class="item-order mt-3 rounded border">
                    <a href="#" class="row">
                      <div class="col-12 col-md-8">
                        <div class="status-order">
                          <b class="order-id">#1032</b> - <span class="span_pending text-danger">Chưa thanh toán</span>
                          -
                          <span class="span_ text-danger">Chưa giao hàng</span>
                        </div>
                        <div class="addr_order">
                          <b> Địa chỉ giao hàng: Quận Hà Đông, Hà Nội, Vietnam </b>
                        </div>
                        <p class="time_order m-0"> Ngày: 30/12/2022 </p>
                      </div>
                      <div class="col-12 col-md-4 text-end">
                        <b class="price">105.000₫</b>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
