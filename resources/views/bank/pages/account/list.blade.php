@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="list">
				<h1>Lista bancária</h1>
				<div class="container">
					<table class="table table-striped table-dark">
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
					      <td data-title="BANCO:">{{ucfirst($list->name)}}</td>
					      <td data-title="AGÊNCIA:">{{$list->agency}}</td>
					      <td data-title="CONTA:">{{$list->account_number}}</td>
					      <td data-title="TIPO:">{{$list->type}}</td>
					      <td data-title="SALDO:">R$ {{number_format($list->amount, 2, ',' , '.')}}</td>
					      <td data-title="EDITAR:"><a href="{{url('edit/'.$list->id)}}"><i class="fas fa-edit"></i></a></td>
					      <td data-title="EXCUIR"><a href="{{url('delete/'.$list->id)}}"><i class="fas fa-trash-alt"></a></i></td>
					    </tr>
					    @empty
					  </tbody>
					</table>
					<div class="empty">
						<span class="empty__text">Não há conta bancária cadastrada!</span>
						<a href="{{route('account')}}" class="empty__add"><i class="fas fa-plus-circle"></i> Adicinhar conta</a>
					</div>
					@endforelse
					@if($message = Session::get('accept'))
						<div id="accept"></div>
						<script type="text/javascript">
							document.getElementById("accept").innerHTML = "<span class='accept'>{{$message}}</span>";
							setInterval(() => {
								document.getElementById("accept").innerHTML = "";
							}, 3000)
						</script>
					@endif
				</div>
			</div>
		</section>
	</div>
@endsection