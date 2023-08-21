<?php

require_once './configuration/connect.php';
require_once './configuration/functions.php';
require_once './configuration/login-control.php';

/*
Status Codes (10)
10000 = Request & Update Successfull
20001 = First Name 
20002 = Last Name
20004 = Location
20005 = Telephone Num
20006 = Gender
20007 = Biography
20008 = Language
90000 = Data Error
*/

if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if($_POST['firstname']) {
		if($_POST['lastname']) {
			if($_POST['location']) {
				if($_POST['telephone'] && is_numeric($_POST['telephone']) && strlen($_POST['telephone']) == 10) {
					if($_POST['gender'] && $_POST['gender'] != "0") {
						if($_POST['bio']) {
							if($_POST['language'] && $_POST['language'] != 0) {

								if($_POST['gender'] == "1") {
									$gender = "Male";
								} else if($_POST['gender'] == "2") {
									$gender = "Female";
								} else if($_POST['gender'] == "3") {
									$gender = "I dont want specify";
								} else $gender = "Undefined";

								if($_POST['language'] == "1") {
									$language = "de";
								} else if($_POST['language'] == "2") {
									$language = "en";
								} else if($_POST['language'] == "3") {
									$language = "it";
								} else if($_POST['language'] == "4") {
									$language = "pt";
								} else if($_POST['language'] == "5") {
									$language = "ru";
								} else if($_POST['language'] == "6") {
									$language = "ru";
								} else if($_POST['language'] == "7") {
									$language = "tr";
								} else {
									$language = "en";
								}

								$firstname = $_POST['firstname'];
								$lastname = $_POST['lastname'];
								$orgname = ($_POST['orgname']) ? $_POST['orgname'] : '';
								$location = $_POST['location'];
								$telephone = $_POST['telephone'];
								$bio = $_POST['bio'];
								$setup_status = "1";

								$query  = $db->prepare("UPDATE user_details SET firstname = ?, lastname = ?, orgname = ?, location = ?, telephone = ?, gender = ?, bio = ?, language = ?, setup_status = ? WHERE username = ?");
								$query -> bindParam(1, $firstname, PDO::PARAM_STR);
								$query -> bindParam(2, $lastname, PDO::PARAM_STR);
								$query -> bindParam(3, $orgname, PDO::PARAM_STR);
								$query -> bindParam(4, $location, PDO::PARAM_STR);
								$query -> bindParam(5, $telephone, PDO::PARAM_STR);
								$query -> bindParam(6, $gender, PDO::PARAM_STR);
								$query -> bindParam(7, $bio, PDO::PARAM_STR);
								$query -> bindParam(8, $language, PDO::PARAM_STR);
								$query -> bindParam(9, $setup_status, PDO::PARAM_STR);
								$query -> bindParam(10, $user_username, PDO::PARAM_STR);
								$query -> execute();


								if($query -> rowCount() > 0) {
									echo '10000';
								} else {
									echo '90000';
								}

							} else echo '20008';
						} else echo '20007';
					} else echo '20006';
				} else echo '20005';
			} else echo '20004';
		} else echo '20002';
	} else echo '20001';

} else {
	require realpath('.') . '/view-settings.php';
}