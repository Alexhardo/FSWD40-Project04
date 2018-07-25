<?php include "../../View/inc/head.php" ?>
<?php include '../../View/inc/navbar.php' ?>

<div class="container-fluid">
<div class="row">
    <div class="login-container col-lg-6 col-md-6">
        <h3 class="fontw100 col-lg-9 offset-lg-3">Need a help?<br>Asking for it never been easier.<br>Codefactory help has all the tools you need.</h3>
        <?php if(isset($_SESSION['user'])==""): ?>
        <div class="login-form col-lg-7 offset-lg-3">
            <form method="POST" action="index_controller.php">
                <h4 class="text-center">Sign in</h4>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" placeholder="john@doe.com">            
                </div>
                <div class="form-group">
                    <label for="pass">password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-light" name="btn_login">Sign in</button>
            </form>
        </div>
        <?php else: ?>
        <?php if($_SESSION['rights'] == 'teacher'): ?>
        <a href="../Ticket_controller/teacher_ticket_controller.php">
        <div class="buttonDepth col-lg-4 offset-lg-3 mt-5">
            Go to tickets dashboard.
        </div>
        </a>
        <?php endif ?>
        <?php if($_SESSION['rights'] == 'student'): ?>
        <a href="../Ticket_controller/student_ticket_controller.php">
        <div class="buttonDepth col-lg-4 offset-lg-3 mt-5">
            Go to tickets dashboard.
        </div>
        </a>
        <?php endif ?>
        <?php if($_SESSION['rights'] == 'admin'): ?>
        <a href="../Session_controller/admin_dashboard_controller.php">
        <div class="buttonDepth col-lg-4 offset-lg-3 mt-5">
            Go to admin panel.
        </div>
        </a>
        <?php endif ?>
       
        <?php endif ?>
    </div>
    <div class="img-holder col-lg-6 col-md-6">
        <img src="../../images/help.png" alt="">
    </div>
</div>
</div>
<?php include "../../View/inc/footer.php" ?>
<script>

    $(function($) {
    $(".buttonDepth").hover(function(){
        $(this).toggleClass("is-active");
    });          
  });

</script>