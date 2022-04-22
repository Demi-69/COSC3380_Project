<!DOCTYPE HTML>

<html>
	<title>Sales Report</title>
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
		
		<h1>Generate Monthly Sales Report</h1>
		<form action = "monthly_sales.php" method = "POST">
			<body>
				<div>
					<label for="Start_Year">Start Year</label>
					<input type="number" name = "Start_Year" id = "Start_Year" min="2010" max="2021" step="1" value="2021" required>
				</div>
				
				<div>
					<label for="End_Year">End Year</label>
					<input type="number" name = "End_Year" id = "End_Year" min="2010" max="2022" step="1" value="2022" required>
				</div>
				
				<div>
					<input type = "submit" value = "Create Sales Report">
				</div>
			</body>
		</form>
		
		<h1>Generate Weekday Sales Report</h1>
		<form action = "weekday_sales.php" method = "POST">
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
					<input type = "submit" value = "Create Sales Report">
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