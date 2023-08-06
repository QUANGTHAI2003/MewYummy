@extends('layouts.admin')

@section('content')
    <x-page-title currentPage="Quản lý sản phẩm" pageTitle="Danh sách sản phẩm"/>

    <livewire:admin.orders.order-detail :orderId="$id" />
@endsection
