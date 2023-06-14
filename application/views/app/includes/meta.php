<link rel="preconnect" href="https://avatars3.githubusercontent.com" />
<link rel="shortcut icon" href="https://avatars3.githubusercontent.com/u/20874779" type="image/x-icon" />
<link rel="preconnect" href="https://api.fonts.coollabs.io" />
<link rel="stylesheet" href="https://api.fonts.coollabs.io/css2?family=Inter:wght@300;400;600&display=swap">

<meta name="keywords" content="<?= settings('keywords') ?>" />
<meta name="description" content="<?= settings('description') ?>" />
<meta name="subject" content="<?= settings('title') ?>">
<meta name="copyright" content="<?= settings('author') ?>" />
<meta name="language" content="ID" />
<meta name="robots" content="noindex, nofollow" />
<meta name="author" content="<?= settings('author') ?>, <?= settings('email') ?>" />
<meta name="reply-to" content="<?= settings('email') ?>" />
<meta name="owner" content="<?= settings('author') ?>" />
<meta name="url" content="<?= current_url() ?>" />
<meta name="identifier-URL" content="<?= current_url() ?>" />
<meta name="pagename" content="<?= set_title($page ?? '') ?>" />
<meta name="coverage" content="Worldwide">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="revisit-after" content="7 days">
<meta name="target" content="all">

<meta name="og:title" content="<?= $page ?? $_ENV['SITE_TITLE'] ?>">
<meta name="og:url" content="<?= current_url() ?>">
<meta name="og:site_name" content="<?= settings('title') ?>">
<meta name="og:description" content="<?= settings('description') ?>">
<meta name="og:email" content="<?= settings('email') ?>">
<meta name="og:region" content="ID">
<meta name="og:country-name" content="ID">

<script type="application/json" id="flashdata">
	<?= json_encode($this->session->flashdata()) ?>
</script>
