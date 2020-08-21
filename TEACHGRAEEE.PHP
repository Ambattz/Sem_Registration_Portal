<?php
	include("CONNECT.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$REGID = mysqli_real_escape_string($conn,$_POST['REGID']);
		$CDC = 'S5EEE';
		$sqle = "INSERT INTO temp (REGID) VALUES('$REGID');";
		mysqli_query($conn,$sqle);
		$sql ="SELECT REGID FROM temp where REGID like 'PTA1___0__';";
		$result = mysqli_query($conn,$sql);
		
		IF((mysqli_num_rows($result))>0)
		{
				If(isset($_POST['OD'])){
			$ODC = mysqli_real_escape_string($conn,$_POST['OD']);			
		}
		ELSE{
		$ODC = 'NO';}
		If(isset($_POST['LD'])){
			$LDC = mysqli_real_escape_string($conn,$_POST['LD']);			
		}
		ELSE{
		$LDC = 'NO';}
		If(isset($_POST['CD'])){
			$CDC = mysqli_real_escape_string($conn,$_POST['CD']);			
		}
		ELSE{
		$CDC = 'NO';}
		If(isset($_POST['VB'])){
			$VBC = mysqli_real_escape_string($conn,$_POST['VB']);			
		}
		ELSE{
		$VBC = 'HOD';}
		if($ODC == "YES" && $LDC == "YES" && $CDC == "YES"){
			$STA="DUECLEARED";
		}
		ELSE{
		$STA="DUEPENDING";}
		ECHO ($STA);
		$sql = "INSERT INTO finaldata (REGID,CLASS,OFFICE,LIBRARY,COMPUTER_LAB,STATUS,VERIFIED_BY) VALUES('$REGID','$CDC','$ODC','$LDC','$CDC','$STA','$VBC');";
		if (mysqli_query($conn,$sql)) {
			echo "SUBMITTED REQUEST SUCCESSFULLY......";
	$sql="DELETE FROM `temp`;";mysqli_query($conn,$sql);}
	}ELSE{ $sql="DELETE FROM `temp`;";
		mysqli_query($conn,$sql);
		Header( 'Location: /TEACHGRA.php' );}}
	$sql="SELECT  * FROM request WHERE CLASS='S5EEE';";
	$res=mysqli_query($conn,$sql);

?>
<HTML>
<head>
<title>TEACHER PORTAL</title> <link rel="icon" href="IHRDLO2.PNG">
</head>
<HR COLOR=" #cc0000">
<body bgcolor=#C0C0C0>
		<div style = "font-size:40px; color:#cc0000; margin-top:30px">
			<center>
				<img src="IHRDLO.png"  width="140" height="100"><h3>NO DUE CLEARING PAGE</h3>
			</center>
</div>
<HR COLOR=" #cc0000"><BR/>
TYPE "YES" TO CLEAR THE DUE OF RESPECTIVE SECTION FOR EACH STUDENT.&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;CLICK HER TO GO TO	<a href="LOGIN.PHP" class="txt2 hov1">LOGIN PAGE</a> <BR/><BR/>	
				              
					<form action = "" method = "POST">
						<label>REGISTRATION ID 	: </label>
						<input type = "text" name = "REGID" class = "box"/>
			<input type="checkbox" name="OD" value="YES" > OFFICE &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
			<input type="checkbox" name="LD" value="YES"> LIBRARY &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
			<input type="checkbox" name="CD" value="YES"> COMPUTER LAB &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
						<label>&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;VERIFIED BY		: </label>
				<input type="checkbox" name="VB" value="STAFF ADVISOR"> STAFF ADVISOR &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<BR/>
						<input type = "submit" value = " Submit "/><input type="reset" value="Clear Form"><BR/>
					</form>  

<table border="2" style="width:100%" >
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