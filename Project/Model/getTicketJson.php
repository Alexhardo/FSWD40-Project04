<?php 
  require_once('../Config/mySQL_functions.php');


 function getTicketJson()
   {$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');

   /*$sql = "SELECT tickets.ticket_id,tickets.fk_topic_id,tickets.fk_teacher_id,tickets.open_date_time,tickets.close_date_time.tickets.ticket_status,tickets.fk_student_id,tickets.title,tickets.description,users.last_name,users.first_name from tickets inner join users on tickets.fk_student_id=users.user_id";*/
   
   $sql = "SELECT *,users.last_name,users.first_name from tickets inner join users on tickets.fk_student_id=users.user_id";
   //$sql="SELECT tickets.title from tickets";
   $result = queryDatabase($mysqli, $sql);
   //$row="nocontent";

   if($result)
    {$count = countRows($result);
     if($count>0)
      {$row = fetchAllRows($result);
       
       //echo "rows fetched";	
       //echo $row[0]['title'];
       //echo $row[0]['fk_student_id'];
       //echo json_encode($row);	
      }	 
     else {
      	echo "no result";
      } 
    } 
    else {echo "sql query wrong";}
    closeConnection($mysqli);
    $json=array();
    foreach($row as $data){
    $element=(object)["student"=>$data['first_name']." ".$data['last_name'],"title"=>$data['title'],"description"=>$data['description'],"fk_student_id"=>$data['fk_student_id'],"ticket_id"=>$data['ticket_id'],"fk_topic_id"=>$data['fk_topic_id'],"fk_teacher_id"=>$data['fk_teacher_id'],"open_date_time"=>$data['open_date_time'],"close_date_time"=>$data['close_date_time'],"ticket_status"=>$data['ticket_status']];
     array_push($json,$element);
    }
    echo json_encode($json);
  }

  //echo "getTicketJson";
  getTicketJson();
  //echo "function end";
?>  