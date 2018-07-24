<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>

<div class="container-fluid">
<div class="row">
    <div class="login-container col-lg-6 col-md-6">
        <h3 class="fontw100 col-lg-9 offset-lg-3">Need a help?<br>Asking for it never been easier.<br>Codefactory help has all the tools you need.</h3>
        <div class="login-form col-lg-7 offset-lg-3">
            <form method="POST" action="index_controller.php">
                <h4 class="text-center">Sign in</h4>
                <div class="form-group">
                    <label for="inputEmail">email</label>
                    <input type="email" class="form-control" name="inputEmail" placeholder="john@doe.com">            
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-light" name="btn_login">Sign in</button>
            </form>
        </div>
    </div>
    <div class="img-holder col-lg-6 col-md-6">
        <img src="../../images/help.png" alt="">
    </div>
</div>
</div>
<?php include "../../View/inc/footer.php" ?>