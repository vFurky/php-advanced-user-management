<?php

if(!isset($_SESSION)) { 
	session_start(); 
};

$db_username = 'root';
$db_password = '';
$db_database = 'user_form';
$db_host = 'localhost';

try {
	$db = new PDO(
		"mysql:host=$db_host;dbname=$db_database", $db_username, $db_password,
		array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
		)
	);
}

catch (PDOExpection $e) {
	echo "Something went wrong.";
	echo "<br>";
	echo $e;
	die;
}