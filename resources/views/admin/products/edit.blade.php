@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý sản phẩm" pageTitle="Sửa sản phẩm" />
  <h3 class="text-3xl font-medium text-gray-700">Sửa sản phẩm</h3>
  <div class="mb-10 mt-10 md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:col-span-6 md:mt-0">
        <livewire:admin.products.edit-product :id="$product->id">
    </div>
  </div>
@endsection
