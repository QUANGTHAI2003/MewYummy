<section class="cart-layout">
  <div class="container">
    <h2>Giỏ hàng của bạn có {{ Cart::count() }} sản phẩm</h2>
    <div class="cart-product">
      @foreach (Cart::content() as $item)
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
              <div wire:click.prevent="deleteCartItem('{{ $item->rowId }}')" class="cart__total-delete btn btn-danger">Xóa</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="total-price">
      <div class="total-price-title">Thành tiền:</div>
      <div class="total-price-value">{{ Cart::total() }}₫</div>
    </div>
    <div class="cart__btn">
      <a href="#" class="btn btn-primary cart__btn-continue">Tiếp tục mua hàng</a>
      <a href="#" class="btn btn-primary cart__btn-checkout">Thanh toán</a>
    </div>
    <div class="giftbox mb-3 mt-4">
      <fieldset class="free-gifts pb-md-3">
        <legend>
          <img alt="Code Ưu Đãi" src="{{ asset('storage/images/gift.webp') }}"> Code Ưu Đãi
        </legend>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b pb-2">
              <span>Nhập mã <b>MewYummy2023</b> để được giảm ngay 120k (áp dụng cho các đơn hàng trên 500k) <button
                  class="btn btn-sm copy" data-copy="MewYummy2023"> Sao chép </button>
              </span>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b none_mb pb-2">
              <span>Nhập mã <b>TETQUYMAO</b> để được giảm ngay 20% tổng giá trị đơn hàng. Số lượng có hạn <button
                  class="btn btn-sm copy" data-copy="TETQUYMAO"> Sao chép </button>
              </span>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <div class="item line_b none_mb pb-2">
              <span>Nhập mã <b>FREESHIP</b> để được miễn phí ship đơn hàng từ 200k <button class="btn btn-sm copy"
                  data-copy="FREESHIP"> Sao chép </button>
              </span>
            </div>
          </div>
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
