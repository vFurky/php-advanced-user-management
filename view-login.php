<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - Login</title>
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
					<form action="login" method="POST" id="login-form" class="login-validation" novalidate>
						<div class="mb-3">
							<h4 class="text-center">Welcome to the SLTAX</h4>
							<p class="text-center">You can login below.</p>
						</div>
						<hr>
						<div class="form-outline mb-3">
							<input type="text" class="form-control" name="login-username" id="loginUsername" placeholder="demoaccount" required>
							<label class="form-label" for="loginUsername">Username</label>
						</div>
						<div class="form-outline mb-3">
							<input type="password" class="form-control" name="login-password" id="loginPassword" placeholder="**********" autocomplete="on" minlength="7" required>
							<label class="form-label" for="loginPassword">Password</label>
						</div>
						<div class="mb-3">
							<p>
								Not have an account? <a href="register">Register Now!</a>
							</p>
						</div>
						<div class="mb-3">
							<button type="submit" name="submit" class="btn btn-outline-success">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/login.js"></script>
</body>
</html>