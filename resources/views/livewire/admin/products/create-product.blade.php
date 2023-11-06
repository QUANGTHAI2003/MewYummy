<form enctype="multipart/form-data" wire:submit.prevent="addProduct">
  @csrf
  <input type="hidden" name="have_attribute" value="{{ $haveAttribute }}">
  <div class="overflow-hidden">
    <div class="mb-8 bg-white px-4 py-5 shadow sm:rounded-md sm:p-6">
      <div class="col-span-9 sm:col-span-4">
        <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
          <div class="col-span-6 sm:col-span-3">
            <label for="name" class="my-2 block text-sm font-medium text-gray-700">Tến sản phẩm</label>
            <input type="text" name="name" wire:model="name" wire:keyup="generateSlug" id="name"
              value="{{ old('name') }}" class="input-form">
            @error('name')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label for="slug" class="my-2 block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" wire:model="slug" id="slug" value="{{ old('slug') }}"
              class="input-form">
            @error('slug')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
          <div class="col-span-6">
            <label for="categories" class="my-2 block text-sm font-medium text-gray-700">Danh mục</label>
            <select class="input-form" name="categories" wire:model="category_id" id="categories"
              autocomplete="categories">
              <option disabled selected value> -- Chọn danh mục</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if (old('categories') == $category->id) selected @endif>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('category_id')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
    </div>
    <div class="overflow-hidden">
      <div class="mb-8 bg-white px-4 py-5 shadow sm:rounded-md sm:p-6">
        <div class="col-span-9 sm:col-span-4">
          <div class="grid grid-cols-3 gap-6 py-3 md:grid-cols-6">
            <div class="col-span-6 sm:col-span-2">
              <label for="stock_qty" class="my-2 block text-sm font-medium text-gray-700">Số lượng</label>
              <input type="number" wire:model.defer="stock_qty" name="stock_qty" id="stock_qty"
                value="{{ old('stock_qty') }}" class="input-form appearance-number-none">
              @error('stock_qty')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="regular_price" class="my-2 block text-sm font-medium text-gray-700">Giá thường</label>
              <input type="number" wire:model.lazy="regular_price" name="regular_price" id="regular_price"
                value="{{ old('regular_price') }}" class="input-form appearance-number-none">
              @error('regular_price')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
              <label for="sale_price" class="my-2 block text-sm font-medium text-gray-700">Giá khuyến mãi</label>
              <input type="number" wire:model.lazy="sale_price" name="sale_price" id="sale_price"
                value="{{ old('sale_price') }}" class="input-form appearance-number-none">
              @error('sale_price')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-span-6">
              <button wire:click.prevent="toggleHaveAttribute"
                class="w-full border-dashed border-cyan-500 border-2 rounded bg-white px-4 py-2 font-bold text-red-300">
                Thêm biến thế
              </button>
            </div>
          </div>
          @if ($haveAttribute)
            <div class="grid grid-cols-3 items-end gap-6 py-3 md:grid-cols-6">
              <div class="col-span-6">
                <label for="attributes" class="my-2 block text-sm font-medium text-gray-700">Biến thể</label>
                <select class="input-form" name="attributes" wire:change="add" wire:model="attr" autocomplete="off">
                  <option disabled selected value> -- Chọn biến thể</option>
                  @foreach ($attributes as $attribute)
                    <option value="{{ $attribute->id }}">
                      {{ $attribute->name }}
                    </option>
                  @endforeach
                </select>
                @error('attributes')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="grid grid-cols-3 items-end gap-6 py-3 md:grid-cols-6">
              @foreach ($inputs as $key => $value)
                <div style="grid-column: span 5 / span 3 !important;">
                  <label for="attr-{{ $key }}" class="my-2 block text-sm font-medium text-gray-700">
                    {{ $attributes->where('id', $attribute_arr[$key])->first()->name }}
                  </label>
                  <input type="text" wire:model="attribute_values.{{ $value }}" wire:keyup="attributeValue"
                    name="attr-{{ $value }}" id="attr-{{ $value }}" value="{{ old('attr-' . $value) }}"
                    class="input-form appearance-number-none">
                  @error('attribute_values.' . $value)
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-span-1">
                  <button wire:click.prevent="remove({{ $key }})"
                    class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                    Xóa
                  </button>
                </div>
              @endforeach
            </div>
            <div class="col-span-9 sm:col-span-4">
              <div class="relative overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                  <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        Lựa chọn
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Số lượng tồn kho
                      </th>
                      <th scope="col" class="px-6 py-3">
                        <span class="text-red-500">*</span>
                        Giá bán
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Giá khuyến mãi
                      </th>
                      {{-- <th scope="col" class="px-6 py-3">
                        Thao tác
                      </th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allAttributeValues as $attrValue)
                      <tr class="border-b bg-white align-baseline dark:border-gray-700 dark:bg-gray-800">
                        <th scope="row"
                          class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                          {{ $attrValue }}
                        </th>
                        <td class="px-6 py-4">
                          <input wire:model.defer="attribute_value_options_quantity.{{ $attrValue }}"
                            type="number" class="input-form appearance-number-none">
                          @error('attribute_value_options_quantity.' . $attrValue)
                            <span class="text-sm text-red-500">{{ $message }}</span>
                          @enderror
                        </td>
                        <td class="px-6 py-4">
                          <input wire:model.defer="attribute_value_options_price.{{ $attrValue }}" type="number"
                            class="input-form appearance-number-none">
                          @error('attribute_value_options_price.' . $attrValue)
                            <span class="text-sm text-red-500">{{ $message }}</span>
                          @enderror
                        </td>
                        <td class="px-6 py-4">
                          <input wire:model.defer="attribute_value_options_sale_price.{{ $attrValue }}"
                            type="number" class="input-form appearance-number-none">
                          @error('attribute_value_options_sale_price.' . $attrValue)
                            <span class="text-sm text-red-500">{{ $message }}</span>
                          @enderror
                        </td>
                        {{-- <td class="px-6 py-4">
                          <button type="button" wire:click="deleteAttributeValueOption({{ $attrValue }})"
                            title="Xóa" data-toggle="tooltip" data-placement="bottom"
                            class="hover:shadow-lgfocus:bg-blue-700 focus:ring-0active:bg-red-800 active:shadow-lgtransition ml-2 mr-4 rounded bg-red-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md duration-150 ease-in-out hover:bg-red-700 focus:shadow-lg focus:outline-none">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </td> --}}
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="overflow-hidden">
      <div class="mb-8 bg-white px-4 py-5 shadow sm:rounded-md sm:p-6">
        <div class="col-span-9 sm:col-span-4">
          <div wire:ignore class="col-span-6 sm:col-span-6">
            <label for="editor" class="my-2 block text-sm font-medium text-gray-700">Mô tả sản phẩm</label>
            <textarea id="editor" wire:model="description" name="description" rows="3"
              class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              placeholder="">{{ old('description') }}</textarea>
            @error('description')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="grid grid-cols-1 gap-1 pt-3">
          Ảnh đại diện
          <div class="col-span-1 pt-3 sm:col-span-1 lg:col-span-3">
            <label for="upload-image"
              class="drag-area h- dark:hover:bg-bray-800 relative flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 p-3 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 xs:h-[300px]">
              @if($image)
              <img src="{{ $image->temporaryUrl() }}" alt="" id="img-preview"
              class="rounded-1 absolute inset-2 left-1/2 -translate-x-1/2 transform text-center"
              style="height: -webkit-fill-available;">
              @endif
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
                <input type="file" name="image" wire:model="image" class="hidden" id="upload-image"
                  onchange="loadFile(event)" />
              </div>
            </label>
            @error('image')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="grid grid-cols-1 gap-1 pt-3">
          Ảnh chi tiết
          <div class="flex w-full items-center justify-center">
            <label for="dropzone-file"
              class="relative dark:hover:bg-bray-800 flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              @if ($images)
                <div class="flex items-center justify-center gap-x-1  rounded-1 absolute inset-2 left-1/2 -translate-x-1/2 transform text-center">
                    @foreach($images as $new_image)
                        <img src="{{ $new_image->temporaryUrl() }}" alt="" />
                    @endforeach
                </div>
                @endif
              <div class="flex flex-col items-center justify-center pb-6 pt-5">
                <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                    upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
              </div>
              <input id="dropzone-file" multiple wire:model="images" type="file" class="hidden" />
            </label>
            @error('images')
              <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <x-forms.feature-button back="{{ route('admin.products.index') }}" />
      </div>
    </div>
</form>
