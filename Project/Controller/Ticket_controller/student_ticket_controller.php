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
} elseif($_SESSION['rights'] == 'teacher') {
	header('Location: teacher_ticket_controller.php');
	exit;
}
require_once('../../Model/current_user_model.php');


require_once('../../Model/Tickets.php');

$tickets = getTicketJson();
$currentUser = getCurrentUserData();

require_once('../../View/student_page.php');