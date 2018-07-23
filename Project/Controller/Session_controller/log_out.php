<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: log_in.php");
} else if (isset($_SESSION['user']) != "") {
	header("Location: home.php");
}
if (isset($_GET['logout'])) {
	unset($_SESSION['user']);
	session_unset();
	session_destroy();
	header("Location: log_in.php");
	exit;
}
?>