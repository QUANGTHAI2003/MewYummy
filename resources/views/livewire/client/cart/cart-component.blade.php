<section class="cart-layout">
  <div class="container">
    @if (Cart::instance('cart')->count() > 0)
      <h2>Giỏ hàng của bạn có {{ Cart::count() }} sản phẩm</h2>
    @else
      <h2>Giỏ hàng của bạn trống</h2>
    @endif
    <div class="cart-product">
      @if (Cart::instance('cart')->count() > 0)
        @foreach (Cart::instance('cart')->content() as $item)
          <div class="cart__item row mx-0">
            <div class="cart__item-product col-lg-6">
              <div class="cart__img">
                <img src="{{ getProductImage($item->options->image) }}" alt="" />
              </div>
              <div class="cart__info">
                <div class="cart__info-name">{{ $item->name }}</div>
                <div class="cart__info-price">
                  <div class="special-price">{{ formatNumber($item->price) }}</div>
                  {{-- <del class="old-price">{{ formatNumber($item->sale_prices) }}</del> --}}
                </div>
              </div>
            </div>
            <div class="cart__item-update col-lg-6 justify-content-lg-end">
              <div class="cart__item-quantity">
                <div class="product-quantity align-items-center clearfix d-sm-flex">
                  <div class="custom-btn-number form-inline border-0">
                    <button wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')" id="decrement" type="button">
                      <i class="fa-solid fa-minus icon"></i>
                    </button>
                    <input type="number" name="quantity" min="1" value="{{ $item->qty }}"
                      class="form-control product_qtn" id="qtym">
                    <button wire:click.prevent="increaseQuantity('{{ $item->rowId }}')" id="increment" type="button">
                      <i class="fa-solid fa-plus icon"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="cart__total">
                <div class="cart__total-price">{{ formatNumber($item->subtotal) }}</div>
                <div wire:click.prevent="deleteCartItem('{{ $item->rowId }}')"
                  class="cart__total-delete btn btn-danger">
                  <span wire:loading wire:target="deleteCartItem('{{ $item->rowId }}')" class="spinner-border spinner-border-sm"
                    role="status" aria-hidden="true"></span>
                  Xóa
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="alert alert-warning">Không có sản phẩm nào trong giỏ hàng</div>
      @endif
    </div>
    @if (Cart::instance('cart')->count() > 0)
      <div class="cart-bottom">
        @if (!Session::has('coupon'))
          <div class="cart-coupon">
            <label class="cart-coupon-title">Mã giảm giá</label>
            @if (session()->has('coupon_message'))
              <div class="alert alert-danger">
                {{ session('coupon_message') }}
              </div>
            @endif
            <div class="cart-coupon-input mb-3">
              <input wire:model="couponCode" type="text" class="form-control" placeholder="Nhập mã giảm giá" />
              <button wire:click.prevent="applyCouponCode" class="btn btn-primary">Áp dụng</button>
            </div>
          </div>
        @endif
        <div class="cart-price">
          <div class="subtotal">
            <div class="subtotal-title">Tạm tính:</div>
            <div class="subtotal-value">{{ formatNumber(Cart::subtotal()) }}</div>
          </div>
          @if (Session::has('coupon'))
            <div class="discount">
              <div class="discount-title">
                Giảm giá ({{ Session::get('coupon')['code'] }})
                <i wire:click="removeCoupon" class="fa-solid fa-xmark close remove-coupon"></i>:
              </div>
              <div class="discount-value">
                {{ formatNumber($discount) }}
              </div>
            </div>
            <div class="discount">
              <div class="discount-title">Tạm tính sau giảm giá</div>
              <div class="discount-value">
                {{ formatNumber($subtotalAfterDiscount) }}
              </div>
            </div>
            <div class="shipping">
              <div class="shipping-title">Phí vận chuyển:</div>
              <div class="shipping-value">0₫</div>
            </div>
            <div class="total-price">
              <div class="total-price-title">Thành tiền:</div>
              <div class="total-price-value">
                {{ formatNumber($totalAfterDiscount) }}
              </div>
            </div>
          @else
            <div class="shipping">
              <div class="shipping-title">Phí vận chuyển:</div>
              <div class="shipping-value">0₫</div>
            </div>
            <div class="total-price">
              <div class="total-price-title">Thành tiền:</div>
              <div class="total-price-value">{{ formatNumber(Cart::total()) }}</div>
            </div>
          @endif

        </div>
      </div>
      <div class="cart__btn">
        <a href="{{ route('product') }}" class="btn btn-primary cart__btn-continue">Tiếp tục mua hàng</a>
        <a wire:click="checkout" href="#" class="d-flex align-items-center btn btn-primary cart__btn-checkout">
          <span wire:loading wire:target="checkout" class="spinner-border spinner-border-sm" role="status"
            aria-hidden="true"></span>
          Thanh toán
        </a>
      </div>
    @endif
    <div class="giftbox mb-3 mt-4">
      <fieldset class="free-gifts pb-md-3">
        <legend>
          <img alt="Code Ưu Đãi" src="{{ asset('storage/images/gift.webp') }}"> Code Ưu Đãi
        </legend>
        <div class="row">
          @foreach ($coupons as $key => $coupon)
            <div class="col-12 col-md-6 col-lg-4">
              <div class="item line_b pb-2">
                <span>Nhập mã <b>{{ $coupon->code }}</b> để được giảm ngay
                  {{ $coupon->type == 'percent' ? $coupon->value . '%' : formatNumberType($coupon->value) }} (áp dụng
                  cho các đơn hàng trên {{ formatNumberType($coupon->cart_value) }}) <button class="btn btn-sm copy"
                    data-copy="{{ $coupon->code }}"> Sao chép </button>
                </span>
              </div>
            </div>
          @endforeach
          <div class="position-absolute vmore_c w-100 d-md-none">
            <a href="javascript:;" class="d-block v_more_coupon text-center">
              <b class="t1">Xem thêm mã ưu đãi</b>
              <b class="t1 d-none">Thu gọn</b>
            </a>
          </div>
        </div>
      </fieldset>
    </div>
  </div>
</section>
