<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="../Session_controller/index_controller.php"><h3>Codefactory help.</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <!-- Ticekts should be present only when user logged in -->
          <?php 
            if(isset($_SESSION['user'])!="") {
              if($_SESSION['rights'] == 'teacher' || $_SESSION['rights'] == 'student'){ ?>
                <li class="nav-item mr-5">
                  <?php if($_SESSION['rights'] == 'student'): ?>
                  <a class="nav-link" href="../Ticket_controller/student_ticket_controller.php">Tickets</a>
                  <?php endif ?>
                  <?php if($_SESSION['rights'] == 'teacher'): ?>
                  <a class="nav-link" href="../Ticket_controller/teacher_ticket_controller.php">Tickets</a>
                  <?php endif ?>
                </li>
              <?php }
            }
          ?>
          <?php 
          if(isset($_SESSION['user'])!="") {
          if($_SESSION['rights'] == 'admin') { ?>
            <li class="nav-item mr-5">
              <a class="nav-link" href="../Session_controller/admin_dashboard_controller.php">Admin panel</a>
            </li>
           <?php  }
          }
          ?>
          
          <li class="nav-item mr-5">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <!-- Logout should be present only when user logged in. -->
          <?php if(isset($_SESSION['user'])!=""): ?>
          <li class="nav-item">        
            <a class="nav-link" href="../Session_controller/logOut_controller.php?logout=1">Logout</a>
          </li>
          <?php endif ?>
        </ul>
      </div>
  </div>
</nav>
