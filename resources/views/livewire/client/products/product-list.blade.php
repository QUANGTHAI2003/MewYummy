<div class="col-12 col-lg-9 pt-lg-0 pt-3">
  <div class="sortPagiBar border-bottom border-top pb-2 pt-2">
    <b>Sắp xếp: </b>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('name|asc')" class="form-check-input">A → Z </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('name|desc')" class="form-check-input">Z → A
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('regular_price|asc')" class="form-check-input">Giá
        tăng dần </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('regular_price|desc')" class="form-check-input">Giá
        giảm dần </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('created_at|asc')" class="form-check-input">Mới nhất
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" name="sort" wire:click="sortRadio('created_at|desc')" class="form-check-input">Cũ nhất
      </label>
    </div>
  </div>
  <div wire:loading.class.delay="opacity-50 cursor-wait" class="collection mt-4">
    <div class="category-products position-relative mb-4 mt-4">
      <div class="row slider-items">
        @include('livewire.client.products.product-skeleton')
        @foreach ($products as $product)
          <div wire:loading.remove class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 product-grid-item-lm mb-3">
            <div class="card-item">
              @php
                $sale_percent = getSalePercent($product->regular_price, $product->sale_price);
              @endphp
              @if ($sale_percent)
                <div class="sale-label sale-top-right position-absolute">
                  <span class="fw-bold">{{ $sale_percent }}</span>
                </div>
              @endif
              <a href="{{ route('show', ['slug' => $product->slug, 'id' => $product->id]) }}"
                class="thumb d-block modal-open" title="{{ $product->name }}">
                <div class="zoom">
                  <img src="{{ getProductImage($product->product_images[0]->image) }}"
                    class="d-block img img-cover position-absolute" />
                </div>
              </a>
              <div class="item-info">
                <h3 class="item-title">
                  <a class="d-block modal-open" href="#">{{ $product->name }}</a>
                </h3>
                <div class="item-price">
                  @php
                    $price = getPrice($product->regular_price, $product->sale_price);
                  @endphp
                  <span class="special-price fw-bold me-2">{{ $price }}</span>
                  @if ($sale_percent)
                    <span
                      class="old-price text-decoration-line-through">{{ formatNumber($product->regular_price) }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{ $products->links('livewire.client-pagination') }}
    </div>
  </div>
</div>
