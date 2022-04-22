<!DOCTYPE HTML>

<html>
	<title>Front Page</title>
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
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
			?>
			<a href = "general_data_info.php"> General Report </a>	
			<a href = "generate_sales_form.php"> Sales Report </a>	
			<a href = "password_manage.php"> Change Password </a>
			<a href = "actions/logout.php"> Log out </a>
		</nav>
		
		<body>
			<h1>Employees</h1>
			<?php
				$query = "SELECT * FROM employee";
				
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>employee id </td> 
							<td>First Name</td>  
							<td>Middle Name</td> 
							<td>Last Name </td> 
							<td>Date of Birth</td> 
							<td>Phone Number </td> 
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["employee_id"];
						$field2name = $row["name_first"];
						$field3name = $row["name_middle"];
						$field4name = $row["name_last"];
						$field5name = $row["date_of_birth"];
						$field6name = $row["phone_number"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>'.$field5name.'</td> 
                				  <td>'.$field6name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<?php
				$query = "SELECT * FROM job";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Job ID </td> 
							<td>Job Title</td>  
							<td>Pay Rate</td> 
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["job_id"];
						$field2name = $row["title"];
						$field3name = $row["pay_rate"];
        
						echo '<tr> 
						  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Jobs</h1>
			<?php
				$query = "SELECT * FROM manufacturer";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>manufacturer_id </td> 
							<td>name </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["manufacturer_id"];
						$field2name = $row["name"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Manufacturer</h1>
			<?php
				$query = "SELECT * FROM ride";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Ride ID </td> 
							<td>Name </td>  
							<td>Manufacturer ID	</td>  
							<td>Type	</td> 
							<td>Class	</td>       
							<td>Ride Status	</td>    
							<td>Max Weather Condition </td>  
							<td>Description </td> 
							<td>Minimum Operators Required </td>   
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["ride_id"];
						$field2name = $row["ride_name"];
						$field3name = $row["manufacturer_id"];
						$field4name = $row["ride_type"];
						$field5name = $row["ride_class"];
						$field6name = $row["ride_status"];
						$field7name = $row["max_weather"];
						$field8name = $row["ride_description"];
						$field9name = $row["min_operators"];
						
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>'.$field5name.'</td> 
                				  <td>'.$field6name.'</td> 
                				  <td>'.$field7name.'</td> 
                				  <td>'.$field8name.'</td> 
                				  <td>'.$field9name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Rides</h1>
			
			<?php
				$query = "SELECT * FROM ride_status_updates";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Ride Name </td>
							<td>Previous Status </td>  
							<td>New Status </td>  
							<td>Date</td>  
							<td>Reason </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["ride_name"];
						$field2name = $row["old_status"];
						$field3name = $row["new_status"];
						$field4name = $row["date_time"];
						$field5name = $row["reason"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>'.$field5name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Ride Status Updates</h1>
			<?php
				$query = "SELECT * FROM ride_statuses";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Status ID </td> 
							<td>Status </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["status_id"];
						$field2name = $row["status"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Ride Status</h1>
		</body>
		
</html>