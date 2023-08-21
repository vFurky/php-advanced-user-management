<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - 2FA</title>
	<?php require_once './configuration/assets/css-files.php'; ?>
	<?php require_once './configuration/assets/mobile-compatibility.php'; ?>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card col-md-12 mt-5 p-3 shadow rounded">
					<div id="errormessage" class="custom-error" style="display: none;"></div>
					<div id="successmessage" class="custom-success" style="display: none;"></div>
					<form action="2fa" method="POST" id="twofactor-form" class="twofactor-validation" novalidate>
						<div class="mb-3">
							<h4 class="text-center">Welcome to the SLTAX</h4>
							<p class="text-center">It looks like this account has 2FA enabled. Please enter your 2FA code.</p>
						</div>
						<hr>
						<div class="form-outline mb-3">
							<input type="text" class="form-control" name="twofactor_code" id="twofactorCdoe" placeholder="000000" required>
							<label class="form-label" for="twofactorCdoe">2FA Code</label>
						</div>
						<div class="mb-3">
							<button type="submit" name="submit" class="btn btn-outline-warning">Continue</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/2fa.js"></script>
</body>
</html>