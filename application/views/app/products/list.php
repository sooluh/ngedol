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
					<a href="<?= base_url('app/products/add') ?>" class="btn btn-primary float-end mt-n1">
						<i class="fas fa-plus"></i>
						Tambah
					</a>

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"><?= $page ?></h1>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="products" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Nama Produk</th>
												<th>Satuan</th>
												<th>Stok</th>
												<th>Harga</th>
												<th style="width: 1px; white-space: nowrap;">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($products as $product) : ?>
												<tr>
													<td><?= $product->name ?></td>
													<td><?= types($product->type) ?></td>
													<td><?= $product->stock ?></td>
													<td><?= rupiah($product->price) ?></td>
													<td style="width: 1px; white-space: nowrap;">
														<div>
															<a href="<?= base_url('app/products/' . $product->id) ?>" class="btn btn-primary">
																<i class="fa fa-eye"></i>
															</a>
															<a href="<?= base_url('app/products/edit/' . $product->id) ?>" class="btn btn-warning">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="<?= base_url('app/products/delete/' . $product->id) ?>" class="btn btn-danger trash">
																<i class="fa fa-trash"></i>
															</a>
														</div>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
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
	<script src="<?= base_url('assets/js/datatables.js') ?>"></script>
	<script src="<?= base_url('assets/js/sweetalert2.js') ?>"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			$('#products').DataTable({
				responsive: true
			});

			$(document).on('click', '.trash', function(evt) {
				evt.preventDefault();
				var target = $(this).attr('href');
				Swal.fire({
					title: 'Apakah kamu yakin?',
					text: 'Setelah dihapus, Ini tidak dapat dikembalikan!',
					icon: 'warning',
					buttons: true,
					dangerMode: true
				}).then(function(result) {
					if (result.isConfirmed) {
						window.location.href = target;
					}
				});
			});
		});
	</script>
</body>

</html>
