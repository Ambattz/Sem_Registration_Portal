<?php
   include("CONNECT.php");
   session_start();
 
   if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
		$sql = "SELECT  * FROM teacher WHERE username = '$myusername' and password = '$mypassword'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$active = $row['active'];
		$count = mysqli_num_rows($result);
	  
		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
		$sql = "SELECT  * FROM student WHERE username = '$myusername' and password = '$mypassword'";
		$result2 = mysqli_query($conn,$sql);
		$row2 = mysqli_fetch_assoc($result);
		$active2 = $row2['active'];
		$count2 = mysqli_num_rows($result2);
		
		if($count == 1){
			IF($myusername=='EEE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: TEACHGRAEEE.php' ); EXIT();}
			ELSEIF($myusername=='ECE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: TEACHGRAECE.php' ); EXIT();}
			ELSEIF($myusername=='CSE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: TEACHGRACSE.php' ); EXIT();}
			ELSE{
			$_SESSION['username'] = $myusername;
			header( 'Location: TEACHGRA.php' );}
		}
		elseif($count2 == 1){
			IF($myusername=='S5EEE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: STUDREQEEE.php' ); EXIT();}
			ELSEIF($myusername=='S5ECE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: STUDREQECE.php' ); EXIT();}
			ELSEIF($myusername=='S5CSE'&& $mypassword =='PASS'){$_SESSION['username'] = $myusername;
			header( 'Location: STUDREQCSE.php' ); EXIT();}
			ELSE{
			$_SESSION['username'] = $myusername;
			header( 'Location: /STUDREQ.php' );}
		}
		else{
			$error = "Your Login Name or Password is invalid";
		}
	}
?>

<html> 
	<head>
		
		<title>
		Login Page
		</title>
		<link rel="icon" href="IHRDLO2.PNG">
	</head>
	<HR COLOR=" #cc0000">
		<div style = "font-size:40px; color:#cc0000; margin-top:30px">
			<center>
				<img src="IHRDLO.png"  width="140" height="100">
				<P>WELCOME</P>
				<P>TO</P>
				<P>NO DUE CERTIFICATION WEBSITE</P>
			</center>
		</div>
		<HR COLOR=" #cc0000"><BR/><BR/>
	<body bgcolor = "#C0C0C0" >	
		<div align = "center"></br>
			<div style = "width:300px; border: solid 5px #FFFFFF; " align = "left">
				<div style = "background-color:#cc0000; color:#33333; padding:5px;">
					<b>
						Login
					</b>

				<div style = "margin:50px">               
					<form action = "" method = "POST">
						<label>UserName  :</label>
							<input type = "text" name = "username" class = "box"/><br /><br />
						<label>Password  :</label>
							<input type = "password" name = "password" class = "box" /><br/><br />
							<input type = "submit" value = " Submit "/><br />
					</form>              
               <div style = "font-size:15px; color:#33333; margin-top:30px"> 
					<?php 
						echo "Enter your CREDENTIALS ";
					?> </br> 
					
						<a href="DATALOG.PHP" class="txt2 hov1"><BR/>
							STUDENT NO DUE DATA
			</a>
				</DIV>
				<div style = "font-size:15px; color:#FFFFFF; margin-top:30px"> 
					<?php 
						if(isset($error)){
							echo ($error);
							}
					?> 
			   </div>			
				</div>	
			</div>
		</div>
	</body>
</html>