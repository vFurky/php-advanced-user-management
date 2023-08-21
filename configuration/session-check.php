<?php

require_once './configuration/connect.php';

date_default_timezone_set('America/New_York');
$now_date = $now_date = date("d-m-Y");
$last_session = $user['session'];

if(strtotime($now_date) > strtotime($last_session) || strtotime($now_date) == strtotime($last_session)) {
	Header("Location: ./logout");
	exit;
} else {
	return;
}