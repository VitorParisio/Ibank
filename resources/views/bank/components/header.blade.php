<header class="header"> 
	<div class="header__logo">
		<img src="{{url('assets/img/logo.png')}}" class="header__logo" alt="logo"/>
	</div>
	<div class="header__menu">
		<ul>
			<li><i class="far fa-credit-card" style="font-size: 25px; color:#FFF;"></i><a href="#">Contas Bancárias</a></li>
			<li><i class="fas fa-exchange-alt" style="font-size: 25px; color:#FFF;"></i><a href="#">Movimentar</a></li>
			<li><i class="fas fa-chart-line" style="font-size: 25px; color:#FFF;"></i><a href="#">Relatório</a></li>
		</ul>
	</div>
	<div class="header__user">
		<ul>
			<li><a class="account"><i class="fas fa-user"></i> Vitor Parísio <i class="fas fa-sort-down" style="font-size: 15px;"></i></a>
				<ul class="active">
					<li><a href="#"><i class="far fa-user-circle"></i> Minha Conta</a></li>
					<li><a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</header>