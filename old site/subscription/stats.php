<?php

include 'connection.php';
include 'functions.php'; 

$query3 = "SELECT * FROM  subscription";		
$result3 = mysql_query($query3, $db) or die(mysql_error($db));	
			
while ($row3 = mysql_fetch_array($result3)) 
{
	extract($row3);
	
	$strdt = $sub_start_date;
	$date_array = explode("/",$strdt); // split the array to reverse date
	$rev_dt = "$date_array[2]/$date_array[1]/$date_array[0]"; 
	
	$uid = $u_id;
	
	$strd_d = 1;
	$strd_m = date('m', strtotime($rev_dt));
	$strd_y = date('y', strtotime($rev_dt));
	
	$tdate = strtotime("now");

	If ($strd_d >=  date('d', $tdate) && $strd_m == date('m', $tdate) && $strd_y == date('y', $strdt))
	{
		$query4 = 'UPDATE subscription SET sub_status = 1 WHERE u_id = "' . $uid .'"';		
		$result4 = mysql_query($query4, $db) or die(mysql_error($db));
	}

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subscription Status</title>
<style type="text/css">
<!--
.style1 {
	padding-left: 5px;
	padding-top: 3px;
	padding-bottom: 3px;	
}
.style2 {padding-left: 5px; padding-top: 3px; padding-bottom: 3px; font-weight: bold; }
-->
</style>
</head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="35" valign="top" class="style1"><a href="javascript:history.back()">&lt;&lt;Back</a></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td width="218" align="left" bgcolor="#EBEBEB" class="style1"><strong>User Id </strong></td>
    <td width="293" align="left" bgcolor="#EBEBEB" class="style1"><strong>User Name </strong></td>
    <td width="75" align="left" bgcolor="#EBEBEB" class="style1"><strong>Start Date </strong></td>
    <td width="74" align="left" bgcolor="#EBEBEB" class="style1"><strong>End Date </strong></td>
    <td width="58" align="left" bgcolor="#EBEBEB" class="style1"><strong>Status </strong></td>
    <td width="152" align="left" bgcolor="#EBEBEB" class="style2">Remind</td>
    <td width="122" align="left" bgcolor="#EBEBEB" class="style1"><strong>Action</strong></td>
  </tr>
  <?php 
  	$show = "yes";
  	$query = "SELECT * FROM  user_details ORDER BY u_id";		
	
	$result = mysql_query($query, $db) or die(mysql_error($db));	
			
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		$u = $u_id;
		$fn = $f_name;
		$ln = $l_name;
		$em = $email;
		
		$query2 = 'SELECT * FROM subscription WHERE u_id = "' . $u .'"';			
		$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
		while ($row1 = mysql_fetch_array($result2)) 
		{
			extract($row1);
			$sd = $sub_start_date;
			$ed = $sub_exp_date;
			$stat = $sub_status;
			$rm = $notify;
			if ($stat == 0)
			{
				$stat = "Inactive";				
			}
			else
			{
				$stat = "Active";
			}
		}
		
		
		$date_array = explode("/",$ed); // split the array to reverse date
		$rev_dt = "$date_array[2]/$date_array[1]/$date_array[0]"; 
		
		$strd_d = 1;
		$strd_m = date("m", strtotime("-1 month", $ed);
		$strd_y = date('y', strtotime("-1 month", $ed);
		
		$td  = date("d", time());
		$tm  = date("m", time());
		$ty  = date("y", time());
		
		If If ($strd_d >=  $td && $strd_m == $tm && $strd_y == $ty)
			{
		
  ?>
  <tr>
    <td align="left" bgcolor="#FFFFFF" class="style1"><?php echo $u; ?></td>
    <td align="left" bgcolor="#FFFFFF" class="style1"><?php echo $fn . " " . $ln; ?></td>
    <td align="left" bgcolor="#FFFFFF" class="style1"><?php echo $sd; ?></td>
    <td align="left" bgcolor="#FFFFFF" class="style1"><?php echo $ed2; ?></td>
    <td align="left" bgcolor="#FFFFFF" class="style1"><?php echo $stat; ?></td>
    <td align="left" bgcolor="#FFFFFF" class="style1">
	<?php 
	if ($rm == 0)
		{
			echo "No Reminder sent!";
		} 
	elseif ($rm == 1)
		{
			echo "Ist Reminder sent!";
		}	
	elseif ($rm == 2)
		{
			echo "2nd Reminder sent!";
		}		
	?>
	</td>
    <td align="left" bgcolor="#FFFFFF" class="style1"><a href="stats.php?to=<?php echo $em; ?>&uid=<?php echo $u; ?>&rm=<?php echo $rm; ?>&snd=yes">Send reminder</a> </td>
  </tr>
  <?php }} ?>
  <tr>
    <td height="50" colspan="7" align="center" bgcolor="#FFFFFF" class="style1"><a href="stats.php?to=all&snd=yes">Send Mail to all </a></td>
  </tr>
</table></td>
  </tr>
</table>
</body>
</html>
<?php 

$add = $_GET["to"];
$uid = $_GET["uid"];
$rm = $_GET["rm"];
$send = $_GET["snd"];


if ($send == "yes")
{
	if ($to == "all")
	{ 
		$query = "SELECT * FROM  user_details";		
		
		$result = mysql_query($query, $db) or die(mysql_error($db));	
				
		while ($row = mysql_fetch_array($result)) 
		{	
			extract($row);
			$mesg = 'Hello'. $f_name . ' ' . $l_name . ' <br> This mail is to inform you that your subscription is comming to an end. Please log on to yout account and	renew your subscription to continue receiving the  magazine. <br><br> Thank you. <br>Augustine <br> <STRONG>THE GIANT WHEEL MAGAZINE</strong> ';
			
			$email_from = "augustine@lifevaluesfoundation.com";
			$email_subject = "Receipt";
			$email_body = $mesg;
			
			$to =  $email;
					
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $email_from \r\n";
			$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		
			
			mail($to,$email_subject,$email_body,$headers);
			
			
			//update
			
			$id = $u_id;
			while ($row = mysql_fetch_array($sub)) 
			{	
				extract($row);
				if ($id == $u_id)		
				{
					$rcnd = $notify + 1;
				}
			}	
			$query3 = 'UPDATE user_details SET notify = "' . $rcnt . '" WHERE u_id = "' . $id .'"';	
			$result3 = mysql_query($query3, $db) or die(mysql_error($db));
	
		}
	}
	else
	{
		$mesg = 'Hello'. $f_name . ' ' . $l_name . ' <br> This mail is to inform you that your subscription is comming to an end. Please log on to yout account and renew your subscription to continue receiving the  magazine. <br><br> Thank you. <br>Augustine <br> <STRONG>THE GIANT WHEEL MAGAZINE</strong> ';
			
			$email_from = "augustine@lifevaluesfoundation.com";
			$email_subject = "Receipt";
			$email_body = $mesg;
			
			$to =  $add;
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $email_from \r\n";
			$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		
			
			mail($to,$email_subject,$email_body,$headers);
			
			$rm = $rm + 1;
			$query3 = 'UPDATE user_details SET notify = "' . $rm . '" WHERE u_id = "' . $uid .'"';	
			$result3 = mysql_query($query3, $db) or die(mysql_error($db));
			
	}		
}
?>
