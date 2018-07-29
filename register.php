
<?php

	include("header.php");

	$connection = mysqli_connect("localhost","root","","members");

	$error = '';
	$name = '';
	$email = '';
	$pass = '';
	$enrolid = '';
	$confirm_password = '';
	$hostel = '';

	if(isset($_REQUEST['registerbtn']))
	{
		$name = $_REQUEST['fname'];
		$pass = $_REQUEST['password'];
		$email = $_REQUEST['email'];
		$confirm_password = $_REQUEST['confirm_password'];

		if(empty($name))
		{
			$error .= 'please fill your name <br/>';
		}
		if(empty($pass))
		{
			$error .= 'Please fill your password <br/>';
		}
		if(empty($email))
		{
			$error .= 'Please fill your enrollment number<br/>';
		}
		if(empty($confirm_password))
		{
			$error .= 'Please fill your password again<br/>';
		}
		$check = mysqli_query($connection," SELECT * FROM memmbers WHERE  email = '$email'");
		$token = md5($email);

		if( mysqli_num_rows($check) >= 1)
		{
			$error .= 'Please enter a different email id';
		}
		else if($confirm_password != $pass)
		{
			$error .= 'Password not matched';
		}

		else if(!empty($name)  and !empty($pass) and !empty($email) )
		{
			mysqli_query($connection,"INSERT INTO  `memmbers`(`id` , `name`,`email`,`password`,`token`,`date`) VALUES ('','$name','$email','$pass','$token',NOW())");
			$to=$email;
			$subject="Please verify your email";
			$message = 'Please Click on this link in order to verify your account';
			$message .= '<a href= "http://localhost/login/activate.php?token='.$token.'">Click here</a>';
			#$from = 'iec2016072@iiita.ac.in';
			#$body='Your Activation Code is mhgvvmnbvmnbvmnbvmn Please Click On This link <a href="verification.php">Verify.php?id=ruchin&code=mhgvvmnbvmnbvmnbvmn</a>to activate  your account.';
			$headers = "From: test@gmail.com\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			mail($to,$subject,$message,$headers);

			echo "An Activation Code Is Sent To You Check You Emails";
		}

	}

?>

	<br/><br/><br/><br/>
	<form action = "register.php" method = "POST">

		<fieldset><legend style="color:orange; font-size: 25px;"> Please signup to access</legend>
		<?php
			echo $error;
		?>
		<br/><br/>
		<table width = "%100" >
			<tr style="font-size: 25px;">
				<td width="30%" style="color:orange; font-size: 25px;"> Name </td>
				<td width = "70%">
					<input type = "text" name = "fname" />
				</td>
			</tr>

			<tr style="font-size: 25px;">
				<td width="30%" style="color:orange; font-size: 25px;"> Email </td>
				<td width = "70%">
					<input type = "text" name = "email" />
				</td>
			</tr>

			<tr style="font-size: 25px;">
				<td width="30%" style="color:orange; font-size: 25px;"> Password </td>
				<td width = "70%">
					<input type = "password" name = "password" />
				</td>
			</tr>

			<tr style="font-size: 25px;">
				<td width="30%" style="color:orange; font-size: 25px;"> Comfirm password </td>
				<td width = "70%">
					<input type = "password" name = "confirm_password" />
				</td>
			</tr>

			<tr style="font-size: 40px; color: green;">
				<td colspan = "2">
					<input type = "submit" value = "SignUp" name="registerbtn"/>
				</td>
			</tr>

		</table>
		</fieldset>

	</form>



<?php

	include("footer.php")

?>
