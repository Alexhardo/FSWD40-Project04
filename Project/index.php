<?php

  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $value=$host."".$uri;
  $cookie="absolutepath";
  setcookie($cookie,$value, time() + (86400 * 30), "/");
  header("Location: Controller/Session_controller/index_controller.php");
?>