<!--  log in info    -->
<?php
ob_start();
session_start();
require_once 'connect.php';
// it will never let you open login page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
    exit;
}
$error = false;
if (isset($_POST['btn-login'])) {
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs
    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }
    // if there's no error, continue to login
    if (!$error) {
        $pass = hash('sha256', $pass); // password hashing
        $res = mysqli_query($conn, "SELECT customer_id, first_name, pass FROM customer WHERE email='$email'");
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
        if ($count == 1 && $row['password'] == $password) {
            $_SESSION['user'] = $row['customer_id'];
            header("Location: home.php");
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}

?>

<!-- html  -->
<!DOCTYPE html>
<html>

<head>
    <!-- title and icon  -->
    <title>FRANK AGENCY</title>
    <link rel="icon" type="image/gif" href="../img/WEBSITE/LOGO/LOGO1.png" />
    <!-- SEO -->
    <meta charset="utf-8">
    <meta name="description" content="" />
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="../style/style.css">
   
    <!-- bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <!-- js -->
    <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
    <!-- every thing on the page -->
    <div id="all" class="container-fluid">
        <!-- nav and logo  -->
        <a class="logo" href="http://disputebills.com">
                        	<img src="../img/WEBSITE/LOGO/FRANK_LOGO_Tekengebied 1.png">
        </a>
        <hr>
    </div>
    <!-- log in form -->
    <section id="main" class="row container-fluida">
				
				
				
				<form class="form col-sm-5" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
					<div >
						<h2 class="big">Log in and get your CAR now!</h2>
					</div>
					
					<?php
					if (isset($errMSG)) {
					echo $errMSG;?>
					<?php
					}
					?>
					<input  type="email" name="email" class="form-control i2" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
					<span class="text-danger"><?php echo $emailError; ?></span>
					<input type="password" name="pass" class="form-control i2" placeholder="Your Password" maxlength="15" />
					<span class="text-danger"><?php echo $passError;
					echo "<br>" ?></span>
					<button class="btn btn-block " type="submit" name="btn-login">Sign In</button>
					
					
				</form>
				
				
			</section>
   
    <!-- final and footer -->
    <footer></footer>
    </div>
</body>

</html>