<?php

	include("header.php");

	session_start();

	$connection = mysqli_connect("localhost","root","","members");

	$error = '';

	if(isset($_REQUEST['loginbtn']))
	{
		$email = $_REQUEST['email'];
		$pass = $_REQUEST['password'];
		if(empty($email))
		{
			$error .= 'Please fill your email <br/>';
		}
		if(empty($pass))
		{
			$error .= 'Please fill your password <br/>';
		}
	}
	if(!empty($email) and !empty($pass))
	{
		$check = mysqli_query($connection , "SELECT * FROM memmbers WHERE email = '$email' and password = '$pass' and activated = '1'");

		if( mysqli_num_rows($check) >= 1)
		{
			$rs = mysqli_fetch_array($check);

			$_SESSION['member_id'] = $rs['id'];

			header("Location: index2.php");
		}
		else
		{
			$error .= "Credentials not match";
		}
	}
	echo $error;

?>
  
<form action = "login.php" method = "POST">
	<fieldset><legend>Login to get access</legend>
		<table width = "%100" >
				<tr>
					<td width="30%"> Email </td>
					<td width = "70%">
						<input type = "email" name = "email" />
					</td>
				</tr>

				<tr>
					<td width="30%"> Password </td>
					<td width = "70%">
						<input type = "password" name = "password" />
					</td>
				</tr>

				<tr>
					<td colspan = "">
						<input type = "submit" value = "Login" name="loginbtn"/>
					</td>
				</tr>

		</table>
	</fieldset>