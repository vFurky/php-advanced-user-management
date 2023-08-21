<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-control.php';

if(@$_SERVER['HTTP_X_REQUESTED_WITH'] && strtolower(@$_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	try {

		$enable = "Enabled";
		$disable = "Disabled";

		if($user['2fa_status'] == "Enabled") {
			$_SESSION['user']['2fa_status'] = $disable;
			$query  = $db->prepare("UPDATE users SET 2fa_status = ? WHERE username = ?");
			$query -> bindParam(1, $disable, PDO::PARAM_STR);
			$query -> bindParam(2, $user_username, PDO::PARAM_STR);
			$query -> execute();
		} else if($user['2fa_status'] == "Disabled") {
			$_SESSION['user']['2fa_status'] = $enable;
			$query  = $db->prepare("UPDATE users SET 2fa_status = ? WHERE username = ?");
			$query -> bindParam(1, $enable, PDO::PARAM_STR);
			$query -> bindParam(2, $user_username, PDO::PARAM_STR);
			$query -> execute();
		} else {
			$_SESSION['user']['2fa_status'] = $enable;
			$query  = $db->prepare("UPDATE users SET 2fa_status = ? WHERE username = ?");
			$query -> bindParam(1, $enable, PDO::PARAM_STR);
			$query -> bindParam(2, $user_username, PDO::PARAM_STR);
			$query -> execute();
		}

	}

	catch (PDOExpection $e) {
		echo 'Error: ' . $e -> getMessaage();
	}

} else {
	return false;
}