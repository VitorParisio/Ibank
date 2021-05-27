@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.sidebar')
		@include('bank.components.header')
		<section class="content">
				<div class="account__add">
					<h1>Adicionar conta</h1>
					<div class="container">
						<div class="account__form">
							{!! Form::open(['route' => 'account.add', 'method'=> 'post']) !!}
								<label for="name"><strong>Nome do banco:</strong></label>
								{!! Form::text('name', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="agency"><strong>Agência:</strong></label>
								{!! Form::text('agency', null, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="account_number"><strong>Número da conta:</strong></label>
								{!! Form::text('account_number', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 1234567', 'required']) !!}

								<label for="type"><strong>Tipo de conta:</strong></label>
								{!! Form::select('type', ['' => 'Selecione',  'CC' => 'CC - Conta Corrente', 'CP' => 'CP - Conta Poupança'], null, ['class' => 'form-control shadow-none', 'required']) !!}

								<label for="amount"><strong>Saldo:</strong></label>
								{!! Form::text('amount', null, ['class' => 'form-control shadow-none', 'required', 'placeholder' => 'Ex: 100,50']) !!}

								{!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@if($message = Session::get('accept'))
					<div id="accept"></div>
					<script type="text/javascript">
						document.getElementById("accept").innerHTML = "<span style='position:absolute; margin-top:20px; left:0; text-align:center; font-family: sans-serif; font-weight:bold; padding: 10px; bottom:0; width:100%; background:lightgray;'>{{$message}}</span>";
						setInterval(() => {
							document.getElementById("accept").innerHTML = "";
						}, 3000)
					</script>
				@elseif($message = Session::get('error'))
					<div id="error"></div>
					<script type="text/javascript">
						document.getElementById("error").innerHTML = "<span style='position:absolute; margin-top:20px; left:0; text-align:center; font-family: sans-serif; font-weight:bold; padding: 10px; bottom:0; width:100%; background:red; color:#FFF;'>{{$message}}</span>";
						setInterval(() => {
							document.getElementById("error").innerHTML = "";
						}, 3000)
					</script>
				@endif
		</section>
	</div>
@endsection