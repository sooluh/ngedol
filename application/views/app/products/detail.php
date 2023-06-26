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
	<div class="wrapper">
		<?php include VIEWPATH . '/app/includes/sidebar.php' ?>

		<div class="main">
			<?php include VIEWPATH . '/app/includes/navbar.php' ?>

			<main class="content">
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"><?= $page ?></h1>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<div class="mb-3">
										<label class="form-label" for="name">Nama Produk</label>
										<span class="d-block fw-bold"><?= $detail->name ?></span>
									</div>

									<div class="mb-3">
										<label class="form-label" for="type">Satuan</label>
										<span class="d-block fw-bold"><?= types($detail->type) ?></span>
									</div>

									<div class="mb-3">
										<label class="form-label" for="stock">Stok</label>
										<span class="d-block fw-bold"><?= $detail->stock ?></span>
									</div>

									<div class="mb-0">
										<label class="form-label" for="price">Harga Satuan</label>
										<span class="d-block fw-bold"><?= rupiah($detail->price) ?></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<label for="image" class="form-label">Gambar</label>
									<img class="w-100 rounded" src="<?= base_url('uploads/' . $detail->image) ?>" alt="<?= $detail->name ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<?php include VIEWPATH . '/app/includes/footer.php' ?>
		</div>
	</div>

	<?php include VIEWPATH . '/app/includes/script.php' ?>
</body>

</html>
