<?php
	$ser="localhost";
	$user="root";
	$pass="";
	$db="semreg";
	$conn=mysqli_connect($ser, $user, $pass, $db);
	if($conn==true){
		//echo "Databse Connection Successfull";
		}
	if($conn==false){
		echo "Databse Connection UNSuccessfull";
		die("error".mysqli_connect_error());
	}
?>