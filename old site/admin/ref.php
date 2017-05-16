<span class="s">asd</span>
<?php 

//This is just a reference file for codes.

//Session Variables
session_start();
$_SESSION[‘loginerr’] = "asdda";


//Include files
include 'connection.php';
include 'functions.php'; 

//receive variables
$sub = $_POST['sub'];



//Check for empty
if (strlen($id)==0) 
	{		
		
	}	
 

//Navigate to a different page
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';

header("Location: http://www.yourwebsite.com/user.php");




//Database
//=========================================================================

//Select
$query = "SELECT * FROM  user_details";		
$query = "SELECT bill_counter FROM subscription ORDER BY bill_counter";		
$query = 'SELECT * FROM user_details WHERE u_id = "' . $uid .'"';

$result = mysql_query($query, $db) or die(mysql_error($db));	
		
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	
}	


//updating address
$query3 = 'UPDATE user_details SET r_add1 = "' . $add1. 			
			'", r_add2 = "' . $add2.  
			'", r_add3 = "' . $add3.  
			'", r_add4 = "' . $add4.  
			'", pincode = ' . $pin. 			    
			' WHERE u_id = "' . $id .'"';	
			

$result = mysql_query($query3, $db) or die(mysql_error($db));


//Inserting
$query = " INSERT INTO user_details ( u_id, reg_date)  VALUES ( '$user_id', '$reg_date') "; 
 $result = mysql_query($query, $db) or die(mysql_error($db)); 


//========================================================



//Function
function job_add()   //Defining
{

}

job_add(); //Calling



//Date 
$todaydatecode = time();
$todaydate = date("d/m/Y",$todaydatecode);
$year = 60 * 60 * 24 *365;




//Email
$mesg = ' ';

$email_from = "augustine@lifevaluesfoundation.com";
$email_subject = "Receipt";
$email_body = $mesg;

$to =  $email;
$to1 =  "augustine@lifevaluesfoundation.com";
$to2 =  "contact@sonaandjacob.com";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		

mail($to,$email_subject,$email_body,$headers);
mail($to1,$email_subject,$email_body,$headers);
mail($to2,$email_subject,$email_body,$headers);




?>