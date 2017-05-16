<?php 
//connection
session_start();
include 'connection.php';
include 'functions.php'; 

//Read data from user tables
$query = "SELECT * FROM  user_details";		
$result = mysql_query($query, $db) or die(mysql_error($db));	

while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	
	//Send mail
	$mesg = file_get_contents('http://www.giantwheelmag.com/admin/greeting.html');
	
	$email_from = "augustine@lifevaluesfoundation.com";
	$email_subject = "GREETINGS";
	$email_body = $mesg;
	
	$to =  $email;
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: GIANT WHEEL  \r\n";
	$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		
	
	mail($to,$email_subject,$email_body,$headers);	
	
}	

$to = "contact@giantwheelmag.com";
mail($to,$email_subject,$email_body,$headers);


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Send Greetings</title><style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 25px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#E6E6E6" class="style1">Success!!</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><span class="style2">You have successfully send the mail!!! </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#E6E6E6"><a href="javascript:history.back()" class="style1">Back</a></td>
  </tr>
</table>
</body>
</html>
