<?php 
//DB connetion parameters
DEFINE('DBHOST', 'localhost');
DEFINE('DBUSER', 'root');
DEFINE('DBPASS', '');
DEFINE('DBNAME', 'help_ticket');

require_once('../../Config/mySQL_functions.php');

function addUser($firstName, $lastName, $email, $pass, $rights) {
	$mysqli = openConnection(DBHOST, DBUSER, DBPASS, DBNAME);

	$sql = "INSERT INTO users (first_name, last_name, email, pass, rights)
					VALUES ('$firstName', '$lastName', '$email', '$pass', '$rights')";

	$result =	insertDatabase($mysqli, $sql);

	closeConnection($mysqli);

	return $result;
}