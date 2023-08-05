@extends('layouts.client')
@section('content')
  <!-- Breadcrumb -->
  <x-breadcrumb currentLink="cart" currentPageName="Giỏ hàng" />

  <livewire:client.cart.cart-component />
@endsection
