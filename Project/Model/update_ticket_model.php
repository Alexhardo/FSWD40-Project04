<?php
  require_once('../../Config/mySQL_functions.php');
  
  function changeTicketStatus(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $ticketId=$_GET['ticketid'];
   $ticketStatus=$_GET['status'];
   $sql="update tickets set ticket_status='".$ticketStatus."' where ticket_id='".$ticketId."'";
   $result = queryDatabase($mysqli, $sql);
   if($result)
    {echo 'ticket status updated';}
   else
    {echo 'error! ticket status could not be updated';}
  }
?>  