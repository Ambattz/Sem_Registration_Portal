<?php
	include("CONNECT.php");
	session_start();
	$sql="SELECT  * FROM FINALDATA ;";
	$res=mysqli_query($conn,$sql);
?>
<HTML>
<head>
<title>DATA PORTAL</title> <link rel="icon" href="IHRDLO2.PNG">
</head>
<HR COLOR=" #cc0000">
<body bgcolor=#C0C0C0>
		<div style = "font-size:40px; color:#cc0000; margin-top:30px">
			<center>
				<img src="IHRDLO.png"  width="140" height="100"><h3>ALL DATA PAGE</h3>
			</center>
</div>
<HR COLOR=" #cc0000"><BR/><a href="LOGIN.PHP" class="txt2 hov1">
							LOGIN PAGE
			</a></body><BR/>
VERIFIED NO DUE DATA OF REGISTERED STUDENT <BR/><BR/>
<table border="2" style="width:100%">
	<tr>
	<BR/>
	<BR/>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;REGISTRATION ID 	: &nbsp;&nbsp;&nbsp;&nbsp;</th>

		<th>&nbsp;&nbsp;&nbsp;&nbsp;OFFICE DUE			: &nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;LIBRARY DUE			: &nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;COMPUTER LAB DUE 	: &nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;STATUS				: &nbsp;&nbsp;&nbsp;&nbsp;</th>
		
	</tr>
	
<?php

	if(mysqli_num_rows($res)>0){
		while($result = $res->fetch_assoc())
		{			print "<tr> <td>";
			echo $result['CLASS'];
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


</form>
</body>
</HTML>