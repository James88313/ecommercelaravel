@extends('main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="buttons">
                    <a class="btn btn-login-active" href="{{ url('/login') }}">Login</a>
                    <a class="btn btn-register" href="{{ url('/register') }}">Register</a>
                </div>
            <div class="panel panel-default">
                <div class="row">
            <div class="col-md-6">    
                <!-- Form login -->
<form>
    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="text" id="defaultForm-email" class="form-control">
        <label for="defaultForm-email">Your email</label>
    </div>

    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="defaultForm-pass" class="form-control">
        <label for="defaultForm-pass">Your password</label>
    </div>

    <div class="text-left">
        <button class=" pull-right btn btn-primary">Login</button>
        <span class="sign-up">Not a member? <a href="{{ url('/register') }}">Sign Up</a></span><br>
        <span class="forgot">Forgot <a href="{{ url('/password') }}">password?</a></span>
    </div>
</form>
<!-- Form login -->
</div>
<div class="col-md-6">
    <div class="login-image">
        <i class="fa fa-address-card"></i>
    </div>
</div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
