@extends('layouts.admin')

@section('content')
    <x-page-title currentPage="Quản lý danh mục" pageTitle="Danh sách danh mục"/>
    <h3 class="text-3xl font-medium text-gray-700">Danh sách danh mục</h3>
    <div class="mt-10">
        <a href="{{ route('admin.categories.create') }}"
           class="btn items-center rounded bg-green-600 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg">
            Thêm danh mục
        </a>
    </div>
    <livewire:admin.categories.admin-categories/>
@endsection
