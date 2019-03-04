<?php
	// connect to database
	// The update the database name.

	#SEQUENCE = mysqli_connect(server, user, password, database)
	$db = mysqli_connect('localhost', 'root', '', 'treesa');




	session_start();
	error_reporting(0);
	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Delicious | Restaurant Web App</title>
	  <meta name="description" content="Restaurant Web App made by Treesa Binu, (IInd Year, BCA, Stella Maris College)">

	  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
	  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  <!-- =======================================================
	    Theme Name: Delicious
	    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
	    Author: BootstrapMade.com
	    Author URL: https://bootstrapmade.com
	  ======================================================= -->
	</head>

	<body>

		<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="h6 logo-name" style="font-size: 25px;">Delicious</span></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="menu.php">Menu</a>
                </li>
                <li class="page-scroll">
                    <a href="book.php">Table Reservation</a>
                </li>

								<li class="page-scroll">
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-alt"><span class="heading"><?php echo $_SESSION['username']; ?></span></a>
                </li>
								<!-- Trigger the modal with a button -->


<!-- Modal -->

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
		</nav>
		<header id="header">
			<div class="container">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<a href="#about">About</a>
					<a href="#event">Event</a>
					<a href="#menu-list">Menu</a>
					<a href="#contact">Book a table</a>
				</div>
				<!-- Use any element to open the sidenav -->

			</div>
		</header>



	<?php
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";


	if(isset($_GET['action'])) {
		// REGISTER USER
		if ($_GET['action'] == 'register') {
			// receive all input values from the form
			$username = mysqli_real_escape_string($db, $_GET['username']);
			$email = mysqli_real_escape_string($db, $_GET['email']);
			$password = mysqli_real_escape_string($db, $_GET['password']);

			// form validation: ensure that the form is correctly filled
			if (empty($username)) { array_push($errors, "Username is required"); }
			if (empty($email)) { array_push($errors, "Email is required"); }
			if (empty($password)) { array_push($errors, "Password is required"); }

			$check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
			$check_results = mysqli_query($db, $check);
			$check_results = mysqli_num_rows($check_results);

			if($check_results > 0) {
				array_push($errors, "Username (or) Email ID is already in use! Try loggin in! ".$check_results."");
				$page = 'register.php';
			}
			// register user if there are no errors in the form
			if (count($errors) == 0) {
				$password = md5($password);//encrypt the password before saving in the database
				$query = "INSERT INTO users (username, email, password)
							VALUES('$username', '$email', '$password')";
				mysqli_query($db, $query);

				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}

		}

		// ...

		// LOGIN USER
		if ($_GET['action'] == 'login') {
			$username = mysqli_real_escape_string($db, $_GET['username']);
			$password = mysqli_real_escape_string($db, $_GET['password']);

			if (empty($username)) {
				array_push($errors, "Username is required");
			}
			if (empty($password)) {
				array_push($errors, "Password is required");
			}

			if (count($errors) == 0) {
				$password = md5($password);
				$query = "SELECT * FROM users WHERE email = '$username' AND password='$password'";
				$results = mysqli_query($db, $query);

				$acc_details = "SELECT * FROM users WHERE email = '$username'";
				$acc = mysqli_query($db, $acc_details);
				$acc = mysqli_fetch_assoc($acc);
				if (mysqli_num_rows($results) == 1) {
					$_SESSION['username'] = $acc['username'];
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}else {
					array_push($errors, "Incorrect E-mail ID (or) password, please try again.");
					$page = 'login.php';
				}
			}
		}

	}


	//  Creating seperate connection for queries in MySQLi
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "treesa";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	}


?>


<div id="myModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="heading">Account Options</h4>
      </div>
      <div class="modal-body">
        <p> Here are your account options! You can either Log out, or access admin panel. </p>
      </div>
      <div class="modal-footer">
				<a href="admin.php" class="btn btn-success">Admin Panel</a>
				<a href="logout.php" class="btn btn-danger">Logout</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
