<?php include 'actions/login_check.php';?>
<!DOCTYPE HTML>

<html>
	<title>Password Manager</title>
	<link rel="stylesheet" href="css/style.css">
	
	
	<nav id = "status_bar">
		<a href = "front_page.php">Front Page</a>
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
		
		<a href = "actions/logout.php"> Log out </a>
	</nav>
	
	<nav>
		
	</nav>
	
	<body>
		<form name = "pass" action = "actions/change_password.php" method = GET>
			<header>
				<h2>Change Password</h2>
			</header>
		
			<body>
				<div id = "input">
					<label for="password">New Password</label>
					<input type = "password" name = "new_password1" id= "new_password1" required >
				</div>
				
				<div id = "input">
					<label for="password">Retype New Password</label>
					<input type = "password" name = "new_password2" id= "new_password2" required oninput="check(this)">
				</div>
				<script language='javascript' type='text/javascript'>
					function check(input) 
					{
						if (input.value != document.getElementById('new_password1').value) 
						{	
							input.setCustomValidity('Password Must be Matching.');
						} 
						else 
						{
							// input is valid -- reset the error message
							input.setCustomValidity('');
						}
					}
				</script>
				
				<div id = "input">
					<input type = "submit" value = "LOG IN">
				</div>
		</form>
		
	</body>
		
</html>