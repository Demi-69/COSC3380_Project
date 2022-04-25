<!DOCTYPE HTML>

<html>
	<title>Front Page</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
			<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
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
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
				
			?>
		
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
		<body>
			<?php
			$query = "SELECT ride_name, ride_status FROM ride";
	
			echo '<table border="0" cellspacing="2" cellpadding="2"> 
				  <tr> <td colspan = "6" class = "table_head"><h1>Open Rides</h1></td></tr>
				  
				  <tr id = "first_th"> 
						<td>Ride </td> 
						<td>Status </td>  
				  </tr>';
	
			if ($result = $connect->query($query)) 
			{
				while ($row = $result->fetch_assoc()) 
				{
					$field1name = $row["ride_name"];
					$field2name = $row["ride_status"];
					
					echo '<tr> 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
						  </tr>';
				}
				$result->free();
			} 
			?>
		</body>
</html>