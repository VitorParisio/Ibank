@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="deposit">
				<h1>DEPOSITAR</h1>
				<div class="container">
					<div class="deposit__abstract">
						<h2>{{strtoupper($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="deposit__form">
						{!! Form::open(['route' => ['deposit.update', $id], 'method'=> 'post']) !!}

							<label for="deposit"><strong>Valor a depositar:</strong></label>
							{!! Form::text('deposit', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'autocomplete' => 'off', 'required', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

							{!! Form::submit('Depositar', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			@include('bank.includes.alert')
		</section>
	</div>
@endsection