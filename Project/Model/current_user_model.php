<?php
  require_once('../../Config/mySQL_functions.php');
  
  function getCurrentUserData(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $userid=$_SESSION['user'];
   $sql="SELECT * from users where user_id=$userid";
   $result = queryDatabase($mysqli, $sql);
   if($result)
    {$count = countRows($result);
     if($count>0)
      {$row = fetchAllRows($result);
       echo json_encode($row);
      }
     else
      {echo "error! data could not be retrieved";}
    }

  }
?>  