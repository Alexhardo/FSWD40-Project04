<?php 
ob_start();
session_start();

//Check that other users not allowd to access the page
if (!isset($_SESSION['user'])) {
	header('Location: index_controller.php');
	exit;
} elseif($_SESSION['rights'] == 'student') {
	header('Location: ../Ticket_controller/student_ticket_controller.php');
	exit;
} elseif($_SESSION['rights'] == 'teacher') {
	header('Location: ../Ticket_controller/teacher_ticket_controller.php');
	exit;
}

//Show success message after new user was added
if (isset($_GET['success']) && $_GET['success'] == 1) {

	$firstName = $_GET['firstName'];
	$lastName = $_GET['lastName'];
	$rights = $_GET['rights'];

	echo "Added $firstName $lastName as a new $rights";
}

//Load model
require_once('../../Model/admin_dashboard_model.php');

checkConnection(); //My function defined in model.php

$coursesJson = getAllTableContent('courses');
$ticketsJson = getAllTickets();
$usersJson = getAllTableContent('users');

$userId = $_SESSION['user'];
$currentUserJson = getCurrentUserData($userId);


//Show page
require_once('../../View/admin_page.php');