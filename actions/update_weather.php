<?php
	session_start();
	include('see_connect.php');
	$localhost = $_SESSION['localhost'];
	
	$w = $_REQUEST['weather'];
	
	$sqll = "INSERT INTO weather_status_updates (status_id) VALUES('$w')";
	
	if(mysqli_query($connect, $sqll))
		echo "<h3> Data stored in a database successfully. </h3>";
	else
	{
		echo "ERROR: Hush! Sorry $sql. " 
	.   mysqli_error($connect);
	}
	header("Location: http://$localhost/front_page.php");
				
?>