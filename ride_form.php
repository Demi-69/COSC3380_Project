<?php include 'actions/login_check.php';?>

<!DOCTYPE HTML>

<html>
	<title>Employee Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
		<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
	</header>
		
	<nav id = "status_bar">
		<a href = "front_page.php">Front Page</a>
		
		<?php
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
		?>
		
		<a href = "logout.php"> Change Password </a>
		<a href = "actions/logout.php"> Log out </a>
	</nav>
	
		
	<body class = "cool_form">
		<p>
			<a href = "create_ride_form.php">Create Ride</a>
		</p>
		<?php
				$query = "SELECT * FROM ride";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					   <tr> <td colspan = "6" class = "table_head"><h1>Rides</h1></td></tr>
				  <tr id = "first_th"> 
							<td>Ride ID </td> 
							<td>Name </td>  
							<td>Manufacturer ID	</td>  
							<td>Type	</td> 
							<td>Class	</td>       
							<td>Ride Status	</td>    
							<td>Max Weather Condition </td>  
							<td>Description </td> 
							<td>Minimum Operators Required </td>   
					</tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["ride_id"];
						$field2name = $row["ride_name"];
						$field3name = $row["manufacturer_id"];
						$field4name = $row["ride_type"];
						$field5name = $row["ride_class"];
						$field6name = $row["ride_status"];
						$field7name = $row["max_weather"];
						$field8name = $row["ride_description"];
						$field9name = $row["min_operators"];
						
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>'.$field5name.'</td> 
                				  <td>'.$field6name.'</td> 
                				  <td>'.$field7name.'</td> 
                				  <td>'.$field8name.'</td> 
                				  <td>'.$field9name.'</td> 
							  	  <td><a href="edit_ride.php?id='.$field1name.'">Edit</a></td>
							</tr>';
					}
					$result->free();
				} 
			?>
	</body>
</html>
