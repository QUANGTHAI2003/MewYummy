@extends('layouts.admin')

@section('content')
<x-page-title currentPage="Quản lý biến thể" pageTitle="Sửa biến thể"/>
  <h3 class="text-3xl font-medium text-gray-700">Thêm sản phẩm</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
      <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="col-span-9 sm:col-span-4">
              <div class="grid grid-cols-3 gap-6 md:grid-cols-6">
                <div class="col-span-6">
                  <label for="name" class="my-2 block text-sm font-medium text-gray-700">Tến biến thể</label>
                  <input type="text" name="name" id="name" value="{{ old('name', $attribute->name) }}" class="input-form">
                  @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            <x-forms.feature-button back="{{ route('admin.attributes.index') }}" />
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
