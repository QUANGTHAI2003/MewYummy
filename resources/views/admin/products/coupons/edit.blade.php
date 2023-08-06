@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý coupon" pageTitle="Sửa coupon" />
  <h3 class="text-3xl font-medium text-gray-700">Sửa coupon</h3>
  <div class="mb-10 mt-10 md:grid md:gap-6">
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
              <div class="col-span-6 md:col-span-3">
                <label for="code" class="block text-sm font-medium text-gray-700">Mã coupon</label>
                <input name="code" id="code" value="{{ old('code', $coupon->code) }}" type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('code')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-span-6 md:col-span-3">
                <label for="type" class="block text-sm font-medium text-gray-700">Loại coupon</label>
                <select id="type" name="type"
                  class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                  <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Giảm theo
                    số tiền</option>
                  <option value="percent" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>Giảm theo
                    phần trăm</option>
                  @error('type')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </select>
              </div>
            </div>
            <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
              <div class="col-span-6 md:col-span-2">
                <label for="value" class="block text-sm font-medium text-gray-700">Giá trị coupon</label>
                <input type="text" name="value" id="value" value="{{ old('value', $coupon->value) }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('value')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-span-6 md:col-span-2">
                <label for="cart_value" class="block text-sm font-medium text-gray-700">Giỏ hàng tối thiểu</label>
                <input type="text" name="cart_value" id="cart_value"
                  value="{{ old('cart_value', $coupon->cart_value) }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('cart_value')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-span-6 md:col-span-2">
                <label for="expiry_date" class="block text-sm font-medium text-gray-700">Ngày hết hạn</label>
                  <input type="date" name="expiry_date" value="{{ old('expiry_date', $coupon->expiry_date) }}" id="expiry_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('expiry_date')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <x-forms.feature-button back="{{ route('admin.coupons.index') }}" />
          </div>
        </div>
      </form>

    </div>
  </div>
@endsection
