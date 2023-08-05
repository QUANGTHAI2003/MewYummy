<form class="search__block-form" spellcheck="false" autocomplete="off">
  <input wire:model.debounce="term" type="text" class="search__block-input form-control" role="search" spellcheck="false"
    autocomplete="off" placeholder="Tìm kiếm sản phẩm ..." />
  <button  type="submit" class="search__block-btn d-sm-none d-lg-block" value="">
    <i wire:loading.remove class="fa-solid fa-magnifying-glass icon"></i>
    <i wire:loading class="fa-solid fa-spinner fa-spin-pulse fa-lg"></i>
  </button>
  <!-- Search Result -->
  <div wire:ignore.self id="searchResult" class="w-100 searchResult mx-lg-0 px-2">
    <div class="search-result-warpper overflow-auto">
      @if (count($products) > 0)
        <div class="d-block h6 searchResult__product text-left text-white"> Sản phẩm (
          <span>{{ count($products) }}</span>)
        </div>
        <div class="searchResult-products">
          @foreach ($products as $product)
            <div class="w-100">
              <a href="{{ route('show', ['slug' => $product->slug, 'id' => $product->id]) }}"
                title="{{ $product->name }}"
                class="d-flex align-items-start w-100 result-item border-bottom align-item js-link py-2">
                <div class="result-item_image d-flex h-100 align-items-center justify-content-center">
                  <img alt="{{ $product->name }}" src="{{ getProductImage($product->product_images[0]->image) }}"
                    class="result-item_image img-fluid js-img">
                </div>
                <div class="result-item_detail px-2">
                  <h3 class="result-item_name fwb js-title mb-1">{{ $product->name }}</h3>
                  <div class="item-price d-flex align-items-center">
                    <div class="special-price fw-bold me-2">
                      {{ getPrice($product->regular_price, $product->sale_price) }}
                    </div>
                    @if ($product->sale_price != 0)
                      <span class="old-price text-decoration-line-through">
                        {{ formatNumber($product->regular_price) }}
                      </span>
                    @endif
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
        {{-- <div class="d-block h6 searchResult__article text-left text-white"> Tin tức ( <span>0</span>)
      </div>
      <div class="searchResult_articles"></div>
      <div class="d-block h6 searchResult__text text-left text-white"> Trang nội dung ( <span>0</span>)
      </div> --}}
        <div class="searchResult_pages"></div>
        <a href="#" class="btn all-result fw-bold my-0">Xem tất cả kết quả</a>
      @else
        <a href="#" class="btn all-result fw-bold my-0">Không tìm thấy kết quả</a>
      @endif
    </div>
  </div>
</form>

@push('scripts')
  <script>
    document.addEventListener('product-search', function(e) {
      console.log(e.detail);
      $('.searchResult').addClass('show');
    })
    document.addEventListener('product-search-failed', function(e) {
      console.log('failed');
      $('.searchResult').removeClass('show');
    })
  </script>
@endpush
