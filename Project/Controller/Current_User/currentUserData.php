<?php
ob_start();
session_start();

 require_once('../../Model/current_user_model.php');

 getCurrentUserData();   

?>
