<!DOCTYPE html>
<html>
<body style="">
<?php
$connection = mysqli_connect("localhost","root","","members");
include("header.php");

session_start();

$member_id = '';
echo date("Y-m-d");
$rr = date("Y-m-d");
$error = '';
$emailid = $_SESSION['enid'];

$check = mysqli_query($connection , "SELECT * FROM points WHERE emailid = '$emailid' and date = '$rr'");

		if( mysqli_num_rows($check) >= 1)
		{
			echo 'You have already provided your feedback for today.If you want any updation in feedback then you can resubmit again.';
		}

if(isset($_REQUEST['pointbtn']))
{
	$breakfast = $_REQUEST['breakfast'];
	$lunch = $_REQUEST['lunch'];
	$snacks = $_REQUEST['snacks'];
	$dinner = $_REQUEST['dinner'];
	$comment = $_REQUEST['comment'];
	$points = ( $breakfast + $lunch + $snacks + $dinner )/4;
	if(empty($breakfast))
	{
		$error .= 'please fill breakfast points <br/>';
	}
	else if(empty($lunch))
	{
		$error .= 'please fill  lunch points<br/>';
	}
	else if(empty($snacks))
	{
		$error .= 'please fill snacks points <br/>';
	}
	else if(empty($dinner))
	{
		$error .= 'please fill dinner points <br/>';
	}
	else if($breakfast < 0 or $breakfast > 10 or $lunch < 0 or $lunch > 10 or $snacks < 0 or $snacks > 10 or $dinner < 0 or $dinner > 10)
	{
		$error .= 'please fill valid points ';
	}
	else if( mysqli_num_rows($check) >= 1)
	{
		$query = "UPDATE `points` SET `breakfast`='$breakfast',`lunch`='$lunch',`snacks/tea`='$snacks',`dinner`='$dinner',`points`='$points',`comment`='$comment' WHERE emailid = '$emailid' and date = '$rr'";
		mysqli_query($connection,$query);
	}
	else if(!empty($breakfast) and !empty($lunch) and !empty($snacks) and !empty($dinner)  and empty($comment))
	{
		$connection = mysqli_connect("localhost","root","","members");
		mysqli_query($connection,"INSERT INTO `points`(`breakfast` , `lunch`,`snacks/tea`,`dinner`,`points`,`emailid`,`comment`,`date`) VALUES ('$breakfast','$lunch','$snacks','$dinner','$points',$emailid','','$rr')");

			session_start();

			session_destroy();

			header("Location: login.php");

	}
	else if (!empty($breakfast) and !empty($lunch) and !empty($snacks) and !empty($dinner)  and !empty($comment))
	{
		$connection = mysqli_connect("localhost","root","","members");
		mysqli_query($connection,"INSERT INTO `points`(`breakfast` , `lunch`,`snacks/tea`,`dinner`,`points`,`emailid`,`comment`,`date`) VALUES ('$breakfast','$lunch','$snacks','$dinner','$points','$emailid','$comment','$rr')");

				session_start();

				session_destroy();

				header("Location: login.php");
	}
}
echo " Current logged in user id is : ";
echo $enrolid;

?>
<li style=""><a href = "logout.php">Logout</li></a>

<li style="float: right;padding-right: 50px;"><a href="https://www.facebook.com"><img src="facebook.png" width="30px" height = "30px"></li></a>
<li style="float: right;padding-right: px;"><a href="https://www.twitter.com"><img src="twitter.jpg" width="30px" height = "30px"></li></a>
<li style="float: right;padding-right: px;"><a href="https://www.gmail.com"><img src="gmail.png" width="30px" height = "30px"></li></a>
<br/><br/>
<li style=""><a href="display.php"> Display my feedback </li></a>
<br/><br/>
<form action = "index2.php" method = "POST">
<fieldset style=""><legend style="color: orange; font-size: 22px;">Provide your review here. Points will be out of 10.</legend>
		<?php
			echo $error;
		?>
		<table width = "%100" >
				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Breakfast </td>
					<td width = "70%">
						<input style="font-size: 25px;" type = "points" name = "breakfast" />
					</td>
				</tr>

				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Lunch </td>
					<td width = "70%">
						<input style="font-size: 25px;" type = "points" name = "lunch" />
					</td>
				</tr>
				<tr>

				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Snacks/tea </td>
					<td width = "70%">
						<input style="font-size: 25px;" type = "points" name = "snacks" />
					</td>
				</tr>
				<tr>

				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Dinner </td>
					<td width = "70%">
						<input style="font-size: 25px;" type = "points" name = "dinner" />
					</td>
				</tr>
				<tr>

				<tr>
					<td width="30%" style="color:orange; font-size: 25px;"> Any comment </td>
					<td width = "70%">
						<input style="font-size: 25px;" type = "text" name = "comment" />
					</td>
				</tr>
				<p> <br/><br/></p>
				<tr>
				<td colspan = "2">					<input style = "background-color: pink; color: blue; font-size: 20px; border: black;" type = "submit" value = "SUBMIT" name="pointbtn"/>
				</td>
				</tr>
		</table>
</fieldset>
<?php
include('display.php')
?>
</body>
</html>