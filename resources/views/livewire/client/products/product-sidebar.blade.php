<div class="sidebar sidebar_mobi p-lg-0 mt-lg-1 d-flex flex-column m-0 p-2">
  <h2 class="title-head"> Danh mục </h2>
  <div class="list-group">
    @foreach ($categories as $category)
      <a href="#" wire:click.prevent='sortCategory({{ $category->id }})'
        class="list-group-item list-group-item-action active">{{ $category->name }}</a>
    @endforeach
  </div>
  <div class="aside-filter modal-open pr-md-2 order-lg-3">
    @if ($selectedFilters)
      <div class="filter-container__selected-filter">
        <div class="filter-container__selected-filter-header d-flex clearfix pb-1 pt-1">
          <span class="filter-container__selected-filter-header-title">Lọc theo:</span>
        </div>
        <ul class="filter-container__selected-filter-list list-unstyled d-block w-100 m-0 pl-0">
          @foreach ($selectedFilters as $key => $value)
            <li class="filter-container__selected-filter-item d-inline-flex align-items-center mb-2">
              <a wire:click.prevent="clearSort('{{ $key }}')" href="javascript:void(0)" class="p-1 pl-2 pr-2">
                {{ $value }}
                {{-- <i class="fa fa-times icon ms-2"></i> --}}
              </a>
            </li>
          @endforeach
          <li class="filter-container__selected-filter-item d-inline-flex align-items-center">
            <a wire:click.prevent="clearAllSort" href="javascript:void(0)" class="p-1 pl-2 pr-2">Xoá hết </a>
          </li>
        </ul>
      </div>
    @endif
    <div class="filter-container row">
      <aside class="aside-item filter-price col-12 col-sm-12 col-lg-12 mb-3">
        <h3 class="title-body">Lọc giá</h3>
        <div class="aside-content filter-group mb-1">
          <div class="row">
            <div class="col-6 col-lg-12 col-xl-6">
              <label for="minPriceLg">
                <input type="text" wire:model="minPrice" id="minPriceLg" class="form-control filter-range-from"
                  value="" placeholder="Giá tối thiểu">
              </label>
            </div>
            <div class="col-6 col-lg-12 col-xl-6">
              <label for="maxPriceLg">
                <input type="text" wire:model="maxPrice" id="maxPriceLg" class="form-control filter-range-to"
                  value="" placeholder="Giá tối đa">
              </label>
            </div>
          </div>
        </div>
        <button wire:click="applySortPrice" class="btn btn-primary js-filter-pricerange">Áp dụng</button>
      </aside>
      <aside class="aside-item filter-type col-12 col-sm-6 col-lg-12 mb-3">
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
      <div class="aside-item d-none d-lg-block order-3 mb-2 pt-2">
        <a class="h2 title-head font-weight-bold big text-uppercase d-block mb-2 rounded p-2" href="tin-tuc">
          Mẹo ăn ngon </a>
        <div class="list-blogs">
          <article class="blog-item">
            <div class="img_art thumb_img_blog_list">
              <a href="#" class="effect-ming">
                <div class="position-relative ratio3by2 rounded">
                  <img src="{{ asset('storage/images/trick1.webp') }}" loading="lazy"
                    class="lazy d-block img img-cover position-absolute rounded-3"
                    alt="Hướng dẫn 5 cách
                          làm món cá hồi sốt vừa ngon, vừa nhiều dinh
                          dưỡng cho gia đình">
                </div>
              </a>
            </div>
            <h3 class="blog-item-name position-relative line_3 m-0 pl-3">
              <a href="#">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia
                đình</a>
            </h3>
          </article>
          <article class="blog-item">
            <div class="img_art thumb_img_blog_list">
              <a href="#" class="effect-ming">
                <div class="position-relative ratio3by2 rounded">
                  <img src="{{ asset('storage/images/trick2.webp') }}" loading="lazy"
                    class="lazy d-block img img-cover position-absolute rounded-3"
                    alt="Tổng hợp những
                          món ngon từ thịt bò giúp nồi cơm luôn sạch veo">
                </div>
              </a>
            </div>
            <h3 class="blog-item-name position-relative line_3 m-0 pl-3">
              <a href="#">Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo</a>
            </h3>
          </article>
          <article class="blog-item">
            <div class="img_art thumb_img_blog_list">
              <a href="#" class="effect-ming">
                <div class="position-relative ratio3by2 rounded">
                  <img src="{{ asset('storage/images/trick3.webp') }}" loading="lazy"
                    class="lazy d-block img img-cover position-absolute rounded-3"
                    alt="Hướng dẫn 05 cách
                          chế biến cá bò thơm ngon hấp dẫn cho cả gia
                          đình">
                </div>
              </a>
            </div>
            <h3 class="blog-item-name position-relative line_3 m-0 pl-3">
              <a href="#">Hướng dẫn 05 cách chế biến cá bò thơm ngon hấp dẫn cho cả gia đình</a>
            </h3>
          </article>
          <article class="blog-item">
            <div class="img_art thumb_img_blog_list">
              <a href="#" class="effect-ming">
                <div class="position-relative ratio3by2 rounded">
                  <img src="{{ asset('storage/images/trick4.webp') }}" loading="lazy"
                    class="lazy d-block img img-cover position-absolute rounded-3"
                    alt="TOP 30+ món thịt
                          bò ngon nhất vừa dễ làm lại tiết kiệm">
                </div>
              </a>
            </div>
            <h3 class="blog-item-name position-relative line_3 m-0 pl-3">
              <a href="#">TOP 30+ món thịt bò ngon nhất vừa dễ làm lại tiết kiệm</a>
            </h3>
          </article>
          <article>
            <div class="img_art thumb_img_blog_list">
              <a href="#" class="effect-ming">
                <div class="position-relative ratio3by2 rounded">
                  <img src="{{ asset('storage/images/trick5.webp') }}" loading="lazy"
                    class="lazy d-block img img-cover position-absolute rounded-3"
                    alt="Top 16 món ăn hải
                          sản ngon nổi tiếng không nên bỏ qua">
                </div>
              </a>
            </div>
            <h3 class="blog-item-name position-relative line_3 m-0 pl-3">
              <a href="#">Top 16 món ăn hải sản ngon nổi tiếng không nên bỏ qua</a>
            </h3>
          </article>
        </div>
      </div>
    </div>
  </div>
</div>
