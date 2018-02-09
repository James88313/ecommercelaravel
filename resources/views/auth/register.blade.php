@extends('main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="buttons">
                    <a class="btn btn-login" href="{{ url('/login') }}">Login</a>
                    <a class="btn btn-register-active" href="{{ url('/register') }}">Register</a>
                </div>
            <div class="panel panel-default">
                <div class="panel-body">
                <!-- Form register -->
                <form method="post" action="{!! url('/register_new') !!}">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Personal Details</h3>
                                <div class="form-group gender-register">
                                    <label for="gender">Gender</label>
                                    <br>
                                    <input name="gender" type="radio" value="0" name="male">
                                    <label for="gender">Male</label>
                                    <input name="gender" type="radio" value="1" name="female">
                                    <label for="gender">Female</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" name="name" class="form-control">
                                    <label for="name">Your name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" name="email" class="form-control">
                                    <label for="email">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="password" class="form-control" required="required">
                                    <label for="password">Your password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" name="confirm-password" class="form-control" required="required">
                                    <label for="repeat-password">Repeat your password</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-address-card prefix grey-text"></i>
                                    <input type="text" name="cpf" class="form-control">
                                    <label for="cpf">CPF</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-address-card prefix grey-text"></i>
                                    <input type="date" id="birth" name="birth" class="form-control">
                                    <label for="birth">Birth</label>
                                </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Contact Details</h3>
                                <div class="md-form">
                                    <i class="fa fa-phone prefix grey-text"></i>
                                    <input type="text" name="phone" class="form-control">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-map-signs prefix grey-text"></i>
                                    <input type="text" name="cep" class="form-control">
                                    <label for="postal">Postal Code</label>
                                </div>
                                <div class="md-form">
                                            <i class="fa fa-map-signs prefix grey-text"></i>
                                            <input type="text" name="estate" class="form-control">
                                            <label>Estate</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-map-signs prefix grey-text"></i>
                                            <input type="text" name="city" class="form-control">
                                            <label>City</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-map-signs prefix grey-text"></i>
                                    <input type="text" name="address" class="form-control">
                                    <label for="address">Your address</label>
                                </div>
                                <div class="form-group newsletter-register">
                                    <label for="newsletter">Receive Newsletter</label>
                                    <br>
                                    <input name="newsletter" type="radio" value="0" name="yes" checked>
                                    <label for="newsletter">Yes</label>
                                    <input name="newsletter" type="radio" value="1" name="no">
                                    <label for="newsletter">No</label>
                                </div>
                                <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
