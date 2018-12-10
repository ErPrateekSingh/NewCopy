<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
   <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Zendur - Management</title>

   <meta name="description" content=""><!--To be added Later-->
   <meta name="keywords" content=""><!--To be added Later-->
   <meta name="author" content=""><!--To be added Later-->

   <!-- Schema.org markup for Google+ -->
   <meta itemprop="name" content="The Name or Title Here">
   <meta itemprop="description" content="This is the page description">
   <meta itemprop="image" content="http://www.example.com/image.jpg">

   <!-- Twitter Card data -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:site" content="@publisher_handle">
   <meta name="twitter:title" content="Page Title">
   <meta name="twitter:description" content="Page description less than 200 characters">
   <meta name="twitter:creator" content="@author_handle">
   <!-- Twitter summary card with large image must be at least 280x150px -->
   <meta name="twitter:image:src" content="http://www.example.com/image.jpg">

   <!-- Open Graph data -->
   <meta property="og:title" content="Title Here" />
   <meta property="og:type" content="article" />
   <meta property="og:url" content="http://www.example.com/" />
   <meta property="og:image" content="http://example.com/image.jpg" />
   <meta property="og:description" content="Description Here" />
   <meta property="og:site_name" content="Site Name, i.e. Moz" />
   <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
   <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
   <meta property="article:section" content="Article Section" />
   <meta property="article:tag" content="Article Tag" />
   <meta property="fb:admins" content="Facebook numberic ID" />

   <meta name="robots" content="index, follow"><!--To be checked and modify Later-->
   <meta name="mobile-web-app-capable" content="yes"><!--To be checked and modify Later-->
   <meta name="apple-mobile-web-app-capable" content="yes"><!--To be checked and modify Later-->
   <meta name="apple-mobile-web-app-status-bar-style" content="default"><!--To be checked and modify Later-->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"><!--Laravel's stylesheet-->
   @yield('styles')
</head>
<!-- Update your html tag to include the itemscope and itemtype attributes. -->
<body itemscope itemtype="http://schema.org/WebPage">
   <div id="app">
      @include('_includes.nav.mainNav')

      @yield('content')

      @include('_includes.footer.mainFooter')
   </div>

   <!--SideNav Modal Starts Here-->
   @include('_includes.modals.sideNavModal')

   <!--City Modal Starts Here-->
   @include('_includes.modals.cityModal')

   <!--Search Modal Starts Here-->
   @include('_includes.modals.searchModal')

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
   @yield('scripts')
</body>
</html>
