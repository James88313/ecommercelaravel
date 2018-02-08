@extends('main')
@section('content')
<div class="row">
<h2>Account</h2>
	<div class="col-md-3">
		<label>Name:</label>
		{{ Auth::user()->name }}<br>
		<label>Email:</label>
		{{ Auth::user()->email }}<br>
		<label>CPF:</label>
		{{ Auth::user()->cpf }}<br>
		<label>Birth:</label>
		{{ Auth::user()->birth }}<br>
	</div>
	<div class="col-md-3">
		<label>Phone:</label>
		{{ Auth::user()->phone }}<br>
		<label>Postal code:</label>
		{{ Auth::user()->cep }}<br>
		<label>Estate:</label>
		{{ Auth::user()->estate }}<br>
		<label>City:</label>
		{{ Auth::user()->city }}<br>
		<label>Address:</label>
		{{ Auth::user()->address }}<br>
	</div>
</div>
@endsection