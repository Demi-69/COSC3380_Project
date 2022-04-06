<!DOCTYPE HTML>

<html>
	<title>Ride Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<div id="bg">
		
		<!-- Logged in user-->
		<div id = "site_header">
			THEME PARK MANAGEMENT SYSTEM
		</div>
		
		<nav>
			<a href = "front_layout.php">Front Page</a>
			<a href = "employee_form.php" >Employee Form</a>
			<a href = "data_report.php">Data Report</a>
		</nav>
		
		<header id = "connect_header">
			Database Connection: <?php include 'see_connect.php'; echo $connection?>
		</header>
		
		<body>
			<h1>New Ride Registration</h1>
			<form action = "ride_form_submit.php" method = POST>
				<div>
					<label for="Ride_Name">New Ride Name</label>
					<input type = "text" name = "Ride_Name" id= "name">
				</div>
				
				<div>
					<label for="Ride_Type">New Ride Type</label>
					<input type = "text" name = "Ride_Type" id= "type">
				</div>
				
				<div>
					<label for="Ride_Capacity">Ride Capacity</label>
					<input type = "number" name = "Ride_Capacity" id= "ride_capacity" min = "0" placeholder ="0">
				</div>
				
				<div>
					<label for="Price">Price Per Ride</label>$
					<input type = "number" name = "Price" id= "price_per_ride" min = "0" placeholder ="0">
				</div>
				
				
				<div>
					<input type = "submit">
				</div>
			</form>
		</body>
	</div>
</html>
