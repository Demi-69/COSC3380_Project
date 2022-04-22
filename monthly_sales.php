<!DOCTYPE HTML>

<html>
	<title>Monthly Sales Report</title>
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
		
		<body>
			<?php
				$sd = $_REQUEST['Start_Year'];
				$ed = $_REQUEST['End_Year'];
				echo "<h1> Sales from $sd to $ed</h1>";
					  
				$query = "CALL sales_by_month('$sd','$ed')";
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
					  <tr id = "first_th"> 
							<td>Month of Year </td> 
							<td>Park Tickets Sold </td>  
							<td>Park Ticket Revenue </td> 
							<td>Waterpark Tickets Sold </td> 
							<td>Waterpark Ticket Revenue </td> 
							<td>Season Passes Sold </td> 
							<td>Season Pass Revenue </td> 
							<td>Total Revenue </td> 
					  </tr>';
				
				if ($result = $connect->query($query)) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$field1name = $row["Month of Year"];
						$field2name = $row["Park Tickets Sold"];
						$field3name = $row["Park Ticket Revenue"];
						$field4name = $row["Waterpark Tickets Sold"];
						$field5name = $row["Waterpark Ticket Revenue"];
						$field6name = $row["Season Passes Sold"];
						$field7name = $row["Season Pass Revenue"];
						$field8name = $row["Total Revenue"];
        
						echo '<tr> 
								  <td>'.$field1name.'</td> 
                				  <td>'.$field2name.'</td> 
                				  <td>$'.$field3name.'</td> 
                				  <td>'.$field4name.'</td> 
                				  <td>$'.$field5name.'</td> 
                				  <td>'.$field6name.'</td> 
                				  <td>$'.$field7name.'</td> 
                				  <td>'.$field8name.'</td> 
							  </tr>';
					}
				}
			?>
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