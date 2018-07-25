<?php 
ob_start();
session_start();

//Check that user is allowd to access the page
if (!isset($_SESSION['user'])) {
	header('Location: index_controller.php');
	exit;
} elseif($_SESSION['rights'] == 'student') {
	header('Location: user_dashboard_controller.php');
	exit;
}
// @todo: Add redirect for students and teachers

$error = false;
$errorMsg = '';

//Load model
require_once('../../Model/admin_dashboard_model.php');

checkConnection(); //My function defined in model.php

$coursesJson = getAllTableContent('courses');
$ticketsJson = getAllTickets();
$usersJson = getAllTableContent('users');

$userId = $_SESSION['user'];
$currentUserJson = getCurrentUserData($userId);
echo "Current user data: <br>";
echo $currentUserJson;

//Show page
require_once('../../View/admin_page.php');