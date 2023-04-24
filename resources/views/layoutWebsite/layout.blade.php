<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{$settings->icon}}" type="">
      <title> @yield('title',  $settings->title )</title>
      <meta name ="description", content="@yield('meta_description',  $settings->description )">
    <meta name ="keywords", content="@yield('meta_keywords',  $settings->title )">
     @include('layoutWebsite.css')
   </head>
   <body class="sub_page">
    @include('layoutWebsite.header')
    @yield('body')
      @include('layoutWebsite.footer')
      @include('layoutWebsite.js')
   </body>
</html>