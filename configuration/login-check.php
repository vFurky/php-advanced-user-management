<?php

require_once './configuration/connect.php';

if(isset($_SESSION['user'])) {
	Header("Location: ./homepage");
	exit;
} else {
	return;
}