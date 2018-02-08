@extends('main')
@section('content')
<h2>Shopping Cart</h2>
@foreach( $shopcart_list as $shopcartlist )
    <div class="col-md-3">
        <div class="panel panel-primary">
        <h3>{!! $shopcartlist['product']->name !!}</h3>
        <span>{!! $shopcartlist['product']->brand->name !!}</span>
        <p>
        	<div class="col-md-8" style="padding: 0px">
        		<img src="{!! url('images/products/'.$shopcartlist['firstimage']->product_id.'/'.$shopcartlist['firstimage']->image.'') !!}" class="img-responsive" style="max-height: 150px;">
        	</div>
        	<div class="col-md-4" style="padding: 10px 0px 0px 0px">
        		Qt: {!! $shopcartlist->quantity !!}
        		<br>
        		$ {!! $shopcartlist->product_value !!}
        	</div>

        	<div class="row"></div>

        	<div class="col-md-12" style="text-align: right;">
        		<a href="{!! url('/cart/remove/'.$shopcartlist->id.'') !!}">
        			Remove this
        		</a>
        	</div>

        </p>
         </div>
    </div>
@endforeach
    <div class="col-md-12">
        <h3>Total:
        <?php if( isset($shopcart_sum) ){ echo '$'.$shopcart_sum; } else echo '$0.00' ?></h3>
        <a class="btn btn-primary" href="{!! url('/checkout') !!}">Checkout</a>
    </div>
@endsection