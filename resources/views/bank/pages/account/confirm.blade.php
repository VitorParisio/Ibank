@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="confirm">
				<h1>CONFIRMAR TRANSFERÊNCIA</h1>
				<div class="container">
					<div class="confirm__abstract">
						<p><strong>De:</strong> {{Auth::user()->name}}</p>
						<p><strong>Para:</strong> {{$sender->name}}</p>
					</div>
					<div class="confirm__form">
						{!! Form::open(['route' => ['transfer.store', $id], 'method'=> 'post']) !!}

							<label for="bank"><strong>Nome do Banco:</strong></label>
							{!! Form::text('bank', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: Bradesco', 'required']) !!}

							<label for="confirm"><strong>Valor a transferir:</strong></label>
							{!! Form::text('balance', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'required', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

							{!! Form::hidden('sender_id', $sender->id) !!}

							{!! Form::submit('Transferir', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			@include('bank.includes.alert')
		</section>
	</div>
@endsection