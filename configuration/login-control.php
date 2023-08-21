<?php

require_once './configuration/connect.php';

if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$user_username = $_SESSION['user']['username'];
	$user_details = $db -> query("SELECT * FROM user_details WHERE username = '$user_username'") -> fetch();
	$twofactor_status = $_SESSION['user']['2fa_status'];
	$_SESSION['language'] = ($user_details['language']) ? $user_details['language'] : 'en';
} else {
	Header("Location: ./login");
	exit;
}