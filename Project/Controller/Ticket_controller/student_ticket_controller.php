<?php 
require_once('../../Model/Tickets.php');

$tickets = getTicketJson();

require_once('../../View/student_page.php');