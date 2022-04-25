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
  
    mysqli_query($connect,"update ride set ride_id = $name,
	 ride_type='$type',
	 manufacturer_id = '$manu',
	 ride_class = '$class',
	 max_weather = '$maxW',
	 ride_status = '$s'
	 where ride_id = '$id'");
	 
	$localhost = $_SESSION['localhost'];
	header("Location: http://$localhost/ride_form.php");
?>