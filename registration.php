<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title>registration form</title>
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
		<style>
			
			#top{
				padding: 10px;
				font-weight : bold;
				font-size : 20px;
				color : #FF7800;
				font-family : Garamond;
			}
		</style>
	</head>
	<body style = "background : #fff;">
	
	<div class = "container">
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container">
				<span class= "welcome" >Welcome to DTU Examination</span>
				<br>
				<span class = "welcome" >Registration form Part 1</span>
			</div>
		</div>
		
		<div id = "form" class = "container">
			<form action = "" method="POST">
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "name">Name<span class = "star">*</span>:</label>
					</div>
					<div class = "col-sm-6">
						<input id = "name" type = "text" name = "name">
					</div>
				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "Rollnum">Roll Number<span class = "star">*</span>: </label>
					</div>
					<div class = "col-sm-6">
						<input id = "Rollnum" type = "text" name = "Rollnum">
					</div>
				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "fname">Father's Name<span class = "star">*</span>:</label>
					</div>
					<div class = "col-sm-6">
						<input id = "fname" type = "text" name = "fname">
					</div>
				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "mname">Mother's Name<span class = "star">*</span>:</label>
					</div>
					<div class = "col-sm-6">
						<input id = "mname" type = "text" name = "mname">
					</div>
					
				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "branch">Branch<span class = "star">*</span>:</label>
					</div>
					<div class = "col-sm-6">
						<input id = "branch" type = "text" name = "branch">
					</div>
				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-6">
						<label for = "year">Year<span class = "star">*</span>:</label>
					</div>
					<div class = "col-sm-6">
						<input id = "year" type = "text" name = "year">
					</div>
				</div>
					<br><hr>
				<label style = "color : orange">Note : Fields marked with * are mandatory</label>
				<br><hr>
				<div class = "container">
					<input type = "submit" name = "submit" value= "submit" class = "btn btn-primary"></input>
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

	$conn = mysqli_connect($servername, "root","","registration") or die("Cannot Connected");
	
	if(isset($_POST['submit']))
	{	
		if(isset($_POST['name']) && isset($_POST['Rollnum']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['branch']) && isset($_POST['year']))
		{ 
			$name = $_POST['name'];
			$Rollnum = $_POST['Rollnum'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$branch = $_POST['branch'];
			$year = $_POST['year'];

			if(!empty($name) && !empty($Rollnum) && !empty($fname) && !empty($mname) && !empty($branch) && !empty($year))		
			{
				echo "3rd if";
				$sql = "INSERT INTO registration(`name`,`rollnumber`, `fname`, `mname`, `branch`, `year`) VALUES ('$name','$Rollnum' ,'$fname' ,'$mname' ,'$branch' ,'$year')";
				$result = $conn->query($sql);
				if($result)
				{
					header('Refresh:0;upload.php');
				}
				else
				{
					echo "Try again later";
				}
			}
			else
			{
				echo "Enter All Credentials";
			}
		}
	}
	?>
	
	</body>
</html>

