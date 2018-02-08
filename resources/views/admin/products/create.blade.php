@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product
                    <a class="pull-right" href="{{ url('admin/products') }}">View Products</a>
                </div>
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                    {!! Form::open(['url' => 'admin/products', 'files' => true]) !!}
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::input('text', 'title', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Title']) !!}
                        {!! Form::label('desc', 'Description') !!}
                        {!! Form::input('textarea', 'description', '', ['class' => 'form-control', 'autofocus', 'placeholder' => 'Description']) !!}
                        {!! Form::label('image', 'Images') !!}
                         <input type="file" name="images[]" multiple />
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::input('text', 'price', '', ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                        {!! Form::label('quantity', 'Quantity') !!}
                        {!! Form::input('text', 'quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
                        {!! Form::label('categories', 'Category') !!}
                        <select class="form-control select2" name="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                        {!! Form::label('brands', 'Brand') !!}
                        <select class="form-control select2" name="brand">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                        </select>
                        {!! Form::label('tags', 'Tags') !!}
                        <br>
                        @foreach($tags as $tag)
                            <!-- <option value="{{ $tag->id }}">{{ $tag->name }}</option> -->
                        <div class="col-md-2">
                            <input type="checkbox" value="{{ $tag->id }}" name="tags[]" />{{ $tag->name }}
                        </div>
                        @endforeach
                        <div class="row">
                        </div> 
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
 <script type="text/javascript">
    $(document).ready(function() {
        $('.select2-multi').select2();
        $('.select2').select2();
    });
</script>
@endsection