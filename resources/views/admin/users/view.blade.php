@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Customers List
                    <a class="pull-right" href="{{ url('admin/users/create') }}">Add Customer</a>
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
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Birth</th>
                        <th>Phone</th>
                        <th>Actions</th>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->cpf }}</td>
                            <td>{{ $user->birth }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{!! url('admin/users/'.$user->id.'/edit') !!}" class="btn btn-default">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/users/'.$user->id.''), 'style' => 'display:inline;']) !!}
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