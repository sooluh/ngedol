<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>

	<form class="d-none d-sm-inline-block">
		<div class="input-group input-group-navbar">
			<input type="text" class="form-control" placeholder="Cari ..." aria-label="Cari">

			<button class="btn" type="button">
				<i class="align-middle" data-feather="search"></i>
			</button>
		</div>
	</form>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item">
				<a class="nav-icon js-fullscreen d-none d-lg-block" href="javascript:void(0)">
					<div class="position-relative">
						<i class="align-middle" data-feather="maximize"></i>
					</div>
				</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-icon pe-md-0 dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">
					<img src="<?= $this->userdata->avatar ?>" class="avatar img-fluid rounded" alt="<?= settings('author') ?>" />
				</a>

				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
						<i class="align-middle me-1" data-feather="log-out"></i>
						Keluar
					</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
