<script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
<!-- end of style | start of navbar -->
      <div class="navbar-wrapper">
        <div class="container-fluid">
          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('')}}">E-Commerce</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="{{url('')}}">Home</a></li>
                  <li><a href="{{url('about')}}">About</a></li>
                  <li><a href="{{url('portofolio')}}">portofolio</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('user')}}">User</a></li>
                      <li><a href="{{url('product')}}">Product</a></li>
                      <li><a href="{{url('seller')}}">Seller</a></li>
                      <li role="separator" class="divider"></li>
                      <li class="dropdown-header">Another</li>
                      <li><a href="#">Another Link (1)</a></li>
                      <li><a href="#">Another Link (2)</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    @yield('content')
  <footer>
    <div class="container" align="center">
      <h1> This is Footer</h1>
    </div>
  </footer>
