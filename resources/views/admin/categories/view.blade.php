@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Categories List
                    <a class="pull-right" href="{{ url('admin/categories/create') }}">Add Category</a>
                </div>
                <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('success')  }}
                    </div>
                @endif
                    <table class="table">
                        <th>Id</th>
                        <th>Name</th>
						<th>Description</th>
						<th>Image</th>
                        <th>Actions</th>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
							<td>{{ $category->description }}</td>
							<td>{{ $category->image }} <a class="imagelink btn btn-default pull-right colorbox" data-fancybox href="{{ URL::asset('public/images/categories/'.$category->image) }}">Open Image</a></td>
                            <td>
                                <a href="{!! url('admin/categories/'.$category->id.'/edit') !!}" class="btn btn-default">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/categories/'.$category->id.''), 'style' => 'display:inline;']) !!}
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