<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Mart - @yield('title', config('app.name', '@Master Layout'))</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Favicons -->
    <link href="{{ asset('storage/images/admin/favicon.png') }}" rel="icon">
    <link href="{{ asset('storage/images/admin/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('storage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}"/>
    @livewireStyles

    <x-head.tinymce-config/>
    {{-- <x-alert /> --}}
    {{-- Custom styles and link --}}
    @stack('styles')
</head>

<body>

@include('admin.shared.header')
@include('admin.shared.sidebar')
<main id="main" class="main">
    {{-- <x-dialog z-index="z-50" blur="sm" align="center"/> --}}
    <x-notifications z-index="z-50"
                     timeout="5000"
    />
    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
<!-- Vendor JS Files -->
<script src="{{ asset('storage/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@livewireScripts
@wireUiScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="{{ asset('js/admin.js') }}"></script>
{{-- Custom js and link --}}
@stack('scripts')

</body>

</html>
