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
	
		
	<form action = "actions/update_weather.php" method = POST>
		<body>
			<div>
				<label for="weather">Weather Status</label>
				<select name = "weather" id= "type" required>
					<?php 
						$query = "SELECT weather_status_id, weather_status FROM weather_statuses";
						if ($result = $connect->query($query)) 
						{			
							while ($row = $result->fetch_assoc()) 
							{
								$value = $row["weather_status_id"];
								$field = $row["weather_status"];
								echo "<option value=".$value.">".$field."</option>"; 
							}			
							$result->free();
						}
					?>
				</select>
			</div>
			
			<div id = "input">
				<input type = "submit" value = "Update Weather">
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
