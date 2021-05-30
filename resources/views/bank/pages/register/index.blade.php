@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
				<div class="register">
					<h1>Novo usuário</h1>
					<div class="container">
						<div class="register__form">
							{!! Form::open(['route' => 'register', 'method'=> 'post']) !!}
								<label for="name"><strong>Nome:</strong></label>
								{!! Form::text('name', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required']) !!}

								<label for="lastname"><strong>Sobrenome:</strong></label>
								{!! Form::text('lastname', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required']) !!}

								<label for="email"><strong>E-mail:</strong></label>
								{!! Form::email('email', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required']) !!}

								<label for="password"><strong>Senha:</strong></label>
								{!! Form::password('password', ['class'=>'form-control shadow-none']) !!}

								{!! Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@include('bank.includes.alert')
		</section>
	</div>
@endsection