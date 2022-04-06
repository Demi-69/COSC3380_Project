<?php
	//create connection
	$connect= mysqli_connect('theme-park.crvsspzpptcu.us-east-2.rds.amazonaws.com','Team14admin','UH-COSC3380-MW-TEAM14','theme_park');
	
	$connection = "Failed";
	
	//check connection
	if($connect -> connect_errno)
		$connection = "Failed to connect to database";
	else
		$connection = "Connected";
?>