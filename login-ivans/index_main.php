<form class="form-signin" action="index_controller.php" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus><!--required email-->
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" autocomplete="on"><!--required password-->
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_login">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
</form>