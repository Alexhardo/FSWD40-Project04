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

//Load model
require_once('../../Model/add_user_model.php');

//Register new user
if (isset($_POST['btn_register_user'])) {

	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$rights = $_POST['rights'];

	/*var_dump($firstName);
	var_dump($lastName);
	var_dump($email);
	var_dump($pass);
	var_dump($rights);*/

	//Save new user to DB
	$addingOK = addUser($firstName, $lastName, $email, $pass, $rights);

	//Redirect to admin dashboard and pass success via get
	if ($addingOK) {
		header("Location: ../Session_controller/admin_dashboard_controller.php?success=1&firstName=$firstName&lastName=$lastName&rights=$rights");
	} else {
		echo "Failed to add new user";
	}
}

//Show page
require_once('../Session_controller/test_new_user_form.php');