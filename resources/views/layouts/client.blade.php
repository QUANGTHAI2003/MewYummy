<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Online Mart - @yield('title', config('app.name', '@Master Layout'))</title>
  {{-- Favicon --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}" />

  {{-- <link href="{{ asset('storage/vendor/font/fontawesome-free-6.2.1-web/css/all.min.css') }}" rel="stylesheet"> --}}
  <link href="https://kit-pro.fontawesome.com/releases/v6.2.0/css/pro.min.css" rel="stylesheet">
  <link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('plugins/swiperjs/swiper-bundle.min.css') }}" rel="stylesheet">
  {!! RecaptchaV3::initJs() !!}

  @stack('styles-plugins')
  <link rel="stylesheet" href="{{ mix('css/client.css') }}" />
  @livewireStyles

  {{-- Plugins CSS --}}
  {{-- Custom styles and link --}}
  @stack('styles')
</head>

<body>
  @if (!in_array(Route::currentRouteName(), ['login', 'register']))
    @include('clients.shared.header')
  @endif

  <x-notifications z-index="z-50" />
  {{-- <x-dialog z-index="z-50" blur="sm" align="center"/> --}}
  {{-- <x-alert></x-alert> --}}

  @yield('content')

  @if (!in_array(Route::currentRouteName(), ['login', 'register']))
    @include('clients.shared.footer')
  @endif

  <script src="{{ mix('js/app.js') }}"></script>

  {{-- Plugins JS --}}

  <script src="{{ asset('plugins/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ mix('js/client.js') }}"></script>
  <script src="{{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('plugins/swiperjs/swiper-bundle.min.js') }}"></script>
  @livewireScripts
  @wireUiScripts
  @stack('scripts')
  {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</body>

</html>
