<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-control.php';

/*
Status Codes (8)
10000 = Request Succesfull
20000 = Current Password
20001 = Wrong Current Password
20002 = New Password
20003 = New Password Format Error
20004 = New Repassword
20005 = New Repassword Dont Match
90000 = Data Error
*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if($_POST['currentpassword']) {
		@$currentpassword = CleanText(md5(sha1($_POST['currentpassword'])));
		$user_control = $db -> query("SELECT * FROM users WHERE username = '$user_username' AND password = '$currentpassword'") -> fetch();
	};

	if($_POST['currentpassword']) {
		if($_POST['newpassword']) {
			if(strlen($_POST['newpassword']) > 6) {
				if($_POST['newrepassword']) {
					if($_POST['newpassword'] == $_POST['newrepassword']) {
						if($user_control) {

							$new_password = CleanText(md5(sha1($_POST['newpassword'])));

							$query  = $db->prepare("UPDATE users SET password = ? WHERE username = ? AND password = ?");
							$query -> bindParam(1, $new_password, PDO::PARAM_STR);
							$query -> bindParam(2, $user_username, PDO::PARAM_STR);
							$query -> bindParam(3, $currentpassword, PDO::PARAM_STR);
							$query -> execute();


							if($query -> rowCount() > 0) {
								echo '10000';
							} else {
								echo '90000';
							}

						} else echo '20001';
					} else echo '20005';
				} else echo '20004';
			} else echo '20003';
		} else echo '20002';
	} else echo '20000';

} else {
	require realpath('.') . '/view-security.php';
}