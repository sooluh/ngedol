<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?= set_title($page ?? '') ?></title>
	<link rel="canonical" href="<?= current_url() ?>">

	<?php include VIEWPATH . '/app/includes/meta.php' ?>

	<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
	<main>
		<div>
			<h1 class="title">
				<?= $_ENV['SITE_TITLE'] ?>
			</h1>

			<p class="subtitle">
				Halaman untuk CRUD-nya ada di
				<a href="<?= base_url('app/products') ?>"><code>/app/products</code></a>
				pak, hehe.
			</p>
		</div>
	</main>
</body>

</html>
