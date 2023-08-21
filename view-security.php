<?php require_once './configuration/login-control.php'; ?>
<?php require_once './configuration/language.php'; ?>
<?php require_once './configuration/session-check.php'; ?>
<?php
use OTPHP\TOTP;
use ParagonIE\ConstantTime\Base32;

if($user['2fa_status'] == "Enabled") {
	$twofactor = $translator->trans("security-2fa-enabled");
} else if($user['2fa_status'] == "Disabled") {
	$twofactor = $translator->trans("security-2fa-disabled");
} else {
	$twofactor = $translator->trans("security-2fa-disabled");
};

$user_token = $user['token'];
$user_email = $user_details['email'];
$secret = $user_token;
$encodedSecret = Base32::encodeUpper($secret);
$totp = TOTP::create($encodedSecret);
$uri = 'otpauth://totp/' . $user_email . '?secret=' . $encodedSecret;
$qr = createQrCode($uri, 300, 300);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - <?= $translator->trans("security-security"); ?></title>
	<?php require_once './configuration/assets/css-files.php'; ?>
	<?php require_once './configuration/assets/mobile-compatibility.php'; ?>
</head>
<body>
	
	<div class="container py-5">
		<?php require_once './configuration/assets/navbar.php' ?>

		<div class="container py-5">
			<div class="row">
				<div class="col">
					<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
						<ol class="breadcrumb mb-0">
							<li class="breadcrumb-item"><a href="./">SLTAX</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $translator->trans("security-security"); ?></li>
						</ol>
					</nav>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-8">
					<div class="card mb-4">
						<div class="card-header"><?= $translator->trans("security-change-password"); ?></div>
						<div class="card-body">
							<div class="row gx-3">
								<div id="errormessage" class="custom-error" style="display: none;"></div>
								<div id="successmessage" class="custom-success" style="display: none;"></div>
							</div>
							<form action="security" method="POST" id="security-form" class="security-validation" novalidate>
								<div class="row gx-3 mb-3">
									<div class="col-md-12">
										<label class="small mb-1" for="userCurrentPassword"><?= $translator->trans("security-current-password"); ?></label>
										<input class="form-control" id="userCurrentPassword" name="currentpassword" type="password" placeholder="****************" required autocomplete="on">
									</div>
								</div>

								<div class="row gx-3 mb-3">
									<div class="col-md-12">
										<label class="small mb-1" for="userNewPassword"><?= $translator->trans("security-new-password"); ?></label>
										<input class="form-control" id="userNewPassword" name="newpassword" type="password" placeholder="****************" required autocomplete="on">
									</div>
								</div>

								<div class="row gx-3 mb-3">
									<div class="col-md-12">
										<label class="small mb-1" for="userNewRepassword"><?= $translator->trans("security-new-repassword"); ?></label>
										<input class="form-control" id="userNewRepassword" name="newrepassword" type="password" placeholder="****************" required autocomplete="on">
									</div>
								</div>

								<button type="submit" name="submit" class="btn btn-danger"><?= $translator->trans("security-change-password-btn"); ?></button>
							</form>

						</div>
					</div>
					<div class="card mb-4">
						<div class="card-header"><?= $translator->trans("2fa-2fa"); ?></div>
						<div class="card-body">
							<div class="row gx-3">
								<div id="errormessage" class="custom-error" style="display: none;"></div>
								<div id="successmessage" class="custom-success" style="display: none;"></div>
							</div>
							<?php if($twofactor_status == "Enabled") { ?>
								<button type="submit" name="submit" class="btn btn-success" id="twofactorButton" name="twofactor_button"><?= $translator->trans("2fa-status"); ?>: <?= $translator->trans("2fa-enabled"); ?></button>
								<br><br>
								<span><?= $translator->trans("2fa-message"); ?></span>
								<img src="<?=$qr?>">
							<?php } else if($twofactor_status == "Disabled") { ?>
								<button type="submit" name="submit" class="btn btn-warning" id="twofactorButton" name="twofactor_button"><?= $translator->trans("2fa-status"); ?>: <?= $translator->trans("2fa-disabled"); ?></button>
							<?php } else { ?>
								<button type="submit" name="submit" class="btn btn-warning" id="twofactorButton" name="twofactor_button"><?= $translator->trans("2fa-status"); ?>: <?= $translator->trans("2fa-disabled"); ?></button>
							<?php } ?>
						</div>
					</div>
					<div class="card mb-4">
						<div class="card-header"><?= $translator->trans("dltacc-dltacc"); ?></div>
						<div class="card-body">
							<div class="checkbox mb-2">
								<label>
									<input type="checkbox" value="deleteCheckbox" name="checkboxConfirm" id="checkboxConfirm">
									<?= $translator->trans("dltacc-warning"); ?>
								</label>
							</div>
							<button type="submit" name="deleteAccount" id="deleteAccount" class="btn btn-danger" disabled><?= $translator->trans("dltacc-dltacc-btn"); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/security.js"></script>
</body>
</html>