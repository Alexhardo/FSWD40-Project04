<?php 
ob_start();
session_start();

/*unset($_SESSION['user']);
session_unset();
session_destroy();
session_start();*/

require_once('db_connect.php');

//If user is already ligged in, redirect to big_list_boot.php
if(isset($_SESSION['user'])) {
	header('Location: big_list_boot.php');
	exit;
}

//Attemt to login user
$error = false;
$errorMsg = '';

if (isset($_POST['btn_login'])) { //If login button was pushed
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

	if (empty($email)) {
		$error = true;
		$errorMsg .= 'Please enter email!';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$errorMsg .= 'Pleas enter a valid email!';
		}

	if (empty($pass)) {
		$error = true;
		$errorMsg .= ' Please enter password!';
	}

	//If user input email and pass, continue to login
	if (!$error) {
		$pass = hash('sha256', $pass);
		//echo hash('sha256', '123456');
		var_dump($pass);

		$sql = "SELECT user_id, email, pass
						FROM users
						WHERE email = '$email'";
		$result = $mysqli->query($sql);
		$count = 0;
		if (is_object($result)) { //Result has to have sometning
			$count = mysqli_num_rows($result);
			if($count != 0) {
				$row = $result->fetch_all(MYSQLI_ASSOC);
				//var_dump($row[0]['pass']);
				if ($count == 1 && $row[0]['pass'] == $pass) {//Single user found and passwords match
					$_SESSION['user'] = $row[0]['user_id'];
					header("Location: big_list_boot.php");
				} else { //If passwords not match
					echo 'Incorrect credentials, try again!';
				}
			} else { //If more than one record in DB for such an email found
				echo 'User with such email was not found!';
			}
		} else { //If result is not an object
			echo 'User with such email was not found!';
		}
	} else { //If error no/invalid email or no passward given
		echo $errorMsg;
	}
}

if (isset($result)) {
	$result->free();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Big Library</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index_boot.php">Big Library</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		    	<a class="nav-item nav-link active" href="index_boot.php">Sign in<span class="sr-only">(current)</span></a>
		      <a class="nav-item nav-link" href="register_boot.php">Sign Up</a>
		      <a class="nav-item nav-link" href="big_list_boot.php">Big List</a>
		      <a class="nav-item nav-link" href="log_out_boot.php?logout">Log Out</a>
		      <!--<a class="nav-item nav-link disabled" href="#">Disabled</a>-->
		    </div>
		  </div>
		</nav>
	</header>
	<main class="small_main">
		<form class="form-signin" action="index_boot.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="on">
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
	  </form>
	</main>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>