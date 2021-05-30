@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
				<div class="update">
					<h1>ATUALIZAR CONTA</h1>
					<div class="container">
						<div class="update__form">
							{!! Form::open(['route' => ['list.update', $id], 'method'=> 'put']) !!}
								<label for="name"><strong>Nome do banco:</strong></label>
								{!! Form::text('name', $name, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="agency"><strong>Agência:</strong></label>
								{!! Form::number('agency', $agency, ['class' => 'form-control shadow-none', 'autocomplete' => 'off', 'required'])!!}

								<label for="account_number"><strong>Número da conta:</strong></label>
								{!! Form::number('account_number', $account_number, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 1234567', 'required']) !!}

								<label for="type"><strong>Tipo de conta:</strong></label>
								{!! Form::select('type', ['' => 'Selecione',  'CC' => 'CC - Conta Corrente', 'CP' => 'CP - Conta Poupança'], $type, ['class' => 'form-control shadow-none', 'required']) !!}

								<label for="amount"><strong>Saldo:</strong></label>
								{!! Form::text('amount', $amount, ['class' => 'form-control shadow-none', 'required', 'placeholder' => 'Ex: 100,50', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

								{!! Form::submit('Atualizar', ['class' => 'btn btn-primary']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				@include('bank.includes.alert')
		</section>
	</div>
@endsection