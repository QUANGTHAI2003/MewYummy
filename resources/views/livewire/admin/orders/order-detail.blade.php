<div class="bg-gray-50">

  <main class="mx-auto max-w-2xl pb-24 pt-8 sm:px-6 sm:pt-16 lg:max-w-7xl lg:px-8">
    <div class="space-y-2 px-4 sm:flex sm:items-baseline sm:justify-between sm:space-y-0 sm:px-0">
      <div class="flex sm:items-baseline sm:space-x-4">
        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
          Mã đơn hàng: #{{ $order->id }}</h1>
      </div>
      <p class="font-bold text-gray-600">Ngày đặt hàng
        <time datetime="2021-03-22" class="font-medium text-gray-600">
          {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}
        </time>
      </p>
      <form method="POST" enctype="multipart/form-data">
        @csrf
        @if ($order->status == 'pending' || $order->status == 'processing' || $order->status == 'completed')
          <h2 class="font-weight-bold text-green-500">Đặt hàng thành công</h2>
        @else
          <h2 class="font-weight-bold text-red-500">Đơn hàng đã hủy</h2>
        @endif
      </form>
    </div>

    <!-- Products -->
    <section aria-labelledby="products-heading" class="mt-6">
      <h2 id="products-heading" class="sr-only">Sản phẩm đã mua</h2>

      <div class="space-y-8">
        <div class="border-b border-t border-gray-200 bg-white shadow-sm sm:rounded-lg sm:border">
          @foreach ($order->orderItems as $item)
            <div class="px-1 py-1 sm:px-1 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">

              <div class="pl-10 pt-4 sm:flex lg:col-span-7">

                <div class="aspect-h-1 aspect-w-1 w-full flex-shrink-0 rounded-lg sm:aspect-none sm:w-24">
                  <img src="{{ getProductImage($item->product_image) }}" class="img-slider rounded-md"
                    alt="{{ $item->product_name }}">
                </div>

                <div class="mt-6 sm:ml-6 sm:mt-0">

                  <h3 class="text-base font-medium text-blue-600">
                    <a href="{{ route('show', ['slug' => $item->product->slug, 'id' => $item->product->id]) }}"
                      target="_blank">
                      {{ $item->product_name }}
                    </a>
                  </h3>
                  <p class="mt-2 text-sm font-medium text-gray-900">
                    {{ formatNumber($item->product_price) }}
                  </p>
                  <p class="mt-2 text-sm font-medium text-gray-900">
                    Số lượng: {{ $item->product_quantity }}
                  </p>
                </div>
              </div>
            </div>
            <hr>
          @endforeach
          @if ($order->status == 'pending' || $order->status == 'processing' || $order->status == 'completed')
            <div class="border-t border-gray-200 px-4 py-6 sm:px-6 lg:p-8">
              <h4 class="sr-only">Status</h4>
              <p class="text-sm font-medium text-gray-900">
                Trạng thái đơn hàng:
                @if ($order->status == 'pending')
                  <span class="text-blue-600">Đang chờ xử lý</span>
                @elseif($order->status == 'processing')
                  <span class="text-blue-600">Đang xử lý</span>
                @elseif($order->status == 'completed')
                  <span class="text-blue-600">Đã hoàn thành</span>
                @else
                  <span class="text-blue-600">Đã hủy</span>
                @endif
              </p>
          @endif
          <div class="mt-6" aria-hidden="true">
            <div class="overflow-hidden rounded-full bg-gray-200">
              @if ($order->status == 'pending')
                <div class="h-2 rounded-full bg-blue-600" style="width: 0"></div>
              @elseif($order->status == 'processing')
                <div class="h-2 rounded-full bg-blue-600" style="width: calc((1 / 2) * 100%);"></div>
              @elseif($order->status == 'completed')
                <div class="h-2 rounded-full bg-blue-600" style="width: 100%;"></div>
              @else
                <div class="h-2 rounded-full bg-blue-600" style="width: 0"></div>
              @endif
            </div>
            <div class="mt-6 hidden grid-cols-3 text-sm font-medium text-gray-600 sm:grid">

              @if ($order->status == 'pending')
                <div class="text-blue-600">Đang chờ xử lý</div>
                <div class="text-center">Đang xử lý</div>
                <div class="text-right">Hoàn thành</div>
              @elseif($order->status == 'processing')
                <div class="text-blue-600">Đang chờ xử lý</div>
                <div class="text-center">Đang xử lý</div>
                <div class="text-right">Hoàn thành</div>
              @elseif($order->status == 'completed')
                <div class="text-blue-600">Đang chờ xử lý</div>
                <div class="text-center">Đang xử lý</div>
                <div class="text-right">Hoàn thành</div>
              @else
              <div class="text-center text-red-500">Đã hủy</div>
              @endif
            </div>
          </div>
        </div>
      </div>
