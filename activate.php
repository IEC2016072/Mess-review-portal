<?php
$connection = mysqli_connect("localhost","root","","members");
$token = $_REQUEST['token'];

$query = "UPDATE memmbers SET activated = 1 WHERE token = '".$token."'";

if(mysql_query($connection,$query))
{
	echo "You have been registered successfully";
	exit;
}