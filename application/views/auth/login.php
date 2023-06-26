<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= set_title($page) ?></title>
	<link rel="canonical" href="<?= current_url() ?>">

	<?php include VIEWPATH . '/app/includes/meta.php' ?>

	<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<div class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang!</h1>
							<p class="lead">Masuk ke akun untuk melanjutkan</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form action="<?= current_url() ?>" method="POST">
										<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

										<div class="mb-3">
											<label for="login" class="form-label">Nama Pengguna</label>
											<input type="text" name="login" id="login" class="form-control form-control-lg" placeholder="Masukkan nama pengguna" value="admin">
										</div>

										<div class="mb-3">
											<label for="password" class="form-label">Kata Sandi</label>
											<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan kata sandi" value="ng4.dimin">
											<small>
												<a href="javascript:void(0)">Lupa Kata Sandi?</a>
											</small>
										</div>

										<div>
											<div class="form-check align-items-center">
												<input type="checkbox" name="remember" id="remember" class="form-check-input" value="true" checked="">
												<label for="remember" class="form-check-label text-small">Ingat saya</label>
											</div>
										</div>

										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Masuk</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include VIEWPATH . '/app/includes/script.php' ?>
</body>

</html>
