<?php 
/*Questions
*
*/
ob_start();
session_start();

/*unset($_SESSION['user']);
session_unset();
session_destroy();*/

// @todo Include redirect for a logged in user

/*
*Attemt to login user
*/
$error = false;
$errorMsg = '';

require_once('../../Model/index_model.php');

checkConnection(); //My function defined in model.php

if (isset($_POST['btn_login'])) { //If login button was pushed
	list($email, $pass) = getEmailPass($_POST['email'], $_POST['pass']); //My function defined in model.php

	//Check email input
	if (empty($email)) {
		$error = true;
		$errorMsg .= 'Please enter email!';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$errorMsg .= 'Pleas enter a valid email!';
		}

	//Check password input
	if (empty($pass)) {
		$error = true;
		$errorMsg .= ' Please enter password!';
	} 

	//If user input email and pass, continue to login
	if (!$error) {
		//!!! $pass = hash('sha256', $pass);
		//echo hash('sha256', '123456');
		//var_dump($pass);

		//Check that user is registered
		list($count, $row) = checkUser($email, $error, $errorMsg);

		//Contunue login
		if (!$error) {
			if ($count == 1 && $row[0]['pass'] == $pass) {//Single user found and passwords match
				$_SESSION['user'] = $row[0]['user_id'];
				
				$rights = getUserRights($email);
				//var_dump($rights);
				//die;
				$_SESSION['rights'] = $rights;

				//Redirect a user to corresponding dashboard page
				if (isset($_SESSION['rights']) && $_SESSION['rights'] == 'student') {
					header("Location: ../../View/student_page.php");	
				} elseif (isset($_SESSION['rights']) && $_SESSION['rights'] == 'admin') {
					header("Location: admin_dashboard_controller.php");
				} else {
					echo 'User is not a student and not an admin!';
					var_dump($_SESSION['rights']);
					die;
				}
			} else { //If passwords not match
				echo 'Password is wrong!<br>';
				/*var_dump($count);
				var_dump($row);
				var_dump($error);*/
			}
		} else { //If error 
			echo $errorMsg;
			/*var_dump($count);
			var_dump($row);
			var_dump($error);*/
		}//else is missing because it was given in index_model.php
	} else { //If $error == true
		echo $errorMsg;
	}
}

//Display log in page
require_once('../../View/index_view.php');