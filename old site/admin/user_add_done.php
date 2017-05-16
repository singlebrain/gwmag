<?php
//This file is called by user_process.php 

session_start();

// Include
include 'connection.php';
include 'functions.php'; 

//This file will send an email receipt and write data to scbscription table
//For this many values has to be generated.
//First bill counter is fetched from the subscription file and the counter is incremented -------------P1---------------
//Next using the counter the bull number is generated -------------P2--------------- 
//Next bill date is generated -------------P3---------------
//Next using all the values an email is sent to the subscriber -------------P4--------------- 
//Next the subscription table is updated with these values -------------P5---------------


//Session variables set to be used in this file
/*
$_SESSION[‘date’]= $reg_date;
$_SESSION[‘user_id’]= $user_id;
$_SESSION[‘f_name’]= $f_name;
$_SESSION[‘email’]= $email;
$_SESSION[‘pass’]= $pass;
$_SESSION[‘years’] = $years;
*/

$email = $_SESSION[‘email’];




//-------------P1---------Processing bill number------
$query = "SELECT bill_counter FROM subscription ORDER BY bill_counter";		
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);	
	
}

$counter = $bill_counter + 1;
	 


//-------------P2---------------
$bill_no = "MB _" . $_SESSION['billno'] ."_" .  $counter;


//-------------P3----------Date processing-----
$date = $_SESSION[‘date’]; //Date processing already done in previous file


//----------rates---------------
$yrs = $_SESSION[‘years’];
if ($yrs == 1)
{
	$rate = $_SESSION['r1']; 
}
elseif ($yrs == 2)
{
	$rate = $_SESSION['r2']; 
}
elseif ($yrs == 3)
{
	$rate = $_SESSION['r3']; 
}


//date calculation

$life = $_SESSION[‘life’];

if ($life == 10)
{
	$date_array = explode("/",$date); // split the array to reverse date
	$rev_dt = "$date_array[2]/$date_array[1]/$date_array[0]"; 
	$stdate = date('1/m/Y', strtotime("+1 month", strtotime($rev_dt))); //first date of next month
	
	$expdate = date('1/m/Y', strtotime("+10 month", strtotime($rev_dt))); //first date of next year
}
else
{
	$date_array = explode("/",$date); // split the array to reverse date
	$rev_dt = "$date_array[2]/$date_array[1]/$date_array[0]"; 
	$stdate = date('1/m/Y', strtotime("+1 month", strtotime($rev_dt))); //first date of next month
	
	//$period = $yrs * 12;
	$y = "+" . $yrs.  " year";
	$expdate = date('1/m/Y', strtotime($y, strtotime($rev_dt))); //first date of next year
	$life = $yrs * 12; 
}

// date caculation end---------------------




//-------------P4---------------
$mesg = '
<html>
<head>
<title>Receipt</title>
<style type="text/css">
<!--
.style1 {	font-family: "EB Garamond", serif;	
	
}
.style2 {font-family: "EB Garamond", serif;
	font-size: 16px;
	line-height: 23px;
	vertical-align: top;
	color: #000000;
	text-decoration: none;
}
-->
</style>
</head>
<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" background="http://www.lifevaluesfoundation.com/images/emailbg.jpg" >
  <tr>
    <td height="40" align="center" bgcolor="#ff7e3f" class="style1"><strong>LIFE VALUES FOUNDATION</strong> - An Initiative of Nicholas Brothers </td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#9f8850" class="style2"><font color="#FFFFFF">RECEIPT</font></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#f0dba2"><table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="11%">&nbsp;&nbsp;Bill No: </td>
        <td width="13%"><b><font color="red"> ' . $bill_no . ' </font></b></td>
        <td width="56%">&nbsp;</td>
        <td width="7%">Date:</td>
        <td width="13%"><b><font color="red"> '. $date . ' </font></b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#f0dba2"><hr  size="1" noshade class="style3" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#f0dba2"><table width="69%" border="0" cellspacing="0" cellpadding="0">
	<table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="18">&nbsp;</td>
        <td height="18">&nbsp;</td>
      </tr>
      <tr>
        <td width="40%" height="18">&nbsp;&nbspReceived with thanks from </td>
        <td width="60%" height="18"><b><font color="red"> ' . $_SESSION[‘f_name’] . ' &nbsp;' .$_SESSION[‘l_name’].' </font></b> </td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td height="18">&nbsp;</td>
      </tr>
      <tr>
        <td height="18">&nbsp;&nbsp;A sum of :</td>
        <td height="18"><b><font color="red">Rs. 510</font></b></td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td height="18">&nbsp;</td>
      </tr>
      <tr>
        <td height="18">&nbsp;&nbsp;Towards:</td>
        <td height="18"><b><font color="red">One year subscription of GIANT WHEEL Magazine</font></b></td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td height="18">&nbsp;</td>
      </tr>
      <tr>
        <td height="18">&nbsp;&nbsp;User ID:</td>
        <td height="18"><b><font color="red"> '. $_SESSION[‘user_id’] . ' </font></b></td>
      </tr>
      <tr>
        <td height="18">&nbsp; Password:</td>
        <td height="18"><b><font color="red"> '. $_SESSION[‘pass’] . ' </font></b></td>
      </tr>
	  <tr>
        <td height="18">&nbsp; Your Subscription is from: </td>
        <td height="18"><b><font color="red"> '. $stdate . ' to '. $expdate .'  </font></b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" valign="top" bgcolor="#f0dba2"><hr  size="1" noshade class="style3" /></td>
  </tr>
</table>
</body>
</html>
';

$email_from = "contact@giantwheelmag.com";
$email_subject = "Receipt";
$email_body = $mesg;
$to =  $email;
//$to =  "augustine@lifevaluesfoundation.com, contact@sonaandjacob.com," . $email;
$to1 =  "augustine@lifevaluesfoundation.com";
$to2 =  "contact@giantwheelmag.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email_from \r\n";
$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		


mail($to,$email_subject,$email_body,$headers);
mail($to1,$email_subject,$email_body,$headers);
mail($to2,$email_subject,$email_body,$headers);
	




//-------------P5---------------

$pmode = $_SESSION['paymode'];
$userid = $_SESSION[‘user_id’];
$dt = $_SESSION[‘date’];
//$sublife = $_SESSION[‘sublife’];


//Check if the user name is already available
$query = "SELECT * FROM  user_details";	

$result = mysql_query($query, $db) or die(mysql_error($db));	
		
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	
}	

if(u_id == $userid)
{
	$go = 0;
}
else
{
	$go = 1;
}



if ($go = 1)
{
$query = " INSERT INTO subscription (u_id, years, bill_date, pay_mode, bill_counter, bill_num, sub_start_date, sub_exp_date, sub_life, sub_status) 
			VALUES ('$userid', '$yrs', '$dt','$pmode','$counter','$bill_no','$stdate','$expdate','$life','') "; 

$result = mysql_query($query, $db) or die(mysql_error($db)); 

}

mysql_close($db);



// Message

echo '
<table width="500" border="0" align="center" cellpadding="7" cellspacing="0">
  <tr>
    <td align="center"><strong>User details added </strong>!!!</td>
  </tr>
  <tr>
    <td align="center"><a href="user_add.php">Add another user </a></td>
  </tr>
  <tr>
    <td align="center"><a href="menu.php">Menu </a></td>
  </tr>
</table>';




?>

