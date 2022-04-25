<?php include 'actions/login_check.php';?>
<!DOCTYPE HTML>

<html>
	<title>Front Page</title>
	<link rel="stylesheet" href="css/style.css">
	
	<header id = "site_header">
			<h1>THEME PARK RIDE FORM</h1>
		</header>
		
		<nav id = "status_bar">
			<a href = "front_page.php">Front Page</a>
			<?php
				if($_SESSION['hasEmployee'] or $_SESSION['isAdmin'])
					echo "<a href = 'employee_form.php' >Employee Form</a>";
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
			?>
		
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
		<body>
			<h1>New Ride Registration</h1>
			<form action = "ride_form_submit.php" method = POST>
				<div>
					<label for="Ride_Name">New Ride Name</label>
					<input type = "text" name = "Ride_Name" id= "name">
				</div>
				
				<div>
					<label for="Ride_Type">New Ride Type</label>
					<select name = "Ride_Type" id= "type" required>
						<?php 
							$query = "SELECT type_name FROM ride_types";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$field = $row["type_name"];
									echo "<option value=".$field.">".$field."</option>"; 
								}
							
								$result->free();
							}
						?>
					</select>
				</div>
				
				<div>
					<label for="Manufacturer">Manufacturer</label>
					<select name = "Manufacturer" id= "type" required>
						<?php 
							$query = "SELECT manufacturer_id, alias FROM manufacturer";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$field = $row["alias"];
									$value = $row["manufacturer_id"];
									echo "<option value=".$value.">".$field."</option>"; 
								}
							
								$result->free();
							}
						?>
					</select>
				</div>
				
				<div>
					<label for="Ride_Class">Ride Class</label>
					<select name = "Ride_Class" id= "type" required>
						<?php 
							$query = "SELECT ride_class_id, class_name FROM ride_classes";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$value = $row["ride_class_id"];
									$field = $row["class_name"];
									echo "<option value=".$value.">".$field."</option>"; 
								}
							
								$result->free();
							}
						?>
					</select>
				</div>
				
				<div>
					<label for="Max_Weather">Max Weather</label>
					<select name = "Max_Weather" id= "type" required>
						<?php 
							$query = "SELECT weather_status FROM weather_statuses";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$field = $row["weather_status"];
									echo "<option value=".$field.">".$field."</option>"; 
								}
							
								$result->free();
							}
						?>
					</select>
				</div>
				
				
				<div>
					<input type = "submit" value = "Create Ride">
				</div>
			</form>
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
