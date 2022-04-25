<?php
	session_start();
	include('actions/see_connect.php');
	$id=$_GET['id'];
	
	$query = "SELECT * FROM employee where employee_id ='$id'";
	$result = $connect->query($query);	
	$row = $result->fetch_assoc();
?>
<!DOCTYPE HTML>

<html>
	<title>Create Employee Form</title>
	<link rel="stylesheet" href="css/style.css">
	
		<header id = "site_header">
			<h1>THEME PARK SYSTEM MANAGEMENT SYSTEM</h1>
		</header>
	
		<nav id = "status_bar">
		
			<?php
				if($_SESSION['hasEmployee'] or $_SESSION['isAdmin'])
					echo "<a href = 'employee_form.php' >Employee Form</a>";
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
			?>
		
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
		
		<h1>New Employee Registration</h1>
		<?php
		echo '<form action = "actions/employee_edit.php?id='.$id.'" method = "POST">';
		?>
			<body>
				<div>
					<label for="Employee_First">New Employee First Name</label>
					<input type = "text" name = "Employee_First" id= "first_name" value = "<?php echo $row['name_first']; ?>" required>
				</div>
			
				<div>
					<label for="Employee_Middle">New Employee Middle Name</label>
					<input type = "text" name = "Employee_Middle" id= "middle_name" value = "<?php echo $row['name_middle']; ?>" required>
				</div>
			
				<div>
					<label for="Employee_Last">New Employee Last Name</label>
					<input type = "text" name = "Employee_Last" id= "last_name" value = "<?php echo $row['name_last']; ?>" required>
				</div>
				
				<div>
					<label for="Employee_DOB">New Employee Day of Birth</label>
					<input type = "date" name = "Employee_DOB" id= "date_of_birth" value = "<?php echo $row['date_of_birth']; ?>" required>
				</div>
				
				<div>
					<label for="Employee_Number">New Employee Phone Number</label>
					<input type = "text" name = "Employee_Number" id= "phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value = "<?php echo $row['phone_number']; ?>" required>
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
					<input type = "submit" value = "Edit Employee">
				</div>
			</body>
		</form>
		
</html>
