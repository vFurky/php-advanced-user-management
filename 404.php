<?php header("HTTP/1.0 404 Not Found"); ?>
<?php require_once './configuration/language.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - 404</title>
	<?php require_once './configuration/assets/css-files.php'; ?>
	<?php require_once './configuration/assets/mobile-compatibility.php'; ?>
</head>


<body>

	<div class="d-flex align-items-center justify-content-center vh-100">
		<div class="text-center">
			<h1 class="display-1 fw-bold">404</h1>
			<p class="fs-3"> <span class="text-danger"><?= $translator->trans("404-oops"); ?></span> <?= $translator->trans("404-page-not-found"); ?></p>
			<p class="lead">
				<?= $translator->trans("404-you-looking-for"); ?>
			</p>
			<a href="./" class="btn btn-primary"><?= $translator->trans("404-back-home"); ?></a>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
</body>
</html>