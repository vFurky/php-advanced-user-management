<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - Register</title>
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
					<form action="register" method="POST" id="register-form" class="register-validation" novalidate>
						<div class="mb-3">
							<h4 class="text-center">Register to the SLTAX</h4>
							<p class="text-center">You can register below.</p>
						</div>
						<hr>
						<div class="form-outline mb-3">
							<input type="username" class="form-control" name="register-username" id="registerUsername" placeholder="demoaccount" required>
							<label class="form-label" for="registerUsername">Username</label>
						</div>
						<div class="form-outline mb-3">
							<input type="email" class="form-control" name="register-email" id="registerEmail" placeholder="demo@email.com" required>
							<label class="form-label" for="registerEmail">E-Mail</label>
						</div>
						<div class="form-outline mb-3">
							<input type="password" class="form-control" name="register-password" id="registerPassword" placeholder="**********" autocomplete="on" minlength="7" required>
							<label class="form-label" for="registerPassword">Password</label>
						</div>
						<div class="form-outline mb-3">
							<input type="password" class="form-control" name="register-repassword" id="registerRepassword" placeholder="**********" autocomplete="on" minlength="7" required>
							<label class="form-label" for="registerRepassword">Re-Password</label>
						</div>
						<div class="mb-3">
							<p>
								You have an already account? <a href="login">Login Now!</a>
							</p>
						</div>
						<div class="mb-3">
							<button type="submit" name="submit" class="btn btn-outline-info">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/register.js"></script>
</body>
</html>