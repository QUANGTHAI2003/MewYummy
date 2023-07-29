@extends('layouts.client')
@section('content')
  <!-- Breadcrumb -->
  <x-breadcrumb currentLink="cart" currentPageName="Giỏ hàng" productDetailName="{{ $product->name }}" />
  <!-- Detail -->
  <div class="detail-layout">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-12">
          <div class="row">
            <div class="col-12">
              <h1 class="product-name">{{ $product->name }}</h1>
            </div>
            <div class="product-layout_col-left col-12 col-sm-12 col-md-5 col-lg-6 col-xl-6 mb-3" id="mainThumb">
              <img src="{{ getProductImage($product->product_images[0]->image) }}" alt="{{ $product->name }}">
              {{-- <div
                class="product-thumb-slide swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-thumbs overflow-hidden">
                <div class="swiper-wrapper">
                  <div onclick="selectThumbnail('thumb1')" id="thumb1"
                    class="swiper-slide sub_thumbnail swiper-slide-active overflow-hidden rounded border">
                    <div class="position-relative w-100 ratio1by1 aspect m-0">
                      <img src="{{ asset('storage/images/products/pro1.webp') }}" alt="Ớt ngọt Đà Lạt"
                        class="d-block img position-absolute w-100 h-100">
                    </div>
                  </div>
                  <div onclick="selectThumbnail('thumb2')" id="thumb2"
                    class="swiper-slide sub_thumbnail swiper-slide-next overflow-hidden rounded border">
                    <div class="position-relative w-100 ratio1by1 aspect m-0">
                      <img src="{{ asset('storage/images/products/pro1-1.webp') }}" alt="Ớt ngọt Đà Lạt"
                        class="d-block img position-absolute w-100 h-100">
                    </div>
                  </div>
                  <div onclick="selectThumbnail('thumb3')" id="thumb3"
                    class="swiper-slide sub_thumbnail overflow-hidden rounded border">
                    <div class="position-relative w-100 ratio1by1 aspect m-0">
                      <img src="{{ asset('storage/images/products/pro1-2.webp') }}" alt="Ớt ngọt Đà Lạt"
                        class="d-block img position-absolute w-100 h-100">
                    </div>
                  </div>
                  <div onclick="selectThumbnail('thumb4')" id="thumb4"
                    class="swiper-slide sub_thumbnail overflow-hidden rounded border">
                    <div class="position-relative w-100 ratio1by1 aspect m-0">
                      <img src="{{ asset('storage/images/products/pro1-3.webp') }}" alt="Ớt ngọt Đà Lạt"
                        class="d-block img position-absolute w-100 h-100">
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination mew_slide_p"></div>
              </div> --}}
            </div>
            <script>
              const selectThumbnail = (id) => {
                const subThumb = document.getElementById(id);
                const img = subThumb.querySelector('img').getAttribute('src');
                const mainThumb = document.querySelector('#mainThumb');
                mainThumb.querySelector('img').setAttribute('src', img);
              }
            </script>
            <div class="product-layout_col-right col-12 col-sm-12 col-md-7 col-lg-6 col-xl-6 product-warp">
              <div class="product-info position-relative">
                <span class="in_1"> Tình trạng: <span class="inventory_quantity">
                    @if ($product->stock_qty > 0)
                      Còn hàng
                    @else
                      Hết hàng
                    @endif
                  </span>
                </span>
                <span class="in_1">
                  <b class="d-inline-block">|</b>Loại: <span id="vendor">{{ $product->categories->name }}</span>
                </span>
              </div>
              {{-- <div class="product-info position-relative mb-3">Loại: <span id="type">
                  {{ $product->categories->name }}
                </span>
              </div> --}}
              <div class="product-summary"> Đang cập nhật</div>
              @php
                $price = getPrice($product->regular_price, $product->sale_price);
              @endphp
              <div class="product-price">
                <span class="special-price">{{ $price }}</span>
                @if ($product->sale_price)
                  <del class="old-price">{{ getPrice($product->regular_price) }}</del>
                @endif
              </div>
              <form action="#" enctype="multipart/form-data" spellcheck="false" autocomplete="off">
                {{-- <div class="d-sm-flex align-items-center swatch clearfix mt-4 flex-wrap">
                  <div class="header fw-bold mb-2">Kích thước</div>
                  <div data-value="X" class="swatch-element X position-relative float-left mb-2 me-2">
                    <input id="swatch-1-x" class="position-absolute w-100 m-0" type="radio" checked name="size"
                      value="X">
                    <label title="X" for="swatch-1-x"
                      class="text-uppercase float-left m-0 rounded border pe-1 ps-1 text-center">X</label>
                    <div class="product-variation__tick position-absolute">
                      <svg enable-background="new 0 0 12 12" class="icon-tick-bold">
                        <use href="#svg-tick"></use>
                      </svg>
                    </div>
                  </div>
                  <div data-value="L" class="swatch-element L position-relative float-left mb-2 me-2">
                    <input id="swatch-1-l" class="position-absolute w-100 m-0" type="radio" name="size"
                      value="L">
                    <label title="L" for="swatch-1-l"
                      class="text-uppercase float-left m-0 rounded border pe-1 ps-1 text-center">L</label>
                    <div class="product-variation__tick position-absolute">
                      <svg enable-background="new 0 0 12 12" class="icon-tick-bold">
                        <use href="#svg-tick"></use>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="d-sm-flex align-items-center swatch clearfix flex-wrap">
                  <div class="header fw-bold mb-2">Khối lượng</div>
                  <div data-value="500g" class="swatch-element X position-relative float-left mb-2 me-2">
                    <input id="swatch-1-x" class="position-absolute w-100 m-0" type="radio" checked name="weight"
                      value="500g">
                    <label title="500g" for="swatch-1-x"
                      class="text-uppercase float-left m-0 rounded border pe-1 ps-1 text-center">500g</label>
                    <div class="product-variation__tick position-absolute">
                      <svg enable-background="new 0 0 12 12" class="icon-tick-bold">
                        <use href="#svg-tick"></use>
                      </svg>
                    </div>
                  </div>
                  <div data-value="800g" class="swatch-element L position-relative float-left mb-2 me-2">
                    <input id="swatch-1-l" class="position-absolute w-100 m-0" type="radio" name="weight"
                      value="800g">
                    <label title="800g" for="swatch-1-l"
                      class="text-uppercase float-left m-0 rounded border pe-1 ps-1 text-center">800g</label>
                    <div class="product-variation__tick position-absolute">
                      <svg enable-background="new 0 0 12 12" class="icon-tick-bold">
                        <use href="#svg-tick"></use>
                      </svg>
                    </div>
                  </div>
                </div> --}}
                <div class="product-quantity align-items-center clearfix d-sm-flex">
                  <header class="fw-bold mb-2" style="min-width:
                      100px;">Số lượng
                  </header>
                  <div class="custom-btn-number form-inline border-0">
                    <button id="decrement" type="button">
                      <i class="fa-solid fa-minus icon"></i>
                    </button>
                    <input type="number" name="quantity" min="1" value="1" class="form-control product_qtn"
                      id="qtym">
                    <button id="increment" type="button">
                      <i class="fa-solid fa-plus icon"></i>
                    </button>
                  </div>
                </div>
                <div class="product-add row mb-3 py-2">
                  <div class="col-12">
                    @if ($product->stock_qty != 0)
                      <button type="submit" class="btn btn-primary btn-add-to-cart btn-block">
                        <i class="fa-solid fa-shopping-cart icon"></i>
                        <span>Thêm vào giỏ hàng</span>
                      </button>
                    @else
                      <button type="submit" class="btn btn-primary btn-add-to-cart btn-block" disabled>
                        <i class="fa-solid fa-shopping-cart icon"></i>
                        <span>Hết hàng</span>
                      </button>
                    @endif
                  </div>
                </div>
              </form>
              <div class="linehot_pro alert alert-warning">
                <img alt="1900 123 321" src="{{ asset('storage/images/customer-service.webp') }}">
                <div class="b_cont fw-bold">
                  <span class="d-block"> Gọi ngay <a href="tel:1900123321" title="1900 123 321">1900 123 321</a> để
                    được tư vấn tốt nhất! </span>
                </div>
              </div>
              <div class="shopee_link">
                <a href="https://shopee.vn/" title="Mua ngay tại Shopee" class="d-block position-relative">
                  <img alt="Mua ngay tại Shopee" src="{{ asset('storage/images/shopee_buy.webp') }}">
                </a>
              </div>
            </div>
          </div>
          <div class="giftbox mb-3">
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
          <section class="comment-section comment">
            <div class="comment__input">
              <h2 class="comment-counnt">200 bình luận</h2>
              <div class="comment__box">
                <div class="comment__box-avatar">
                  <img
                    src="https://thumbs.dreamstime.com/b/beautiful-rain-forest-ang-ka-nature-trail-doi-inthanon-national-park-thailand-36703721.jpg"
                    alt="avatar">
                </div>
                <div class="comment__box-input">
                  <input type="text" class="input-main" placeholder="Viết bình luận...">
                  <span class="focus-border"></span>
                  <button type="submit" class="btn btn-primary btnSend">Gửi</button>
                  <!-- <div class="buttons"></div><button class="cancel-button">Hủy</button><button class="send-button">Gửi</button></div> -->
                </div>
              </div>
            </div>
            <div class="comment__content">
              <div class="comment__content-item mb-3">
                <div class="comment__main">
                  <div class="comment__main-content">
                    <div class="author-thumbnail">
                      <img
                        src="https://thumbs.dreamstime.com/b/beautiful-rain-forest-ang-ka-nature-trail-doi-inthanon-national-park-thailand-36703721.jpg"
                        alt="avatar">
                    </div>
                    <div class="content__main">
                      <div class="author-name">
                        <span>Trần Quang Thái</span>
                        <span class="time">1 giờ trước</span>
                      </div>
                      <div class="content">
                        <p>Đồ ăn ngon, nhân viên phục vụ nhiệt tình, giao hàng nhanh chóng</p>
                      </div>
                      <div class="content__main-reaction">
                        <div class="reaction">
                          <i class="fa-solid fa-thumbs-up icon"></i>
                          <span>Thích</span>
                        </div>
                        <div class="reaction">
                          <i class="fa-solid fa-comment icon"></i>
                          <span>Trả lời</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comment__replies">
                  <div class="author-thumbnail">
                    <img
                      src="https://gratisography.com/wp-content/uploads/2023/02/gratisography-colorful-kittenfree-stock-photo-800x525.jpg"
                      alt="avatar">
                  </div>
                  <div class="content__main">
                    <div class="author-name">
                      <span>Trần Quang Thái</span>
                      <span class="time">1 giờ trước</span>
                    </div>
                    <div class="content">
                      <p>Đồ ăn ngon, nhân viên phục vụ nhiệt tình, giao hàng nhanh chóng</p>
                    </div>
                    <div class="content__main-reaction">
                      <div class="reaction">
                        <i class="fa-solid fa-thumbs-up icon"></i>
                        <span>Thích</span>
                      </div>
                      <div class="reaction">
                        <i class="fa-solid fa-comment icon"></i>
                        <span>Trả lời</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="comment__content">
              <div class="comment__content-item mb-3">
                <div class="comment__main">
                  <div class="comment__main-content">
                    <div class="author-thumbnail">
                      <img
                        src="https://thumbs.dreamstime.com/b/beautiful-rain-forest-ang-ka-nature-trail-doi-inthanon-national-park-thailand-36703721.jpg"
                        alt="avatar">
                    </div>
                    <div class="content__main">
                      <div class="author-name">
                        <span>Trần Quang Thái</span>
                        <span class="time">1 giờ trước</span>
                      </div>
                      <div class="content">
                        <p>Đồ ăn ngon, nhân viên phục vụ nhiệt tình, giao hàng nhanh chóng</p>
                      </div>
                      <div class="content__main-reaction">
                        <div class="reaction">
                          <i class="fa-solid fa-thumbs-up icon"></i>
                          <span>Thích</span>
                        </div>
                        <div class="reaction">
                          <i class="fa-solid fa-comment icon"></i>
                          <span>Trả lời</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comment__replies">
                  <div class="author-thumbnail">
                    <img
                      src="https://gratisography.com/wp-content/uploads/2023/02/gratisography-colorful-kittenfree-stock-photo-800x525.jpg"
                      alt="avatar">
                  </div>
                  <div class="content__main">
                    <div class="author-name">
                      <span>Trần Quang Thái</span>
                      <span class="time">1 giờ trước</span>
                    </div>
                    <div class="content">
                      <p>Đồ ăn ngon, nhân viên phục vụ nhiệt tình, giao hàng nhanh chóng</p>
                    </div>
                    <div class="content__main-reaction">
                      <div class="reaction">
                        <i class="fa-solid fa-thumbs-up icon"></i>
                        <span>Thích</span>
                      </div>
                      <div class="reaction">
                        <i class="fa-solid fa-comment icon"></i>
                        <span>Trả lời</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-xl-3 col-12">
          <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-6 col-sm-6 col-12">
              <div class="related-product">
                <h2 class="title mb-4"> Sản phẩm liên quan </h2>
                <div class="product-related row">
                  @foreach ($productRelated as $relate)
                    <div class="product-item col-sm-12 col-md-12 col-lg-6 col-xl-12 mb-4">
                      <div class="row align-items-center">
                        <div class="col-4 pe-0">
                          @php
                            $sale_percent = getSalePercent($relate->regular_price, $relate->sale_price);
                          @endphp
                          @if ($sale_percent)
                            <div class="sale-label">
                              <span>{{ $sale_percent }}</span>
                            </div>
                          @endif
                          <a href="{{ route('show', ['slug' => $relate->slug, 'id' => $relate->id]) }}" class="thumb"
                            title="{{ $relate->name }}">
                            <div class="position-relative w-100 m-0">
                              <img src="{{ getProductImage($relate->product_images[0]->image) }}" class="img"
                                alt="{{ $relate->name }}">
                            </div>
                          </a>
                        </div>
                        <div class="item-info col-7">
                          <h3 class="item-title">
                            <a class="d-block modal-open" href="#"
                              title="Ớt ngọt Đà Lạt">{{ $relate->name }}</a>
                          </h3>
                          <div class="item-price">
                            @php
                              $price = getPrice($relate->regular_price, $relate->sale_price);
                            @endphp
                            <span class="special-price">{{ $price }}</span>
                            @if ($sale_percent)
                              <del class="old-price">{{ formatNumber($relate->regular_price) }}</del>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="banner-pr">
                <img src="{{ asset('storage/images/banner_pr.webp') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endpush
