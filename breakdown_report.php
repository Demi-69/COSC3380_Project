<!DOCTYPE HTML>

<html>
	<title>Rainouts Report</title>
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
		?>
		
		<a href = "password_manage.php"> Change Password </a>
		<a href = "actions/logout.php"> Log out </a>
	</nav>
		
	<body>
		<?php
			$sd = $_REQUEST['Start_Date'];
			$ed = $_REQUEST['End_Date'];
			echo "<h1> Breakdowns from $sd to $ed</h1>";
				  
				$query = "CALL `breakdowns_by_date`('$sd 00:00:00','$ed 23:59:59')";
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Ride</td> 
							<td>Breakdowns</td>  
						</tr>';
				
				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["Ride"];
						$field2name = $row["Breakdowns"];
		
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
							  </tr>';
					}
				}
			?>
		</body>
		
		<footer>
			<div id = "status_bar">
				<div id = "connect_header">
					Database Connection: <?php include 'actions/see_connect.php'; echo $connection;?>
				</div>
				<div id = "park_status">
					Park Status: <?php echo $open;?>
				</div>
			</div>
		</footer>
		
		
</html>