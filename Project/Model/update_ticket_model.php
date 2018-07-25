<?php
  require_once('../../Config/mySQL_functions.php');
  
  function changeTicketStatus(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $ticketId=$_GET['ticketid'];
   $ticketStatus=$_GET['status'];
   $epoqe=strtotime("now");
   $closedate=date("Y-m-d H:i:s",$epoqe);

   $sql="update tickets set ticket_status='".$ticketStatus."' where ticket_id='".$ticketId."'";
   $sql2="update tickets set close_date_time='".$closedate."' where ticket_id='".$ticketId."'";

   $result = queryDatabase($mysqli, $sql);
   if($ticketStatus=='closed'){queryDatabase($mysqli,$sql2);}
   if($result)
    {echo 'ticket status updated';
     echo " ".$sql2." ";
     $host  = $_SERVER['HTTP_HOST'];
     $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     //header("Location: http://$host$uri/teacher_ticket_controller.php");
    }
   else
    {echo 'error! ticket status could not be updated';}
  }
?>  