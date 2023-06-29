<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Produk</title>

	<style>
		* {
			margin: 0;
			padding: 0;
		}

		body {
			padding: 4rem;
		}

		.center {
			text-align: center;
			margin-bottom: 20px;
		}

		table {
			width: 100%;
			border: 1px solid #ddd;
			border-collapse: collapse;
		}

		table tr,
		table tr th,
		table tr td {
			border: 1px solid #ddd;
			padding: 8px 10px;
		}

		table tr>th:first-child,
		table tr>td:first-child {
			width: 1%;
			white-space: nowrap;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="center">
		<h2>Daftar Produk</h2>
		<small>Dicetak pada <?= date('Y-m-d H:i:s') ?></small>
	</div>

	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Produk</th>
				<th>Satuan</th>
				<th>Stok Tersedia</th>
				<th>Harga Satuan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $product) : ?>
				<tr>
					<td><?= $num++ ?></td>
					<td><?= $product->name ?></td>
					<td><?= types($product->type) ?></td>
					<td><?= $product->stock ?></td>
					<td><?= rupiah($product->price) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>

</html>
