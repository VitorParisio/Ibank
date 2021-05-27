@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
				<div class="home">
					<h1>Bem-vindo(a), <b>{{ucfirst(Auth::user()->name)}}!</b></h1>
					<div class="container">
						<h2>Bancos e Saldos</h2>
						<div class="group_card">
							@forelse($balance_account as $value)
								<div class="card">
									<div class="card-body">
										<h3><b>{{strtoupper($value['name'])}}</h3></b>
										<h4>R$ {{number_format($value['amount'], 2, ',' , '.')}}</h4>
										<div class="in__out">
											<a href="{{url('deposit/'.$value['id'])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Recarga</a>
											<a href="{{url('retire/'.$value['id'])}}" class="btn btn-danger"><i class="fas fa-minus"></i> Retirada</a>
										</div>
									</div>
								</div>
							@empty
						</div>
								<div class="empty">
									<span class="empty__text">Não há conta bancária cadastrada!</span>
									<a href="{{route('account')}}" class="empty__add"><i class="fas fa-plus-circle"></i> Adicinhar conta</a>
								</div>
							@endforelse
					</div>
				</div>
		</section>
	</div>
@endsection
