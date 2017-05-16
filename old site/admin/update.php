<?php 
include 'connection.php';

//show first in this page
$show = 1;

//Get the task value sent with the link to find what task has to be done
$task = $_GET['task'] ;

//If task is empty then asign a default value.
if (strlen($task)==0) 
{		
	$task = 0;	
}

//Do update if task value is 1
if($task == 1)
{
	$query = "SELECT * FROM  sub_track";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		//Do anything ony if life is lesser than sent
		if ($sent < $life)
		{
			$s = $sent + 1;
			$ts = $tosend - 1;			
			//If tosend is lesser that 4 
			if ($ts < 4)
			{ 
				//get subscriber name, email and phone details
				$query2 = "SELECT * FROM  user_details WHERE u_id = '" .$u_id. "'" ;		
				$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
				while ($row = mysql_fetch_array($result2))  { extract($row); }	

				//send message to subscriber saying that subscription is going to end
				if ($ts == 0)
				{
					$mesg = "Dear  <strong>$f_name $l_name, </strong> <br>  <br> This is to inform you that, your subscription for <strong>THE GIANT WHEEL  magazine has expired.</strong> Please renew your subscription as soon as possible to continue to receive your magazine. <br><br> Thank you.<br><br> THE GIANT WHEEL MAGAZINE TEAM" ;
				}
				elseif ($ts < 4 && $ts > 0)
				{
				$mesg = "Dear  <strong>$f_name $l_name, </strong> <br>  <br> This is to inform you that, your subscription for <strong>THE GIANT WHEEL </strong> magazine is coming to an end. <strong>You will receive $ts more issues.</strong> Please renew your subscription as soon as possible to continue to receive your magazine. <br><br> Thank you.<br><br> THE GIANT WHEEL MAGAZINE TEAM" ;		
				}	
				$email_from = "contact@giantwheelmag.com";
				$email_subject = "<strong>GIANT WHEEL MAGAZINE</strong> Subscription renewal reminder";
				$email_body = $mesg;
				
				$to =  $email;
								
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: $email_from \r\n";
				$headers .= "Reply-To: contact@giantwheelmag.com \r\n";		
				
				mail($to,$email_subject,$email_body,$headers);
							
				//message displayed for admin with Name, email and phone				
				$msg1 = $msg1 . "<tr><td>$f_name $l_name</td><td>$u_id</td><td>$phone</td><td>$email</td><td>$ts issues left </td></tr>";
			}
			
			//If tosend becomes zero
			if ($ts == 0)
			{
				//deactivate subscriber
				$query3 = 'UPDATE subscription SET sub_status = 1 WHERE u_id = "' . $u_id .'"';	
				$result3 = mysql_query($query3, $db) or die(mysql_error($db));				
			}
			//Update the sub_track with the new values 
			$query4 = 'UPDATE sub_track SET sent = "' . $s. '", tosend = "' . $ts. 	'" WHERE u_id = "' . $u_id .'"';	
			$result4 = mysql_query($query4, $db) or die(mysql_error($db));	
		}		
	}	
	$show = 2;
	$task = 2;
}	

//Do this if reverted
if($task == 3)
{
	$show = 3;
}
$a = "<table width='100%'><tr><td><b>Name</b></td><td><b>User Id</b></td><td><b>Phone</b></td><td><b>Phone</b></td><td></td></tr>";
$msg1 = $a . $msg1 . "</table>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Subscription</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	padding-right: 20px;
	padding-left: 20px;
	border: 1px solid #0099ff;
	color: #0099FF;
	text-decoration: none;
}
-->
</style>
</head>

<body>
<table width="801" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5">
  <tr>
    <td height="25" align="center" bgcolor="#999999"><span class="style1">SUBSCRIPTION STATUS </span></td>
  </tr>
<?php  if($show == 1) {  //show this as default ?>
  <tr>
    <td>&nbsp;</td>
  </tr> 
  <tr>
    <td height="30" align="center"><span class="style2">Do you want to update the subscription details?</span> </td>
  </tr>
  <tr>
    <td height="30" align="center"><span ><a href="update.php?task=1" class="style3">Yes</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span><a href="javascript:history.back()" class="style3">No</a></span> </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
<?php } if($show == 2) { //show this afetr update ?>   
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><?php echo $msg1;   ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="center" class="style2">You have successfully updated the records!! </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
<?php } if($show == 1) {  //show this as default ?>
<?php } if($show == 3) {  //show this after task reverted ?>
<?php } ?>  
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="center" bgcolor="#999999"><a href="menu.php" class="style1">BACK</a></td>
  </tr>
</table>
</body>
</html>
