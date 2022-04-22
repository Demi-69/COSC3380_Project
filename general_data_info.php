<!DOCTYPE HTML>

<html>
	<title>General Info Report</title>
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
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
			?>
			<a href = "general_data_info.php"> General Report </a>	
			<a href = "generate_sales_form.php"> Sales Report </a>	
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
		<h1>Generate Rainouts By Date Report</h1>
		<form action = "rainout_info.php" method = "POST">
			<body>
				<div>
					<label for="Start_Date">Start Date</label>
					<input type = "date" name = "Start_Date" id = "Start_Date" required>
				</div>
				
				<div>
					<label for="End_Date">End Date</label>
					<input type = "date" name = "End_Date" id = "End_Date" required>
				</div>
				
				<div>
					<input type = "submit" value = "Create Report">
				</div>
			</body>
		</form>
		
		<h1>Generate Breakdown By Date Report</h1>
		<form action = "breakdown_report.php" method = "POST">
			<body>
				<div>
					<label for="Start_Date">Start Date</label>
					<input type = "date" name = "Start_Date" id = "Start_Date" required>
				</div>
				
				<div>
					<label for="End_Date">End Date</label>
					<input type = "date" name = "End_Date" id = "End_Date" required>
				</div>
				
				<div>
					<input type = "submit" value = "Create Report">
				</div>
			</body>
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