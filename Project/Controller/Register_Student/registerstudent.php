<?php
ob_start();
session_start();

 require_once('../../Model/register_student_model.php');
 
 registerStudent();   

?>
