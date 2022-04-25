<?php include 'actions/login_check.php';?>
<!DOCTYPE HTML>

<html>
	<title>Employee Submit Form</title>
	<link rel="stylesheet" href="css/style.css">
	
	<div id="bg">
		
		<!-- Logged in user-->
		<div id = "site_header">
			THEME PARK MANAGEMENT SYSTEM
		</div>
		
		<body>
			<?php
				$connect= mysqli_connect('theme-park.crvsspzpptcu.us-east-2.rds.amazonaws.com','Team14admin','UH-COSC3380-MW-TEAM14','theme_park');
				
				$query = "SELECT employee_id FROM employee";
				
				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
						$id_getter = $row["employee_id"];
				}
				$id_getter = $id_getter + 1;
				
				$employee_first = $_REQUEST['Employee_First']; 
				$employee_middle = $_REQUEST['Employee_Middle']; 
				$employee_last = $_REQUEST['Employee_Last']; 
				$employee_dob = $_REQUEST['Employee_DOB'];  
				$employee_number = $_REQUEST['Employee_Number'];

				$sql = "INSERT INTO employee (employee_id, name_first, name_middle, name_last, date_of_birth, phone_number) VALUES('$id_getter','$employee_first','$employee_middle','$employee_last','$employee_dob','$employee_number')";
	
				if(mysqli_query($connect, $sql)){
					echo "<h3> Data stored in a database successfully. </h3>"; }
				else
				{
					echo "ERROR: Hush! Sorry $sql. " 
					. mysqli_error($connect);
				}
			?>
		</body>
	</div>
</html>