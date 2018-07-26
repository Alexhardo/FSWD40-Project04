<?php
  require_once('../../Config/mySQL_functions.php');
  
  function changeTicketStatus(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $ticketId=$_GET['ticketid'];
   $ticketStatus=$_GET['status'];
   $fk_teacher_id=$_GET['teacher_id'];
   $epoqe=strtotime("now");
   $closedate=date("Y-m-d H:i:s",$epoqe);

   $sql="update tickets set ticket_status='".$ticketStatus."' where ticket_id='".$ticketId."'";
   $sql3="update tickets set fk_teacher_id='".$fk_teacher_id."' where ticket_id='".$ticketId."'";
   $sql2="update tickets set close_date_time='".$closedate."' where ticket_id='".$ticketId."'";

   $result3 = queryDatabase($mysqli,$sql3);
    if(!$result3) {
      echo "error";
    }
   $result = queryDatabase($mysqli, $sql);
   if($ticketStatus=='closed'){queryDatabase($mysqli,$sql2);}
   if($result)
    {
    // echo 'ticket status updated';
    //  echo " ".$sql2." ";
    //  $host  = $_SERVER['HTTP_HOST'];
    //  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     header("Location: ../Ticket_controller/teacher_ticket_controller.php");
    }
   else
    {echo 'error! ticket status could not be updated';}
  }
  
?>  