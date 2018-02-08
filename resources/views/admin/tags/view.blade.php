@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tag List
                    <a class="pull-right" href="{{ url('admin/tags/create') }}">Add Tag</a>
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
                        <th>Actions</th>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{!! url('admin/tags/'.$tag->id.'/edit') !!}" class="btn btn-default">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/tags/'.$tag->id.''), 'style' => 'display:inline;']) !!}
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