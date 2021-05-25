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
								{!! Form::select('agency', ['' => 'Selecione',  '1581' => '1581', 'PJ' => 'Pessoa Jurídica'], null, ['class' => 'form-control shadow-none', 'required']) !!}

								<label for="account_number"><strong>Número da conta:</strong></label>
								{!! Form::number('account_number', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 1234567', 'required']) !!}

								<label for="type"><strong>Tipo de conta:</strong></label>
								{!! Form::select('type', ['' => 'Selecione',  'CC' => 'Conta corrente', 'CP' => 'Conta poupança'], null, ['class' => 'form-control shadow-none', 'required']) !!}

								{!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@if(Session::get('message'))
					<script type="text/javascript">
						alert('Conta cadastrada com sucesso!');
					</script>
				@endif
		</section>
	</div>
@endsection