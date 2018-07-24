<?php 
  require_once('../../Config/mySQL_functions.php');


 function getTicketJson()
   {$mysqli = openConnection ('localhost', 'root', '', 'help_ticket');   
   $sql = "SELECT *,users.last_name,users.first_name from tickets inner join users on tickets.fk_student_id=users.user_id inner join topics on tickets.fk_topic_id = topics.topic_id";
   $result = queryDatabase($mysqli, $sql);

   if($result)
    {$count = countRows($result);
     if($count>0)
      {$row = fetchAllRows($result);	
      }	 
     else {
      	echo "no result";
      } 
    } 
    else {echo "sql query wrong";}
    closeConnection($mysqli);
    $json=array();
    foreach($row as $data){
    $element=(object)["student"=>$data['first_name']." ".$data['last_name'],"title"=>$data['title'],"description"=>$data['description'],"fk_student_id"=>$data['fk_student_id'],"ticket_id"=>$data['ticket_id'],"fk_topic_id"=>$data['fk_topic_id'],"fk_teacher_id"=>$data['fk_teacher_id'],"open_date_time"=>$data['open_date_time'],"close_date_time"=>$data['close_date_time'],"ticket_status"=>$data['ticket_status'],"name"=>$data['name']];
     array_push($json,$element);
    }
    return json_encode($json);
  }
?>  