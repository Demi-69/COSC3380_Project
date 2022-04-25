<?php include 'actions/login_check.php';?>
<?php
	include('actions/see_connect.php');
	$id=$_GET['id'];
	
	$query = "SELECT * FROM ride where ride_id ='$id'";
	$result = $connect->query($query);	
	$row = $result->fetch_assoc();
?>

<!DOCTYPE HTML>

<html>
	<title>Edit Ride Page</title>
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
			<h1>Edit Ride</h1>
			<?php
			echo '<form action = "actions/ride_edit.php?id='.$id.'" method = "POST">';
			?>
				<div>
					<label for="Ride_Name">New Ride Name</label>
					<input type = "text" name = "Ride_Name" id= "name"  value = "<?php echo $row['ride_name']; ?>">
				</div>
				
				<div>
					<label for="Ride_Type">New Ride Type</label>
					<select name = "Ride_Type" id= "type" selected = "<?php echo $row['ride_type'];?>" required>
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
					<select name = "Manufacturer" id= "type" selected = "<?php echo $row['manufacturer_id'];?>"  required>
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
					<select name = "Ride_Class" id= "type"  selected = "<?php echo $row['ride_class']; ?>" required>
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
					<select name = "Max_Weather" id= "type" selected = "<?php echo $row['max_weather']; ?>" required>
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
					<label for="Ride_status">Ride Status</label>
					<select name = "Ride_status" id= "type" selected = "<?php echo $row['ride_status']; ?>" required>
						<?php 
							$query = "SELECT status FROM ride_statuses";
							if ($result = $connect->query($query)) 
							{			
								while ($row = $result->fetch_assoc()) 
								{
									$field = $row["status"];
									echo "<option value=".$field.">".$field."</option>"; 
								}
							
								$result->free();
							}
						?>
					</select>
				
				</div>
				
				<div>
					<input type = "submit" value = "Edit Ride">
				</div>
			</form>
		</body>

</html>
