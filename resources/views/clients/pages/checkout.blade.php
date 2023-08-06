@extends('layouts.client')

@section('content')
  <livewire:client.checkout.checkout-component />
  <div class="modal hide">
    <div class="modal__inner" id="select">
      <div class="modal__header">
        <p>Chọn khu vực giao hàng</p>
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="modal__body">
        <div class="select-address">
          <div class="row-select">
            <p class="location-type">Tỉnh/Thành phố</p>
            <select class="form-select-sm form-select mb-3" id="city" name="city"
              aria-label=".form-select-sm">
              <option value="" selected>Vui lòng chọn tỉnh/thành phố</option>
            </select>
          </div>

          <div class="row-select">
            <p class="location-type">Quận/Huyện</p>
            <select class="form-select-sm form-select mb-3" id="district" name="district"
              aria-label=".form-select-sm">
              <option value="" selected>Vui lòng chọn quận/huyện</option>
            </select>
          </div>

          <div class="row-select">
            <p class="location-type">Phường/Xã</p>
            <select class="form-select-sm form-select" id="ward" name="ward" aria-label=".form-select-sm">
              <option value="" selected>Vui lòng chọn phường/xã</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal__footer">
        <button type="submit" id="btnSelect" class="payment-btn" form="select">Submit</button>
      </div>
    </div>
  </div>
@endsection
