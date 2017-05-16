<?php 
include 'connection.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reminder Sent Status</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-transform: uppercase;
	font-size: 14px;
}
.style10 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	text-transform: uppercase;
	font-weight: bold;
	padding-left: 10px;
	text-decoration: none;
}
.style13 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-left: 10px;
}
-->
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="4" align="left" bgcolor="#797979"><a href="javascript:history.back()" class="style10">&lt;&lt;Back</a></td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#999999"><span class="style1">First Reminder Sent </span></td>
  </tr>
  <tr>
    <td width="210" height="25" align="left" bgcolor="#C1C1C1"><span class="style10">Name</span></td>
    <td width="189" align="left" bgcolor="#C1C1C1"><span class="style10">Email</span></td>
    <td width="140" align="left" bgcolor="#C1C1C1"><span class="style10">Phone</span></td>
    <td width="161" align="left" bgcolor="#C1C1C1"><span class="style10">Subscription  </span></td>
  </tr>
  <?php 
	$query = "SELECT * FROM  sub_track ORDER BY u_id";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);		
		if ($tosend == 3)
		{
			$query1 = 'SELECT * FROM user_details WHERE u_id = "' . $u_id .'"';
			$result1 = mysql_query($query1, $db) or die(mysql_error($db));	
			while ($row = mysql_fetch_array($result1)) 
			{
				extract($row);
				$name = $f_name ." ". $l_name;			
			}	

  ?>
  <tr>
    <td height="25" bgcolor="#E5E5E5" class="style13"><?php  echo $name;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $email;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $phone;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $bill_date;  ?></td>
  </tr>
  <?php 
  		}
	}	
	?>
</table>
 <br />
 <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="4" align="center" bgcolor="#999999"><span class="style1">Second Reminder Sent </span></td>
  </tr>
  <tr>
    <td width="210" height="25" align="left" bgcolor="#C1C1C1"><span class="style10">Name</span></td>
    <td width="189" align="left" bgcolor="#C1C1C1"><span class="style10">Email</span></td>
    <td width="140" align="left" bgcolor="#C1C1C1"><span class="style10">Phone</span></td>
    <td width="161" align="left" bgcolor="#C1C1C1"><span class="style10">Subscription </span></td>
  </tr>
    <?php 
	$query = "SELECT * FROM  sub_track ORDER BY u_id";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);		
		if ($tosend == 2)
		{
			$query1 = 'SELECT * FROM user_details WHERE u_id = "' . $u_id .'"';
			$result1 = mysql_query($query1, $db) or die(mysql_error($db));	
			while ($row = mysql_fetch_array($result1)) 
			{
				extract($row);
				$name = $f_name ." ". $l_name;			
			}	

 	 ?>
  <tr>
    <td height="25" bgcolor="#E5E5E5" class="style13"><?php  echo $name;  ?></td>
	<td bgcolor="#E5E5E5" class="style13"><?php  echo $email;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $phone;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $bill_date;  ?></td>  
  </tr>
  <?php 
  		}
	}	
	?>
  
</table>
 <br />
 <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td height="30" colspan="4" align="center" bgcolor="#999999"><span class="style1">third Reminder Sent </span></td>
   </tr>
   <tr>
     <td width="210" height="25" align="left" bgcolor="#C1C1C1"><span class="style10">Name</span></td>
     <td width="189" align="left" bgcolor="#C1C1C1"><span class="style10">Email</span></td>
     <td width="140" align="left" bgcolor="#C1C1C1"><span class="style10">Phone</span></td>
     <td width="161" align="left" bgcolor="#C1C1C1"><span class="style10">Subscription </span></td>
   </tr>
    <?php 
	$query = "SELECT * FROM  sub_track ORDER BY u_id";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);		
		if ($tosend == 1)
		{
			$query1 = 'SELECT * FROM user_details WHERE u_id = "' . $u_id .'"';
			$result1 = mysql_query($query1, $db) or die(mysql_error($db));	
			while ($row = mysql_fetch_array($result1)) 
			{
				extract($row);
				$name = $f_name ." ". $l_name;			
			}	

 	 ?>   
  <tr>
    <td height="25" bgcolor="#E5E5E5" class="style13"><?php  echo $name;  ?></td>
	<td bgcolor="#E5E5E5" class="style13"><?php  echo $email;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $phone;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $bill_date;  ?></td>  
  </tr>
  <?php 
  		}
	}	
	?>
 </table>
 <br />
 <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td height="30" colspan="4" align="center" bgcolor="#999999"><span class="style1">Subscription Expired</span></td>
   </tr>
   <tr>
     <td width="210" height="25" align="left" bgcolor="#C1C1C1"><span class="style10">Name</span></td>
     <td width="189" align="left" bgcolor="#C1C1C1"><span class="style10">Email</span></td>
     <td width="140" align="left" bgcolor="#C1C1C1"><span class="style10">Phone</span></td>
     <td width="161" align="left" bgcolor="#C1C1C1"><span class="style10">Subscription </span></td>
   </tr>
    <?php 
	$query = "SELECT * FROM  sub_track ORDER BY u_id";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);		
		if ($tosend == 0)
		{
			$query1 = 'SELECT * FROM user_details WHERE u_id = "' . $u_id .'"';
			$result1 = mysql_query($query1, $db) or die(mysql_error($db));	
			while ($row = mysql_fetch_array($result1)) 
			{
				extract($row);
				$name = $f_name ." ". $l_name;			
			}	

 	 ?>      
  <tr>
    <td height="25" bgcolor="#E5E5E5" class="style13"><?php  echo $name;  ?></td>
	<td bgcolor="#E5E5E5" class="style13"><?php  echo $email;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $phone;  ?></td>
    <td bgcolor="#E5E5E5" class="style13"><?php  echo $bill_date;  ?></td>  
  </tr>
 
<?php 
  		}
	}	
	?> </table>
 <br />
 <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
   <?php 
	$query = "SELECT * FROM  sub_track ORDER BY u_id";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);		
		if ($tosend == 0)
		{
			$query1 = 'SELECT * FROM user_details WHERE u_id = "' . $u_id .'"';
			$result1 = mysql_query($query1, $db) or die(mysql_error($db));	
			while ($row = mysql_fetch_array($result1)) 
			{
				extract($row);
				$name = $f_name ." ". $l_name;			
			}	

 	 ?>
   
   <?php 
  		}
	}	
	?>
	<tr>
     <td height="25" colspan="4" align="center" bgcolor="#797979" class="style13"><a href="javascript:history.back()" class="style10">back</a></td>
   </tr>
 </table>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</body>
</html>
