<?php 
require_once('../../Model/Tickets.php');

$tickets = getTicketJson();

require_once('../../View/teacher_page.php');