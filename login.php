<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>login</title>
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
				<div class = "container">
				<span class= "welcome" class = "nav navbar-nav">Welcome to DTU Examination</span>
				<br>
				<span class = "welcome" >LOGIN</span>
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
					
					<hr>
					<div class = "container">
						<input type = "submit" name = "submit" value= "login" class = "btn btn-primary"></input>
						<br>
						<br>
						<a href = "signup.php"><button type = "button" class = "btn btn-primary">Not yet signed? Sign up</button></a>
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
		if(isset($_POST['RollNum']) && isset($_POST['password']))
		{
			$roll = $_POST['RollNum'];
			$password = $_POST['password'];

			if(!empty($roll) && !empty($password))		
			{
				$query = "SELECT `RollNum` FROM `signup` WHERE `RollNum` = '$roll' AND `password` = '$password'";
				$query_run = $conn->query($query);
				$rows = $query_run->fetch_assoc();
				if($rows==0)
				{
					echo "Enter  Valid Roll Number or Password";
				}
				else
				{
					header('Refresh:0;index1.html');
				}
			}
		}
	}
	?>
	
	</body>
</html>