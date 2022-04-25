<?php
	session_start();
	include('see_connect.php');
	
	$id=$_GET['id'];
	
	$name = $_POST['Ride_Name']; 
	$type = $_POST['Ride_Type']; 
	$manu = $_POST['Manufacturer']; 
	$class = $_POST['Ride_Class'];  
	$maxW = $_POST['Max_Weather'];
	$s = $_POST['Ride_status'];
  
    mysqli_query($connect,"update ride set name_first='$employee_first', name_middle='$employee_middle', name_last='$employee_last', date_of_birth='$employee_dob', phone_number='$employee_number' where employee_id = '$id'");
	"ride_id = $name,
	 ride_type=$type,
	 manufacturer_id"
	$localhost = $_SESSION['localhost'];
	header("Location: http://$localhost/employee_form.php");
?>