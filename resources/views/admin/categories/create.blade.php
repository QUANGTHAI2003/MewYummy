@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý danh mục" pageTitle="Thêm danh mục" />
  <h3 class="text-3xl font-medium text-gray-700">Thêm danh mục</h3>
  <div class="mb-10 mt-10 md:grid md:gap-6">
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 md:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                <input name="name" id="name" value="{{ old('name') }}" type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('name')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              {{-- <div class="col-span-3 sm:col-span-2">
                <label for="published" class="my-2 block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-4">
                  <input type="radio" class="form-radio" name="is_active" id="published" value="1"
                    {{ old('is_active') == 1 ? 'checked' : '' }}>
                  <span class="ml-2" style="margin-left:6px;margin-right:10px;">Show</span>

                  <input type="radio" class="form-radio" name="is_active" id="is_active" value="0"
                    {{ old('is_active') == 0 ? 'checked' : '' }}>
                  <span class="ml-2 mr-2" style="margin-left:6px; ">Hide</span>
                </div>
                @error('is_active')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div> --}}
              <div class="col-span-6 md:col-span-3">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('slug')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

            </div>
            <x-forms.feature-button back="{{ route('admin.categories.index') }}" />
          </div>
        </div>
      </form>

    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#name').keyup(function() {
        var name = $(this).val();
        var slug = name.toLowerCase().split(',').join('').replace(/\s/g, "-");
        slug = removeAccents(slug);
        $('#slug').val(slug);
      });

      function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
      }
    });
  </script>
@endpush
