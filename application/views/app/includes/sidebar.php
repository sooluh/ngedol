<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="<?= current_url() ?>">
			<span class="sidebar-brand-text align-middle">
				<?= settings('title') ?>
			</span>
		</a>

		<div class="sidebar-user">
			<div class="d-flex justify-content-center">
				<div class="flex-shrink-0">
					<img src="https://avatars3.githubusercontent.com/u/20874779" class="avatar img-fluid rounded me-1" alt="<?= $this->userdata->name ?>" />
				</div>

				<div class="flex-grow-1 ps-2">
					<a class="sidebar-user-title" href="javascript:void(0)" target="_blank">
						<?= $this->userdata->name ?>
					</a>
					<div class="sidebar-user-subtitle">Admin</div>
				</div>
			</div>
		</div>

		<ul class="sidebar-nav">
			<li class="sidebar-header">Kelola</li>

			<li class="sidebar-item active">
				<a class="sidebar-link" href="<?= base_url('app/products') ?>">
					<i class="align-middle" data-feather="list"></i>
					<span class="align-middle">Produk</span>
				</a>
			</li>
		</ul>
	</div>
</nav>
