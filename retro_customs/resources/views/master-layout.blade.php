<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="icon" href="{{asset('assets/retrocustoms_mascot.png')}}" type="image/png" sizes="16x16">
  <link rel = "stylesheet" href = "{{asset('css/header-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/about-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/home-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/products-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/register-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/login-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/admin-profile-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/user-profile-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/console-body-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/build-to-order-style.css')}}">
  <link rel = "stylesheet" href = "{{asset('css/order-body-style.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>@yield('title')</title>
</head>
<body>
  @include('subview.navbar')
  
  <main>
    @yield('content')
  </main>


  @include('subview.footer')
  <script src="{{ asset('js/header-script.js') }}"></script>
</body>
</html>