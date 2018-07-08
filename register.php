
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
		$enrolid = $_REQUEST['enrolid'];
		$confirm_password = $_REQUEST['confirm_password'];

		if(empty($name))
		{
			$error .= 'please fill your name <br/>';
		}
		if(empty($pass))
		{
			$error .= 'Please fill your password <br/>';
		}
		if(empty($enrolid))
		{
			$error .= 'Please fill your enrollment number<br/>';
		}
		if(empty($confirm_password))
		{
			$error .= 'Please fill your password again<br/>';
		}
		$check2 = mysqli_query($connection," SELECT * FROM register WHERE  enrolid = '$enrolid'  and password = '$pass'");
		$check = mysqli_query($connection," SELECT * FROM memmbers WHERE  enrolid = '$enrolid'");

		if( mysqli_num_rows($check) >= 1)
		{
			$error .= 'Please enter a different enrolment id';
		}
		else if($confirm_password != $pass)
		{
			$error .= 'Password not matched';
		}
		else if(mysqli_num_rows($check2) <= 0)
		{
			$error .= 'Password does not match with enrolid.';
		}

		else if(!empty($name)  and !empty($pass) and !empty($enrolid) )
		{
			$query = mysqli_query($connection," SELECT * FROM `register` WHERE enrolid = '$enrolid'");
			$data = mysqli_fetch_array($query);
			$qq = $data['hostel'];
			mysqli_query($connection,"INSERT INTO  `memmbers`(`id` , `name`,`enrolid`,`password`,`hostel`,`date`) VALUES ('','$name','$enrolid','$pass','$qq',NOW())");
			#echo 'inside insertion <br/> $enrolid,$hostel','$email','$pass',NOW())';
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
				<td width="30%" style="color:orange; font-size: 25px;"> Erollment id </td>
				<td width = "70%">
					<input type = "text" name = "enrolid" />
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
