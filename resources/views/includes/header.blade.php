<div class="offcanvas-container" id="mobile-menu">
   <a class="account-link" href="{!! url('/account-orders') !!}">
      <div class="user-info">
         <h6 class="user-name">Daniel Adams</h6>
      </div>
   </a>
   <nav class="offcanvas-menu">
      <ul class="menu">
         <li class="has-megamenu {{ Request::is('/') ? "active" : "" }}"><a href="{!! url('/') !!}"><span>Home</span></a></li>
         <li class="has-megamenu {{ Request::is('about') ? "active" : "" }}"><a href="{!! url('/about') !!}"><span>About</span></a></li>
         @foreach($categories as $category)
         <li class="has-megamenu"><a href="{{ url('category/'.$category->slug) }}"><span>{{ $category->name }}</span></a></li>
         @endforeach
      </ul>
   </nav>
</div>
<header class="navbar navbar-sticky navbar-stuck">
   <div class="site-branding">
      <div class="inner">
         <!-- Off-Canvas Toggle (#mobile-menu)-->
         <a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
         <!-- Site Logo--><a class="site-logo" href="{!! url('/index') !!}">
         <img src="{{ asset('images/logo-store.png') }}" alt="General Store"></a>
      </div>
   </div>
   <!-- Main Navigation-->
   <nav class="site-menu">
      <ul>
         <li class="has-megamenu {{ Request::is('/') ? "active" : "" }}"><a href="{!! url('/') !!}"><span>Home</span></a></li>
         <li class="has-megamenu {{ Request::is('about') ? "active" : "" }}"><a href="{!! url('/about') !!}"><span>About</span></a></li>
         @foreach($categories as $category)
         <li class="has-megamenu"><a href="{{ url('category/'.$category->slug) }}"><span>{{ $category->name }}</span></a></li>
         @endforeach
      </ul>
   </nav>
   <!-- Toolbar-->
   <div class="toolbar">
      <div class="inner">
         <div class="tools">
            <div class="account">
               <a href="{!! url('/account-orders') !!}"></a>
               <i class="icon-head"></i>
               <ul class="toolbar-dropdown">
                  <li class="sub-menu-user">
                     <div class="user-info">
                        <h6 class="user-name">
                           @if(!Auth::guest())
                           {!! Auth::user()->name; !!}
                           @endif
                           @if(Auth::guest())
                           Welcome, Guest
                           @endif
                        </h6>
                     </div>
                  </li>
                  @if(!Auth::guest())
                  <li><a href="{{ url('account') }}">My account</a></li>
                  <li><a href="{{ url('orders') }}">Orders List</a></li>
                  <li class="sub-menu-separator"></li>
                  <li><a href="{{ url('logout') }}"> <i class="icon-unlock"></i>Logout</a></li>
                  @endif
                  @if(Auth::guest())
                  <li><a href="{{ url('login') }}">Login</a></li>
                  <li><a href="{{ url('register') }}">Register</a></li>
                  @endif
               </ul>
            </div>
            <div class="cart">
               <a href="{!! url('/cart') !!}"></a><i class="glyphicon glyphicon-shopping-cart"></i><span class="subtotal">
               <?php if( isset($shopcart_sum) ){ echo '$ ' .$shopcart_sum; } else echo '$ 0.00' ?>
               </span>
               <div class="toolbar-dropdown">
                  @foreach($shopcart_list as $shopcartlist)
                  <div class="dropdown-product-item">
                     <a class="dropdown-product-thumb">
                        <img src="{!! url('images/products/'.$shopcartlist['firstimage']['product_id'].'/'.$shopcartlist['firstimage']['image'].'') !!}" alt="{!! $shopcartlist['product']->name !!}" />
                     </a>
                     <div class="dropdown-product-info">
                        <a class="dropdown-product-title" href="">
                           {!! $shopcartlist['product']->name !!}</a>
                        <span class="dropdown-product-details">
                        {!! $shopcartlist->quantity !!}x       
                        {!! '$'.$shopcartlist['product']->price !!}
                        </span>
                     </div>
                  </div>
                  @endforeach



                  <div class="toolbar-dropdown-group">
                     <div class="column"><span class="text-lg">Total:</span></div>
                     <div class="column text-right"><span class="text-lg text-medium">
                        <?php if( isset($shopcart_sum) ){ echo '$'.$shopcart_sum; } else echo '$0.00' ?>
                        </span>
                     </div>
                  </div>
                  <div class="toolbar-dropdown-group">
                     <div class="column"><a class="btn btn-default" href="{!! url('/cart') !!}">View Cart</a></div>
                     <div class="column"><a class="btn btn-success" href="{!! url('/checkout') !!}">Checkout</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>