<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Abdurrahim Yahya Muazu">
    <meta name="generator" content="Hugo 0.79.0">
    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
      body{
        font-family: 'Nunito', sans-serif;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @font-face {
        font-family: 'Tahoma';
        src: url(assets/font.ttf);
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="/assets/carousel.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet">
  </head>
  <body style="background: #dfe5e8">

    @include('layouts.partials.header')

        @yield('content')

    @include('layouts.partials.footer')
    
    
    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script> 
    @livewireScripts
  </body>
</html>