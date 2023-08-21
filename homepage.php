<?php require_once './configuration/login-control.php'; ?>
<?php require_once './configuration/language.php'; ?>
<?php require_once './configuration/session-check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - User Login & Register Script</title>
	<?php require_once './configuration/assets/css-files.php'; ?>
	<?php require_once './configuration/assets/mobile-compatibility.php'; ?>
</head>
<body>

	<div class="container py-5">
		<?php require_once './configuration/assets/navbar.php' ?>

		<div class="container py-5">
			<div class="col">
				<div class="row">
					<?php if($user_details['setup_status'] == "0") { ?>
						<div class="custom-error"><?= $translator->trans("installation-notcomplete-message"); ?></div>
					<?php } ?>		
				</div>

				<div class="row">
					<div class="card">
						<div class="card-body">
							<h5><?= $translator->trans("welcome-message"); ?>, <?= $user_username; ?>!</h5>
							<p><?= $translator->trans("welcome-text"); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
</body>
</html>