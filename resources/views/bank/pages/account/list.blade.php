@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.sidebar')
		@include('bank.components.header')
		<section class="content">
			<div class="list">
				<h1>Lista bancária</h1>
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
				      <td>{{ucfirst($list->name)}}</td>
				      <td>{{$list->agency}}</td>
				      <td>{{$list->account_number}}</td>
				      <td>{{$list->type}}</td>
				      <td>R$ {{number_format($list->amount, 2, ',' , '.')}}</td>
				      <td><a href="{{url('edit/'.$list->id)}}"><i class="fas fa-edit"></i></a></td>
				      <td><a href="{{url('delete/'.$list->id)}}"><i class="fas fa-trash-alt"></a></i></td>
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
						document.getElementById("accept").innerHTML = "<span style='position:absolute; margin-top:20px; left:0; text-align:center; font-family: sans-serif; font-weight:bold; padding: 10px; bottom:0; width:100%; background:lightgray;'>{{$message}}</span>";
						setInterval(() => {
							document.getElementById("accept").innerHTML = "";
						}, 3000)
					</script>
				@endif
			</div>
		</section>
	</div>
@endsection