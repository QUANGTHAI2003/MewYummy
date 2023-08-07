<div class="order__info mt-4 rounded">
  <h1 class="order__info-title">Danh sách đơn hàng</h1>
  <div class="order__info-recent">
    @if (count($orders) > 0)
      @foreach ($orders as $order)
        <div class="item-order mt-3 rounded border">
          <a href="{{ route('account.order_detail', $order->id) }}" class="row">
            <div class="col-12 col-md-8">
              <div class="status-order">
                <b class="order-id">#{{ $order->id }}</b> -
                @if ($order->status !== 'cancelled')
                  @if ($order->transaction->status == 'pending')
                    <span class="span_ text-warning">
                      Chờ thanh toán
                    </span>
                  @elseif($order->transaction->status == 'completed')
                    <span class="span_ text-success">
                      Thanh toán thành công
                    </span>
                  @elseif($order->transaction->status == 'decline')
                    <span class="span_ text-danger">
                      Thanh toán thất bại
                    </span>
                  @elseif($order->transaction->status == 'refund')
                    <span class="span_ text-danger">
                      Đã hoàn tiền
                    </span>
                  @endif
                  -
                @endif
                @if ($order->status == 'pending')
                  <span class="span_ text-warning">
                    Chờ xác nhận
                  </span>
                @elseif($order->status == 'processing')
                  <span class="span_ text-primary">
                    Đang xử lý
                  </span>
                @elseif($order->status == 'completed')
                  <span class="span_ text-success">
                    Đã giao hàng
                  </span>
                @else
                  <span class="span_ text-danger">
                    Đã hủy
                  </span>
                @endif
              </div>
              <div class="addr_order">
                <b> Địa chỉ giao hàng: {{ $order->address }}</b>
              </div>
              <p class="time_order m-0"> Ngày: {{ $order->created_at }} </p>
            </div>
            <div class="col-12 col-md-4 text-end">
              <b class="price">{{ formatNumber($order->total_price) }}</b>
            </div>
          </a>
        </div>
      @endforeach
    @else
      Không có đơn hàng nào
    @endif
  </div>
</div>
