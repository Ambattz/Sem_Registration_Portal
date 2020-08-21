<?php
	include("CONNECT.php");
	session_start();
	$sql="SELECT  * FROM request ;";
	$res=mysqli_query($conn,$sql);
?>
<table border="2">
	<tr>
		<th>REGISTRATION ID 	: </th>
		<th>OFFICE DUE			: </th>
		<th>LIBRARY DUE			: </th>
		<th>COMPUTER LAB DUE 	: </th>
		<th>STATUS				: </th>
	</tr>
<?php

	if(mysqli_num_rows($res)>0){
		while($result = $res->fetch_assoc())
		{
			print "<tr> <td>";
			echo $result['REGID'];
			print "</td> <td>";
			echo $result['OFFICE']; 
			print "</td> <td>";
			echo $result['LIBRARY'];
			print "</td> <td>";
			echo $result['COMPUTER_LAB'];
			print "</td> <td>";
			echo $result['STATUS'];
		}
	}
	else{
		header('location : LOGIN.PHP');
	}
?>