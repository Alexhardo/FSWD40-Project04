<?php

//Functions to work with mySQL (mySQL-specific data access layer)

require_once('../../Config/mySQL_functions.php');

function checkConnection () {
	$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
	showConnectionStatus($mysqli);
	closeConnection($mysqli);
}

function getEmailPass($emailPost, $passPost) {
	/*
	*Escape string for email and pass input
	*/
	$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
	//showConnectionStatus($mysqli);
	$email = escapeString ($mysqli, $emailPost); //My function defined in mySQL_functions.php
	$pass = escapeString ($mysqli, $passPost);
	closeConnection($mysqli);
	return array($email, $pass);
}

function checkUser (&$email, &$error, &$errorMsg) {
	/*
	*Check that there is a user with such email
	*/
	$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
	//showConnectionStatus($mysqli);
	$sql = "SELECT user_id, email, pass
						FROM users
						WHERE email = '$email'";
	$result = queryDatabase($mysqli, $sql);
	$count = 0;

	if (is_object($result)) { //Result has to have something
		$count = countRows($result);
		if($count != 0) {
			$row = fetchAllRows($result);
			closeConnection($mysqli);
			//Clear variables
			if (isset($result)) {
				$result->free();
			}
			return array($count, $row);
			//var_dump($row[0]['pass']);
		} else { //If more than one record in DB for such an email found
			$error = true;
			closeConnection($mysqli);
			//Clear variables
			if (isset($result)) {
				$result->free();
			}
			$error = true;
			$errorMsg .= ' User with such email was not found!';
			return array(null, null);
		}
	} else {
		$error = true;
		closeConnection($mysqli);
		//Clear variables
		if (isset($result)) {
			$result->free();
		}
		$error = true;
		$errorMsg .= ' User with such email was not found!';
		return array(null, null);
	}
}

function getUserRights($email) {
	$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
	//showConnectionStatus($mysqli);
	$sql = "SELECT rights
						FROM users
						WHERE email = '$email'";
	$result = queryDatabase($mysqli, $sql);
	//$count = 0;

	$row = fetchAllRows($result);

	return $row[0]['rights'];

	/*if (is_object($result)) { //Result has to have something
		$count = countRows($result);
		if($count != 0) {
			$row = fetchAllRows($result);
			closeConnection($mysqli);
			//Clear variables
			if (isset($result)) {
				$result->free();
			}
			return array($count, $row);
			//var_dump($row[0]['pass']);
		} else { //If more than one record in DB for such an email found
			$error = true;
			closeConnection($mysqli);
			//Clear variables
			if (isset($result)) {
				$result->free();
			}
			$error = true;
			$errorMsg .= ' User with such email was not found!';
			return array(null, null);
		}
	} else {
		$error = true;
		closeConnection($mysqli);
		//Clear variables
		if (isset($result)) {
			$result->free();
		}
		$error = true;
		$errorMsg .= ' User with such email was not found!';
		return array(null, null);
	}*/
}