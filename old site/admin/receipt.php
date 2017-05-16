<?php 
session_start();

$bill_no = $_POST['bill'];
$date = $_POST['date'];
$uname = $_POST['name'];
$rate = $_POST['rate'];
$life = $_POST['life'];
$id = $_POST['id'];
$upass = $_POST['pass'];
$email = $_POST['email'];
$value = $_POST['value'];


If ($value=="yes")
{
$mesg = ' 
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet" type="text/css">
	<title>Receipt</title>
	<style type="text/css">
	.style1 {
		font-family: "EB Garamond", serif;	
		font-size: 24px;
	}
	.style2 {
		font-family: "EB Garamond", serif;
		font-size: 20px;
		color: #FFFFFF;
	}
	.style3 {
		color: red;
		height: 1px;
		padding: 2px;
	}
	</style>
	</head>
	<body>
	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
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
		<td bgcolor="#f0dba2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="40%" height="18">&nbsp;&nbsp;Received with thanks from </td>
			<td width="60%" height="18"><b><font color="red"> ' . $uname.' </font></b> </td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;A sum of :</td>
			<td height="18"><b><font color="red"> Rs.'. $rate .' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;Towards:</td>
			<td height="18"><b><font color="red">'. $life . ' months subscription of GIANT WHEEL Magazine</font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;User ID:</td>
			<td height="18"><b><font color="red"> '. $id . ' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;Password:</td>
			<td height="18"><b><font color="red"> '. $upass . ' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
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
	
	//Send Emails
	$email_from = "contact@giantwheelmag.com";
	$email_subject = "Receipt and User Access Details";
	$email_body = $mesg;
	
	if ($gift == "yes")	{$to = $gemail;} else {$to =  $email;}
	$to1 =  "augustine@lifevaluesfoundation.com";
	$to2 =  "contact@giantwheelmag.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $email_from \r\n";
	$headers .= "Reply-To: contact@giantwheelmag.com \r\n";		
	
	//Mail send
	mail($to,$email_subject,$email_body,$headers);
	mail($to1,$email_subject,$email_body,$headers);
	mail($to2,$email_subject,$email_body,$headers);

$value="";
session_destroy();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-family: Georgia, "Times New Roman", Times, serif}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="receipt.php">
  <table width="700" height="383" border="0" align="center" cellpadding="0" cellspacing="0" background="images/receipt.jpg">
    <tr>
      <td height="100" valign="bottom"><table width="694" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="67">&nbsp;</td>
          <td width="144"><input name="bill" type="text" id="bill" /></td>
          <td width="398">&nbsp;</td>
		  <td width="85"><input name="date" type="text" id="date" size="7" /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="79" valign="bottom"><table width="462" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="204">&nbsp;</td>
          <td width="144"><input name="name" type="text" id="name" /></td>
          <td width="72">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="40" valign="bottom"><table width="420" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="93">&nbsp;</td>
          <td width="255"><input name="rate" type="text" id="rate" /></td>
          <td width="72">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="38" valign="bottom"><table width="420" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="233">&nbsp;</td>
          <td width="115"><input name="life" type="text" id="life" size="4" /></td>
          <td width="72">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="420" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="126">&nbsp;</td>
          <td width="222"><input name="id" type="text" id="id" /></td>
          <td width="72">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="pass" type="text" id="pass" /></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center"><span class="style1">Email 
        <input name="email" type="text" id="email" />
        <input name="value" type="hidden" id="value" value="yes" />
      </span></td>
    </tr>
  </table>
  <p align="center">
    <input type="submit" name="Submit" value="Submit" />
  </p>
</form>
</body>
</html>
