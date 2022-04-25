<?php include 'actions/login_check.php';?>

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
				if($_SESSION['hasReports'] or $_SESSION['isAdmin'])
					echo "<a href = 'data_report.php' >Data Report</a>";
				if($_SESSION['hasRide'] or $_SESSION['isAdmin'])
					echo "<a href = 'ride_form.php' >Ride Form</a>";
				if($_SESSION['isAdmin'])
					echo "<a href = 'update_status.php' >Update Weather</a>";
		?>
		
		<a href = "logout.php"> Change Password </a>
		<a href = "actions/logout.php"> Log out </a>
	</nav>
	
		
	<body class = "cool_form">
		<p>
			<a href = "create_employee_form.php">Create Employee</a>
		</p>
		<?php
			$query = "SELECT * FROM user";
		
			echo '<table border="0" cellspacing="2" cellpadding="2"> 
				  <tr> <td colspan = "6" class = "table_head"><h1>Employees</h1></td></tr>
				  
				  <tr id = "first_th"> 
						<td>user_id </td> 
						<td>Admin </td>  
						<td>Has Data Reports </td> 
						<td>Maintanence </td> 
						<td>Employee Management </td> 
				  </tr>';
	
			if ($result = $connect->query($query)) 
			{
				while ($row = $result->fetch_assoc()) 
				{
					$field1name = $row["user_id"];
					
					$field2name = "";
					if($row["has_permission_admin"] == "1")
						$field2name = "true";
					else	
						$field2name = "false";
					
					$field3name = $row["has_permission_ride_management"];
						$field2name = "true";
					else	
						$field2name = "false";
					
					$field4name = $row["has_permission_employee_management"];
						$field2name = "true";
					else	
						$field2name = "false";
					
					echo '<tr style="line-height:40px;" > 
							<td>'.$field1name.'</td> 
							<td>'.$field2name.'</td> 
							<td>'.$field3name.'</td> 
							<td>'.$field4name.'</td> 
							<td><a href="actions/employee_delete.php?id='.$field1name.'">Delete</a></td>
							<td><a href="employee_edit.php?id='.$field1name.'">Edit</a></td>
						  </tr>';
				}
				$result->free();
				echo "</table>";
			} 
			?>
	</body>
</html>
