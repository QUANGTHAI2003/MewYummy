<span class="in_1"> Tình trạng:
  <span wire:loading.remove class="inventory_quantity">
    @if ($product->stock_qty > 0)
      Còn hàng
    @else
      Hết hàng
    @endif
  </span>

    <span wire:loading class="inventory_quantity">Đang tải...</span>

</span>
