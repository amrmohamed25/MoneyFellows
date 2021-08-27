<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
          rel="stylesheet">
@yield('style')
{{--    {{$style}}--}}


    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body data-spy="scroll" data-target=".fixed-top">
<x-jet-banner/>

{{--<div class="min-h-screen bg-gray-100">--}}
    @livewire('navigation-menu')

    <!-- Page Heading -->
{{--@if (isset($header))--}}
    @yield('header')
{{--    {{ $header }}--}}
{{--@endif--}}

<!-- Page Content -->
@yield('slot')
{{--        {{ $slot }}--}}

{{--</div>--}}

@stack('modals')

@livewireScripts
<script src="{{asset('js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="{{asset('js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<!-- jQuery Easing for smooth scrolling between anchors -->
<script src="{{asset('js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
<script src="{{asset('js/validator.min.js')}}"></script>
<!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="{{asset('js/scripts.js')}}"></script> <!-- Custom scripts -->
@yield('scripts')
</body>
</html>
