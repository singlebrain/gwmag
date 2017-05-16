<?php

//This file was called by user_add file. 

session_start();

// Include
include 'connection.php';
include 'functions.php'; 

// Variables
$hasvalue = 1;
$message ="";
$write = 0;
$id_check=0;



//This file first receives all the value posted to it and saves it to variables ------P1--------
//Then it checks if the any fields are empty------P2----------
//If any fields are empty, a message is displayed with a link to go back ------P3----------
//Then the numerical values of pin and phone are checked -----------P4------------------	
//Then if every thing is okay it is checked to see if the userid is already taken. Then appropriate message is sent-----------P5------------------	
//If the password is not taken then the writing process is started -----------P6------------------	
//Then some session variables are written for future use -----------P7------------------	
//Then the control is sent to --user_add_done--  -----------P8------------------	


//Assigned the values received from form to variables
//Note: 
//1. This form has been generated with www.fpmgonline.com
//2. Hence the table record name and field name are same
//3. Before wirting to bdatabase the user id is fetched to check if it already exists
//4. At that time the value of $u_id changes and creates problem
//5. Hence user id has been received in a different variable name 


//------P1--------Receive values-----

$years = $_POST['years'];
$user_id = $_POST['u_id'];
$reg_date = date("d/m/Y",time()); 
$pass = $user_id . "123";  
$_SESSION['billno'] = $_POST['billno'];
$_SESSION['paymode'] = $_POST['paymode'] ." " . $_POST['chkno'];
$f_name = $_POST['f_name'];  
$l_name = $_POST['l_name'];  
$school = $_POST['school'];  
$location = $_POST['location'];  
$city = $_POST['city'];  
$state = $_POST['state'];  
$class = $_POST['class'];  
$r_add1 = $_POST['r_add1'];  
$r_add2 = $_POST['r_add2'];  
$r_add3 = $_POST['r_add3'];  
$r_add4 = $_POST['r_add4'];  
$pincode =  intval($_POST['pincode']);  
$phone =  intval($_POST['phone']);  
$email = $_POST['email']; 
$sublife = $_POST['sublife'];

$_SESSION[‘life’] =  $sublife;
$_SESSION[‘date’]= $reg_date;
$_SESSION[‘years’] = $years;



//-----------P2--------------Checking if empty-----

if (strlen($user_id)==0) 
	{		
		$hasvalue = 0;			
	}	
elseif (strlen($f_name)==0)
	{
		$hasvalue = 0;
	}
elseif (strlen($r_add1)==0)
	{
		$hasvalue = 0;
	}
elseif (strlen($phone)==0)
	{
		$hasvalue = 0;
	}
elseif (strlen($email)==0)
	{
		$hasvalue = 0;
	}
elseif (strlen($sublife)==0)
	{
		$hasvalue = 0;
	}
	

//-----------P3-------------Error message-----	
if ($hasvalue==0) 
{
	$_SESSION[‘message’] =  "FIELD EMPTY ERROR!!! <br> You have left some field blank. Please go back and make the changes.";
	errormesg_1();
}



//-----------P4------------------Checks Pin code and phone
/*if ($hasvalue==1) 
{
	if($pincode == 0)
	{
	$_SESSION[‘message’] =  "PINCODE ERROR!!! <br> Please go back and check the pincode that you entered" ;
	$hasvalue =0;
	errormesg_1();
	}
}*/
if ($hasvalue==1) 
{
	/*if($phone == 0)
	{
	$_SESSION[‘message’] =  "PHONE ERROR!!! <br> Please go back and check the phone number that you entered" ;
	$hasvalue=0;
	errormesg_1();
	}*/
}




//-----------P5-----------Checking user ID and password exuit-------	
if ($hasvalue==1) 
{
	$query = "SELECT u_id FROM user_details";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		
		if ($user_id==$u_id) // if the user id is already taken then...
		{		
		$_SESSION[‘message’] = "USER ID ERROR!!! <BR>The user id is already taken. Try something else";	
		errormesg_1();	
		$write = 0;
		break;			
		}
		else // If everything is okay variable write is set to 1 to indicate that data can be written
		{
		$write = 1;	
		}	
	}
}


//-----------P6------------Insserting values------	




if ($write==1)
{

//Data writing
$query = " INSERT INTO user_details ( u_id, pass, f_name, l_name, school, location, city, state, class, r_add1, r_add2, r_add3, r_add4, pincode, phone, email )  VALUES ( '$user_id', '$pass', '$f_name', '$l_name', '$school', '$location', '$city', '$state', '$class', '$r_add1', '$r_add2', '$r_add3', '$r_add4', '$pincode', '$phone', '$email' ) "; 
 $result = mysql_query($query, $db) or die(mysql_error($db)); 
}



//-----------P7------------------	

//Date conversion
$reg_date = date('d/m/y', $reg_date);



$_SESSION[‘user_id’]= $user_id;
$_SESSION[‘f_name’]= $f_name;
$_SESSION[‘l_name’]= $l_name;
$_SESSION[‘email’]= $email;
$_SESSION[‘pass’]= $pass;
$_SESSION[‘sublife’]= $sublife;




mysql_close($db);


//-----------P8------------------	
if ($write==1)
{
	header("Location: user_add_done.php");
}


?>