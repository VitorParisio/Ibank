@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="home">
				<h1>Bem-vindo(a), <b>{{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->lastname)}}!</b></h1>
				<div class="container">
					<h2>Bancos e Saldos</h2>
					<table class="table">
			  			<thead>
			    			<tr>
						      <th scope="col">Banco</th>
						      <th scope="col">Saldo</th>
						      <th scope="col">Depositar</th>
						      <th scope="col">Sacar</th>
						       <th scope="col">Transferir</th>
						    </tr> 
						</thead>
						<tbody>
						@forelse($balance_account as $value)
						    <tr>
						      <td data-title="BANCO:">
						         {{strtoupper($value['name'])}}
						      </td>
						      <td data-title="SALDO:">
						     	 R$ {{number_format($value['amount'], 2, ',' , '.')}}
						  	  </td>
						      <td data-title="DEPOSITAR:">
						      	<a href="{{url('deposit/'.$value['id'])}}">
						      		<i class="fas fa-piggy-bank"></i>
						      	</a>
						      </td>
						      <td data-title="SACAR:">
						      	<a href="{{url('retire/'.$value['id'])}}">
						      		<i class="fas fa-hand-holding-usd"></i>
						      	</a>
						      </td>
						      <td data-title="TRANSFERIR:">
						      	<a href="{{url('transfer/'.$value['id'])}}">
						      		<i class="fas fa-exchange-alt"></i>
						      	</a>
						      </td>
						    </tr>
					    @empty
						</tbody>
					</table>
						<div class="empty">
							<span class="empty__text">Não há conta bancária cadastrada!</span>
							<a href="{{route('account')}}" class="empty__add">
								<i class="fas fa-plus-circle"></i> Adicinhar conta
							</a>
						</div>
						@endforelse
				</div>
				<span class="paginate">{!! $balance_account->links("pagination::bootstrap-4") !!}<span>
				@include('bank.includes.alert')
			</div>
		</section>
	</div>
@endsection