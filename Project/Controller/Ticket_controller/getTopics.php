<?php
ob_start();
session_start();

 require_once('../../Config/mySQL_functions.php');
 
 $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');

 $sql="select * from topics"; 
 $result = queryDatabase($mysqli, $sql);



 if(!$result)
  {echo "wrong SQL statement";}
 else
  {$row = fetchAllRows($result);
   echo json_encode($row);
  }

?>
