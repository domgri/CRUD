<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- Fonts -->
      <!--
         <link rel="dns-prefetch" href="//fonts.gstatic.com">
         <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
         -->
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="{{('http://code.jquery.com/jquery-latest.js')}}"></script>
   </head>
   <body class="gif-manage">
      @include('_includes.mainNav')
      @include('_includes.manageNav')
      <div class="management-area " id="app">
         @yield('content')
      </div>
      @stack('scripts')
   </body>
</html>
