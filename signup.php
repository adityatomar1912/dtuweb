<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>signup</title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
	</head>
	<body style = "background : #fff;">
		<div class = "container">
			<div class="navbar navbar-fixed-top navbar-inverse">
				<div class="container">
					<span class= "welcome" >Welcome to DTU Examination</span>
					<br>
					<span class = "welcome" >SIGN UP</span>
				</div>
			</div>
			<div id = "form" class = "container">
				<form action="" method="POST">
					<div class = "row">
						<div class = "col-sm-6">
							<label for = "RollNum">Roll Number:<br>Format(2K13/CO/***)</br></label>
						</div>
						<div class = "col-sm-6">
							<input id = "RollNum" type = "text" name = "RollNum">
						</div>
					</div>
					<br>
					<div class = "row">
						<div class = "col-sm-6">
							<label for = "password">Password:</label>
						</div>
						<div class = "col-sm-6">
							<input id = "password" type = "password" name = "password">
						</div>
					</div>
					<br>
					<br>
					<div class = "row">
						<div class = "col-sm-6">
							<label for = "password1">Confirm Password:</label>
						</div>
						<div class = "col-sm-6">
							<input id = "password1" type = "password" name = "password1">
						</div>
					</div>
					
					<hr>
					<div class = "container">
						<input type = "submit" name = "submit" value= "sign up" class = "btn btn-primary"></input>
					</div>
				</form>
			</div>
		</div>
	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	<?php
	$servername = "localhost";
	$username = "";
	$password = "";

	$conn = mysqli_connect($servername, "root","","signup") or die("Cannot Connected");
	
	if(isset($_POST['submit']))
	{
		if(isset($_POST['RollNum']) && isset($_POST['password']) && isset($_POST['password1']))
		{
			//$select_year = $_POST['year'];
			//$select_branch = $_POST['branch'];
			//$select_n1 = $_POST['n1'];
			//$select_n2 = $_POST['n2'];
			//$select_n3 = $_POST['n3'];
			$roll = $_POST['RollNum'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];

			//$roll = ($select_year.$select_branch.$select_n1.$select_n2.$select_n3);

			if(!empty($roll) && !empty($password) && !empty($password1))		
			{
				if($password != $password1)
				{
					echo "Password Does not Match";
				}
				else
				{
					echo "3rd if";
					$sql = "INSERT INTO signup(`RollNum`, `password`) VALUES ('$roll','$password')";
					$result = $conn->query($sql);
					if($result)
					{
						header('Refresh:0;login.php');
					}
				}
			}
			else
			{
				echo "<font size = '15px' color = 'white'>Enter Roll Number or Password</font>";
			}
		}
	}
	?>
	
	</body>
</html>

