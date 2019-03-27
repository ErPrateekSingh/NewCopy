<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- meta tags in head -->
    @include('layouts.partials.headMeta')

    <!-- meta title tags in head -->
    @include('layouts.partials.headTitle')

    <meta name="description" content=""><!--To be added Later-->
    <meta name="keywords" content=""><!--To be added Later-->
    <meta name="author" content=""><!--To be added Later-->

    <!-- Schema.org markup for Google+ -->
    @include('layouts.partials.headGoogle')

    <!-- Twitter Card data -->
    @include('layouts.partials.headTwitter')

    <!-- Open Graph data -->
    @include('layouts.partials.headFacebook')

    <!--Laravel's stylesheet-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Custom Style on pages (If Required)-->
    @yield('styles')
</head>

<!-- Update your html tag to include the itemscope and itemtype attributes. -->

<body itemscope itemtype="http://schema.org/WebPage">
    <div id="app">
        <!--Partial for navBar -->
        @include('_includes.nav.mainNav')

        <!--Yields the content of the pages -->
        @yield('content')

        <!--Partial for Footer -->
        @include('_includes.footer.mainFooter')

        <!--Partial for Modals -->
        @include('layouts.partials.bodyModal')
    </div>
    <!--Laravel's Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- script for Cookies -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <!--Custom Scripts on pages (If Required)-->
    @yield('scripts')
</body>

</html>
