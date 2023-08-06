@extends('layouts.admin')

@section('content')
    <x-page-title currentPage="Quản lý sản phẩm" pageTitle="Danh sách sản phẩm"/>
    <h3 class="text-gray-700 text-3xl font-medium">Danh sách sản phẩm</h3>
    <div class="flex items-center justify-between mt-10">
        <div class=" text-left">
            <a href="{{ route('admin.products.create') }}"
               class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                Thêm sản phẩm
            </a>
        </div>
    </div>

    <livewire:admin.orders.admin-orders />
@endsection
