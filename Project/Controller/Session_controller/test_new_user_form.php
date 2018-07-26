<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<!-- @todo: prettify back button -->
<div class="container">
<a href="../Session_controller/admin_dashboard_controller.php"><button class="mt-5 btn btn-light" type="button">Back to admin panel</button></a>
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Register a new User.</h1>
            <form action="add_user_controller.php" method="post">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
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
                    <select class="custom-select" id="inputGroupSelect01" name="rights">
                        <option selected>Choose...</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-light" name="btn_register_user">Register!</button>
            </form>
        </div>
        <div class="img col-lg-7 mt-5">
            <img src="../../images/user_reg.png" style="width: 100%;" alt="">
        </div>
    </div>    
</div>
<?php include "../../View/inc/footer.php" ?>