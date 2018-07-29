<!DOCTYPE html>
<html>
<style>
body {
  
}
</style>

<table style="width:100%">
  <tr>
    <th>Enrolment_id</th>
    <th>Breakfast</th> 
    <th>Lunch</th>
    <th>Snack</th>
    <th>Dinner</th>
    <th>Points</th>
   </tr>
 </table>

<?php

session_start();

$emailid = $_SESSION['enid'];

if(isset($_REQUEST['displaybtn']))
{
	$connection = mysqli_connect("localhost","root","","members");

	$query = mysqli_query($connection," SELECT * FROM `points` WHERE email = '$emailid'");

	
	echo '<br/><br/>';
	while($data = mysqli_fetch_array($query))	
	{

		echo '---------------------------',$data['email'] ,' ----------------------------------------------', $data['breakfast'],'--------------------------------------------',$data['lunch'],'------------------------------------',$data['snacks/tea'],'---------------------------------',$data['dinner'],'---------------------------------',$data['points'] ;
		echo '<br/><br/>';
	}
}

?>

<form action = "display.php" method = "POST">
<tr>
	<td colspan = "2">
		<input type = "submit" value = "display" name="displaybtn"/>
	</td>
</tr>
</html>