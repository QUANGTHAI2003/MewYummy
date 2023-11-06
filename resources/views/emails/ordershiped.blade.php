<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://kit-pro.fontawesome.com/releases/v6.2.0/css/pro.min.css" rel="stylesheet">
  <link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    :root {
      --base-font-size: 16px;
      /* Set your base font size here */
    }

    .order-info {
      box-shadow: 0px 0px 0.1875rem #d7d7d7;
    }

    .order-info .head-title h1 {
      font-size: 1.25rem;
      color: #2e9f3c;
    }

    .order-info .title-head {
      font-size: 1.25rem;
      color: #2e9f3c;
    }

    .order-info .i_main {
      font-size: 1.0625rem;
      /* 17px / 16px = 1.0625rem */
      text-transform: capitalize;
    }

    .order-info .i_sup {
      font-size: 0.875rem;
      /* 14px / 16px = 0.875rem */
    }

    .order-info .item_order {
      transition: all 0.5s;
    }

    .order-info .item_order a {
      color: #515151;
    }

    .order-info .item_order img {
      max-height: 5.625rem;
      /* 90px / 16px = 5.625rem */
    }

    .order-info .item_order:hover {
      box-shadow: 0px 0px 0.4375rem -0.125rem #ffc107;
      border-color: #ffc107 !important;
    }

    .order-info .price {
      color: #f00;
    }
  </style>
</head>

<body>

  <div class="container-sm">
    <div class="order-info rounded bg-white p-3">
      <div class="head-title clearfix">
        <div class="header d-flex align-items-center justify-content-between">
          <h1 class="fw-bold m-0">Chi tiết đơn hàng #{{ $order->id }}</h1>
          @if($order->status == 'pending')
          <div class="invoices">
            <a href="{{ route('account.acceptOrder', ['orderId' => $order->id, 'token' => $order->token]) }}" class="btn btn-sm btn-primary">Xác nhận đơn hàng</a>
          </div>
          @endif
        </div>
        <p class="note order_date m-0">Ngày tạo: {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</p>

        <div class="shipping_status">

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
      </div>
      <div class="body_order border-top mt-3">
        <div class="b_name_phone border-bottom pb-3 pt-3">
          <h2 class="title-head fw-bold mb-3">Thông tin giao hàng</h2>
          <div class="row">
            <div class="col-6">
              <p class="i_sup m-0">Tên người nhận: </p>
              <p class="i_main m-0">{{ $order->name }}</p>
            </div>
            <div class="col-6">
              <p class="i_sup m-0">Số điện thoại: </p>
              <p class="i_main m-0">
                {{ $order->phone }}
              </p>
            </div>
            <div class="col-6 mt-2">
              <p class="i_sup m-0">Email: </p>
              <p class="m-0" style="font-size: 17px">
                {{ $order->email }}
              </p>
            </div>
          </div>
        </div>
        <div class="box-address border-bottom pb-3 pt-3">
          <p class="i_sup m-0">
            Địa chỉ giao hàng:
          </p>
          <p class="i_main m-0">

            {{ $order->address }}

          </p>
        </div>
        <div class="payment_status border-bottom pb-3 pt-3">
          <p class="note i_sup m-0">Trạng thái thanh toán: </p>
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
        </div>
      </div>
      <div class="list-order pb-3 pt-3">
        <p class="note i_main fw-bold m-0">
          Danh sách sản phẩm
        </p>
        @foreach ($order->orderItems as $item)
          <div class="item_order mb-2 mt-2 rounded border p-2">
            <div class="row align-items-center m--1">
              <div class="qty col-3 col-md-1 fw-bold text-warning pl-1 pr-1 text-center">
                {{ $item->product_quantity }} x
              </div>
              <div class="image_order col-2 d-none d-md-block pl-1 pr-1 text-center">
                <a title="{{ $item->product_name }}"
                  href="{{ route('show', ['slug' => $item->product->slug, 'id' => $item->product->id]) }}"><img
                    src="{{ getProductImage($item->product_image) }}" alt="{{ $item->product_name }}"></a>
              </div>
              <div class="content_right col-9 col-md-7 pl-1 pr-1">
                <a class="title_order fw-bold"
                  href="{{ route('show', ['slug' => $item->product->slug, 'id' => $item->product->id]) }}"
                  title="{{ $item->product_name }}">{{ $item->product_name }}</a>

                <small class="d-block">
                  {{ formatNumber($item->product_price) }}
                </small>
              </div>
              <div class="price total col-12 col-md-2 fw-bold pl-1 pr-1 text-right">
                {{ formatNumber($item->product_price) }}
              </div>
            </div>
          </div>
        @endforeach

      </div>
      <div class="list-order totalorders border-top">
        <div class="border-bottom pb-2 pt-2">
          <div class="row m--1">
            <div class="col-6 pl-1 pr-1">
              Mã giảm giá
            </div>
            <div class="col-6 pl-1 pr-1">
              {{ formatNumber($order->discount ?: 0) }}
            </div>
          </div>
        </div>
        <div class="border-bottom pb-2 pt-2">
          <div class="row m--1">
            <div class="col-6 pl-1 pr-1">
              Phí vận chuyển
            </div>
            <div class="col-6 pl-1 pr-1">

              {{ formatNumber($order->shipping_fee || 0) }}

              (Free Ship)

            </div>
          </div>
        </div>
        <div class="border-bottom pb-2 pt-2">
          <div class="row m--1">
            <div class="col-6 pl-1 pr-1">
              Tổng tiền
            </div>
            <div class="col-6 pl-1 pr-1">
              <b class="price">{{ formatNumber($order->total_price) }}</b>
            </div>
          </div>
        </div>
      </div>
      <div class="box-address pb-2 pt-2">
        <b class="i_main text-success">
          Ghi chú
        </b>
        <p class="note i_sup m-0">

          @if ($order->note)
            {{ $order->note }}
          @else
            Không có ghi chú
          @endif
        </p>
      </div>
    </div>
  </div>

</body>

</html>
