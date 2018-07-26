<?php
  //DB connetion parameters
  DEFINE('DBHOST', 'localhost');
  DEFINE('DBUSER', 'root');
  DEFINE('DBPASS', '');
  DEFINE('DBNAME', 'help_ticket');

  require_once('../../Config/mySQL_functions.php');

  function enrollStudent($studentId, $courseId, &$errorMsg) {
    echo 'Student: <br>';
    var_dump($studentId);
    echo 'Course: <br>';
    var_dump($courseId);
    $mysqli = openConnection(DBHOST, DBUSER, DBPASS, DBNAME);
    $sql = "INSERT INTO link_users_courses
                   (fk_course_id, fk_user_id)
            VALUES ($courseId, $studentId)";

    $result = queryDatabase($mysqli, $sql);

    closeConnection($mysqli);

    if ($result) {
      return false; //returns to variable $error
    } else {
      $errorMsg = 'Student was not enrolled';
      return true;
    }
  }

  function getUserId($email) {
    /**
     * Returns ID of the last registered user in a dirty way
     */
    $mysqli = openConnection(DBHOST, DBUSER, DBPASS, DBNAME);

    $sql = "SELECT user_id
            FROM users
            WHERE email = '$email'";

    $result = queryDatabase($mysqli, $sql);
    $userId = fetchAllRows($result);
    closeConnection($mysqli);

    return $userId[0]['user_id'];
  }
  
  function registerStudent(){
   $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');
   $firstname=$_GET['first_name'];
   $lastname=$_GET['last_name'];
   $email=$_GET['email'];
   $pass=$_GET['pass'];
   $rights=$_GET['rights'];
   $courseId=$_GET['course'];

   $sql="insert into users (first_name,last_name,email,pass,rights) values ('$firstname','$lastname','$email','$pass','$rights')";
   echo $sql." \n ";
   $result = queryDatabase($mysqli, $sql);

   $error = true;
   $errorMsg = '';

   if($result)
    {
      $error = false;
    } else
    {
      $error = true;
    }

   //Get user's ID
    $userId = getUserId($email);

    //Check user ID
    if (!is_numeric((int)$userId)) {
      var_dump($userId);
      $error = true;
      $errorMsg .= 'User ID not found';
    }

   //Enroll new student to a course
    if (!$error) {
      $error = enrollStudent($userId, $courseId, $errorMsg);
    }
  
   if(!$error) {
    echo 'student has been registered ';
    header("Location: ../Ticket_controller/teacher_ticket_controller.php");
   }
   else {
    echo $errorMsg;
   }

   /*if($result)
    {echo 'student has been registered ';
      header("Location: ../Ticket_controller/teacher_ticket_controller.php");
    }
   else
    {echo 'error! registering student failed';}*/
  }

  function getCourses() {
    $mysqli = openConnection(DBHOST, DBUSER, DBPASS, DBNAME);

    $sql = "SELECT course_id, name
            FROM courses";

    $result = queryDatabase($mysqli, $sql);
    $courses = fetchAllRows($result);
    closeConnection($mysqli);

    return $courses;
  }
?>  