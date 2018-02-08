@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Coupon List
                    <a class="pull-right" href="{{ url('admin/coupons/create') }}">Add Coupon</a>
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
						<th>Code</th>
						<th>Discount</th>
                        <th>Actions</th>
                        <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->name }}</td>
							<td>{{ $coupon->code }}</td>
							<td>{{ $coupon->discount }}</td>
                            <td>
                                <a href="{!! url('admin/coupons/'.$coupon->id.'/edit') !!}" class="btn btn-default">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/coupons/'.$coupon->id.''), 'style' => 'display:inline;']) !!}
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