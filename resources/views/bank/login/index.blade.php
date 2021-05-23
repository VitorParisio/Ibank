@extends('bank.templates.template')

@section('content')
		@if(isset(Auth::user()->email))
			<script>window.location="/home"</script>
		@endif
	<section class="login">
		{!! Form::open(['route' => 'check.login', 'method'=> 'post']) !!}
			{{ csrf_field() }}
			<img src="{{url('assets/img/logo.png')}}" class="login__logo" alt="logo"/>
			<p class="login__p"><i class="fas fa-lock"></i>  Acesso Restrito</p>
			<label for="email">Usuário:</label>
				{!! Form::text('email', null, ['class' => 'form-control']) !!}
			
			<label for="password">Senha:</label>
				{!! Form::password('password', ['class' => 'form-control']) !!}
			
			{!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}
		@if($message = Session::get('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">X</button>
				<strong>{{ $message }}</strong>
			</div>	
		@endif
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</section>
@endsection