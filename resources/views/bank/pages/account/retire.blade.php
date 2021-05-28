@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="retire">
				<h1>Retirada</h1>
				<div class="container">
					<div class="retire__abstract">
						<h2>{{strtoupper($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="retire__form">
						{!! Form::open(['route' => ['retire.update', $id], 'method'=> 'post']) !!}
							<label for="retire"><strong>Valor a retirar:</strong></label>
							{!! Form::text('retire', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'required', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

							{!! Form::submit('Retirar', ['class' => 'btn btn-danger']) !!}
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
					}, 3000);
				</script>
			@elseif($message = Session::get('error'))
				<div id="error"></div>
				<script type="text/javascript">
					document.getElementById("error").innerHTML = "<span class='error'>{{$message}}</span>";
					setInterval(() => {
						document.getElementById("error").innerHTML = "";
					}, 3000);
				</script>
			@endif
		</section>
	</div>
@endsection