<?php 
ob_start();
session_start();
?>
<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Register a new Student.</h1>
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