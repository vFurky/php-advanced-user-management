<?php

if(!isset($_SESSION)) { 
	session_start(); 
};

if(isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	session_unset();
	session_destroy();
	Header("Location: ./login");
	exit;
} else {
	session_unset();
	session_destroy();
	Header("Location: ./login");
	exit;
};