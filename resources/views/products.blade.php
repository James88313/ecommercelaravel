@extends('main')
@section('content')
@foreach ($products as $product)
       <div class="product col-md-3">
            @if($product['firstimage']['image'] != null)
            <img src="{!! url('images/products/'.$product->id.'/'.$product['firstimage']['image'].'') !!}" />
            @else
            <img src="{!! url('images/products/no-image.jpg') !!}" />
            @endif
            <h3>{{ $product->name }}</h3>
            <span class="brand">{{ $product->brand->name }}</span>
            <span class="price">$ {!! $product->price !!}</span>
            <a href="{!! url('/details/'.$product->id.'/'.$product->slug.'') !!}">[+] details</a>
        </div>
@endforeach
@endsection