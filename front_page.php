<!DOCTYPE HTML>

<html>
	<title>Front Page</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
			<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
		</header>
		
		<nav id = "status_bar">
		
			<?php
				session_start();
				if($_SESSION['hasEmployee'] or $_SESSION['isAdmin'])
					echo "<a href = 'employee_form.php' >Employee Form</a>";
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Status</a>";
				
			?>
		
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
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