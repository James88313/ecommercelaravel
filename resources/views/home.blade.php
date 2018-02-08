@extends('main')
@section('content')

<div id="products">

    <h2>Products</h2>

    <div class="owl-carousel">

        @foreach($products as $product)

        <div class="product">
            @if($product['firstimage']['image'] != null)
            <img src="{!! url('images/products/'.$product->id.'/'.$product['firstimage']['image'].'') !!}" />
            @else
            <img src="{!! url('images/products/no-image.jpg') !!}" />
            @endif
            <h3>{{ $product->name }}</h3>

            <span class="brand">{{ $product->brand->name }}</span>

            <span class="price">$ {!! number_format($product->price/100,2) !!}</span>
            <a href="{!! url('/details/'.$product->id.'/'.$product->slug.'') !!}">[+] details</a>

        </div>

        @endforeach

    </div>

</div>

<div id="brands">

    <h2>Brands</h2>

	<div class="owl-carousel">

	 @foreach($brands as $brand)

	 	<div>

	 		<img src="{{ URL::asset('images/brands/'.$brand->image) }}" alt="{{ $brand->name }}" />

	 	</div>

     @endforeach

     </div>

</div>

<script>

	$(document).ready(function(){

  $('.owl-carousel').owlCarousel({

    loop:true,

    margin:10,

    responsiveClass:true,

    responsive:{

        0:{

            items:1,

            nav:false

        },

        600:{

            items:2,

            nav:false

        },

        1000:{

            items:4,

            nav:false,

            loop:false

        }

    }

})

});

</script>

@endsection