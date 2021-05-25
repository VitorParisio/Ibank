<header class="header"> 
	<div class="header__logo">
		<a href="{{route('home')}}"><img src="{{url('assets/img/logo.png')}}" class="header__logo" alt="logo"/></a>
	</div>
	<div class="header__user">
		<ul>
			<li><a class="account"><i class="fas fa-user"></i> {{ Auth::user()->name }} <i class="fas fa-sort-down" style="font-size: 15px;"></i></a>
				<ul class="active">
					<li><a href="#"><i class="far fa-user-circle"></i> Minha Conta</a></li>
					<li><a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</header>