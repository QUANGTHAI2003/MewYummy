@extends('layouts.client')

@section('content')
    <!-- Breadcrumb -->
    <x-breadcrumb currentLink="product" currentPageName="Tất cả sản phẩm"/>
    <!-- Product Layout -->
    <div class="product__layout">
        <div class="container">
            <h1 class="collection-name mb-lg-3 text-uppercase"> Tất cả sản phẩm </h1>
            <div class="banner_collection mb-3 position-relative overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center effect-ming swiper-slide-prev
                swiper-slide-duplicate-next" data-swiper-slide-index="0">
                        <a href="/">
                            <picture class="modal-open ratio1by3 aspect sitdown">
                                <source media="(min-width: 1200px)" srcset="{{ asset('storage/images/banner_collec_1(large).webp') }}">
                                <source media="(min-width: 992px)" srcset="{{ asset('storage/images/banner_collec_1(large).webp') }}">
                                <source media="(min-width: 569px)" srcset="{{ asset('storage/images/banner_collec_1(small).webp') }}">
                                <source media="(min-width: 480px)" srcset="{{ asset('storage/images/banner_collec_1(small).webp') }}">
                                <img class="d-block img img-cover position-absolute" src="{{ asset('storage/images/banner_collec_1(small).webp') }}" loading="lazy" alt="MewYummy">
                            </picture>
                        </a>
                    </div>
                    <div class="swiper-slide text-center effect-ming" data-swiper-slide-index="1">
                        <a href="/">
                            <picture class="modal-open ratio1by3 aspect sitdown">
                                <source media="(min-width: 1200px)" srcset="{{ asset('storage/images/banner_collec_2(large).webp') }}">
                                <source media="(min-width: 992px)" srcset="{{ asset('storage/images/banner_collec_2(large).webp') }}">
                                <source media="(min-width: 569px)" srcset="{{ asset('storage/images/banner_collec_2(large).webp') }}">
                                <source media="(min-width: 480px)" srcset="{{ asset('storage/images/banner_collec_2(large).webp') }}">
                                <img class="d-block img img-cover position-absolute" src="{{ asset('storage/images/banner_collec_2(large).webp') }}" loading="lazy" alt="MewYummy">
                            </picture>
                        </a>
                    </div>
                </div>
                <div class="swiper-button-prev mbc_prev d-md-flex"></div>
                <div class="swiper-button-next mbc_next d-md-flex"></div>
            </div>
            <!-- Product Layout -->
            <div class="row">
                <div class="col-12 col-lg-3 d-none d-lg-block">
                    <div class="sidebar sidebar_mobi m-0 p-2 p-lg-0 mt-lg-1 d-flex
                flex-column">
                        <h2 class="title-head"> Danh mục </h2>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action
                    active">Thịt, trứng</a>
                            <a href="#" class="list-group-item list-group-item-action">Hải sản</a>
                            <a href="#" class="list-group-item list-group-item-action">Rau củ</a>
                            <a href="#" class="list-group-item list-group-item-action">Trái cây</a>
                            <a href="#" class="list-group-item list-group-item-action">Đồ khô</a>
                            <a href="#" class="list-group-item list-group-item-action">Gia vị</a>
                        </div>
                        <div class="aside-filter modal-open pr-md-2 order-lg-3">
                            <div class="filter-container__selected-filter">
                                <div class="filter-container__selected-filter-header d-flex clearfix pt-1 pb-1">
                                    <span class="filter-container__selected-filter-header-title">Lọc theo:</span>
                                </div>
                                <ul class="filter-container__selected-filter-list pl-0 m-0 list-unstyled d-block w-100">
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center mr-2 mb-1">
                                        <a href="javascript:void(0)" class="border p-1 pl-2" onclick="removeFilteredItem('filter-dao-hai-san')"> Đảo hải sản
                                            <svg width="18" height="18">
                                                <use href="#svg-close"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center mr-2 mb-1">
                                        <a href="javascript:void(0)" class="border p-1 pl-2" onclick="removeFilteredItem('filter-datlat-farm')"> Datlat Farm
                                            <svg width="18" height="18">
                                                <use href="#svg-close"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center mr-2 mb-1">
                                        <a href="javascript:void(0)" class="border p-1 pl-2" onclick="removeFilteredItem('filter-green-food')"> Green Food
                                            <svg width="18" height="18">
                                                <use href="#svg-close"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center mr-2 mb-1">
                                        <a href="javascript:void(0)" class="border p-1 pl-2" onclick="removeFilteredItem('filter-hai-san-hp')"> Hải Sản HP
                                            <svg width="18" height="18">
                                                <use href="#svg-close"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center mr-2 mb-1">
                                        <a href="javascript:void(0)" class="border p-1 pl-2" onclick="removeFilteredItem('filter-kingbeef')"> KingBeef
                                            <svg width="18" height="18">
                                                <use href="#svg-close"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="filter-container__selected-filter-item d-inline-flex align-items-center">
                                        <a href="javascript:void(0)" class="p-1 pl-2 pr-2" onclick="clearAllFiltered()">Xoá hết </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-container row">
                                <aside class="aside-item filter-price mb-3 col-12 col-sm-12
                      col-lg-12">
                                    <h3 class="title-body">Lọc giá</h3>
                                    <div class="aside-content filter-group mb-1">
                                        <div class="row">
                                            <div class="col-6 col-lg-12 col-xl-6">
                                                <label for="minPriceLg">
                                                    <input type="text" id="minPriceLg" class="form-control filter-range-from" value="" placeholder="Giá tối thiểu">
                                                </label>
                                            </div>
                                            <div class="col-6 col-lg-12 col-xl-6">
                                                <label for="maxPriceLg">
                                                    <input type="text" id="maxPriceLg" class="form-control filter-range-to" value="" placeholder="Giá tối đa">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary js-filter-pricerange">Áp dụng</button>
                                </aside>
                                <aside class="aside-item filter-type mb-3 col-12 col-sm-6
                      col-lg-12">
                                    <h3 class="title-body">Loại</h3>
                                    <div class="aside-content filter-group">
                                        <ul class="filter-type list-unstyled m-0">
                                            <li class="filter-item filter-item--check-box">
                                                <label data-filter="combo" for="filter-combo">
                                                    <input class="form-check-input mt-0" id="filter-combo" type="checkbox">
                                                    <i class="fa position-relative mr-2"></i> Combo </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box">
                                                <label data-filter="hải sản sống" for="filter-hai-san-song">
                                                    <input class="form-check-input mt-0" id="filter-hai-san-song" type="checkbox">
                                                    <i class="fa position-relative mr-2"></i> Hải sản sống </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box">
                                                <label data-filter="midnight-pop mew" for="filter-midnight-pop-mew">
                                                    <input class="form-check-input mt-0" id="filter-midnight-pop-mew" type="checkbox">
                                                    <i class="fa position-relative mr-2"></i> Midnight-Pop Mew </label>
                                            </li>
                                            <li class="filter-item filter-item--check-box">
                                                <label data-filter="thịt nhập khẩu" for="filter-thit-nhap-khau">
                                                    <input class="form-check-input mt-0" id="filter-thit-nhap-khau" type="checkbox">
                                                    <i class="fa position-relative mr-2"></i> Thịt nhập khẩu </label>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <div class="aside-item mb-2 pt-2 order-3 d-none d-lg-block ">
                                    <a class="h2 title-head font-weight-bold big text-uppercase
                        d-block mb-2 p-2 rounded" href="tin-tuc"> Mẹo ăn ngon </a>
                                    <div class="list-blogs">
                                        <article class="blog-item">
                                            <div class="img_art thumb_img_blog_list">
                                                <a href="#" class="effect-ming">
                                                    <div class="position-relative ratio3by2 rounded">
                                                        <img src="{{ asset('storage/images/trick1.webp') }}" loading="lazy" class="lazy d-block img img-cover
                                  position-absolute rounded-3" alt="Hướng dẫn 5 cách
                                  làm món cá hồi sốt vừa ngon, vừa nhiều dinh
                                  dưỡng cho gia đình">
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="blog-item-name pl-3 m-0 position-relative
                            line_3">
                                                <a href="#">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</a>
                                            </h3>
                                        </article>
                                        <article class="blog-item">
                                            <div class="img_art thumb_img_blog_list">
                                                <a href="#" class="effect-ming">
                                                    <div class="position-relative ratio3by2 rounded">
                                                        <img src="{{ asset('storage/images/trick2.webp') }}" loading="lazy" class="lazy d-block img img-cover
                                  position-absolute rounded-3" alt="Tổng hợp những
                                  món ngon từ thịt bò giúp nồi cơm luôn sạch veo">
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="blog-item-name pl-3 m-0 position-relative
                            line_3">
                                                <a href="#">Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo</a>
                                            </h3>
                                        </article>
                                        <article class="blog-item">
                                            <div class="img_art thumb_img_blog_list">
                                                <a href="#" class="effect-ming">
                                                    <div class="position-relative ratio3by2 rounded">
                                                        <img src="{{ asset('storage/images/trick3.webp') }}" loading="lazy" class="lazy d-block img img-cover
                                  position-absolute rounded-3" alt="Hướng dẫn 05 cách
                                  chế biến cá bò thơm ngon hấp dẫn cho cả gia
                                  đình">
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="blog-item-name pl-3 m-0 position-relative
                            line_3">
                                                <a href="#">Hướng dẫn 05 cách chế biến cá bò thơm ngon hấp dẫn cho cả gia đình</a>
                                            </h3>
                                        </article>
                                        <article class="blog-item">
                                            <div class="img_art thumb_img_blog_list">
                                                <a href="#" class="effect-ming">
                                                    <div class="position-relative ratio3by2 rounded">
                                                        <img src="{{ asset('storage/images/trick4.webp') }}" loading="lazy" class="lazy d-block img img-cover
                                  position-absolute rounded-3" alt="TOP 30+ món thịt
                                  bò ngon nhất vừa dễ làm lại tiết kiệm">
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="blog-item-name pl-3 m-0 position-relative
                            line_3">
                                                <a href="#">TOP 30+ món thịt bò ngon nhất vừa dễ làm lại tiết kiệm</a>
                                            </h3>
                                        </article>
                                        <article>
                                            <div class="img_art thumb_img_blog_list">
                                                <a href="#" class="effect-ming">
                                                    <div class="position-relative ratio3by2 rounded">
                                                        <img src="{{ asset('storage/images/trick5.webp') }}" loading="lazy" class="lazy d-block img img-cover
                                  position-absolute rounded-3" alt="Top 16 món ăn hải
                                  sản ngon nổi tiếng không nên bỏ qua">
                                                    </div>
                                                </a>
                                            </div>
                                            <h3 class="blog-item-name pl-3 m-0 position-relative
                            line_3">
                                                <a href="#">Top 16 món ăn hải sản ngon nổi tiếng không nên bỏ qua</a>
                                            </h3>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9 pt-3 pt-lg-0">
                    <div class="sortPagiBar pt-2 pb-2 border-bottom border-top">
                        <b>Sắp xếp: </b>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortName" class="form-check-input">A → Z </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortName" class="form-check-input">Z → A </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortPrice" class="form-check-input">Giá tăng dần </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortPrice" class="form-check-input">Giá giảm dần </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortTime" class="form-check-input
                      ">Mới nhất </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" name="sortTime" class="form-check-input
                      ">Cũ nhất </label>
                        </div>
                    </div>
                    <div class="collection mt-4">
                        <div class="category-products position-relative mt-4 mb-4">
                            <div class="row slider-items">
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 20% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro1.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Ớt ngọt Đà Lạt</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">35.000₫</span>
                                                <del class="old-price"> 28.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 40% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro2.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Hành tây củ</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">15.000₫</span>
                                                <del class="old-price">28.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 20% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro3.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Snack lá ngắn</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">60.000₫</span>
                                                <del class="old-price">75.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 20% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro19.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Chanh vàng không hạt</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">35.000₫</span>
                                                <del class="old-price">55.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 25% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro20.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Cherry Đà Lạt</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">405.000₫</span>
                                                <del class="old-price">600.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 20% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro5.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Nho không hạt</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">250.000₫</span>
                                                <del class="old-price">300.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 10% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro6.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Thăn Lưng Bò Mỹ Black Angus , Rib Eye (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">450.000₫</span>
                                                <del class="old-price">500.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro14.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Dẻ Sườn Bò Mỹ , Rib Finger (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">205.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro13.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Sườn Non Bò Mỹ , Short Ribs (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">259.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro21.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Ba Chỉ Bò Mỹ , Short Plate (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">180.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 22% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro15.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Lõi Nạc Vai Bò Mỹ , Top Blade (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">194.000₫</span>
                                                <del class="old-price">250.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 13% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro8.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Đầu Thăn Ngoại Bò Mỹ , Rib Eye (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">305.000₫</span>
                                                <del class="old-price">350.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 7% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro9.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Thăn Ngoại Bò Mỹ , Striploin (500gr)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">325.000₫</span>
                                                <del class="old-price">350.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro16.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Ghẹ Xanh Sống</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">325.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 23% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro10.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Tôm Càng Xanh Sống </a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">340.000₫</span>
                                                <del class="old-price">440.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro22.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Cá Tầm Sống</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">445.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro17.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Ngao Hai Cồi Sống</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">130.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro18.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Bào Ngư Hàn Quốc Sống Lớn</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">750.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro23.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Cồi Sò Điệp Size S</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">170.000₫</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 58% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro10.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Ốc Hương Sống (70-80con)</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">125.000₫</span>
                                                <del class="old-price">295.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6
                      product-grid-item-lm mb-3 ">
                                    <div class="card-item">
                                        <div class="sale-label sale-top-right position-absolute">
                                            <span class="fw-bold">- 4% </span>
                                        </div>
                                        <a href="{{ route('detail', ['id' => 1]) }}" class="thumb d-block modal-open">
                                            <div class="zoom">
                                                <img src="{{ asset('storage/images/products/pro12.webp') }}" loading="lazy" decoding="" class="d-block img img-cover
                              position-absolute lazy"/>
                                            </div>
                                        </a>
                                        <div class="item-info">
                                            <h3 class="item-title">
                                                <a class="d-block modal-open" href="#">Tôm Hùm Alaska Sống Lớn</a>
                                            </h3>
                                            <div class="item-price">
                                                <span class="special-price fw-bold me-2">1.290.000₫</span>
                                                <del class="old-price">1.350.000₫</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link rounded text-center">«</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link rounded text-center">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded text-center">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded text-center">»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="d-none">
        <defs>
            <symbol id="svg-search">
                <path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5zm-4.5 8h4v-4h1v4h4v1h-4v4h-1v-4h-4v-1z"></path>
            </symbol>
            <symbol id="svg-phone" viewBox="0 0 473.806 473.806">
                <path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z"></path>
                <path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z"></path>
                <path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"></path>
            </symbol>
            <symbol id="svg-home" viewBox="0 0 511 511.999">
                <path xmlns="http://www.w3.org/2000/svg" d="m498.699219 222.695312c-.015625-.011718-.027344-.027343-.039063-.039062l-208.855468-208.847656c-8.902344-8.90625-20.738282-13.808594-33.328126-13.808594-12.589843 0-24.425781 4.902344-33.332031 13.808594l-208.746093 208.742187c-.070313.070313-.144532.144531-.210938.214844-18.28125 18.386719-18.25 48.21875.089844 66.558594 8.378906 8.382812 19.441406 13.234375 31.273437 13.746093.484375.046876.96875.070313 1.457031.070313h8.320313v153.695313c0 30.417968 24.75 55.164062 55.167969 55.164062h81.710937c8.285157 0 15-6.71875 15-15v-120.5c0-13.878906 11.292969-25.167969 25.171875-25.167969h48.195313c13.878906 0 25.167969 11.289063 25.167969 25.167969v120.5c0 8.28125 6.714843 15 15 15h81.710937c30.421875 0 55.167969-24.746094 55.167969-55.164062v-153.695313h7.71875c12.585937 0 24.421875-4.902344 33.332031-13.8125 18.359375-18.367187 18.367187-48.253906.027344-66.632813zm-21.242188 45.421876c-3.238281 3.238281-7.542969 5.023437-12.117187 5.023437h-22.71875c-8.285156 0-15 6.714844-15 15v168.695313c0 13.875-11.289063 25.164062-25.167969 25.164062h-66.710937v-105.5c0-30.417969-24.746094-55.167969-55.167969-55.167969h-48.195313c-30.421875 0-55.171875 24.75-55.171875 55.167969v105.5h-66.710937c-13.875 0-25.167969-11.289062-25.167969-25.164062v-168.695313c0-8.285156-6.714844-15-15-15h-22.328125c-.234375-.015625-.464844-.027344-.703125-.03125-4.46875-.078125-8.660156-1.851563-11.800781-4.996094-6.679688-6.679687-6.679688-17.550781 0-24.234375.003906 0 .003906-.003906.007812-.007812l.011719-.011719 208.847656-208.839844c3.234375-3.238281 7.535157-5.019531 12.113281-5.019531 4.574219 0 8.875 1.78125 12.113282 5.019531l208.800781 208.796875c.03125.03125.066406.0625.097656.09375 6.644531 6.691406 6.632813 17.539063-.03125 24.207032zm0 0"></path>
            </symbol>
            <symbol id="svg-store" viewBox="0 0 24 24">
                <path d="M18 0c-3.148 0-6 2.553-6 5.702 0 4.682 4.783 5.177 6 12.298 1.217-7.121 6-7.616 6-12.298 0-3.149-2.852-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm-12-3c-2.099 0-4 1.702-4 3.801 0 3.121 3.188 3.451 4 8.199.812-4.748 4-5.078 4-8.199 0-2.099-1.901-3.801-4-3.801zm0 5.333c-.737 0-1.333-.597-1.333-1.333s.596-1.333 1.333-1.333 1.333.596 1.333 1.333-.596 1.333-1.333 1.333zm6 5.775l-3.215-1.078c.365-.634.777-1.128 1.246-1.687l1.969.657 1.92-.64c.388.521.754 1.093 1.081 1.75l-3.001.998zm12 7.892l-6.707-2.427-5.293 2.427-5.581-2.427-6.419 2.427 3.62-8.144c.299.76.554 1.776.596 3.583l-.443.996 2.699-1.021 4.809 2.091.751-3.725.718 3.675 4.454-2.042 3.099 1.121-.461-1.055c.026-.392.068-.78.131-1.144.144-.84.345-1.564.585-2.212l3.442 7.877z"></path>
            </symbol>
            <symbol id="svg-account">
                <path d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"></path>
            </symbol>
            <symbol id="svg-cart" viewBox="0 0 511 511.99913">
                <path d="m512.496094 172v80c0 11.046875-8.953125 20-20 20h-13.152344l-8.425781 74.988281c-1.148438 10.21875-9.804688 17.765625-19.851563 17.769531-.746094 0-1.496094-.042968-2.257812-.128906-10.976563-1.230468-18.875-11.132812-17.640625-22.105468l10.421875-92.753907c1.136718-10.117187 9.691406-17.769531 19.875-17.769531h11.035156v-40h-432v40h341c11.046875 0 20 8.957031 20 20 0 11.046875-8.953125 20-20 20h-307.226562l19.75 164.761719c2.40625 20.089843 19.480468 35.238281 39.714843 35.238281h247.125c20.382813 0 37.472657-15.277344 39.75-35.535156 1.230469-10.976563 11.128907-18.871094 22.105469-17.640625 10.976562 1.234375 18.875 11.132812 17.644531 22.109375-4.554687 40.511718-38.730469 71.066406-79.5 71.066406h-247.125c-40.46875 0-74.617187-30.300781-79.433593-70.480469l-20.316407-169.519531h-13.488281c-11.046875 0-20-8.953125-20-20v-80c0-11.046875 8.953125-20 20-20h70.9375l105.683594-143.839844c6.539062-8.898437 19.054687-10.816406 27.957031-4.273437 8.902344 6.539062 10.816406 19.054687 4.277344 27.957031l-88.28125 120.15625h231.589843l-88.285156-120.15625c-6.539062-8.902344-4.625-21.417969 4.277344-27.957031 8.902344-6.542969 21.417969-4.628907 27.960938 4.273437l105.679687 143.839844h70.199219c11.046875 0 20 8.957031 20 20zm-275.996094 160v80c0 11.046875 8.953125 20 20 20 11.042969 0 20-8.953125 20-20v-80c0-11.046875-8.957031-20-20-20-11.046875 0-20 8.953125-20 20zm80 0v80c0 11.046875 8.953125 20 20 20 11.042969 0 20-8.953125 20-20v-80c0-11.046875-8.957031-20-20-20-11.046875 0-20 8.953125-20 20zm-160 0v80c0 11.046875 8.953125 20 20 20 11.042969 0 20-8.953125 20-20v-80c0-11.046875-8.957031-20-20-20-11.046875 0-20 8.953125-20 20zm0 0"></path>
            </symbol>
            <symbol id="svg-menu" viewBox="0 0 24 24">
                <path d="M3 5H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3 19H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </symbol>
            <symbol id="svg-user" viewBox="0 0 512 512.001">
                <path xmlns="http://www.w3.org/2000/svg" d="m210.351562 246.632812c33.882813 0 63.21875-12.152343 87.195313-36.128906 23.96875-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.128906 87.195312 23.980469 23.96875 53.316406 36.125 87.191406 36.125zm-65.972656-189.292968c18.394532-18.394532 39.972656-27.335938 65.972656-27.335938 25.996094 0 47.578126 8.941406 65.976563 27.335938 18.394531 18.398437 27.339844 39.980468 27.339844 65.972656 0 26-8.945313 47.578125-27.339844 65.976562-18.398437 18.398438-39.980469 27.339844-65.976563 27.339844-25.992187 0-47.570312-8.945312-65.972656-27.339844-18.398437-18.394531-27.34375-39.976562-27.34375-65.976562 0-25.992188 8.945313-47.574219 27.34375-65.972656zm0 0" fill="#000000" data-original="#000000"></path>
                <path xmlns="http://www.w3.org/2000/svg" d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.3125-10.339844-7.808594-20.550781-13.375-30.335938-5.769532-10.15625-12.550782-19-20.160157-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.042969 5.339844-10.96875 0-22.085937-1.796876-33.042968-5.339844-11.210938-3.621094-20.300782-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.753906-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.609375 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.0625 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.777344-1.023438 19.953125-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.4375 23.730469 65.066406 23.730469h246.53125c26.621094 0 48.511719-7.984375 65.0625-23.730469 16.757813-15.945312 25.253906-37.589843 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm-44.90625 72.828125c-10.933594 10.40625-25.449218 15.464844-44.378906 15.464844h-246.527344c-18.933594 0-33.449218-5.058594-44.378906-15.460938-10.722656-10.207031-15.933594-24.140625-15.933594-42.585937 0-9.59375.316406-19.066407.949219-28.160157.617187-8.921874 1.878906-18.722656 3.75-29.136718 1.847656-10.285156 4.199219-19.9375 6.996094-28.675782 2.683593-8.378906 6.34375-16.675781 10.882812-24.667968 4.332031-7.617188 9.316407-14.152344 14.816407-19.417969 5.144531-4.925781 11.628906-8.957031 19.269531-11.980469 7.066406-2.796875 15.007812-4.328125 23.628906-4.558594 1.050781.558594 2.921875 1.625 5.953125 3.601563 6.167969 4.019531 13.277344 8.605469 21.136719 13.625 8.859375 5.648437 20.273437 10.75 33.910156 15.152344 13.941406 4.507812 28.160156 6.796875 42.273437 6.796875 14.113282 0 28.335938-2.289063 42.269532-6.792969 13.648437-4.410156 25.058594-9.507813 33.929687-15.164063 8.042969-5.140624 14.953125-9.59375 21.121094-13.617187 3.03125-1.972656 4.902344-3.042969 5.953125-3.601563 8.625.230469 16.566406 1.761719 23.636719 4.558594 7.636719 3.023438 14.121093 7.058594 19.265625 11.980469 5.5 5.261719 10.484375 11.796875 14.816406 19.421875 4.542969 7.988281 8.207031 16.289062 10.886719 24.660156 2.800781 8.75 5.15625 18.398438 7 28.675782 1.867187 10.433593 3.132812 20.238281 3.75 29.144531v.007812c.636719 9.058594.957031 18.527344.960937 28.148438-.003906 18.449219-5.214844 32.378906-15.9375 42.582031zm0 0" fill="#000000" data-original="#000000"></path>
            </symbol>
            <symbol id="svg-minus" viewBox="0 0 409.6 409.6">
                <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467
              c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z"></path>
            </symbol>
            <symbol id="svg-plus" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M 11 2 L 11 11 L 2 11 L 2 13 L 11 13 L 11 22 L 13 22 L 13 13 L 22 13 L 22 11 L 13 11 L 13 2 Z"></path>
            </symbol>
            <symbol id="svg-tick" viewBox="0 0 12 12">
                <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
            </symbol>
            <symbol id="svg-close" viewBox="0 0 24 24">
                <path d="M12 11.293l10.293-10.293.707.707-10.293 10.293 10.293 10.293-.707.707-10.293-10.293-10.293 10.293-.707-.707 10.293-10.293-10.293-10.293.707-.707 10.293 10.293z"></path>
            </symbol>
            <symbol id="quote" viewBox="0 0 475.082 475.081">
                <path d="M164.45,219.27h-63.954c-7.614,0-14.087-2.664-19.417-7.994c-5.327-5.33-7.994-11.801-7.994-19.417v-9.132
              c0-20.177,7.139-37.401,21.416-51.678c14.276-14.272,31.503-21.411,51.678-21.411h18.271c4.948,0,9.229-1.809,12.847-5.424
              c3.616-3.617,5.424-7.898,5.424-12.847V54.819c0-4.948-1.809-9.233-5.424-12.85c-3.617-3.612-7.898-5.424-12.847-5.424h-18.271
              c-19.797,0-38.684,3.858-56.673,11.563c-17.987,7.71-33.545,18.132-46.68,31.267c-13.134,13.129-23.553,28.688-31.262,46.677
              C3.855,144.039,0,162.931,0,182.726v200.991c0,15.235,5.327,28.171,15.986,38.834c10.66,10.657,23.606,15.985,38.832,15.985
              h109.639c15.225,0,28.167-5.328,38.828-15.985c10.657-10.663,15.987-23.599,15.987-38.834V274.088
              c0-15.232-5.33-28.168-15.994-38.832C192.622,224.6,179.675,219.27,164.45,219.27z"></path>
                <path d="M459.103,235.256c-10.656-10.656-23.599-15.986-38.828-15.986h-63.953c-7.61,0-14.089-2.664-19.41-7.994
              c-5.332-5.33-7.994-11.801-7.994-19.417v-9.132c0-20.177,7.139-37.401,21.409-51.678c14.271-14.272,31.497-21.411,51.682-21.411
              h18.267c4.949,0,9.233-1.809,12.848-5.424c3.613-3.617,5.428-7.898,5.428-12.847V54.819c0-4.948-1.814-9.233-5.428-12.85
              c-3.614-3.612-7.898-5.424-12.848-5.424h-18.267c-19.808,0-38.691,3.858-56.685,11.563c-17.984,7.71-33.537,18.132-46.672,31.267
              c-13.135,13.129-23.559,28.688-31.265,46.677c-7.707,17.987-11.567,36.879-11.567,56.674v200.991
              c0,15.235,5.332,28.171,15.988,38.834c10.657,10.657,23.6,15.985,38.828,15.985h109.633c15.229,0,28.171-5.328,38.827-15.985
              c10.664-10.663,15.985-23.599,15.985-38.834V274.088C475.082,258.855,469.76,245.92,459.103,235.256z"></path>
            </symbol>
            <symbol id="svg-filter" viewBox="0 0 25 25">
                <g>
                    <g>
                        <path d="M2.54,5H15v.5A1.5,1.5,0,0,0,16.5,7h2A1.5,1.5,0,0,0,20,5.5V5h2.33a.5.5,0,0,0,0-1H20V3.5A1.5,1.5,0,0,0,18.5,2h-2A1.5,1.5,0,0,0,15,3.5V4H2.54a.5.5,0,0,0,0,1ZM16,3.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                        <path d="M22.4,20H18v-.5A1.5,1.5,0,0,0,16.5,18h-2A1.5,1.5,0,0,0,13,19.5V20H2.55a.5.5,0,0,0,0,1H13v.5A1.5,1.5,0,0,0,14.5,23h2A1.5,1.5,0,0,0,18,21.5V21h4.4a.5.5,0,0,0,0-1ZM17,21.5a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5v-2a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5Z"></path>
                        <path d="M8.5,15h2A1.5,1.5,0,0,0,12,13.5V13H22.45a.5.5,0,1,0,0-1H12v-.5A1.5,1.5,0,0,0,10.5,10h-2A1.5,1.5,0,0,0,7,11.5V12H2.6a.5.5,0,1,0,0,1H7v.5A1.5,1.5,0,0,0,8.5,15ZM8,11.5a.5.5,0,0,1,.5-.5h2a.5.5,0,0,1,.5.5v2a.5.5,0,0,1-.5.5h-2a.5.5,0,0,1-.5-.5Z"></path>
                    </g>
                </g>
            </symbol>
            <symbol id="svg-option" viewBox="0 0 24 24">
                <path d="M24 14.187v-4.374c-2.148-.766-2.726-.802-3.027-1.529-.303-.729.083-1.169 1.059-3.223l-3.093-3.093c-2.026.963-2.488 1.364-3.224 1.059-.727-.302-.768-.889-1.527-3.027h-4.375c-.764 2.144-.8 2.725-1.529 3.027-.752.313-1.203-.1-3.223-1.059l-3.093 3.093c.977 2.055 1.362 2.493 1.059 3.224-.302.727-.881.764-3.027 1.528v4.375c2.139.76 2.725.8 3.027 1.528.304.734-.081 1.167-1.059 3.223l3.093 3.093c1.999-.95 2.47-1.373 3.223-1.059.728.302.764.88 1.529 3.027h4.374c.758-2.131.799-2.723 1.537-3.031.745-.308 1.186.099 3.215 1.062l3.093-3.093c-.975-2.05-1.362-2.492-1.059-3.223.3-.726.88-.763 3.027-1.528zm-4.875.764c-.577 1.394-.068 2.458.488 3.578l-1.084 1.084c-1.093-.543-2.161-1.076-3.573-.49-1.396.581-1.79 1.693-2.188 2.877h-1.534c-.398-1.185-.791-2.297-2.183-2.875-1.419-.588-2.507-.045-3.579.488l-1.083-1.084c.557-1.118 1.066-2.18.487-3.58-.579-1.391-1.691-1.784-2.876-2.182v-1.533c1.185-.398 2.297-.791 2.875-2.184.578-1.394.068-2.459-.488-3.579l1.084-1.084c1.082.538 2.162 1.077 3.58.488 1.392-.577 1.785-1.69 2.183-2.875h1.534c.398 1.185.792 2.297 2.184 2.875 1.419.588 2.506.045 3.579-.488l1.084 1.084c-.556 1.121-1.065 2.187-.488 3.58.577 1.391 1.689 1.784 2.875 2.183v1.534c-1.188.398-2.302.791-2.877 2.183zm-7.125-5.951c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.762 0-5 2.238-5 5s2.238 5 5 5 5-2.238 5-5-2.238-5-5-5z"></path>
            </symbol>
        </defs>
    </svg>
@endsection

@push('styles-plugins')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endpush

