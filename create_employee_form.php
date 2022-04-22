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
		
		
		<h1>New Employee Registration</h1>
		<form action = "actions/employee_data_submit.php" method = "POST">
			<body>
				<div>
					<label for="Employee_First">New Employee First Name</label>
					<input type = "text" name = "Employee_First" id= "first_name" required>
				</div>
			
				<div>
					<label for="Employee_Middle">New Employee Middle Name</label>
					<input type = "text" name = "Employee_Middle" id= "middle_name" required>
				</div>
			
				<div>
					<label for="Employee_Last">New Employee Last Name</label>
					<input type = "text" name = "Employee_Last" id= "last_name" required>
				</div>
				
				<div>
					<label for="Employee_DOB">New Employee Day of Birth</label>
					<input type = "date" name = "Employee_DOB" id= "date_of_birth" required>
				</div>
				
				<div>
					<label for="Employee_Number">New Employee Phone Number</label>
					<input type = "text" name = "Employee_Number" id= "phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
				</div>
				
				<div>
					<label for="Job_Type">New Employee Job Type</label>
					<select name = "Job_Type" id= "type" required>
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
					<input type = "submit" value = "Create Employee">
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
