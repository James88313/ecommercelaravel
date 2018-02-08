@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Brand List
                    <a class="pull-right" href="{{ url('admin/brands/create') }}">Add Brand</a>
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
						<th>Image</th>
                        <th>Actions</th>
                        <tbody>
                        @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
							<td>{{ $brand->image }} <a class="imagelink btn btn-default pull-right colorbox" data-fancybox href="{{ URL::asset('public/images/brands/'.$brand->image) }}">Open Image</a></td>
                            <td>
                                <a href="{!! url('admin/brands/'.$brand->id.'/edit') !!}" class="btn btn-default">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/brands/'.$brand->id.''), 'style' => 'display:inline;']) !!}
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