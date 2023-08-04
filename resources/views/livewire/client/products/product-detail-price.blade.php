<div class="product-price">
  <span wire:loading.remove class="special-price">{{ $price }}</span>
  @if ($product->sale_price)
    <del wire:loading.remove class="old-price">{{ getPrice($product->regular_price) }}</del>
  @endif

  <span wire:loading class="old-price">Đang tải...</span>
</div>
