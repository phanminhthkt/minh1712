<div class="nav-left-sidebar sidebar-dark">
	<div class="menu-list">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="d-xl-none d-lg-none" href="#">Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav flex-column">
					<li class="nav-divider">
						Menu
					</li>
					<li class="nav-item ">
						<a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
						<div id="submenu-1" class="collapse submenu" style="">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
									<div id="submenu-1-1" class="collapse submenu" style="">
										<ul class="nav flex-column">
											<li class="nav-item">
												<a class="nav-link" href="dashboard-influencer.html">Influencer</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="influencer-finder.html">Influencer Finder</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="influencer-profile.html">Influencer Profile</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-inbox"></i>Product</a>
						<div id="submenu-3" class="collapse submenu" style="">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="{{route('Backend.Product.index',['type'=>'product'])}}">Product cấp 1</a>
									<a class="nav-link" href="{{route('Backend.Product.index')}}">Product cấp 2</a>
									<a class="nav-link" href="{{route('Backend.Product.index')}}">Product</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-newspaper"></i>News</a>
						<div id="submenu-4" class="collapse submenu" style="">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="pages/chart-c3.html">News cấp 1</a>
									<a class="nav-link" href="pages/chart-c3.html">News cấp 2</a>
									<a class="nav-link" href="pages/chart-c3.html">News</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
