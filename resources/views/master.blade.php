<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  <style>
    .footer{
      height: auto;
      background-color: #f8f8f8;
      padding-bottom: 20px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    html {
      position: relative;
      min-height: 100%;
    }
    body {
      /* Margin bottom by footer height */
      margin-bottom: 60px;
      }
  </style>
  @yield('head')
</head>
<!-- end of style | start of navbar -->
<body>
  <div class="navbar-wrapper">
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
                <li><a href="{{url('admin/toko')}}">Seller</a></li>
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
  </div>
    @yield('content')

  <!-- this is footer -->
  <footer class="footer">
    <div class="container-fluid" id="footer">
      <h1 align="center"> This is Footer</h1>
      <div class="container">
        <div class="col-md-4">
          <h3>This is Footer tab 1</h3>
          <p>
            Contact @EaEaEa<br>
            Address Mangan @ti<br>
            Website ManganATi.com<br>
          </p>
        </div>
        <div class="col-md-4">
          <h3>This is Footer tab 2</h3>
          <p>Ngomong Kuro</p>
        </div>
        <div class="col-md-4">
          <h3>This is Footer tab 3</h3>
          <p>Ngomong Kuro</p>
        </div>
      </div>

    </div>
  </footer>
</body>
