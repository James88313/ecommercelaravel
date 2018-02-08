<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Project created for Resultados Digitais">
	<meta name="author" content="Daniel Paz">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administration - E-commerce Laravel</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- LOAD MDB BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/css/mdb.min.css">
	<!-- LOAD FANCYBOX3 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
	<!-- LOAD OWL CAROUSEL STYLE -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" />
	<!-- LOAD STYLES CSS -->
	<link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
	<!-- LOAD STYLES CSS -->
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
	<!-- LOAD FONTAWESOME CSS -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
  <!-- LOAD SELECT2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- LOAD JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- LOAD MDB JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js"></script>
	<!-- LOAD jQuery MASK -->
	<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
  <!-- LOAD SELECT 2 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- LOAD FANCYBOX 3 JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
	<!-- LOAD SCRIPTS JS -->
	<script src="{{ asset('js/scripts.min.js') }}"></script>
</head>
<body>
	<div class="offcanvas-container" id="mobile-menu"><a class="account-link" href="account-orders.html">
        <div class="user-ava"><img src="img/account/user-ava-md.jpg" alt="Daniel Adams">
        </div>
        <div class="user-info">
          <h6 class="user-name">Daniel Adams</h6>
        </div></a>
      <nav class="offcanvas-menu">
        <ul class="menu">
          <li class="has-megamenu"><a href="home"><span>Home</span></a></li>
          <li class="has-megamenu"><a href="about"><span>About</span></a></li>
          <li class="has-megamenu"><a href="index.html"><span>Laptops</span></a></li>
          <li class="has-megamenu"><a href="index.html"><span>Cellphones</span></a></li>
          <li class="has-megamenu"><a href="index.html"><span>Gadgets</span></a></li>
        </ul>
      </nav>
</div>
<header class="navbar navbar-sticky navbar-stuck">
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#mobile-menu)-->
          <a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="index.html">
          <img src="{{ asset('images/logo-store.png') }}" alt="General Store"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          @if(Auth::guest())
          <li class="has-megamenu {{ Request::is('/') ? "active" : "" }}"><a href="/"><span>Dashboard</span></a></li>
           @endif
          @if(!Auth::guest())
          <li class="has-megamenu {{ Request::is('about') ? "active" : "" }}"><a href="{!! url('admin/users') !!}"><span>Customers</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/categories') !!}"><span>Categories</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/brands') !!}"><span>Brands</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/products') !!}"><span>Products</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/tags') !!}"><span>Tags</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/coupons') !!}"><span>Coupons</span></a></li>
          <li class="has-megamenu"><a href="{!! url('admin/orders') !!}"><span>Orders</span></a></li>
          @endif
        </ul>
      </nav>
      <!-- Toolbar-->
      @if(!Auth::guest())
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="account"><a href="account-orders.html"></a>
              <i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
                  <div class="user-info">
                    <h6 class="user-name">
                      {!! Auth::user()->name; !!}</h6>
                  </div>
                </li>
                  <li><a href="account-profile.html">My account</a></li>
                <li class="sub-menu-separator"></li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endif
    </header>
    <div class="container main">
        <div id="content" class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>