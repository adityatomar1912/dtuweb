<html>
<head>
	
	<!-- Website Title & Description for Search Engine purposes -->
		<title>upload image</title>
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
<style>
		#form{
			margin-top : 100px;
		}
		label, input {
			display: inline;
		}
		
		.fileUpload {
			position: relative;
			overflow: hidden;
			margin: 10px;
		}
		.fileUpload input.upload {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
</style>
<body style = "background : #444;">
<div class = "container">
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container">
				<span class= "welcome" >Welcome to DTU Examination</span>
				<br>
				<span class = "welcome" >Registration form Part 2 (Upload Image)</span>
			</div>
		</div>
<?php
   if(isset($_FILES['image']))
   {
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg");
      
      if(in_array($file_ext,$expensions)== false)
	  {
         $errors[]="extension not allowed, please choose a JPG or JPEG file.";
      }
      
      if($file_size > 51200)
	  {
         $errors[]='File size must be exactly 500kb';
      }
      
      if(empty($errors)==true)
	  {
         move_uploaded_file($file_tmp,"img/".$file_name);
         echo "Success";
      }
	  else
	  {
         print_r($errors);
      }
   }
?>
<div id = "form">
	<form action ="index1.html" method ="post" enctype = "multipart/form-data">
		<div class="fileUpload btn btn-primary">
			<span>Upload Image</span>
			<input type = "file" id = "file" name = "image" class="upload">
			
		</div>
		<div class="fileUpload btn btn-primary">
			<span>submit</span>
			<input type = "submit" value = "submit image" name = "upload_img" class = "upload">
		</div>
	</form>
</div>
<?php
$folder = "img/";

if(is_dir($folder))
{
	if($handle = opendir($folder))
	{
		while(($file = readdir($handle)) == true)
		{
			if($file==='.' || $file==='..')continue;
			echo '<img src="img/'.$file.'" width="150" height="150" alt="">';
		}	
		closedir($handle);
	}
}
?>
<div class = "container">
	<span style = "font-family: Century Gothic; font-size : 20px;font-weight : bold;color : orange;">
		<br>Note:<br>
	
	1. Images format should be in JPG or JPEG and size must not exceed 50 KB. only<br>
	2. Image Dimension of Photograph should be 100(Width) * 120(Hight) Pixel only
	</span>
</div>
</div>
</body>
</html>