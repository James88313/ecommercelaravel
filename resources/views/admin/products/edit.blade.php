@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product
                    <a class="pull-right" href="{{ url('admin/products') }}">View Products</a>
                </div>
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        {{ Session::get('success')  }}
                    </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>                
                @endif
                    {!! Form::model($product, ['method' => 'PATCH', 'url' => 'admin/products/'.$product->id, 'files' => true]) !!}
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::input('text', 'title', $product->name, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        {!! Form::label('desc', 'Description') !!}
                        {!! Form::input('textarea', 'description', $product->description, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                        {!! Form::label('image', 'Saved Images') !!}
                        <img src="" style="width:100%;" class="img-thumbnail img-responsive" />
                        {!! Form::label('image', 'Image') !!}
                        <input type="file" name="images[]" multiple />
                        {!! Form::label('stock', 'Price') !!}
                        {!! Form::input('text', 'price', $product->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                         {!! Form::label('quantity', 'Quantity') !!}
                        {!! Form::input('text', 'quantity', $product->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
                        {!! Form::label('categories', 'Category') !!}
                        <select class="form-control select2" name="category">
                        @foreach($categories as $category)
                            <option
                            // TEST IF THE PRODUCT CATEGORY IS THE SAME AS CATEGORY ID
                            @if($category->id == $product->category_id) selected @endif
                             value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                        {!! Form::label('brands', 'Brand') !!}
                        <select class="form-control select2" name="brand">
                        @foreach($brands as $brand)
                            <option
                            // TEST IF THE PRODUCT BRAND IS THE SAME AS BRAND ID
                            @if($brand->id == $product->brand_id) selected @endif
                             value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                        </select>
                        {!! Form::label('tags', 'Tags') !!}
                        <br>
                        @foreach($tags as $tag)

                        <div class="col-md-3">

@php
$inicio = 0;
$selection = '';
    while ( $inicio < count($product['tags']) ){
        if( $product['tags'][$inicio]['id'] == $tag->id ){
            $selection = ' checked="checked"';
        }
    $inicio++;
    }
@endphp

<label>
<input {!! $selection !!} type="checkbox" value="{{ $tag->id }}" name="tags[]" /> {{ $tag->name }}
</label>

@php
$selection = '';
@endphp

                        </div>

                        @endforeach
                        <div class="row">
                        </div> 
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    <script type="text/javascript">
    $(document).ready(function() {
        $('.select2-multi').select2();
        $('.select2').select2();
        
    });
</script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection