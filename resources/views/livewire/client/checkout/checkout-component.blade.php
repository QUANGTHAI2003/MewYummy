<div class="checkout">
  <div class="container">
    <h4 class="title">Thanh Toán</h4>
    <div class="row">
      <div class="col-lg-8">
        <form action="">
          <div class="row">
            <div class="col-md-6">
              <label for="name" class="form-label">Tên</label>
              <input wire:model="name" type="text" class="form-control" id="name">
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input wire:model="phone" type="tel" class="form-control" id="phone">
              @error('phone')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input wire:model="email" type="email" class="form-control" id="email">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="address" class="form-label">Address</label>
              <input wire:model="address" type="text" class="form-control" id="address">
              @error('address')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12">
              <label for="note" class="form-label">Note</label>
              <textarea wire:model="note" class="form-control" id="note" rows="5"></textarea>
              @error('note')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </form>
        <section class="payment-section">
          <h3 class="payment-title">Chọn hình thức thanh toán</h3>
          <div class="payment-method-list">
            <div class="payment-item">
              <div class="form-check">
                <input wire:model="payment_method" value="cod" class="form-check-input" type="radio"
                  name="payment-method" id="cod" checked>
                <label class="form-check-label method" for="cod">
                  <img class="method-icon" src="{{ asset('storage/images/cod.png') }}" width="32" height="32"
                    alt="icon">
                  <span>Thanh toán tiền mặt khi nhận hàng</span>
                </label>
              </div>
            </div>
            <div class="payment-item">
              <div class="form-check">
                <input wire:model="payment_method" value="momo" class="form-check-input" type="radio"
                  name="payment-method" id="momo">
                <label class="form-check-label method" for="momo">
                  <img class="method-icon" src="{{ asset('storage/images/momo.jpg') }}" width="32" height="32"
                    alt="icon">
                  <span>Thanh toán tiền mặt khi nhận hàng</span>
                </label>
              </div>
            </div>
            <div class="payment-item">
              <div class="form-check">
                <input wire:model="payment_method" value="vnpay" class="form-check-input" type="radio"
                  name="payment-method" id="vnpay">
                <label class="form-check-label method" for="vnpay">
                  <img class="method-icon" src="{{ asset('storage/images/vnpay.png') }}" width="32" height="32"
                    alt="icon">
                  <span>Thanh toán tiền mặt khi nhận hàng</span>
                </label>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col-lg-4">
        <div class="order-product mb-3">
          <div class="checkout-product">
            @foreach (Cart::instance('cart')->content() as $item)
              <div class="checkout-product-item">
                <img src="{{ getProductImage($item->options->image) }}" alt="{{ $item->name }}">
                <div class="product-info">
                  <div class="product-info-name">{{ $item->name }}</div>
                  <div class="product-info-detail">
                    <div class="product-quantity">
                      SL: {{ $item->qty }}
                    </div>
                    <div class="product-price">
                        {{ formatNumber($item->price) }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="total-checkout mb-3">
          <div class="container-checkout">
            <h5>Thành tiền</h5>
            <div class="checkout-item">
              <div class="checkout-item-title">Tạm tính</div>
              <div class="checkout-item-price">
                {{ formatNumber(session()->get('checkout')['subtotal']) }}
              </div>
            </div>
            <div class="checkout-item">
              <div class="checkout-item-title">Giảm giá</div>
              <div class="checkout-item-price">
                {{ formatNumber(session()->get('checkout')['discount']) }}
              </div>
            </div>
            <div class="checkout-item">
              <div class="checkout-item-title">Phí vận chuyển</div>
              <div class="checkout-item-price">0đ</div>
            </div>
            <div class="checkout-item">
              <div class="checkout-item-title">Tổng</div>
              <div class="checkout-item-price">
                {{ formatNumber(session()->get('checkout')['total']) }}
              </div>
            </div>
          </div>
        </div>
        <div class="checkout-btn">
          <button wire:click="placeOrder" class="btn btn-primary">
            {{-- add loading --}}
            <span wire:loading wire:target="placeOrder" class="spinner-border spinner-border-sm" role="status"
              aria-hidden="true"></span>
            Đặt hàng
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
