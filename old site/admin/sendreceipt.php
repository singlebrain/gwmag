<?php
session_start();


//Include
include 'connection.php';
include 'functions.php'; 

//Session variables set to be used in this file
/*
$_SESSION[‘date’]= $reg_date;
$_SESSION[‘user_id’]= $user_id;
$_SESSION[‘f_name’]= $f_name;
$_SESSION[‘email’]= $email;
$_SESSION[‘pass’] = $pass;
*/

$_SESSION[‘user_id’]= $_SESSION['view_uid'];

//Getting the variables 
$uid = $_SESSION['view_uid']; 
$uname = $_SESSION['view_uname'];
$idhasvalue = 1;
$namehasvalue = 1;


//Checlk weather id or username has value
if (strlen($uid)==0 || $uid == "Select" ) 
{		
	$idhasvalue = 0;			
}	
else
{
	if (strlen($uname)==0 || $uname=="Select" ) 
	{
		$namehasvalue = 0;
	}
}

//if user id is passed
If ($idhasvalue == 1)
{
	$query = 'SELECT * FROM user_details WHERE u_id = "' . $uid .'"';	
}
//if user name is passed
elseif ($namehasvalue == 1)
{
	$query = 'SELECT * FROM user_details WHERE f_name = "' . $uname. '"';
}

$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
	}

$_SESSION[‘date’]= $reg_date;
$_SESSION[‘f_name’]= $f_name;
$_SESSION[‘l_name’]= $l_name;
$_SESSION[‘email’]= $email;
$_SESSION[‘pass’] = $pass;	

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../subscription/thankyou.php">';

?>