<?php 
session_start();

//Include
include 'connection.php';


/*
1) Check if session contains right value to see if the visitor is authorised to see this page.
2) Receive variables from the form to appropriate variables. Set other needed variables.
3) Check to see if any field is left empty. If so set appropriate message as value to the "mesg" variable. If not then set the  value of "step" to 2. 
4) Check to see if either name, or email or code already exists in the data base. If so set appropriate message as value to the "mesg" variable. If not set the value of the "step" variable to 3.
5) If "step" variable has the value 3, then everything is okay. Write the details to the "distributor" table. Set the value of the "mesg" variable to appropriate value. 
6) Create a table for that code  
*/


// 1) Check if session contains right value to see if the visitor is authorised to see this page.
if ($_SESSION['aid'] <> "adminsona")
{
	header("Location: http://www.giantwheelmag.com/admin");
}





// 2) Receive variables from the form to appropriate variables. Set other needed variables.
$name2 = $_POST['name'];
$area2 = $_POST['area'];
$email2 = $_POST['email'];
$ccode2 = $_POST['ccode'];
$err=0;





// 3) Check to see if any field is left empty. If so set appropriate message as value to the "mesg" variable. If not then set the value of "step" to 2. 
$step = 2;
if (strlen($name2)==0) 
{		
	$mesg = "You have left the <b>name</b> field empty. All fields are mandatory. Please go back and fill the details.";	
	$step = 1;
	$err=1;
	
}
if (strlen($area2)==0) 
{		
	$mesg = "You have left the <b>area</b> field empty. All fields are mandatory. Please go back and fill the details.";	
	$step = 1;
	$err=1;
}
if (strlen($email2)==0) 
{		
	$mesg = "You have left the <b>email</b> field empty. All fields are mandatory. Please go back and fill the details.";	
	$step = 1;
	$err=1;
}
if (strlen($ccode2)==0) 
{		
	$mesg = "You have left the <b>coupon code</b> field coupon code field empty. All fields are mandatory. Please go back and fill the details.";	
	$step = 1;
	$err=1;
}





// 4) Check to see if either name, or email or code already exists in the database. If so set appropriate message as value to the "mesg" variable. If not set the value of the "step" variable to 3.
if ($step==2)
{
	$query = "SELECT * FROM  distributors";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		if ($name2 == $name)
		{
			$mesg = "The name already exists. Please go back and check what you have entered.";
			$err = 1;
			break;
		}
		if ($email2 == $email)
		{
			$mesg = "The email already exists. Please go back and check what you have entered.";
			$err = 1;
			break;
		}
		if ($ccode2 == $ccode)
		{
			$mesg = "The code you entered already exists. Please go back and check what you have entered.";
			$err = 1;
			break;
		}
	}	
}	

if ($err==0){$step = 3;}




// 5) If "step" variable has the value 3, then everything is okay. Write the details to the "distributor" table. Set the value of the "mesg" variable to appropriate value.  
if ($step == 3)
{
	$query = "INSERT INTO distributors ( name, area, email, ccode)  VALUES ( '$name2', '$area2', '$email2', '$ccode2') "; 
 	$result = mysql_query($query, $db) or die(mysql_error($db)); 
	$mesg = "You have successfully created the coupon code";
}




// 6) Create a table for that code.
$sql = "CREATE TABLE $ccode2 (
    ccode TEXT NOT NULL,
    user_id TEXT NOT NULL,
	date TEXT NOT NULL,
	year INT NOT NULL,
	month INT NOT NULL,
	sub_life TEXT NOT NULL,
	comm TEXT NOT NULL    
    )";
   
$result = mysql_query($sql, $db) or die(mysql_error($db));


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	font-size: 16px;
	text-transform: uppercase;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	text-decoration: none;
	line-height: 25px;
	padding-right: 20px;
	padding-left: 20px;
}
-->
</style>
</head>

<body>
<table width="339" border="0" align="center" cellpadding="0" cellspacing="0">
<?php  if($step == 3){ ?>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><span class="style1"> Done !! </span></td>
  </tr>
<?php  } else {  ?>  
  <tr>
    <td height="30" align="center" bgcolor="#999999"><span class="style1"> Error !! </span></td>
  </tr>
<?php  }  ?>  
  <tr>
    <td align="left" valign="middle" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="339" align="center" valign="middle" bgcolor="#D6D6D6" class="style2"><?php  echo $mesg;  ?></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
<?php if($step == 3){ ?>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="dist.php" class="style1">Continue</a></td>
  </tr>
<?php  } else {  ?>  
   <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="javascript:history.back()" class="style1">Back</a></td>
  </tr>
<?php  }  ?> 
</table>
</body>
</html>
