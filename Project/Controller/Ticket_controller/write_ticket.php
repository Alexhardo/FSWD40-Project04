<?php
ob_start();
session_start();

 require_once('../../Config/mySQL_functions.php');
 
 $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
 $userid=$_GET['user_id'];
 $title=$_GET['title'];
 $courseid=$_GET['course_id']; 
 $description=$_GET['description'];

  $epoqe=strtotime("now");
  $opendate=date("Y-m-d H:i:s",$epoqe);

 $sql="insert into tickets (fk_student_id,title,fk_topic_id,description,fk_course_id,open_date_time,ticket_status) values ($userid,'$title',2,'$description',$courseid,'$opendate','open')";   

 $result = queryDatabase($mysqli, $sql);

 if($result) {
  header("Location: student_ticket_controller.php");
 }


?>
