<div class="product-add row mb-3 py-2">
  <div class="col-12">
    @if ($product->stock_qty != 0)
      <button wire:click.prevent="store({{ $product->id }})" type="submit"
        class="btn btn-primary btn-add-to-cart btn-block">
        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <i wire:loading.remove class="fa-solid fa-shopping-cart icon"></i>
        <span>
          Thêm vào giỏ hàng
        </span>
      </button>
    @else
      <button type="submit" class="btn btn-primary btn-add-to-cart btn-block" disabled>
        <i class="fa-solid fa-shopping-cart icon"></i>
        <span>Hết hàng</span>
      </button>
    @endif
  </div>
</div>
