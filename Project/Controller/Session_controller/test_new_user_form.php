<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="login-form col-lg-5">
            <h1>Register a new User.</h1>
            <form>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="john@doe.com">            
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="text" class="form-control" name="pass" placeholder="password"> 
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Select type</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Teacher</option>
                    <option value="2">Student</option>
                </select>
                </div>
                <button type="submit" class="btn btn-light" name="btn_login">Register!</button>
            </form>
        </div>
        <div class="img col-lg-7 mt-5">
            <img src="../../images/user_reg.png" style="width: 100%;" alt="">
        </div>
    </div>    
</div>
<?php include "../../View/inc/footer.php" ?>