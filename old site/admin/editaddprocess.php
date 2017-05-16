<?php 
include 'connection.php';
session_start();

//$_SESSION[‘rec’];

//Receive variables from form
$uid =  $_POST['add1'];
$task =  $_POST['task'];
$add1 =  $_POST['add1'];
$add2 =  $_POST['add2'];
$city =  $_POST['city'];
$pincode =  $_POST['pincode'];
$jump =  $_POST['jump'];

//if task is 1 then
if ($task ==1)
{
	//table has to be updated
	$query3 = 'UPDATE user_details SET r_add1 = "' . $add1. 			
			'", r_add2 = "' . $add2.  
			'", city = "' . $city.  
			'", pincode = "' . $pincode.  
			'" WHERE u_id = "' . $uid .'"';	
	$result = mysql_query($query3, $db) or die(mysql_error($db));	
	
	//session variable has to be incremented
	$_SESSION[‘rec’] = $_SESSION[‘rec’] + 1; 
	
	
}

//if task is 2 then session has to be incremented to jump
if ($task ==2)
{
	$_SESSION[‘rec’] = $jump;
}

//go back to the edit page
header("Location: http://www.giantwheelmag.com/admin/editadd.php");

?>
