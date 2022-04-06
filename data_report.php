<!DOCTYPE HTML>

<html>
	<title>Data Report</title>
	<link rel="stylesheet" href="css/style.css">
	
	<div id="bg">	
		<!-- Logged in user-->
		<div id = "site_header">
			THEME PARK MANAGEMENT SYSTEM
		</div>
		
		<nav>
			<a href = "front_layout.php">Front Page</a>
			<a href = "employee_form.php" >Employee Form</a>
			<a href = "ride_form.php">Ride Form</a>
		</nav>
		
		<header id = "connect_header">
			Database Connection: <?php include 'see_connect.php'; echo $connection?>
		</header>
		
		<body>
			<h1>Employees</h1>
			<?php
				$query = "SELECT * FROM employee";
		
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>employee_id </td> 
							<td>name_first </td>  
							<td>name_middle </td> 
							<td>name_last </td> 
							<td>date_of_birth </td> 
							<td>phone_number </td> 
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
				$query = "SELECT * FROM employee_jobs";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>employee_id </td> 
							<td>job_id </td> 
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["employee_id"];
						$field2name = $row["job_id"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>Employee Jobs</h1>
			<?php
				$query = "SELECT * FROM job";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>job_id </td> 
							<td>title </td>  
							<td>pay_rate </td> 
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
							<td>ride_id </td> 
							<td>name </td>   
							<td>type </td>  
							<td>manufacturer_id	</td>  
							<td>status	</td>    
							<td>riders_per_cycle </td>  
							<td>ride_time_seconds </td> 
							<td>hourly_capacity </td>   
							<td>price_per_ride </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["ride_id"];
						$field2name = $row["name"];
						$field3name = $row["type"];
						$field4name = $row["manufacturer_id"];
						$field5name = $row["status"];
						$field6name = $row["riders_per_cycle"];
						$field7name = $row["ride_time_seconds"];
						$field8name = $row["hourly_capacity"];
						$field9name = $row["price_per_ride"];
        
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
			<h1>Ride</h1>
			
			<?php
				$query = "SELECT * FROM ride_status_updates";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>status_change_id </td> 
							<td>ride_id </td>  
							<td>old_status </td>  
							<td>new_status </td>  
							<td>date_time </td>  
							<td>reason </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["status_change_id"];
						$field2name = $row["ride_id"];
						$field3name = $row["old_status"];
						$field4name = $row["new_status"];
						$field5name = $row["date_time"];
						$field6name = $row["reason"];
        
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
			<h1>Ride Status Updates</h1>
			<?php
				$query = "SELECT * FROM ride_statuses";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>status_id </td> 
							<td>status </td>  
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
			<?php
				$query = "SELECT * FROM user";

				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>user_id </td> 
							<td>username </td>  
							<td>password </td>  
					  </tr>';

				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["user_id"];
						$field2name = $row["username"];
						$field3name = $row["password"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>'.$field3name.'</td> 
							  </tr>';
					}
					$result->free();
				} 
			?>
			<h1>User</h1>
		</body>
	</div>
</html>