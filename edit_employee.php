<!DOCTYPE HTML>

<html>
	<title>Create Employee Form</title>
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
		
		
		<h1>Edit Employee Information</h1>
		<form>
			<div>
				<label for="Employees">Employee</label>
				<select name = "Employees" id= "type" required>
					<?php 
						$query = "SELECT name_first, name_last FROM employee";
						if ($result = $connect->query($query)) 
						{			
							while ($row = $result->fetch_assoc()) 
							{
								$val = $row["employee_id"];
								$field = $row["name_first"];
								echo "<option value=".$val.">".$field."</option>"; 
							}
						
							$result->free();
						}
					?>
				</select>
			</div>
		</form>
		
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
