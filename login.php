<?php

	include("header.php");

	session_start();

	$connection = mysqli_connect("localhost","root","","members");

	$error = '';

	if(isset($_REQUEST['loginbtn']))
	{
		$enrolid = $_REQUEST['enrolid'];
		$pass = $_REQUEST['password'];
		if(empty($enrolid))
		{
			$error .= 'Please fill your enrolment id <br/>';
		}
		if(empty($pass))
		{
			$error .= 'Please fill your password <br/>';
		}
	}
	if(!empty($enrolid) and !empty($pass))
	{
		$check = mysqli_query($connection , "SELECT * FROM memmbers WHERE enrolid = '$enrolid' and password = '$pass'");

		if( mysqli_num_rows($check) >= 1)
		{
			$rs = mysqli_fetch_array($check);

			$_SESSION['member_id'] = $rs['id'];

			$_SESSION['enid'] = $rs['enrolid'];

			header("Location: index2.php");
		}
		else
		{
			$error .= "Credentials not match";
		}
	}
	echo $error;

?>
  
<form style="text-align: center; " action = "login.php" method = "POST">
	<fieldset><legend style="text-align: center; font-size: 25px;">Login to get access</legend>
		<table width = "%10" >
				<tr>
					<td width="30%" style="color:orange; font-size: 25px;" > Enrolment id </td>
					<td width = "70%">
						<input type = "text" name = "enrolid" />
					</td>
				</tr>

				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Password </td>
					<td width = "70%">
						<input type = "password" name = "password" />
					</td>
				</tr>

				<tr style="font-size: 30px;">
					<td width="30%" colspan = "2">
						<input type = "submit" value = "Login" name="loginbtn"/>

						<li style="color:blue; font-size: 20px; text-align: right;"><a href = "register.php">Signin</li></a>
					</td>
				</tr>
				

		</table>
	</fieldset>
	<br/><br/><br/>