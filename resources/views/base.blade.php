<?php
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css"><link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <style media="screen">
      .navigasi {
        position: fixed;
          left: 0;
          top: 0;
          width: 100%;
      }
    </style>
    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navigasi">
      <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <h5 class="text-white h4">Motor Kalcer</h5>
            <span class="text-muted">Toko tepat untuk, roda dua mu.</span>
            <br>
            <a href="{{ route('index')}}"><b>HOME</b></a>
            <?php  if (Auth::check()) { ?>
              <br>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <b>{{ __('LOGOUT') }}</b>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            <?php } else { ?>
            <br>
            <a href="{{ route('login')}}"><b>LOGIN</b></a>
            <?php } ?>
            <br>
            <a href="{{ route('shop')}}"><b>SHOP</b></a>
            <br>
            <a href="{{ route('about')}}"><b>ABOUT</b></a>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
      </div>
    </nav>


    @yield('content')



  </body>
  <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</html>
