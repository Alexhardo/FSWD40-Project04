<?php 
ob_start();
session_start(); 
?>
<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Create a new Ticket.</h1>
            <form action="write_ticket.php" method="get">
                <div class="form-group">
                    <label for="email">Subject</label>
                    <input type="text" class="form-control" name="title" placeholder="title">            
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Topic</label>
                </div>
                
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <?php
                      require_once('../../Config/mySQL_functions.php');
 
                      $mysqli = openConnection ('localhost', 'root', '', 'help_ticket');

                      $sql="select * from topics"; 
                      $result = queryDatabase($mysqli, $sql);



                      if(!$result)
                       {echo "// wrong SQL statement";}
                      else
                       {$row = fetchAllRows($result);
                        //echo "var topicdata=".json_encode($row).";";
                       }
                      foreach($row as $op)
                       {echo "<option value='".$op['topic_id']."' >".$op['name']."</option>";
                       }       
                     ?>
                </select>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="10" cols="50" class="form-control" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-light" name="btn_login">Create a Ticket!</button>
                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
                <input type="hidden" name="course_id" value="<?php echo $_GET['course_id'] ?>">
                
            </form>
        </div>
    </div>    
        <div class="img col-lg-7 mt-5">
            <img src="../../images/vigi_02.png" alt="">
        </div>
</div>
<?php include "../../View/inc/footer.php" ?>

