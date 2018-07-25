<?php
//DB connetion parameters
DEFINE('DBHOST', 'localhost');
DEFINE('DBUSER', 'root');
DEFINE('DBPASS', '');
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

function getAllTickets() {
	$mysqli = openConnection (DBHOST, DBUSER, DBPASS, DBNAME);

	$sql = "SELECT ticket_id, fk_student_id, CONCAT(users.first_name, ' ', users.last_name) AS student_name, title, fk_topic_id, topics.name AS topic_name, fk_course_id, courses.name AS course_name, courses.description, fk_teacher_id, CONCAT(teachers.first_name, ' ', teachers.last_name), open_date_time, close_date_time, ticket_status
					FROM tickets
					INNER JOIN users
						ON tickets.fk_student_id = users.user_id
					INNER JOIN topics
						ON tickets.fk_topic_id = topics.topic_id
					INNER JOIN courses
						ON tickets.fk_course_id = courses.course_id
					INNER JOIN users AS teachers
						ON tickets.fk_teacher_id = teachers.user_id";

	$result = queryDatabase($mysqli, $sql);
	$resultArray = fetchAllRows($result);
	$ticketsJson = json_encode($resultArray);
	closeConnection($mysqli);
	//var_dump($resultArray);

	return $ticketsJson;
}

function getCurrentUserData ($userId) {
	$mysqli = openConnection (DBHOST, DBUSER, DBPASS, DBNAME);

	$sql ="SELECT * FROM users
				 WHERE user_id = $userId";

	$result = queryDatabase($mysqli, $sql);
	$resultArray = fetchAllRows($result);
	$userJson = json_encode($resultArray);
	closeConnection($mysqli);
	//var_dump($resultArray);

	return $userJson;
}