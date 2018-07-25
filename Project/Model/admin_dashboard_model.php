<?php
//DB connetion parameters
DEFINE('DBHOST', 'localhost');
DEFINE('DBUSER', 'root');
DEFINE('DBPASS', 'root');
DEFINE('DBNAME', 'help_ticket');

//Functions to work with mySQL (mySQL-specific data access layer)
require_once('../../Config/mySQL_functions.php');

function checkConnection() {
	$mysqli = openConnection (DBHOST, DBUSER, DBPASS, DBNAME);
	showConnectionStatus($mysqli);
	closeConnection($mysqli);
}

function getAllTableContent($table) {
	$mysqli = openConnection (DBHOST, DBUSER, DBPASS, DBNAME);

	$sql = "SELECT *
					FROM $table";

	$result = queryDatabase($mysqli, $sql);
	$resultArray = fetchAllRows($result);
	$resultJson = json_encode($resultArray);
	closeConnection($mysqli);

	return $resultJson;
}