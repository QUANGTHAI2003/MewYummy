@extends('layouts.client')

@section('content')
  <!-- Slider Banner -->
  <section class="content">
    <section class="slider-banner container-fluid px-0">
      <div id="sliderBanner" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#sliderBanner" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#sliderBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('storage/images/slide-img1') }}.webp" class="d-block w-100" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('storage/images/slide-img2') }}.webp" class="d-block w-100" alt="Slide 2">
          </div>
        </div>
      </div>
    </section>
    @push('scripts')
      <script>
        const sliderBanner = document.querySelector('#sliderBanner')
        const carouselBanner = new bootstrap.Carousel(sliderBanner, {
          ride: 'carousel',
          interval: 2000,
          wrap: true,
          touch: true,
        })
      </script>
    @endpush
  </section>
  <!-- Product Info Section -->
  <section class="product__info">
    <div class="productInfoSwiper container overflow-hidden">
      <div class="product__info-wrapper swiper-wrapper">
        <div class="product__info-item swiper-slide mx-sm-5 pr-sm-5 mx-md-3">
          <img src="{{ asset('storage/images/img_poli_1.webp') }}" loading="lazy" />
          <div class="media-body">Sản phẩm an toàn</div>
        </div>
        <div class="product__info-item swiper-slide">
          <img src="{{ asset('storage/images/img_poli_2.webp') }}" loading="lazy" />
          <div class="media-body">Cam kết chất lượng</div>
        </div>
        <div class="product__info-item swiper-slide">
          <img src="{{ asset('storage/images/img_poli_3.webp') }}" loading="lazy" />
          <div class="media-body">Dịch vụ vượt trội</div>
        </div>
        <div class="product__info-item swiper-slide">
          <img src="{{ asset('storage/images/img_poli_4.webp') }}" loading="lazy" />
          <div class="media-body">Giao hàng nhanh chóng</div>
        </div>
      </div>
    </div>
    <div class="wave__slide bg-white">
      <img src="{{ asset('storage/images/wave_down.svg') }}" loading="lazy" />
    </div>
  </section>
  <!-- Categories Slider -->
  <section class="cate__slide">
    <div class="container">
      <div class="rounded bg-white">
        <h3 class="title pt-lg-4 pb-lg-4">Danh mục nổi bật</h3>
        <div class="position-relative">
          <div class="cate__slide-container overflow-hidden">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Thịt trứng</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Thịt Heo</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Thịt Bò</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Gà, vịt...</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Trứng các loại</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate1.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide swiper-slide-next">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Hải sản</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Cua</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Tôm</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Cá các loại</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Hải sản khác</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate2.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Rau củ</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Rau xanh đủ loại</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Củ quả tươi</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Nấm tươi các loại</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Rau thơm</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate3.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Trái cây</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Trái cây tươi</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Trái cây khô</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Trái cây đông lạnh</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate4.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Đồ khô</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Ngũ cốc 4 mùa</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Hạt dinh dưỡng</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Hoa quả sấy</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate5.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="box__cate row">
                  <div class="child col-7 col-sm-6">
                    <a href="#">Gia vị</a>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Muối tiêu</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Mắm các loại</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Bơ, đường, sữa</a>
                    </div>
                    <div class="childs">
                      <a href="#" class="small_tit line_1">Hạt nêm, mì chính</a>
                    </div>
                  </div>
                  <div class="img__cate col-5 col-sm-6">
                    <a href="#">
                      <img class="lazy" src="{{ asset('storage/images/cate6.webp') }}" loading="lazy" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-button-prev mc_prev swiper-button-disabled"></div>
            <div class="swiper-button-next mc_next"></div>
            <div class="swiper-pagination paginationCate"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Flash Sales -->
  <section class="flash__sale">
    <div class="container">
      <div class="rounded">
        <div class="time__box row">
          <div class="col-12 col-md-6">
            <h2 class="title text-lg-left text-center">
              <a class="position-relative" href="#">
                <img src="{{ asset('storage/images/flash.gif') }}" loading="lazy" /> FLASH SALE hàng tuần
              </a>
            </h2>
          </div>
          <div class="col-12 col-md-6 text-lg-right ml-auto text-end">
            <div class="countdown-time-wrapper pb-lg-2 mt-lg-1 mb-lg-1 mb-0 mt-0 pb-3 pt-2">
              <div class="countdown-item rod">
                <div class="countdown-time countdown-date day position-relative me-1">00
                </div>
                <div class="countdown-text position-relative day">Ngày</div>
              </div>
              <div class="countdown-item rods">
                <div class="countdown-time position-relative hour">00</div>
              </div>
              <div class="countdown-item rods">
                <div class="countdown-time position-relative minute">00</div>
              </div>
              <div class="countdown-item rods">
                <div class="countdown-time position-relative second">00</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="b_product">
              <div class="flash__slide-container overflow-hidden">
                <div class="swiper-wrapper">
                  @foreach ($saleProduct as $saleItem)
                    <div class="swiper-slide swiper-slide-prev">
                      <div class="card-item">
                        @php
                          $sale_percent = getSalePercent($saleItem->regular_price, $saleItem->sale_price);
                        @endphp
                        @if ($sale_percent)
                          <div class="sale-label sale-top-right position-absolute">
                            <span class="fw-bold">{{ $sale_percent }}</span>
                          </div>
                        @endif
                        <a href="{{ route('show', ['slug' => $saleItem->slug, 'id' => $saleItem->id]) }}"
                          class="thumb d-block modal-open">
                          <div class="zoom">
                            <img src="{{ getProductImage($saleItem->product_images[0]->image) }}" loading="lazy"
                              class="d-block img img-cover position-absolute lazy" alt="{{ $saleItem->name }}" />
                          </div>
                        </a>
                        <div class="item-info">
                          <div class="clearfix">
                            <div class="sold-module modal-open">
                              @if ($saleItem->stock_qty <= 10)
                                <img src="{{ asset('storage/images/hot-sale.webp') }}" loading="lazy" decoding=""
                                  class="position-absolute" alt="Hot sale" />
                              @endif
                              <div class="sold">Sắp cháy hàng</div>
                              <div class="remain position-absolute h-100"></div>
                            </div>
                          </div>
                          <h3 class="item-title">
                            <a class="d-block modal-open" href="#">{{ $saleItem->name }}</a>
                          </h3>
                          <div class="item-price">
                            @php
                              $price = getPrice($saleItem->regular_price, $saleItem->sale_price);
                            @endphp
                            <span class="special-price fw-bold me-2">{{ $price }}</span>
                            @if ($sale_percent)
                              <span
                                class="old-price text-decoration-line-through">{{ formatNumber($saleItem->regular_price) }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="swiper-button-prev mf_prev"></div>
                <div class="swiper-button-next mf_next"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->
  <section class="banner mt-4">
    <div class="container">
      <div class="image">
        <img class="overflow-hidden rounded" src="{{ asset('storage/images/banner.webp') }}" loading="lazy" />
      </div>
    </div>
  </section>
  <!-- Product Meat -->
  <section class="product__meat">
    <div class="container">
      <h2 class="title">Thịt bò nhập khẩu</h2>
      <div class="row align-items-center">
        <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-md-0 mb-3">
          <a href="#" class="imageBanner">
            <img src="{{ asset('storage/images/banner-meat') }}.webp" loading="lazy" />
          </a>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
          <div class="b_product">
            <div class="product-container overflow-hidden">
              <div class="swiper-wrapper">
                @foreach ($meatProduct as $meatItem)
                  <div class="swiper-slide swiper-slide-prev">
                    <div class="card-item">
                      @php
                        $sale_percent = getSalePercent($meatItem->regular_price, $meatItem->sale_price);
                      @endphp
                      @if ($sale_percent)
                        <div class="sale-label sale-top-right position-absolute">
                          <span class="fw-bold">{{ $sale_percent }}</span>
                        </div>
                      @endif
                      <a href="{{ route('show', ['slug' => $meatItem->slug, 'id' => $meatItem->id]) }}"
                        class="thumb d-block modal-open">
                        <div class="zoom">
                          <img src="{{ getProductImage($meatItem->product_images[0]->image) }}" loading="lazy"
                            class="d-block img img-cover position-absolute lazy" alt="{{ $meatItem->name }}" />
                        </div>
                      </a>
                      <div class="item-info">
                        <h3 class="item-title">
                          <a class="d-block modal-open" href="#">{{ $meatItem->name }}</a>
                        </h3>
                        <div class="item-price">
                          @php
                            $price = getPrice($meatItem->regular_price, $meatItem->sale_price);
                          @endphp
                          <span class="special-price fw-bold me-2">{{ $price }}</span>
                          @if ($sale_percent)
                            <span
                              class="old-price text-decoration-line-through">{{ formatNumber($meatItem->regular_price) }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="swiper-button-prev mf_prev"></div>
              <div class="swiper-button-next mf_next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Seafood -->
  <section class="product__seafood">
    <div class="container">
      <h2 class="title">Hải sản tươi</h2>
      <div class="row align-items-center flex-sm-column-reverse flex-md-row">
        <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
          <div class="b_product">
            <div class="product-container overflow-hidden">
              <div class="swiper-wrapper">
                @foreach ($seaFoodProduct as $seafoodItem)
                  <div class="swiper-slide swiper-slide-prev">
                    <div class="card-item">
                      @php
                        $sale_percent = getSalePercent($seafoodItem->regular_price, $seafoodItem->sale_price);
                      @endphp
                      @if ($sale_percent)
                        <div class="sale-label sale-top-right position-absolute">
                          <span class="fw-bold">{{ $sale_percent }}</span>
                        </div>
                      @endif
                      <a href="{{ route('show', ['slug' => $seafoodItem->slug, 'id' => $seafoodItem->id]) }}"
                        class="thumb d-block modal-open">
                        <div class="zoom">
                          <img src="{{ getProductImage($seafoodItem->product_images[0]->image) }}" loading="lazy"
                            class="d-block img img-cover position-absolute lazy" alt="{{ $seafoodItem->name }}" />
                        </div>
                      </a>
                      <div class="item-info">
                        <h3 class="item-title">
                          <a class="d-block modal-open" href="#">{{ $seafoodItem->name }}</a>
                        </h3>
                        <div class="item-price">
                          @php
                            $price = getPrice($seafoodItem->regular_price, $seafoodItem->sale_price);
                          @endphp
                          <span class="special-price fw-bold me-2">{{ $price }}</span>
                          @if ($sale_percent)
                            <span
                              class="old-price text-decoration-line-through">{{ formatNumber($seafoodItem->regular_price) }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="swiper-button-prev mf_prev"></div>
              <div class="swiper-button-next mf_next"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-md-0 mb-3">
          <a href="#" class="imageBanner">
            <img src="{{ asset('storage/images/banner-seafood') }}.webp" loading="lazy" />
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Vegatable -->
  <section class="product__vegatable">
    <div class="container">
      <h2 class="title">Rau củ quả</h2>
      <div class="row align-items-center">
        <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-md-0 mb-3">
          <a href="#" class="imageBanner">
            <img src="{{ asset('storage/images/banner-vegatable') }}.webp" loading="lazy" />
          </a>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
          <div class="b_product">
            <div class="product-container overflow-hidden">
              <div class="swiper-wrapper">
                @foreach ($vegetableProduct as $vegaItem)
                  <div class="swiper-slide swiper-slide-prev">
                    <div class="card-item">
                      @php
                        $sale_percent = getSalePercent($vegaItem->regular_price, $vegaItem->sale_price);
                      @endphp
                      @if ($sale_percent)
                        <div class="sale-label sale-top-right position-absolute">
                          <span class="fw-bold">{{ $sale_percent }}</span>
                        </div>
                      @endif
                      <a href="{{ route('show', ['slug' => $vegaItem->slug, 'id' => $vegaItem->id]) }}"
                        class="thumb d-block modal-open">
                        <div class="zoom">
                          <img src="{{ getProductImage($vegaItem->product_images[0]->image) }}" loading="lazy"
                            class="d-block img img-cover position-absolute lazy" alt="{{ $vegaItem->name }}" />
                        </div>
                      </a>
                      <div class="item-info">
                        <h3 class="item-title">
                          <a class="d-block modal-open" href="#">{{ $vegaItem->name }}</a>
                        </h3>
                        <div class="item-price">
                          @php
                            $price = getPrice($vegaItem->regular_price, $vegaItem->sale_price);
                          @endphp
                          <span class="special-price fw-bold me-2">{{ $price }}</span>
                          @if ($sale_percent)
                            <span
                              class="old-price text-decoration-line-through">{{ formatNumber($vegaItem->regular_price) }}</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="swiper-button-prev mf_prev"></div>
              <div class="swiper-button-next mf_next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Video -->
  <section class="video">
    <div class="container">
      <h2 class="title-header">Vào bếp cùng Mew</h2>
      <div class="video-product">
        <div class="video-container position-relative overflow-hidden">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="item__video popup_video mb-3">
                <div class="item__video-thumb modal-open">
                  <a data-bs-toggle="modal" href="#videoModalToggle" role="button" data-video="Rd1HkzReshw"
                    class="effect-ming open_video">
                    <div class="ratio3by2">
                      <img src="{{ asset('storage/images/video.webp') }}" loading="lazy"
                        class="d-block img img-cover position-absolute lazy" />
                      <div class="video_open lazy_bg" data-video="Rd1HkzReshw"></div>
                    </div>
                  </a>
                </div>
                <div class="cont">
                  <h3 class="title fw-bold">
                    <a class="line_1" href="#">Thịt Heo Chiên Nước Mắm Cực Ngon Cực Đơn Giản, Bạn Đã Thử Làm Chưa
                    </a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide swiper-slide-next">
              <div class="item__video mb-3">
                <div class="item__video-thumb modal-open">
                  <a data-bs-toggle="modal" href="#videoModalToggle" role="button" data-video="756hQQQmAbQ"
                    class="effect-ming open_video">
                    <div class="ratio3by2">
                      <img src="{{ asset('storage/images/video2.webp') }}" loading="lazy"
                        class="d-block img img-cover position-absolute lazy" />
                      <div class="video_open lazy_bg" data-video="756hQQQmAbQ"></div>
                    </div>
                  </a>
                </div>
                <div class="cont">
                  <h3 class="title fw-bold">
                    <a class="line_1" href="#">Cách Làm Mực Chiên Nước Mắm Đơn Giản mà siêu ngon </a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="item__video mb-3">
                <div class="item__video-thumb modal-open">
                  <a data-bs-toggle="modal" href="#videoModalToggle" role="button" data-video="GpHFyY0_qj4"
                    class="effect-ming open_video">
                    <div class="ratio3by2">
                      <img src="{{ asset('storage/images/video3.webp') }}" loading="lazy"
                        class="d-block img img-cover position-absolute lazy" />
                      <div class="video_open lazy_bg" data-video="GpHFyY0_qj4"></div>
                    </div>
                  </a>
                </div>
                <div class="cont">
                  <h3 class="title fw-bold">
                    <a class="line_1" href="#">Cùng Mew thực hiện nấu LẨU THÁI ngon chuẩn vị nhờ Bí Quyết gia vị
                      rất đơn giản </a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="item__video mb-3">
                <div class="item__video-thumb modal-open">
                  <a data-bs-toggle="modal" href="#videoModalToggle" role="button" data-video="NszhDnxuoFM"
                    class="effect-ming open_video">
                    <div class="ratio3by2">
                      <img src="{{ asset('storage/images/video4.webp') }}" loading="lazy"
                        class="d-block img img-cover position-absolute lazy" />
                      <div class="video_open lazy_bg" data-video="NszhDnxuoFM"></div>
                    </div>
                  </a>
                </div>
                <div class="cont">
                  <h3 class="title fw-bold">
                    <a class="line_1" href="#">Vào bếp với MewYummy cùng món ĐẬU HŨ cực ngon mà lạ </a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev mv_prev"></div>
          <div class="swiper-button-next mv_next"></div>
        </div>
      </div>
      <div class="modal fade" id="videoModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body video-wrapper"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog -->
  <div class="blog">
    <div class="container">
      <h2 class="title-header">Mẹo ăn ngon mỗi ngày</h2>
      <div class="b_blog">
        <div class="blog__cook-container position-relative overflow-hidden">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="item__blog mb-4">
                <div class="item__blog-thumb position-relative modal-open bor-10">
                  <a href="#" class="effect-ming">
                    <div class="position-relative w-100 be_opa modal-open ratio3by2 has-edge aspect m-0">
                      <img src="{{ asset('storage/images/blog1.webp') }}" loading="lazy"
                        class="lazy d-block img img-cover position-absolute"
                        alt="Hướng dẫn 5 cách làm món cá hồi sốt vừa
                        ngon, vừa nhiều dinh dưỡng cho gia đình">
                      <div class="position-absolute w-100 h-100 overlay"></div>
                    </div>
                  </a>
                  <div class="entry-date rounded-right">
                    <p class="day"> 06 </p>
                    <p class="yeah"> 07/2022 </p>
                  </div>
                </div>
                <div class="cont">
                  <h3 class="title">
                    <a class="line_1" href="#">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng
                      cho gia đình</a>
                  </h3>
                  <div class="sum line_1 line_3 h-auto"> Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều
                    mặt hàng thực phẩm tươi sống khác hiện nay, cá hồi có giá thành phải chăng, không quá đắt đỏ. Thịt cá
                    hồi có giá trị dinh dưỡng rất cao, các nghiên cứu khoa học đã chứng minh ăn cá hồi hàng ngày, đặc biệt
                    là&nbsp;cá hồi sốt&nbsp;sẽ giúp bạn: Bổ sung axit béo Omega-3 giúp giảm viêm, hạ huyết áp và hạn chế
                    nhiều bệnh nguy hiểm khác. Omega3, vitamin D, selen trong thịt cá hồi cũng hỗ trợ cơ thể kiểm soát
                    lượng insulin, hạ thấp...</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide swiper-slide-next">
              <div class="item__blog mb-4">
                <div class="item__blog-thumb position-relative modal-open bor-10">
                  <a class="effect-ming">
                    <div class="position-relative w-100 be_opa modal-open ratio3by2 has-edge aspect m-0">
                      <img src="{{ asset('storage/images/blog2.webp') }}" loading="lazy"
                        class="lazy d-block img img-cover position-absolute"
                        alt="Tổng hợp những món ngon từ thịt bò giúp
                        nồi cơm luôn sạch veo">
                      <div class="position-absolute w-100 h-100 overlay"></div>
                    </div>
                  </a>
                  <div class="entry-date rounded-right">
                    <p class="day"> 23 </p>
                    <p class="yeah"> 12/2021 </p>
                  </div>
                </div>
                <div class="cont">
                  <h3 class="title">
                    <a class="line_1" href="#">Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo</a>
                  </h3>
                  <div class="sum line_1 line_3 h-auto"> Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo
                    Thịt bò được xem như loại thịt đỏ tốt cho sức khỏe. Với những công thức món ngon từ thịt bò nhanh gọn
                    lẹ dưới đây, các bà nội trợ sẽ lại có cơ hội trổ tài để mang đến những bữa ăn dinh dưỡng cho gia đình.
                    Công thức những món ngon từ thịt bò sanphamtin_thit-trung 1. Bò kho củ cải Nguyên liệu: - Thịt bò:
                    450g - Củ cải trắng: 250g - Gia vị: muối, bột nêm, đường, nước màu, gừng, tiêu, dầu ăn Cách làm: -
                    Thịt bỏ rửa sạch bằng nước...</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="width: 326.25px; margin-right:
              15px;">
              <div class="item__blog mb-4">
                <div class="item__blog-thumb position-relative modal-open bor-10">
                  <a href="#" class="effect-ming">
                    <div class="position-relative w-100 be_opa modal-open ratio3by2 has-edge aspect m-0">
                      <img src="{{ asset('storage/images/blog3.webp') }}" loading="lazy"
                        class="lazy d-block img img-cover position-absolute"
                        alt="Hướng dẫn 05 cách chế biến cá bò thơm
                        ngon hấp dẫn cho cả gia đình">
                      <div class="position-absolute w-100 h-100 overlay"></div>
                    </div>
                  </a>
                  <div class="entry-date rounded-right">
                    <p class="day"> 23 </p>
                    <p class="yeah"> 12/2021 </p>
                  </div>
                </div>
                <div class="cont">
                  <h3 class="title">
                    <a class="line_1" href="#">Hướng dẫn 05 cách chế biến cá bò thơm ngon hấp dẫn cho cả gia
                      đình</a>
                  </h3>
                  <div class="sum line_1 line_3 h-auto"> 05 cách chế biến cá bò ngon nhất Trước khi&nbsp;chế biến cá bò,
                    bạn cần sơ chế cá. Cá bò da nguyên con, làm sạch (lột bỏ da, bỏ ruột) khi cần ăn có thể lấy ra rã đông
                    dùng ngay. Tùy sở thích và khẩu vị mà&nbsp; mỗi gia đình có cách chế biến khác nhau nhưng ngon và thơm
                    nhất vẫn là món nướng. Cá bò nướng có vị ngọt đậm đà, hấp dẫn. Cá bò nướng có thể nướng các kiểu
                    như:&nbsp;Cá bò nướng muối ớt, cá bò nướng tiêu, cá bò nướng than, cá bò nướng giấy bạc,...</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide" style="width: 326.25px; margin-right:
              15px;">
              <div class="item__blog mb-4">
                <div class="item__blog-thumb position-relative modal-open bor-10">
                  <a href="#" class="effect-ming">
                    <div class="position-relative w-100 be_opa modal-open ratio3by2 has-edge aspect m-0">
                      <img src="{{ asset('storage/images/blog4.webp') }}" loading="lazy"
                        class="lazy d-block img img-cover position-absolute"
                        alt="TOP 30+ món thịt bò ngon nhất vừa dễ làm
                        lại tiết kiệm">
                      <div class="position-absolute w-100 h-100 overlay"></div>
                    </div>
                  </a>
                  <div class="entry-date rounded-right">
                    <p class="day"> 23 </p>
                    <p class="yeah"> 12/2021 </p>
                  </div>
                </div>
                <div class="cont">
                  <h3 class="title">
                    <a class="line_1">TOP 30+ món thịt bò ngon nhất vừa dễ làm lại tiết kiệm</a>
                  </h3>
                  <div class="sum line_1 line_3 h-auto"> Thịt bò là nguyên liệu giàu protein, có giá trị dinh dưỡng cung
                    cấp cho cơ thể những dưỡng chất cần thiết để khỏe mạnh. Trong&nbsp;cẩm nang đầu bếp&nbsp;thì thịt bò
                    là loại thực phẩm hàng ngày nên bạn có thể chế biến thành các món ăn ngon từ thịt bò khác nhau. Dưới
                    đây là TOP 30+ món thịt bò ngon nhất được làm từ thịt bò vừa dễ làm lại tiết kiệm để mọi người cùng
                    tham khảo. BA CHỈ BÒ CUỘN MỸ Thịt Ba chỉ bò Mỹ có tỷ lệ nạc và mỡ vừa phải nên khi chế biến món...
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-button-prev ml_prev swiper-button-disabled"></div>
          <div class="swiper-button-next ml_next swiper-button-disabled"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles-plugins')
  <link href="{{ asset('plugins/swiperjs/swiper-bundle.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
  <script src="{{ asset('plugins/swiperjs/swiper-bundle.min.js') }}"></script>
@endpush
