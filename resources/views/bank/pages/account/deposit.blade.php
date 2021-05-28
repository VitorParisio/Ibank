@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="deposit">
				<h1>Recarga</h1>
				<div class="container">
					<div class="deposit__abstract">
						<h2>{{strtoupper($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="deposit__form">
						{!! Form::open(['route' => ['deposit.update', $id], 'method'=> 'post']) !!}
							<label for="deposit"><strong>Valor da recarga:</strong></label>
							{!! Form::text('deposit', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'required', 'pattern' => '^-?[0-9][0-9,\.]*$']) !!}

							{!! Form::submit('Recarga', ['class' => 'btn btn-primary']) !!}
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