<?php
  require_once('../../Config/mySQL_functions.php');
  
  function getCurrentUserData(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $userid=$_SESSION['user'];
  //  $sql="SELECT * from users where user_id=$userid";
   $sql = "SELECT * FROM `users` join link_users_courses on link_users_courses.fk_user_id = users.user_id join courses on courses.course_id = link_users_courses.fk_course_id where user_id=$userid";
   $result = queryDatabase($mysqli, $sql);
   if($result)
    {$count = countRows($result);
     if($count>0)
      {$row = fetchAllRows($result);
       return json_encode($row);
      }
     else
      {echo "error! data could not be retrieved";}
    }

  }
?>  