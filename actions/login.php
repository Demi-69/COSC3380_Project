<?php 
	session_start();
	
	include('see_connect.php');
		
	$localhost = "44.203.241.251";
	
	$_SESSION['localhost'] = $localhost;
		
	$user_id = $_REQUEST['user_id'];
	$password = $_REQUEST['password'];
	
	$user_id = stripcslashes($user_id);  
    $password = stripcslashes($password);  
    $user_id = mysqli_real_escape_string($connect, $user_id);  
    $password = mysqli_real_escape_string($connect, $password);  
	
	$sql = "select * from user where user_id = '$user_id' and pass_word = '$password'";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1) // login successful
	{
		echo "<h1><center> Login successful </center></h1>";  
	
		$sql = "select has_permission_admin, has_permission_reports, has_permission_employee_management, has_permission_ride_management from user where user_id = '$user_id' and pass_word = '$password'";  
		
		$result = mysqli_query($connect, $sql);  
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	
		$isAdmin = $row["has_permission_admin"];
		$hasReports = $row["has_permission_reports"];
		$hasRide = $row["has_permission_ride_management"];
		$hasEmployee = $row["has_permission_employee_management"];
	
		$sql = "select name_first from employee where employee_id = '$user_id'";  
		
		$result = mysqli_query($connect, $sql);  
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	
		$name = $row["name_first"];
		
		$_SESSION['user_id'] = $user_id;
		$_SESSION['isAdmin'] = $isAdmin;
		$_SESSION['hasReports'] = $hasReports;
		$_SESSION['hasRide'] = $hasRide;
		$_SESSION['hasEmployee'] = $hasEmployee;
		$_SESSION['name'] = $name;
		
		header("Location: http://$localhost/front_page.php");
	}
	else // login failed
	{
		$_SESSION['login_error'] = "true";
		header("Location: http://$localhost/index.php");
	}
	
?>