<?php 

ob_start();
session_start();

//Redirect if button was no pushed
/*if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
} else {
	header ('Location: cars_locations.php');
}*/

//Log out and redirect when button "Log out" was pushed
if (isset($_GET['logout'])) {
	unset($_SESSION['user'], $_SESSION['rights']);
	session_unset();
	session_destroy();
	header('Location: index_controller.php');

	/*$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index_controller.php';
	echo "http://$host$uri/Session_controller/$extra"; 
	header("Location: http://$host$uri/$extra");
	exit;*/
}
exit;
?>