<?php
	include("CONNECT.php");
	   session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$REGID = mysqli_real_escape_string($conn,$_POST['RID']);
		$CIDC ='S5CSE';		
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
		$sql = "INSERT INTO request (REGID,CLASS,OFFICE,LIBRARY,COMPUTER_LAB) VALUES('$REGID','$CIDC','$ODC','$LDC','$CDC');";
		if (mysqli_query($conn,$sql)) {
			echo "SUBMITTED REQUEST SUCCESSFULLY......";$sql="DELETE FROM `temp`;";mysqli_query($conn,$sql);
		}}
		ELSE{ $sql="DELETE FROM `temp`;";
		mysqli_query($conn,$sql);
		Header( 'Location: /STUDREQ.php' );}
	}
?>


<html>
	<head>
		<title>STUDENT PORTAL</title><link rel="icon" href="IHRDLO2.PNG">
	</head>
	<body bgcolor=#C0C0C0>
	<HR COLOR=" #cc0000">
		<div style = "font-size:40px; color:#cc0000; margin-top:30px">
			<center>
				<img src="IHRDLO.png"  width="140" height="100"><h3>NO DUE REQUEST PAGE</h3>
			</center>
		</div>
		<HR COLOR=" #cc0000"><BR/><BR/>
		 <form  method="POST" action=""  >
		 TYPE REGISTER NO AND CLASS (UPPERCASE), THEN CLICK ON SECTION AND CLICK ON THE "Send Form" BUTTON TO SUBMIT THE REQUEST.<br/><br/><br/><br/><br/><br/>
			<label>REGISTRATION ID	:</label>
			<input type = "text" name = "RID" class = "box"/><br /><br />
			<BR/><BR/><input type="checkbox" name="OD" value="YES" > OFFICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="LD" value="YES"> LIBRARY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="CD" value="YES"> COMPUTER LAB <br><BR/>
			<input type="submit"  value="Send Form">
			<input type="reset" value="Clear Form">
			<a href="LOGIN.PHP" class="txt2 hov1">
							LOGIN PAGE
			</a>
   
		</form>
	</body>
</html>