<?php
session_start();

?>
<!DOCTYPE HTML>

<html>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	
		<!-- Logged in user-->
		<header id = "site_header">
			<h1>THEME PARK SYSTEM LOG IN</h1>
		</header>
		
		
		<nav id = "error_line">
			<?php
				if($_SESSION['login_error'] == "true")
					echo '<h1>Could Not Log In</h1>';
			?>
		</nav>
		
		<body>
			<form name = "login" action = "actions/login.php" method = GET>
				<header>
					<h2>Employee Log In</h2>
				</header>
			
				<body>
					<div id = "input">
						<label for="user_id">User ID</label>
						<input type = "text" name = "user_id" id= "user_id" pattern = "[0-9]+" required>
					</div>
				
					<div id = "input">
						<label for="password">Password</label>
						<input type = "password" name = "password" id= "password" required >
					</div>
				
					<div id = "input">
						<input type = "submit" value = "LOG IN">
					</div>
			</form>
			
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
