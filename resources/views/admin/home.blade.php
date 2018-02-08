@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p>You are logged in as <strong>{!! Auth::user()->name; !!}</strong></p>
            <div class="panel panel-default">
                <div class="panel-heading">Latest Orders</div>
                <div class="panel-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Status</th>
                                <th>Customer</th>
                                <th>Method of payment</th>
                                <th>Amount Paid</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="table-button">View</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection