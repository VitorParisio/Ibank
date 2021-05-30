@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="list">
				<h1>LISTA BANCÁRIA</h1>
				<div class="container">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Banco</th>
					      <th scope="col">Agência</th>
					      <th scope="col">Conta</th>
					      <th scope="col">Tipo</th>
					      <th scope="col">Saldo</th>
					      <th scope="col">Editar</th>
					      <th scope="col">Excluir</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@forelse($account_list as $list)
					    <tr>
					      <td data-title="BANCO:">{{strtoupper($list->name)}}</td>
					      <td data-title="AGÊNCIA:">{{$list->agency}}</td>
					      <td data-title="CONTA:">{{$list->account_number}}</td>
					      <td data-title="TIPO:">{{$list->type}}</td>
					      <td data-title="SALDO:">R$ {{number_format($list->amount, 2, ',' , '.')}}</td>
					      <td data-title="EDITAR:">
					      	<a href="{{url('edit/'.$list->id)}}">
					      		<i class="fas fa-edit"></i>
					      	</a>
					      </td>
					      <td data-title="EXCUIR:">
					      	<a href="{{url('delete/'.$list->id)}}">
					      		<i class="fas fa-trash-alt"></i>
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
					@include('bank.includes.alert')
				</div>
			</div>
		</section>
	</div>
@endsection