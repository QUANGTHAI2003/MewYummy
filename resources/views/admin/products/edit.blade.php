@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý sản phẩm" pageTitle="Sửa sản phẩm" />
  <h3 class="text-3xl font-medium text-gray-700">Sửa sản phẩm</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
      <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <input type="hidden" name="id" value="{{ $product->id }}">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="col-span-9 sm:col-span-4">
              <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Tến sản phẩm</label>
                  <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                    class="input-form">
                  @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="slug" class="my-2 block text-sm font-medium text-gray-700">Slug</label>
                  <input type="text" slug="slug" id="slug" value="{{ old('slug', $product->slug) }}"
                    class="input-form">
                  @error('slug')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="categories" class="my-2 block text-sm font-medium text-gray-700">Danh mục</label>
                  <select class="input-form" name="categories" id="categories" autocomplete="categories">
                    <option disabled selected value> -- Chọn danh mục</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if (old('categories', $product->category_id) == $category->id) selected @endif>
                        {{ $category->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('categories')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="stock_qty" class="my-2 block text-sm font-medium text-gray-700">Số lượng</label>
                  <input type="number" name="stock_qty" id="stock_qty" min="0"
                    value="{{ old('stock_qty', $product->stock_qty) }}" class="input-form appearance-number-none">
                  @error('stock_qty')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="grid grid-cols-3 gap-6 py-3 md:grid-cols-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="regular_price" class="my-2 block text-sm font-medium text-gray-700">Giá thường</label>
                  <input type="number" name="regular_price" id="regular_price"
                    value="{{ old('regular_price', $product->regular_price) }}"
                    class="input-form appearance-number-none">
                  @error('regular_price')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="sale_price" class="my-2 block text-sm font-medium text-gray-700">Giá khuyến mãi</label>
                  <input type="number" name="sale_price" id="sale_price"
                    value="{{ old('sale_price', $product->sale_price) }}" class="input-form appearance-number-none">
                  @error('sale_price')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-span-6 sm:col-span-6">
                <label for="editor" class="my-2 block text-sm font-medium text-gray-700">Mô tả sản phẩm</label>
                <textarea id="editor" name="description" rows="3"
                  class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                  placeholder="">{{ old('description', $product->description) }}</textarea>
                @error('description')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="grid grid-cols-1 gap-1 pt-3">
              Cover image
              <div class="col-span-1 pt-3 sm:col-span-1 lg:col-span-3">
                <label for="upload-image"
                  class="drag-area h- dark:hover:bg-bray-800 relative flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 p-3 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 xs:h-[300px]">
                  @php
                    $image = asset('storage/images/products/' . $product->product_images[0]->image);
                    if (!file_exists(public_path() . '/storage/images/products/' . $product->product_images[0]->image)) {
                        $image = asset('storage/' . $product->product_images[0]->image);
                    }
                  @endphp

                  <img src="{{ $image }}" alt="{{ $product->name }}" id="img-preview"
                    class="rounded-1 absolute inset-2 left-1/2 -translate-x-1/2 transform text-center"
                    style="height: -webkit-fill-available;">
                  <div class="flex flex-col items-center justify-center pb-6 pt-5">
                    <svg aria-hidden="true" class="mb-3 h-10 w-10 text-gray-400" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                      <span class="font-semibold">Click to upload</span> or drag and
                      drop
                    </p>
                    <p class="filename text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or
                      GIF
                      (MAX. 800x400px)</p>
                    <input type="file" name="image" class="hidden" value="{{ old('image', $product->product_images[0]->image) }}"
                      id="upload-image" onchange="loadFile(event)" />
                  </div>
                </label>
                @error('image')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                @push('scripts')
                  <script>
                    let loadFile = function(event) {
                      let image = document.getElementById('img-preview');
                      image.src = URL.createObjectURL(event.target.files[0]);
                    };
                  </script>
                @endpush

              </div>
            </div>
            <x-forms.feature-button back="{{ route('admin.products.index') }}" />
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#name').change(function() {
        let name = $(this).val();
        let slug = name.toLowerCase().split(',').join('').replace(/\s/g, "-");
        slug = removeAccents(slug);
        $('#slug').val(slug);
      });

      function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
      }
    });
  </script>
@endpush
