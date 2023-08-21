<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-check.php';

/*
Status Codes (10)
10000 = Request & Register Successfull
10001 = Username Empty
10011 = Username Registered
10002 = Password Empty
10012 = Password Shorten 6 Digit
10102 = Repassword Empty
10112 = Passwords Not Match
10004 = Email Empty
10014 = Email Registered
10024 = Email Not Valid

90077 = Data Error
90078 = Multiple Data Error
*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(@$_POST['register-username']) {
		@$register_username = CleanText($_POST['register-username']);
		$username_control = $db -> query("SELECT * FROM users WHERE username = '$register_username'") -> fetch();
	};

	if(@$_POST['register-email']) {
		@$register_email = CleanText($_POST['register-email']);
		$email_control = $db -> query("SELECT * FROM user_details WHERE email = '$register_email'") -> fetch();
	};

	if($_POST['register-username']) {
		if(!$username_control) {
			if($_POST['register-email']) {
				if(filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL)) {
					if(!$email_control) {
						if($_POST['register-password']) {
							if(strlen($_POST['register-password']) > 6) {
								if($_POST['register-repassword']) {
									if($_POST['register-password'] == $_POST['register-repassword']) {

										date_default_timezone_set('America/New_York');
										$register_password = md5(sha1($_POST['register-password']));
										$permission = 'User';
										$ip = encrypt(UserIPAddress());
										$browser = encrypt(UserBrowser());
										$os = encrypt(UserOS());
										$device_name = encrypt(UserDeviceName());
										$device = encrypt(DeviceDetect());
										$last_login = date("d-m-Y H:i");
										$setup_status = "0";


										try {

											$query = $db -> prepare("INSERT INTO users(username, password, permission) VALUES (:register_username, :register_password, :permission)");
											$query -> bindParam(':register_username', $register_username);
											$query -> bindParam(':register_password', $register_password);
											$query -> bindParam(':permission', $permission);
											$query -> execute();


											$query2 = $db -> prepare("INSERT INTO user_datas(username, ip_address, browser, device, device_name, os, last_login) VALUES (:username, :ip_address, :browser, :device, :device_name, :os, :last_login)");
											$query2 -> bindParam(":username", $register_username);
											$query2 -> bindParam(":ip_address", $ip);
											$query2 -> bindParam(":browser", $browser);
											$query2 -> bindParam(":device", $device);
											$query2 -> bindParam(":device_name", $device_name);
											$query2 -> bindParam(":os", $os);
											$query2 -> bindParam(":last_login", $last_login);
											$query2 -> execute();


											$query3 = $db -> prepare("INSERT INTO user_details(username, email, setup_status) VALUES (:username, :email, :setup_status)");
											$query3 -> bindParam(":username", $register_username);
											$query3 -> bindParam(":email", $register_email);
											$query3 -> bindParam(":setup_status", $setup_status);
											$query3 -> execute();


											if($query -> rowCount() > 0) {
												if($query2 -> rowCount() > 0 && $query3 -> rowCount() > 0) {
													echo '10000';
												} else echo '90078';
											} else echo '90077';

										} catch (PDOExpection $e) {
											$error = '<i data-feather="x"></i> ' . $e;
										}

									} else echo '10112';
								} else echo '10102';
							} else echo '10012';
						} else echo '10002';
					} else echo '10014';
				} else echo '10024';
			} else echo '10004';
		} else echo '10011';
	} else echo '10001';

} else {
	require realpath('.') . '/view-register.php';
}