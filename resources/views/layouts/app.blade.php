<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{url('assets/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{url('assets/css/latocss.css')}}" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('')}}">TOKOKU.COM</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{url('')}}">Home</a></li>
          <li><a href="{{url('about')}}">About</a></li>
          <li><a href="{{url('portofolio')}}">Portofolio</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
            <ul class="dropdown-menu">
              @if (Auth::guest())
              <li><a href="{{url('admin/user')}}">User</a></li>
              <li><a href="{{url('product')}}">Product</a></li>
              <li><a href="{{url('admin/toko')}}">Toko</a></li>
              @else
              <li><a href="{{url('admin/user')}}">User</a></li>
              <li><a href="{{url('admin/product')}}">Product</a></li>
              <li><a href="{{url('admin/toko')}}">Seller</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Another</li>
              <li><a href="#">Another Link (1)</a></li>
              <li><a href="#">Another Link (2)</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

    <!-- JavaScripts -->
    <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
