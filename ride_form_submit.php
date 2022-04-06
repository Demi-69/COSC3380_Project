<!DOCTYPE HTML>

<html>
	<title>Ride Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<div id="bg">
		
		<!-- Logged in user-->
		<div id = "site_header">
			THEME PARK MANAGEMENT SYSTEM
		</div>
		
		<nav>
			<a href = "front_layout.php">Front Page</a>
			<a href = "employee_form.php" >Employee Form</a>
			<a href = "ride_form.php">Ride Form</a>
			<a href = "data_report.php">Data Report</a>
		</nav>
		
		<header id = "connect_header">
			Database Connection: <?php include 'see_connect.php'; echo $connection?>
		</header>
		
		<body>
			<?php
				$connect= mysqli_connect('theme-park.crvsspzpptcu.us-east-2.rds.amazonaws.com','Team14admin','UH-COSC3380-MW-TEAM14','theme_park');
				
				$query = "SELECT ride_id FROM ride";
				
				$ride_id_getter = "0";
				
				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
						$ride_id_getter = $row["ride_id"];
				}
				$ride_id_getter = $ride_id_getter + 1;
				
				$name = $_REQUEST['Ride_Name']; 
				$type = $_REQUEST['Ride_Type']; 
				$capacity = $_REQUEST['Ride_Capacity']; 
				$price = $_REQUEST['Price'];  
				
				$sqll = "INSERT INTO ride (ride_id, name, type, riders_per_cycle, price_per_ride) VALUES('$ride_id_getter','$name','$type','$capacity','$price')";
	
				if(mysqli_query($connect, $sqll))
					echo "<h3> Data stored in a database successfully. </h3>";
				else
				{
					echo "ERROR: Hush! Sorry $sql. " 
					. mysqli_error($connect);
				}
			?>
		</body>
	</div>
</html>
