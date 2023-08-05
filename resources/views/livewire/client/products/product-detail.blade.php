<div class="row">
  <div class="col-12">
    <h1 class="product-name">{{ $product->name }}</h1>
  </div>
  <div class="product-layout_col-left col-12 col-sm-12 col-md-5 col-lg-6 col-xl-6 mb-3" id="mainThumb">
    <img src="{{ getProductImage($product->product_images[0]->image) }}" alt="{{ $product->name }}" class="rounded">
    @if (count($subImages) > 1)
      <div
        class="position-relative product-thumb-slide swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-thumbs mt-4 overflow-hidden">
        <div class="swiper-wrapper">
          @foreach ($subImages as $subImage)
            <div onclick="selectThumbnail({{ $subImage->id }})" id="{{ $subImage->id }}"
              class="swiper-slide sub_thumbnail swiper-slide-active overflow-hidden rounded border">
              <div class="position-relative w-100 ratio1by1 aspect m-0">
                <img src="{{ asset('storage/' . $subImage->image) }}" alt="{{ $product->name }}"
                  class="d-block img position-absolute w-100 h-100">
              </div>
            </div>
          @endforeach

        </div>
        <div class="swiper-button-prev thumb_detail_prev swiper-button-disabled"></div>
        <div class="swiper-button-next thumb_detail_next"></div>
        <div class="swiper-pagination mew_slide_p"></div>
        @push('scripts')
          <script>
            window.addEventListener('initGalery', event => {
              var swiperThumbImage = new Swiper('.product-thumb-slide', {
                spaceBetween: 4,
                slidesPerView: 5,
                navigation: {
                  nextEl: 'thumb_detail_next',
                  prevEl: 'thumb_detail_prev',
                },
                grabCursor: true,
              });
            })
            const selectThumbnail = (id) => {
              const subThumb = document.getElementById(id);
              const img = subThumb.querySelector('img').getAttribute('src');
              const mainThumb = document.querySelector('#mainThumb');
              mainThumb.querySelector('img').setAttribute('src', img);
            }
          </script>
        @endpush
      </div>
    @endif
  </div>
  <div class="product-layout_col-right col-12 col-sm-12 col-md-7 col-lg-6 col-xl-6 product-warp">
    <div class="product-info position-relative">
      <livewire:client.products.product-detail-quantity :product="$product" wire:key="$product->quantity" />
      <span class="in_1">
        <b class="d-inline-block">|</b>Loại: <span id="vendor">{{ $product->categories->name }}</span>
      </span>
    </div>
    {{-- <div class="product-info position-relative mb-3">Loại: <span id="type">
            {{ $product->categories->name }}
          </span>
        </div> --}}
    <div class="product-summary"> Đang cập nhật</div>
    {{-- <div class="product-price">
        @php
          $price = getPrice($product->regular_price, $product->sale_price);
        @endphp
        <span class="special-price">{{ $price }}</span>
        @if ($product->sale_price)
          <del class="old-price">{{ getPrice($product->regular_price) }}</del>
        @endif
      </div> --}}

    <livewire:client.products.product-detail-price :product="$product" wire:key="$product->regular_price" />
    {{-- Attrubute --}}
    <div spellcheck="false" autocomplete="off">
      @if ($product->attributeValues->count() > 0)
        @foreach ($product->attributeValues->unique('product_attribute_id') as $av)
          <div class="d-flex align-items-center swatch clearfix mt-4 flex-wrap">
            <div class="header-swatch fw-bold mb-2">{{ $av->productAttribute->name }}</div>
            @foreach ($av->productAttribute->attributeValues->where('product_id', $product->id) as $pav)
              <div wire:click="getAttributeValueId({{ $pav->id }})"
                data-value="{{ $pav->product_attribute_value }}"
                class="swatch-element X position-relative float-left mb-2 me-2">
                <input id="swatch-1-x" class="position-absolute w-100 m-0" type="radio"
                  name="{{ $product->name }}" value="{{ $pav->id }}">
                <label title="{{ $pav->product_attribute_value }}" for="swatch-1-x"
                  class="text-uppercase float-left m-0 rounded border pe-1 ps-1 text-center">{{ $pav->product_attribute_value }}</label>
                <div class="product-variation__tick position-absolute">
                  <svg enable-background="new 0 0 12 12" class="icon-tick-bold">
                    <use href="#svg-tick"></use>
                  </svg>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      @endif
      <div class="product-quantity align-items-center clearfix d-sm-flex">
        <header class="fw-bold mb-2" style="min-width:
                100px;">Số lượng
        </header>
        <div class="custom-btn-number form-inline border-0">
          <button wire:click.prevent="decreaseQty" id="decrement" type="button">
            <i class="fa-solid fa-minus icon"></i>
          </button>
          <input type="number" wire:model="quantity" name="quantity" min="1" class="form-control product_qtn"
            id="qtym">
          <button wire:click.prevent="increaseQty" id="increment" type="button">
            <i class="fa-solid fa-plus icon"></i>
          </button>
        </div>
      </div>
      <livewire:client.cart.product-add-to-cart :product="$product" :quantity="$quantity" wire:key="$product->id" />
    </div>
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
  <svg class="d-none">
    <defs>
      <symbol id="svg-tick" viewBox="0 0 12 12">
        <path
          d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z">
        </path>
      </symbol>
    </defs>
  </svg>
</div>
