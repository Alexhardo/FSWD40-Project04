<?php
ob_start();
session_start();

 require_once('../../Config/mySQL_functions.php');
 
 function getAssignedTeachers(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   //$userid=$_SESSION['user'];
   $courseid=$_GET['courseid'];
   $sql="select users.first_name,users.last_name,users.user_id from users inner join link_users_courses on link_users_courses.fk_course_id=$courseid where users.user_id = link_users_courses.fk_user_id ";

   $result = queryDatabase($mysqli, $sql);
   if($result)
    {$count = countRows($result);
     if($count>0)
      {$row = fetchAllRows($result);
       echo "json ";
       echo json_encode($row);
       return json_encode($row);
      }
     else
      {echo "error! data could not be retrieved";}
    }

 }
  getAssignedTeachers();

?>