</div>
</section>

<!-- Billing -->
<section aria-labelledby="summary-heading" class="mt-16">
  <div class="bg-gray-100 px-4 py-6 sm:rounded-lg sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-8">
    <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
      <div>
        <dt class="font-medium text-gray-900">Địa chỉ giao hàng</dt>
        <dd class="mb-3 mt-3 text-gray-500">
          <span class="block"><strong>Tên khách hàng:</strong> {{ $order->name }}</span>
          <span class="block"><strong>Địac chỉ giao hàng: </strong>{{ $order->address }}</span>
          <span class="block"><strong>Số điện thoại: </strong>{{ $order->phone }}</span>
          <span class="block"><strong>Email: </strong>{{ $order->email }}</span>
        </dd>
        @if ($order->note)
          <dd class="mt-4 text-gray-500">
            <span class="block"><strong>Chú thích thêm: </strong> {{ $order->note }}</span>
          </dd>
        @endif
      </div>

      <div>
        <td class="font-medium text-gray-900">Thông tin thành toán</td>
        @if ($order->status !== 'cancelled')
          <div class="mt-3">
            @if ($order->transaction->type === 'cod')
              <dd class="-ml-4">
                <div class="ml-3 mt-0 flex-shrink-0">
                  <td class="hidden whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
                    <span
                      class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                      Thanh toán khi nhận hàng
                    </span>
                  </td>
                </div>
                <div class="ml-3 mt-3">
                  <h5 class="mb-2"><strong>Phương thức thành toán: </strong></h5>
                  <img src="{{ asset('storage/images/cod.png') }}" style="height:60px">
                </div>
              </dd>
            @endif
            @if ($order->transaction->type === 'momo')
              <dd class="-ml-4">
                <div class="ml-3 mt-0 flex-shrink-0">
                  <td class="hidden whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
                    <span
                      class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                      Thanh toán bằng ví điện tử Momo
                    </span>
                  </td>
                </div>
                <div class="ml-3 mt-3">
                  <h5 class="mb-2"><strong>Phương thức thành toán: </strong></h5>
                  <img src="{{ asset('storage/images/momo.jpg') }}" style="height:70px">
                </div>
              </dd>
            @endif
            @if ($order->transaction->type === 'vnpay')
              <dd class="-ml-4">
                <div class="ml-3 mt-0 flex-shrink-0">
                  <td class="hidden whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
                    <span
                      class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                      Thanh toán bằng ví điện tử VNPAY
                    </span>
                  </td>
                </div>
                <div class="ml-3 mt-3">
                  <h5 class="mb-2"><strong>Phương thức thành toán: </strong></h5>
                  <img src="{{ asset('storage/images/vnpay.png') }}" style="height:50px">
                </div>
              </dd>
            @endif
          </div>
        @else
          <div class="mt-3">
            <span
              class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">
              Đơn hàng đã hủy
            </span>
          </div>
        @endif
      </div>
    </dl>

    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-5 lg:mt-0">

      <div class="flex items-center justify-between py-4">
        <dt class="text-gray-600">Phí giao hàng<br></dt>
        <dd class="font-medium text-gray-900"><br> + 0</dd>
      </div>
      @if ($order->discount)
        <div class="flex items-center justify-between py-4">
          <dt class="text-gray-600">Coupon</dt>
          <dd class="font-medium text-gray-900"><br>- {{ formatNumber($order->discount) }}</dd>
        </div>
      @endif
      <div class="flex items-center justify-between pt-4">
        <dt class="font-medium text-gray-900">Tổng giá trị đơn hàng</dt>
        <dd class="font-medium text-blue-600">
          {{ formatNumber($order->total_price) }}
        </dd>
      </div>
    </dl>
  </div>
</section>
<x-forms.feature-button back="{{ route('admin.orders.index') }}" />

</main>
</div>
