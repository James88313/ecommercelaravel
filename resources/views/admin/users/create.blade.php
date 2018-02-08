@extends('admin/main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

<!--    caminho para buscar cep -->

        <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {
            $("#cep").blur(function() {

            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

            //Expressao regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#estado").val("...");
            $("#ibge").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#endereco").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#estado").val(dados.uf);
            $("#ibge").val(dados.ibge);
            } //end if.
            else {
            //CEP pesquisado nao foi encontrado.
            limpa_formulario_cep();
            alert("CEP nao encontrado.");
            }
            });
            } //end if.
            else {
            //cep e invalido.
            limpa_formulario_cep();
            alert("Formato de CEP invalido.");
            }
            } //end if.
            else {
            //cep sem valor, limpa formulario.
            limpa_formulario_cep();
            }
            });
            });
        </script>

<!--    caminho para buscar cep -->
            <div class="panel panel-default">
                <div class="panel-heading">Create Customer</div>
                <div class="panel-body">
                    {!! Form::open(['url' => ''.url('admin/users').'']) !!}
                        {{ csrf_field() }}
                        <div class="col-md-6">
                        	<h2>Personal Details</h2>
                        	{!! Form::label('name', 'Name') !!}
                        	{!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Name', 'required' => 'required']) !!}
                        	{!! Form::label('email', 'Email') !!}
                        	{!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'E-mail','required' => 'required']) !!}
                        	{!! Form::label('password', 'Password') !!}
                        	{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password','required' => 'required']) !!}
                        	{!! Form::label('password-confirm', 'Confirm Password') !!}
                        	{!! Form::input('password', 'password-confirm', null, ['class' => 'form-control', 'placeholder' => 'Password Confirm','required' => 'required']) !!}
                        	{!! Form::label('cpf', 'CPF') !!}
                        	{!! Form::input('text', 'cpf', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'CPF','required' => 'required', 'maxlength'=>'11']) !!}
                        	{!! Form::label('birth', 'Birth') !!}
                        	{!! Form::input('date', 'birth', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Birth','required' => 'required', 'maxlength'=>'8']) !!}
                        	{!! Form::label('gender', 'Gender') !!}<br>
                        	{{ Form::radio('sex', '1', ['selected'=>'selected']) }}Male
                        	{{ Form::radio('sex', '0') }}Female
                        
                    </div>
                    <div class="col-md-6">
                    	<h2>Contact Details</h2>
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::input('text', 'phone', null, ['class' => 'form-control', 'placeholder' => 'Phone', 'id'=>'phone','required' => 'required', 'maxlength'=>'11']) !!}
                    	{!! Form::label('cep', 'CEP') !!}
                        {!! Form::input('text', 'cep', null, ['class' => 'form-control', 'placeholder' => 'CEP', 'id'=>'cep','required' => 'required', 'maxlength'=>'8']) !!}
                        {!! Form::label('estate', 'Estate') !!}
                        {!! Form::input('text', 'estate', null, ['class' => 'form-control', 'placeholder' => 'Estate', 'id'=>'estado','required' => 'required', 'maxlength'=>'2']) !!}
                        {!! Form::label('city', 'City') !!}
                        {!! Form::input('text', 'city', null, ['class' => 'form-control', 'placeholder' => 'City', 'id'=>'cidade','required' => 'required']) !!}
                        {!! Form::label('address', 'Address') !!}
                        {!! Form::input('text', 'address', null, ['class' => 'form-control', 'placeholder' => 'Address','required' => 'required']) !!}
                        {!! Form::label('newsletter', 'Receibe Newsletter?') !!}<br>
                        {{ Form::radio('newsletter', '1', ['selected'=>'selected']) }}Yes
                        {{ Form::radio('newsletter', '0') }}No
                        <br>
                        <hr>
                        <br>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection