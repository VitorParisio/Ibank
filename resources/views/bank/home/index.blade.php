@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.sidebar')
		@include('bank.components.header')
		<section class="content">
				<div class="home">
					<h1>Bem-vindo(a), <b>{{Auth::user()->name}}!</b></h1>
					<div class="container">
						<h2>Saldos</h2>
						<div class="card">
							<h3><b>R$ {{ number_format($amount, 2, ',', '.') }}</b></h3>
						</div>
					</div>
				</div>
		</section>
	</div>
@endsection
