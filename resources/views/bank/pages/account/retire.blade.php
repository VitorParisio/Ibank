@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="retire">
				<h1>SACAR</h1>
				<div class="container">
					<div class="retire__abstract">
						<h2>{{strtoupper($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="retire__form">
						{!! Form::open(['route' => ['retire.update', $id], 'method'=> 'post']) !!}
						
							<label for="retire"><strong>Valor a sacar:</strong></label>
							{!! Form::text('retire', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'required', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

							{!! Form::submit('SACAR', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			@include('bank.includes.alert')
		</section>
	</div>
@endsection