@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.sidebar')
		@include('bank.components.header')
		<section class="content">
			<div class="deposit">
				<h1>Recarga</h1>
				<div class="container">
					<div class="deposit__abstract">
						<h2>{{ucfirst($name)}}</h2>
						<h4>R$ {{number_format($amount, 2, ',' , '.')}}</h4>
					</div>
					<div class="deposit__form">
						{!! Form::open(['route' => ['deposit.update', $id], 'method'=> 'post']) !!}
							<label for="deposit"><strong>Valor da recarga:</strong></label>
							{!! Form::text('deposit', null, ['class' => 'form-control shadow-none', 'placeholder' => 'Ex: 100,50', 'required']) !!}

							{!! Form::submit('Recarga', ['class' => 'btn btn-primary']) !!}
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