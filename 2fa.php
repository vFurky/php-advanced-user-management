<?php

require_once 'vendor/autoload.php';
require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-check.php';

use ParagonIE\ConstantTime\Base32;
use OTPHP\TOTP;

if(isset($_SESSION['login_status']) != "waiting_2fa") {
	Header("./logout");
	exit;
};

/*
Status Codes (2)
10000 = Login Succesfull
20000 = Wrong 2FA Code
*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$user_token = $_SESSION['user_token'];
	$secret = $user_token;
	$encodedSecret = Base32::encodeUpper($secret);
	$totp = TOTP::create($encodedSecret);
	$userInput = $_POST['twofactor_code'];
	$username = $_SESSION['user_username'];

	if($totp -> verify($userInput)) {
		$ip = encrypt(UserIPAddress());
		$browser = encrypt(UserBrowser());
		$os = encrypt(UserOS());
		$device_name = encrypt(UserDeviceName());
		$device = encrypt(DeviceDetect());
		$last_login = date("d-m-Y H:i");

		updateLoginDatas($username, $ip, $browser, $device, $device_name, $os, $last_login);
		updateSession($username);
		$_SESSION['login_status'] = "login";
		$_SESSION['user'] = $_SESSION['user_waiting'];
		unset($_SESSION['user_username']);
		unset($_SESSION['user_token']);
		unset($_SESSION['user_waiting']);
		session_write_close();
		echo '10000';
	} else {
		echo '20000';
	};


} else {
	require realpath('.') . '/view-2fa.php';
}