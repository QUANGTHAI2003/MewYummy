@extends('layouts.admin')

@section('content')
  <x-page-title currentPage="Quản lý người dùng" pageTitle="Danh sách người dùng" />
  <div class="mt-2 flex items-center justify-between">
    <h3 class="text-3xl font-medium text-gray-700">Danh sách người dùng</h3>
    <div class="flex gap-x-3">
      <div class="text-left">
        <a href="{{ route('admin.users.create') }}"
          class="btn items-center rounded bg-green-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg">
          Thêm nhân viên
        </a>
      </div>
      {{-- <div class="text-left">
        <a href="{{ route('admin.products.create') }}"
          class="btn items-center rounded bg-green-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg">
          Thêm sản phẩm
        </a>
      </div> --}}
    </div>
  </div>
  <livewire:admin.authorizations.user-management>
  @endsection
