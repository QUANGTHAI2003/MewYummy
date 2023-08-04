@extends('layouts.client')
@section('content')
  <!-- Breadcrumb -->
  <x-breadcrumb currentLink="cart" currentPageName="Giỏ hàng" productDetailName="{{ $product->name }}" />
  <!-- Detail -->
  <div class="detail-layout">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-12">
          <livewire:client.products.product-detail :product="$product" />
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
          <livewire:client.comments.comment :product="$product">
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
