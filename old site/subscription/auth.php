<?php
session_start();

$hasvalue = 1;
$id_exist = 0;

include 'connection.php';
include 'functions.php'; 


//receive variables
$id = $_POST['id'];
$password = $_POST['pass'];
$id_exist = 0;


//Check for empty
if (strlen($id)==0) 
	{		
		$hasvalue = 0;
		$_SESSION[‘loginerr’] = "You have left the User Id Field Empty!!!";	
		$_SESSION[‘from’] = 1;
		header("Location: login.php?val=1");
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php?val=1">';				
	}	
elseif (strlen($password)==0)
	{
		$hasvalue = 0;
		$_SESSION[‘loginerr’] = "You have left the Password Field Empty!!!";
		$_SESSION[‘from’] = 1;
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php?val=1">';
	} 

$_SESSION[‘id’] = $id;




//Validate the id and password

if ($hasvalue==1) 
{
	$query = "SELECT * FROM  user_details";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
		
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		
		if ($id==$u_id) // if the user id is exist then...
		{		
			$id_exist = 1;
			//$_SESSION[‘name’] = $f_name . " " . $l_name;
						
			break;	
		}		
	}
	
	
	if($id_exist ==0)
	{
		$_SESSION[‘loginerr’] =  "This User ID does not exist. Please check if you have entered the correct User ID.";	
		$_SESSION[‘from’] = 1;	
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php?val=1">';
	}

$a="log";
	if($id_exist ==1)
	{
		
		if($password == $pass) // if the password matches the id then...
		{				
		$enter=1;		
		$_SESSION[‘loginerr’] = " ";
		$name = $f_name . " " . $l_name;	
			$query3 = 'UPDATE sess SET uid = "' . $id. 			
			'", uname = "' . $name.  
			'", date = "' . date('d/m/Y',strtotime("now")).  
			'", email = "' . $email. 
			'", upass = "' . $pass.  
			'" WHERE no = 1' ;
			//echo $query3;
			$result1 = mysql_query($query3, $db) or die(mysql_error($db));

		}
		else
		{	
			$_SESSION[‘loginerr’] =  "The Password entered is not correct. Please try again.";	
			$_SESSION[‘from’] = 1;
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php?val=1">';					
		}
	}	
}



if ($enter == 1)
{	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=logged.php">';
}	



?>