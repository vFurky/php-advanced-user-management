<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-check.php';

/*
Status Codes (4)
10000 = Request & Login Successfull
10001 = Username Empty
10002 = Password Empty
10003 = Invalid Account Information
50000 = 2FA Redirect
*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(@$_POST['login-username'] && @$_POST['login-password']) {
		@$username = CleanText($_POST['login-username']);
		@$password = CleanText(md5(sha1($_POST['login-password'])));
		$user = $db -> query("SELECT * FROM users WHERE username = '$username' AND password = '$password'") -> fetch();
	};

	if($_POST['login-username']) {
		if($_POST['login-password']) {
			if($user) {

				if($user['2fa_status'] == "Enabled") {
					$_SESSION['login_status'] = "waiting_2fa";
					$_SESSION['user_username'] = $user['username'];
					$_SESSION['user_token'] = $user['token'];
					$_SESSION['user_waiting'] = $user;
					echo '50000';
				} else {
					$ip = encrypt(UserIPAddress());
					$browser = encrypt(UserBrowser());
					$os = encrypt(UserOS());
					$device_name = encrypt(UserDeviceName());
					$device = encrypt(DeviceDetect());
					$last_login = date("d-m-Y H:i");

					updateLoginDatas($username, $ip, $browser, $device, $device_name, $os, $last_login);
					updateSession($username);
					$_SESSION['login_status'] = "login";
					$_SESSION['user'] = $user;
					echo '10000';
				}

			} else echo '10003'; 
		} else echo '10002';
	} else echo '10001';

} else {
	require realpath('.') . '/view-login.php';
}