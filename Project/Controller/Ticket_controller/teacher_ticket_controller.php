<?php 
ob_start();
session_start();

//Check that other users not allowd to access the page
if (!isset($_SESSION['user'])) {
	header('Location: ../Session_controller/index_controller.php');
	exit;
} elseif($_SESSION['rights'] == 'admin') {
	header('Location: ../Session_controller/admin_dashboard_controller.php');
	exit;
} elseif($_SESSION['rights'] == 'student') {
	header('Location: student_ticket_controller.php');
	exit;
}

require_once('../../Model/Tickets.php');

$tickets = getTicketJson();

require_once('../../View/teacher_page.php');