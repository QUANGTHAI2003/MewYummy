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
                <span class="position-relative mt-2"> Lịch sử đơn hàng <livewire:client.checkout.order-count-component />
                </span>
              </button>
            </div>
          </nav>
          <div class="tab-content nav-info" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"
              tabindex="0">
              <div class="account__info row mt-4 rounded">
                <div class="account__info-image col-lg-4">
                  <div class="account-image">
                    <img src="{{ avatarUrl(auth()->user()) }}" alt="{{ $user->name }}">
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
              <livewire:client.checkout.user-order-component />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
