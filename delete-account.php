<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-control.php';

if(@$_SERVER['HTTP_X_REQUESTED_WITH'] && strtolower(@$_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	try {

		$query = $db -> prepare("DELETE FROM users WHERE username = :username");
		$query2 = $db -> prepare("DELETE FROM user_details WHERE username = :username");
		$query3 = $db -> prepare("DELETE FROM user_datas WHERE username = :username");

		$query -> bindParam(":username", $user_username, PDO::PARAM_STR);
		$query2 -> bindParam(":username", $user_username, PDO::PARAM_STR);
		$query3 -> bindParam(":username", $user_username, PDO::PARAM_STR);

		$query -> execute();
		$query2 -> execute();
		$query3 -> execute();


	}

	catch (PDOExpection $e) {
		echo 'Error: ' . $e -> getMessaage();
	}

} else {
	return false;
}