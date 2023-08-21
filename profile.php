<?php require_once './configuration/login-control.php'; ?>
<?php require_once './configuration/language.php'; ?>
<?php require_once './configuration/session-check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - <?= $translator->trans("profile-profile"); ?></title>
	<?php require_once './configuration/assets/css-files.php'; ?>
	<?php require_once './configuration/assets/mobile-compatibility.php'; ?>
</head>
<body>
	
	<div class="container py-5">
		<?php require_once './configuration/assets/navbar.php' ?>

		<section>
			<div class="container py-5">
				<div class="row">
					<div class="col">
						<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item"><a href="./">SLTAX</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $translator->trans("profile-profile"); ?></li>
							</ol>
						</nav>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						
						<div class="card mb-4">
							<div class="card-body text-center">

								<img src="./configuration/images/user.jpg" alt="User Avatar" class="rounded-circle img-fluid" style="width: 150px;">
								<h5 class="my-3"><?= $user_details['firstname'] ?> <?= $user_details['lastname'] ?></h5>
								<p class="text-muted mb-4"><?= $user_details['location'] ?></p>

							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div class="card mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-username"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_username; ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-full-name"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['firstname'] ?> <?= $user_details['lastname'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-orgname"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['orgname'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-location"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['location'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-email"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['email']; ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-phone"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['telephone'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-gender"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['gender'] ?></p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
										<p class="mb-0"><?= $translator->trans("profile-biography"); ?></p>
									</div>
									<div class="col-sm-9">
										<p class="text-muted mb-0"><?= $user_details['bio'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/settings.js"></script>
</body>
</html>