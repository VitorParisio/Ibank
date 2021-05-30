@extends('bank.templates.template')

@section('content')
	<div class="main">
		@include('bank.components.header')
		@include('bank.components.sidebar')
		<section class="content">
			<div class="historic">
				<h1>RELATÓRIO</h1>
				<div class="container">
					<table class="table">
			  			<thead>
			    			<tr>
						      <th scope="col">Banco</th>
						      <th scope="col">Tipo</th>
						      <th scope="col">Valor</th>
						      <th scope="col">Valor/Antes</th>
						      <th scope="col">Valor/Depois</th>
						      <th scope="col">Data</th>
						      <th scope="col">Excluir</th>
						    </tr>
						</thead>
						<tbody>
						@forelse($historic_model as $value)
						    <tr>
						      <td data-title="BANCO:">
						         {{strtoupper($value->name)}}
						      </td>
						      <td data-title="TIPO:">
						     	 {{$value->type}}
						  	  </td>
						      <td data-title="VALOR:">
						     	 R$ {{number_format($value->amount, 2, ',' , '.')}}
						  	  </td>
						      <td data-title="VALOR/ANTES:">
						     	 R$ {{number_format($value['total_before'],2, ',' , '.')}}
						  	  </td>
						  	  <td data-title="VALOR/DEPOIS:">
						     	 R$ {{number_format($value->total_after,2, ',' , '.')}}
						  	  </td>
						  	  <td data-title="DATA:">
						     	 {{$value->date}}
						  	  </td>
						  	  <td data-title="EXCLUIR:">
						     	 <a href="{{url('del/'.$value->id)}}">
					      			<i class="fas fa-trash-alt"></i>
					      		</a>
						  	  </td>
						    </tr>
					    @empty
						</tbody>
					</table>
						<div class="empty">
							<span class="empty__text">Não há registro de movimentação financeira!</span>
						</div>
						@endforelse
				</div>
				</div>
				@include('bank.includes.alert')
			</div>
		</section>
	</div>
@endsection