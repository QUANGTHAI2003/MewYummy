<header class="header py-3">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-3 col-lg-2">
        <a href="{{ route('home') }}" class="logo">
          <img src="{{ asset('storage/images/logo.webp') }}" loading="lazy" class="img-fluid logo d-none d-lg-block" />
          <img src="{{ asset('storage/images/logo_mobi.webp') }}" loading="lazy"
            class="img-fluid logo d-block d-lg-none" />
        </a>
      </div>
      <div class="col-9 col-lg-10">
        <div class="d-lg-flex align-items-center position-static ps-menu">
          <div class="search__block me-xl-5 me-3">
            <livewire:client.products.livesearch />
          </div>
          <div class="info__block d-none d-lg-block me-2 ms-2">
            <a href="tel:0774060610">
                <i class="fa-solid fa-phone-volume icon" style="transform: rotate(320deg);"></i>
              <b>Hotline: <br />0774060610 </b>
            </a>
          </div>
          <div class="action__block d-none d-lg-block">
            <div class="d-lg-flex align-items-center">
              <div class="action__block-login btn-account d-lg-flex me-3 p-2">
                @if (Auth::check())
                  <img src="{{ avatarUrl(auth()->user()) }}" alt="{{ auth()->user()->name }}">
                @else
                  <i class="fa-solid fa-user icon icon-outline"></i>
                @endif
                <ul class="pop__login sub__menu">
                  @if (Auth::check())
                    <h4 class="d-block fs-6">{{ auth()->user()->name }}</h4>
                    <li class="pop__login-list">
                      <a href="{{ route('account.index') }}" class="pop__login-link d-block fw-bold">Tài khoản</a>
                    </li>
                    <li class="pop__login-list">
                      <a href="{{ route('logout') }}" class="pop__login-link d-block fw-bold">Đăng xuất</a>
                    </li>
                  @else
                    <li class="pop__login-list">
                      <a href="{{ route('login') }}" class="pop__login-link d-block fw-bold">Đăng nhập</a>
                    </li>
                    <li class="pop__login-list">
                      <a href="{{ route('register') }}" class="pop__login-link d-block fw-bold">Đăng ký</a>
                    </li>
                  @endif
                </ul>
              </div>
              <a href="{{ route('cart') }}" class="btn-cart">
                <span class="box-icon p-1">
                    <i class="fa-regular fa-cart-shopping-fast fa-bounce icon"></i>
                </span>
                <livewire:client.cart.cart-count-component />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header><!-- Navbar Section -->
