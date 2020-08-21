<?php
	include('config.php');
	session_start();
	$user_check = $_SESSION['username'];   
	$ses_sql = mysqli_query($conn,"select username from user_login where username = '$user_check' ");   
	$row = mysqli_fetch_assoc($ses_sql);  
	$login_session = $row['username'];   
	if(!isset($_SESSION['username'])){
		header("location:login.php");
		die();
	}
?>