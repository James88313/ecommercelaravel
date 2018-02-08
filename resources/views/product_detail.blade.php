@extends('main')
@section('content')
<form action="{!! url('details/'.$id.'/'.$slug.'/add') !!}" method="POST">
{{ csrf_field() }}
<div id="products">
    <h2>Products Detail</h2>
<div class="col-md-5">
	<div style="border:1px solid #ccc; display:inline-block; line-height:0;">
    	<img class="xzoom" src="{!! url('images/products/'.$products->id.'/'.$products['firstimage']['image'].'') !!}" xoriginal="{!! url('images/products/'.$products->id.'/'.$products['firstimage']['image'].'') !!}" />
    </div>
	<div class="thumbs">
    	@foreach($products['allimage'] as $productsimagens)
    		<a href="{!! url('images/products/'.$productsimagens['product_id'].'/'.$productsimagens['image'].'') !!}" style="display: inline-block;">
    	        <img style="height: 90px; margin: 15px 3px" src="{!! url('images/products/'.$productsimagens['product_id'].'/'.$productsimagens['image'].'') !!}" class="xzoom-gallery thumb" align="left" />
			</a>
    	@endforeach
	</div>
</div>

<div class="col-md-7">
    <label>Name:</label> {!! $products->name !!} <br>
    <label>Price:</label> $ {!! number_format($products->price/100,2) !!} <br>
    <label>Description:</label> {!! $products->description !!} <br>
    <label>Quantity:</label>
    <input type="text" name="quantity" class="form-control" style="width: 5%;" required="required">
	<div class="clearfix"></div>
    <button class="btn btn-primary btn-buy">Add to Cart</button>
</div>


<script type="text/javascript">
	$(document).ready(function() {

        //Integration with FancyBox 3 plugin
        $(".xzoom, .xzoom-gallery").xzoom();

        //Integration with fancybox version 3 plugin
        $(".xzoom:first").bind('click', function(event) {
            var xzoom = $(this).data('xzoom');
            xzoom.closezoom();
            var i, images = new Array();
            var gallery = xzoom.gallery().ogallery;
            var index = xzoom.gallery().index;
            for (i in gallery) {
                images[i] = {src: gallery[i]};
            }
            $.fancybox.open(images, {loop: false}, index);
            event.preventDefault();
        });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.select2').select2();
    });
</script>
</div>
</form>
@endsection