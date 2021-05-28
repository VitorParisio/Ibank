@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
				<div class="account__add">
					<h1>Adicionar conta</h1>
					<div class="container">
						<div class="account__form">
							{!! Form::open(['route' => 'account.add', 'method'=> 'post']) !!}
								<label for="name"><strong>Nome do banco:</strong></label>
								{!! Form::text('name', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="agency"><strong>Agência:</strong></label>
								{!! Form::number('agency', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="account_number"><strong>Número da conta:</strong></label>
								{!! Form::number('account_number', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 1234567', 'required']) !!}

								<label for="type"><strong>Tipo de conta:</strong></label>
								{!! Form::select('type', ['' => 'Selecione',  'CC' => 'CC - Conta Corrente', 'CP' => 'CP - Conta Poupança'], null, ['class' => 'form-control shadow-none', 'required']) !!}

								<label for="amount"><strong>Saldo:</strong></label>
								{!! Form::text('amount', null, ['class' => 'form-control shadow-none', 'required', 'placeholder' => 'Ex: 100,50', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

								{!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@if($message = Session::get('accept'))
					<div id="accept"></div>
					<script type="text/javascript">
						document.getElementById("accept").innerHTML = "<span class='accept'>{{$message}}</span>";
						setInterval(() => {
							document.getElementById("accept").innerHTML = "";
						}, 3000)
					</script>
				@elseif($message = Session::get('error'))
					<div id="error"></div>
					<script type="text/javascript">
						document.getElementById("error").innerHTML = "<span class='error'>{{$message}}</span>";
						setInterval(() => {
							document.getElementById("error").innerHTML = "";
						}, 3000)
					</script>
				@endif
		</section>
	</div>
@endsection