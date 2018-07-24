<?php 
/*Questions
*
*/
ob_start();
session_start();

//If user is already ligged in, redirect to big_list_boot.php
if(isset($_SESSION['user'])) {
	header('Location: big_list_boot.php');
	exit;
}

/*
*Attemt to login user
*/
$error = false;
$errorMsg = '';

require_once('index_model.php');

checkConnection(); //My function defined in model.php

if (isset($_POST['btn_login'])) { //If login button was pushed
	list($email, $pass) = getEmailPass($_POST['email'], $_POST['pass']); //My functioin defined in model.php

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
		$pass = hash('sha256', $pass);
		//echo hash('sha256', '123456');
		//var_dump($pass);

		//Check that user is registered
		list($count, $row) = checkUser($email, $error, $errorMsg);

		//Contunue login
		if (!$error) {
			if ($count == 1 && $row[0]['pass'] == $pass) {//Single user found and passwords match
				$_SESSION['user'] = $row[0]['user_id'];
				header("Location: big_list_boot.php");
			} else { //If passwords not match
				var_dump($count);
				var_dump($row);
				var_dump($error);
				echo $errorMsg;
			}
		} else { //If error 
			var_dump($count);
			var_dump($row);
			var_dump($error);
			echo $errorMsg;
		}//else is missing because it was given in index_model.php
	} else { //If $error == true
		echo $errorMsg;
	}
}

//Display HTML page
require_once('index_view.php');