<nav class="navbar me-lg-auto">
  <div class="container">
    <!-- PC Menu -->
    <ul id="menu-pc" class="position-relative d-lg-flex d-none d-lg-block m-0 p-0">
      <li class="main__menu pt-lg-2 pb-lg-2 {{ request()->is('/') ? 'active' : '' }}">
        <a class="ps-lg-3 ps-2" href="{{ route('home') }}">Trang chủ</a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 {{ request()->is('about') ? 'active' : '' }}">
        <a class="ps-lg-3" href="{{ route('about') }}">Về Mew Yummy</a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 {{ request()->is('product') ? 'active' : '' }} dropdown pb-1">
        <a class="ps-lg-3" href="{{ route('product') }}">Sản phẩm</a>
        <i class="fa-solid fa-caret-down icon"></i>
        <ul class="sub__menu">
          <div class="row px-4 py-2">
            <div class="col">
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Thịt, trứng</a>
              </li>
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Hải sản</a>
              </li>
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Rau củ</a>
              </li>
            </div>
            <div class="col">
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Trái cây</a>
              </li>
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Đồ khô</a>
              </li>
              <li class="sub__menu-item">
                <a href="#" class="sub__menu-link">Gia vị</a>
              </li>
            </div>
          </div>
        </ul>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 {{ request()->is('news') ? 'active' : '' }}">
        <a class="ps-lg-3" href="{{ route('news') }}">Tin tức</a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 {{ request()->is('contact') ? 'active' : '' }}">
        <a class="ps-lg-3" href="{{ route('contact') }}">Liên hệ</a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 ms-auto">
        <a class="ps-lg-3" href="#">
          <i class="fa-solid fa-map-location-dot icon"></i> Hệ thống cửa hàng </a>
      </li>
    </ul>
  </div>
  <!-- Mobile Menu -->
  <div class="container">
    <ul id="menu-mobi" class="d-lg-none">
      <li class="main__menu pt-lg-2 pb-lg-2">
        <a class="ps-lg-3 active ps-2" href="{{ route('home') }}">
          <i class="fa-solid fa-house icon"></i>
          <span>Trang chủ</span>
        </a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2 menu">
        <button class="ps-lg-3" data-bs-toggle="offcanvas" data-bs-target="#menuSidebar"
          aria-controls="menuSidebar">
          <i class="fa-solid fa-bars icon"></i>
          <span>Danh mục</span>
        </button>
      </li>
      @if (Route::currentRouteName() == 'product')
        <li class="main__menu pt-lg-2 pb-lg-2 dropdown">
          <button class="ps-lg-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
            aria-controls="offcanvasBottom">
            <i class="fa-solid fa-sliders icon"></i>
            <span>Bộ lộc</span>
          </button>
        </li>
      @else
        <li class="main__menu pt-lg-2 pb-lg-2 dropdown">
          <a class="ps-lg-3" href="{{ route('contact') }}">
            <i class="fa-solid fa-phone-volume icon"></i>
            <span>Liên hệ</span>
          </a>
        </li>
      @endif
      <li class="main__menu pt-lg-2 pb-lg-2">
        <a class="ps-lg-3" href="{{ route('account.index') }}">
          <i class="fa-solid fa-user icon"></i>
          <span>Tài khoản</span>
        </a>
      </li>
      <li class="main__menu pt-lg-2 pb-lg-2">
        <a class="ps-lg-3" href="{{ route('cart') }}">
          <i class="fa-solid fa-cart-shopping icon"></i>
          <span>Giỏ hàng</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="offcanvas offcanvas-start mx-3" data-bs-scroll="true" tabindex="-1" id="menuSidebar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <ul class="nav__mobi">
        <li class="nav__mobi-list">
          <a href="{{ route('home') }}" class="nav__mobi-link">Trang chủ</a>
        </li>
        <li class="nav__mobi-list">
          <a href="{{ route('about') }}" class="nav__mobi-link">Về Mew Yummy</a>
        </li>
        <li class="nav__mobi-list active">
          <a href="{{ route('product') }}" class="nav__mobi-link">Sản phẩm</a>
        </li>
        <li class="nav__mobi-list">
          <a href="{{ route('news') }}" class="nav__mobi-link">Tin tức</a>
        </li>
        <li class="nav__mobi-list">
          <a href="{{ route('contact') }}" class="nav__mobi-link">Liên hệ</a>
        </li>
      </ul>
      <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
    </div>
    <div class="offcanvas-body">
      <ul class="menu__product">
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Thịt nướng</a>
        </li>
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Hải sản</a>
        </li>
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Rau củ</a>
        </li>
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Trái cầy</a>
        </li>
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Đồ khô</a>
        </li>
        <li class="menu__product-list">
          <a href="#" class="menu__product-link me-2 ml-2">Gia vị</a>
        </li>
      </ul>
    </div>
  </section>
  @if (Route::currentRouteName() == 'product')
    <div class="offcanvas offcanvas-bottom offcanvas-collapse" tabindex="-1" id="offcanvasBottom"
      aria-labelledby="offcanvasBottomLabel">
      <div class="offcanvas-body small">
        <div class="filter-container row">
          <aside class="aside-item filter-price col-12 col-sm-12 col-lg-12 mb-3">
            <h3 class="title-body">Lọc giá</h3>
            <div class="aside-content filter-group mb-1">
              <div class="row">
                <div class="col-6 col-lg-12 col-xl-6">
                  <label for="minPriceOffcanvas">
                    <input type="text" id="minPriceOffcanvas" class="form-control filter-range-from-offcanvas"
                      value="" placeholder="Giá tối thiểu">
                  </label>
                </div>
                <div class="col-6 col-lg-12 col-xl-6">
                  <label for="maxPriceOffcanvas">
                    <input type="text" id="maxPriceOffcanvas" class="form-control filter-range-to-offcanvas"
                      value="" placeholder="Giá tối đa">
                  </label>
                </div>
              </div>
            </div>
            <button class="btn btn-primary js-filter-pricerange">Áp dụng</button>
          </aside>
          <aside class="aside-item filter-type col-12 col-md-6 col-lg-12 mb-3">
            <h3 class="title-body">Loại</h3>
            <div class="aside-content filter-group">
              <ul class="filter-type list-unstyled m-0">
                <div class="row">
                  <div class="col-6">
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
                  </div>
                  <div class="col-6">
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
                  </div>
                </div>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  @endif
</nav>
