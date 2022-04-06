<!DOCTYPE HTML>

<html>
	<title>Employee Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<div id="bg">
		
		<!-- Logged in user-->
		<div id = "site_header">
			THEME PARK MANAGEMENT SYSTEM
		</div>
		
		<nav>
			<a href = "front_layout.php">Front Page</a>
			<a href = "ride_form.php">Ride Form</a>
			<a href = "data_report.php">Data Report</a>
		</nav>
		
		<header id = "connect_header">
			Database Connection: <?php include 'see_connect.php'; echo $connection?>
		</header>
		
		<body>
			<h1>New Employee Registration</h1>
			<form action = "employee_data_submit.php" method = "POST">
				<div>
					<label for="Employee_First">New Employee First Name</label>
					<input type = "text" name = "Employee_First" id= "first_name">
				</div>
				
				<div>
					<label for="Employee_Middle">New Employee Middle Name</label>
					<input type = "text" name = "Employee_Middle" id= "middle_name">
				</div>
				
				<div>
					<label for="Employee_Last">New Employee Last Name</label>
					<input type = "text" name = "Employee_Last" id= "last_name">
				</div>
				
				<div>
					<label for="Employee_DOB">New Employee Day of Birth</label>
					<input type = "date" name = "Employee_DOB" id= "date_of_birth">
				</div>
				
				<div>
					<label for="Employee_Number">New Employee Phone Number</label>
					<input type = "text" name = "Employee_Number" id= "phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
				</div>
				
				<div>
					<label for="Job_Type">New Employee Job Type</label>
					<select name = "Job_Type" id= "type">
						<?php 
							$query = "SELECT title FROM job";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$field = $row["title"];
									echo "<option value=".$field.">".$field."</option>"; 
								}
								
								$result->free();
							}
						?>
					</select>
				</div>
				
				<div>
					<input type = "submit">
				</div>
			</form>
		</body>
	</div>
</html>
