<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.includes.meta')
    @include('frontend.includes.styles')
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="body">
    @include('frontend.includes.navbar')
    @include('frontend.includes.login')
    @include('frontend.includes.menus')
    @yield('front')
    @include('sweetalert::alert')
    @include('frontend.includes.footer')
    @include('frontend.includes.scripts')
</div>
@yield('scripts')
</body>
</html>
