<nav class="side-bar">
	<div class="menu">
		<div class="menu__header">
			<h4>DASHBOARD</h4>
		</div>
		<div class="item">
			<div class="item"><a href="{{route('home')}}"><i class="fas fa-home" style="font-size: 20px;"></i>Home</a></div>
			<a class="sub-btn"><i class="far fa-credit-card" style="font-size: 20px;"></i>Contas Bancárias<i class="fas fa-angle-right dropdown"></i></a>
			<div class="sub-item">
				<a href="{{route('account')}}">Adicionar conta</a>
				<a href="{{route('list')}}">Lista</a>
			</div>
		</div>
		<div class="item"><a href="#"><i class="fas fa-exchange-alt" style="font-size: 20px;"></i>Movimentação</a></div>
		<div class="item"><a href="#"><i class="fas fa-chart-line" style="font-size: 20px;"></i>Relatório</a></div>
	</div>
</nav>