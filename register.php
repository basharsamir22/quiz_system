<?php
require_once 'database.php';
session_start();

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$college = $_POST['college'];

	$str = "SELECT email from student WHERE email='$email'";
	$result = mysqli_query($con, $str);

	if ((mysqli_num_rows($result)) > 0) {
		echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
		header("refresh:0;url=login.php");
	} else {
		$str = "insert into student set name='$name',email='$email',password='$password',college='$college'";
		if ((mysqli_query($con, $str)))
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
		header('location: welcome.php?q=1');
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="css/form.css">
	<style type="text/css">
		body {
			width: 100%;
			background: url(image/book2.png);
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
</head>

<body>
	<section class="login first grey">
		<div class="container">
			<div class="box-wrapper">
				<div class="box box-border">
					<div class="box-body">
						<center>
							<h5 style="font-family: Noto Sans;">Register to </h5>
							<h4 style="font-family: Noto Sans;">User</h4>
						</center><br>
						<form method="post" action="register.php" enctype="multipart/form-data">
							<div class="form-group">
								<label>Enter Your Username:</label>
								<input type="text" name="name" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Enter Your Student Id:</label>
								<input type="text" name="email" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Enter Your Password:</label>
								<input type="password" name="password" class="form-control" required />
							</div>
							<div class="form-group">
								<label>Enter Your College Name:</label>
								<input type="text" name="college" class="form-control" required />
							</div>

							<div class="form-group text-right">
								<button class="btn btn-primary btn-block" name="submit">Register</button>
							</div>
							<div class="form-group text-center">
								<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.js"></script>
	<script src="scripts/bootstrap/bootstrap.min.js"></script>
</body>

</html>