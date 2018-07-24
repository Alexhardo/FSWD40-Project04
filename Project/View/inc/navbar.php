<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h3>Codefactory help.</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <!-- Ticekts should be present only when user logged in -->
          <li class="nav-item mr-5">
            <a class="nav-link" href="#">Tickets</a>
          </li>
          <li class="nav-item mr-5">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <!-- Logout should be present only when user logged in. -->
          <li class="nav-item">        
            <a class="nav-link" href="../Session_controller/logOut_controller.php?logout=1">Logout</a>
          </li>
        </ul>
      </div>
  </div>
</nav>