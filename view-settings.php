<?php require_once './configuration/login-control.php'; ?>
<?php require_once './configuration/language.php'; ?>
<?php require_once './configuration/session-check.php'; ?>
<?php $userGender = $user_details['gender']; ?>
<?php $userLanguage = $user_details['language']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SLTAX - <?= $translator->trans("profile-settings"); ?></title>
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
							<li class="breadcrumb-item active" aria-current="page"><?= $translator->trans("profile-settings"); ?></li>
						</ol>
					</nav>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-4">
					<div class="card mb-4">
						<div class="card-body text-center">
							<div class="card-body text-center">

								<div class="mb-3 text-danger"><?= $translator->trans("notready-use-yet"); ?></div>

								<img src="./configuration/images/user.jpg" alt="User Avatar" id="account-upload-img"  class="uploadedAvatar rounded-circle me-50" height="150" width="150">
								<div class="small font-italic text-muted mb-1 my-3"><?= $translator->trans("onlyimage"); ?></div>
								<div class="small font-italic mb-4"><?= $translator->trans("allowed-types"); ?></div>

								<label class="btn btn-primary mb-75 me-75 waves-effect waves-float waves-light disabled"><?= $translator->trans("upload-button"); ?></label>
								<input type="file" hidden="" accept="image/*">
								<button type="button" class="btn btn-outline-secondary mb-75 waves-effect disabled"><?= $translator->trans("reset-button"); ?></button>

							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-8">
					<div class="card mb-4">
						<div class="card-header"><?= $translator->trans("account-details"); ?></div>
						<div class="card-body">
							<div class="row gx-3">
								<div id="errormessage" class="custom-error" style="display: none;"></div>
								<div id="successmessage" class="custom-success" style="display: none;"></div>
							</div>
							<form action="settings" method="POST" id="settings-form" class="settings-validation" novalidate>
								<div class="row gx-3 mb-3">
									<div class="col-md-6">
										<label class="small mb-1" for="userFirstName"><?= $translator->trans("first-name"); ?></label>
										<input class="form-control" id="userFirstName" name="firstname" type="text" placeholder="<?= $translator->trans("settings-enter-firstname"); ?>" value="<?= $user_details['firstname']; ?>">
									</div>
									<div class="col-md-6">
										<label class="small mb-1" for="userLastName"><?= $translator->trans("last-name"); ?></label>
										<input class="form-control" id="userLastName" name="lastname" type="text" placeholder="<?= $translator->trans("settings-enter-lastname"); ?>" value="<?= $user_details['lastname']; ?>">
									</div>
								</div>

								<div class="row gx-3 mb-3">
									<div class="col-md-6">
										<label class="small mb-1" for="userOrgName"><?= $translator->trans("organization-name"); ?></label>
										<input class="form-control" id="userOrgName" name="orgname" type="text" placeholder="<?= $translator->trans("settings-enter-orgname"); ?>" value="<?= $user_details['orgname']; ?>">
									</div>
									<div class="col-md-6">
										<label class="small mb-1" for="userLocation"><?= $translator->trans("location"); ?></label>
										<input class="form-control" id="userLocation" name="location" type="text" placeholder="<?= $translator->trans("settings-enter-location"); ?>" value="<?= $user_details['location']; ?>">
									</div>
								</div>

								<div class="row gx-3 mb-3">
									<div class="col-md-6">
										<label class="small mb-1" for="userPhone"><?= $translator->trans("phone-number"); ?></label>
										<input class="form-control" id="userPhone" name="telephone" type="tel" placeholder="<?= $translator->trans("settings-enter-phonenum"); ?>" value="<?= $user_details['telephone']; ?>">
									</div>
									<div class="col-md-6">
										<label class="small mb-1" for="userGender"><?= $translator->trans("select-gender"); ?></label>
										<select class="form-control" aria-label="<?= $translator->trans("settings-select-gender"); ?>" name="gender" id="userGender" required>
											<option value="0" <?= (!$userGender) ? 'selected' : ''; ?> disabled><?= $translator->trans("settings-select-gender"); ?></option>
											<option value="1" <?= ($userGender == "Male") ? 'selected' : ''; ?>><?= $translator->trans("select-male"); ?></option>
											<option value="2" <?= ($userGender == "Female") ? 'selected' : ''; ?>><?= $translator->trans("select-female"); ?></option>
											<option value="3" <?= ($userGender == "I dont want specify") ? 'selected' : ''; ?>><?= $translator->trans("select-specify"); ?></option>
										</select>
									</div>
								</div>

								<div class="mb-3">
									<label class="small mb-1" for="userBio"><?= $translator->trans("biography"); ?></label>
									<textarea class="form-control" id="userBio" name="bio" placeholder="<?= $translator->trans("settings-enter-biography"); ?>" rows="4"><?= $user_details['bio']; ?></textarea>
								</div>

								<div class="mb-3">
									<div class="col-md-12">
										<label class="small mb-1" for="userLanguage"><?= $translator->trans("select-language"); ?></label>
										<select class="form-control" aria-label="<?= $translator->trans("settings-select-language"); ?>" name="language" id="userLanguage" required>
											<option value="0" <?= (!$userGender) ? 'selected' : ''; ?> disabled><?= $translator->trans("settings-select-language"); ?></option>
											<option value="1" <?= ($userLanguage == "de") ? 'selected' : ''; ?>><?= $translator->trans("language-de"); ?></option>
											<option value="2" <?= ($userLanguage == "en") ? 'selected' : ''; ?>><?= $translator->trans("language-en"); ?></option>
											<option value="3" <?= ($userLanguage == "es") ? 'selected' : ''; ?>><?= $translator->trans("language-es"); ?></option>
											<option value="4" <?= ($userLanguage == "it") ? 'selected' : ''; ?>><?= $translator->trans("language-it"); ?></option>
											<option value="5" <?= ($userLanguage == "pt") ? 'selected' : ''; ?>><?= $translator->trans("language-pt"); ?></option>
											<option value="6" <?= ($userLanguage == "ru") ? 'selected' : ''; ?>><?= $translator->trans("language-ru"); ?></option>
											<option value="7" <?= ($userLanguage == "tr") ? 'selected' : ''; ?>><?= $translator->trans("language-tr"); ?></option>
										</select>
									</div>
								</div>

								<button type="submit" name="submit" class="btn btn-warning"><?= $translator->trans("save-changes"); ?></button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once './configuration/assets/footer-files.php'; ?>
	<script type="text/javascript" src="./configuration/js/pages/settings.js"></script>
</body>
</html>