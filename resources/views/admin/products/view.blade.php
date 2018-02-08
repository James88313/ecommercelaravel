@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Product List
                    <a class="pull-right" href="{{ url('admin/products/create') }}">Add Product</a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Tags</th>
                        <th>Actions</th>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>
                                @foreach($product->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                                </td>
                                <td>
                                    <!-- <a href="products/{{ $product->id }}/edit" class="btn btn-default">Edit</a> -->
                                    {!! Form::open(['method' => 'DELETE', 'url' => url('admin/products/'.$product->id.''), 'style' => 'display:inline;']) !!}
                                <button type="submit" class="btn btn btn-danger">Delete</a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection