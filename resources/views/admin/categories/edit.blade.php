@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý danh mục" pageTitle="Sửa danh mục" />
  <h3 class="text-3xl font-medium text-gray-700">Edit Category</h3>
  <div class="mb-10 mt-10 md:grid md:gap-6">
    <div class="mt-5 md:col-span-2 md:mt-0">
      <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 md:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('name')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-span-6 md:col-span-3">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $category->slug }}"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('slug')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
              {{-- <div class="col-span-6 sm:col-span-6">
                                              <label for="Descrizione" class="block my-2 text-sm font-medium text-gray-700">Description</label>
                                              <textarea id="editor" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 w-full sm:text-sm border-gray-300 rounded-md" placeholder="">{{ old('description') }}</textarea>
                                          </div> --}}

            </div>
            <x-forms.featurebutton back="{{ route('admin.categories.index') }}" />
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
