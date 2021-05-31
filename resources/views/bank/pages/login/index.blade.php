@extends('bank.templates.template')

@section('content')
	@if(isset(Auth::user()->email))
		<script>window.location="/home"</script>
	@endif
	<section class="login">
		<div class="login__form">
			{!! Form::open(['route' => 'check.login', 'method'=> 'post']) !!}
				<img src="{{url('assets/img/logo.png')}}" class="login__logo" alt="logo"/>
				<p class="login__p">
					<i class="fas fa-lock"></i>  Acesso Restrito
				</p>
				<label for="email">E-mail:</label>
				{!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) !!}
				<label for="password">Senha:</label>
				{!! Form::password('password', ['class' => 'form-control', 'required']) !!}
				
				{!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
			@if($message = Session::get('error'))
				<div id="error"></div>
				<script type="text/javascript">
					document.getElementById("error").innerHTML = "<span style='position: absolute; margin-top:20px; right: 0; text-align: center; font-family: sans-serif; font-weight: bold; padding: 10px; bottom: 0; width: 100%; background: red; color:#FFF;z-index: 777;'>Erro de login e/ou senha!</span>";
					setInterval(() => {
						document.getElementById("error").innerHTML = "";
					}, 3000)
				</script>
			@endif
		</div>
	</section>
@endsection