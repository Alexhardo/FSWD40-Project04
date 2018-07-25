<?php
  require_once('../../Config/mySQL_functions.php');
  
  function registerStudent(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $firstname=$_GET['first_name'];
   $lastname=$_GET['last_name'];
   $email=$_GET['email'];
   $pass=$_GET['pass'];
   $rights=$_GET['rights'];

   $sql="insert into users (first_name,last_name,email,pass,rights) values ('$firstname','$lastname','$email','$pass','$rights')";
   echo $sql." \n ";
   $result = queryDatabase($mysqli, $sql);
   if($result)
    {echo 'student has been registered ';
      header("Location: ../Ticket_controller/teacher_ticket_controller.php");
    }
   else
    {echo 'error! registering student failed';}
  }
?>  