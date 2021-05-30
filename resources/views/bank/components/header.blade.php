<header class="header"> 
	<div class="menu_bar">
		<i class="fas fa-bars"></i>
	</div>
	<div class="header__logo">
		<a href="{{route('home')}}"><img src="{{url('assets/img/logo.png')}}" class="header__logo" alt="logo"/></a>
	</div>
	<div class="header__user">
		<ul>
			<li>
				<a class="account">
					<i class="fas fa-user"></i> 
						{{ ucfirst(Auth::user()->name) }} {{ucfirst(Auth::user()->lastname)}}
					<i class="fas fa-sort-down" style="font-size: 15px;"></i>
				</a>
				<ul class="account_active">
					<li>
						<a href="{{route('register')}}">
							<i class="far fa-user-circle"></i> Novo usuário
						</a>
					</li>
					<li>
						<a href="{{url('/logout')}}">
							<i class="fas fa-sign-out-alt"></i> Sair
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</header>