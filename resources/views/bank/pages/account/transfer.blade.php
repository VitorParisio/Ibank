@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="transfer">
				<h1>TRANSFERÊNCIA</h1>
				<div class="container">
					<div class="transfer__abstract">
						<h2>{{strtoupper($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="transfer__form">
						{!! Form::open(['route' => ['confirm', $id], 'method'=> 'post']) !!}
						
							<label for="transfer"><strong>Destinatário:</strong></label>
							{!! Form::text('sender', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Informe quem receberá a transferência (Nome ou Email).', 'required', 'autocomplete' => 'off']) !!}

							{!! Form::submit('Próxima etapa', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			@include('bank.includes.alert')
		</section>
	</div>
@endsection