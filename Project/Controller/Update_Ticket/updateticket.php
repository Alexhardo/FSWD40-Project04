<?php
ob_start();
session_start();

 require_once('../../Model/update_ticket_model.php');

 changeTicketStatus();   

?>
