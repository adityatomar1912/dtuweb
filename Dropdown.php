<html>
<head>
</head>
<body>
<?php

	$servername = "localhost";
	$username = "";
	$password = "";
	
	$choice = "";
	$dbhandle = mysql_connect($servername,"root","") or die("Unable to connect to MySQL");
	$selected = mysql_select_db("check", $dbhandle) or die("Could not select examples");
	$choice = mysql_real_escape_string($_GET['choice']);
	
	$query = "SELECT * FROM dd_vals WHERE category='$choice'";
	
	$result = mysql_query($query);
		
	while ($row = mysql_fetch_array($result)) {
   		echo "<option>" . $row{'dd_val'} . "</option>";
	}
?>
<script>
$("#first-choice").change(function() {
  $("#second-choice").load("getter.php?choice=" + $("#first-choice").val());
});
</script>
</body>
</html>