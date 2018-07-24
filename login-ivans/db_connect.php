<?php 

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr10_ivan_zykov_biglibrary');

$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($mysqli->connect_error) {
		die('Connection failed: ' . $mysqli->connect_errno. ': ' . $mysqli->connect_error);
} else {
	echo "Connection live!<br>";
}