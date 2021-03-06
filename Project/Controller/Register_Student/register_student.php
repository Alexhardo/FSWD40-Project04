<!-- <h1>Register Student Form</h1>
<form action="../Controller/Register_Student/registerstudent.php" method="get">
<p><input placeholder="first name" type="text" name="first_name"></p>
<p><input placeholder="last name" type="text" name="last_name"></p>
<p><input placeholder="e-mail" type="text" name="email"></p>
<p><input placeholder="password" type="text" name="pass"></p>
<p><input name="rights" type="hidden" value="student"></p>
<p><button type="submit">register</button></p>
</form> -->
<?php 
/**
 *controller to query database to get a list of courses
 */

ob_start();
session_start();

require_once('../../Model/register_student_model.php');

$courses = getCourses();

//var_dump($courses);
?>

<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Register a new Student</h1>
            <form action="registerstudent.php" method="get">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John">            
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Doe">            
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="john@doe.com">            
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="password"> 
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Select type</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="course">
                        <option selected>Choose...</option>
                        <?php foreach ($courses as $oneCourse) { ?>
                            <option value="<?php echo $oneCourse['course_id']; ?>"><?php echo $oneCourse['name']; ?></option>    
                        <?php } ?>
                        <!-- <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option> -->
                    </select>
                </div>
                <p><input name="rights" type="hidden" value="student"></p>
                <button type="submit" class="btn btn-light" name="btn_login">Register!</button>
            </form>
        </div>
        <div class="img col-lg-7 mt-5">
            <img src="../../images/user_reg.png" style="width: 100%;" alt="">
        </div>
    </div>    
</div>
<?php include "../../View/inc/footer.php" ?>