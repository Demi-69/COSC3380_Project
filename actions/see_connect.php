<?php
	//create connection
	$connect= mysqli_connect('theme-park.crvsspzpptcu.us-east-2.rds.amazonaws.com','Team14admin','UH-COSC3380-MW-TEAM14','theme_park');
	
	$connection = "Failed";
	$open = "N/A";
	
	//check connection
	if($connect -> connect_errno)
	{
		$connection = "Failed to connect to database";
		echo '<style>
				#connect_header
				{
					background-image:linear-gradient(red,#DC143C);
				}
			  </style>
			';
		$open = "Closed";
	}
	else
	{
		$connection = "Connected";
		
		$query = "SELECT opening_time, closing_time FROM park";
		$result = $connect->query($query);
		$row = $result->fetch_assoc();
		
		$op = strtotime ($row["opening_time"]);		
		$ct = strtotime ($row["closing_time"]);		
			
		if($op <= time() && time() <= $ct)
			$open = "Open";
		else
			$open = "Closed";
		
		echo '<style>
				#connect_header
				{
					background-image:linear-gradient(green,#7FFF00);
				}
			  </style>
			';
	}
?>