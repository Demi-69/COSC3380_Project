<!DOCTYPE HTML>

<html>
	<title>Ride Submit</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
			<h1>THEME PARK RIDE FORM</h1>
		</header>
		
		<nav id = "status_bar">
		
			<?php
				include 'actions/see_connect.php';
				session_start();
				if($_SESSION['hasEmployee'] or $_SESSION['isAdmin'])
					echo "<a href = 'employee_form.php' >Employee Form</a>";
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
			?>
		
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
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
				$manu = $_REQUEST['Manufacturer']; 
				$class = $_REQUEST['Ride_Class']; 
				$weather = $_REQUEST['Max_Weather']; 
				
				$sqll = "INSERT INTO ride (ride_id, ride_name, manufacturer_id) VALUES('$ride_id_getter','$name','$manu')";
	
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
