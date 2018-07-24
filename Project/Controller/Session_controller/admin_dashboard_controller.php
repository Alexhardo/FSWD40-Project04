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
echo 'Courses:<br>';
echo $coursesJson;
echo '<br><br>';

$ticketsJson = getAllTableContent('tickets');
echo 'Tickets:<br>';
echo $ticketsJson;
echo '<br><br>';

$usersJson = getAllTableContent('users');
echo 'Users:<br>';
echo $usersJson;
echo '<br><br>';

//Show page
require_once('../../View/admin_page.php');