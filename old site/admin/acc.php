<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Accounts</title>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	
}

.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
}

-->
</style>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" valign="top"><a href="javascript:history.back()">&lt;&lt;Back</a></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="201" bgcolor="#F3F3F3" class="style2"><span class="style1">Use ID </span></td>
        <td width="213" bgcolor="#F3F3F3" class="style2">User Name </td>
        <td width="106" bgcolor="#F3F3F3" class="style2">Registation Date </td>
        <td width="245" bgcolor="#F3F3F3" class="style2">Pay Mode </td>
        <td width="96" bgcolor="#F3F3F3" class="style2">No. of Yrs </td>
		<td width="132" bgcolor="#F3F3F3" class="style2">Bill Number  </td>
      </tr>
	  <?php 
		  while ($row = mysql_fetch_array($user_details)) 
			{
				extract($row);
				
				$u = $u_id;
				$n = $f_name . " ". $l_name;
				//$r = $reg_date;
				$r =  date('d/m/Y', $r);
				
				$query = 'SELECT * FROM subscription WHERE u_id = "' . $u .'"';
				$result = mysql_query($query, $db) or die(mysql_error($db));	
				while ($row1 = mysql_fetch_array($result)) 
					{
						extract($row1);
						$b = $bill_date;
						$pm = $pay_mode;
						$y = $years;
						$bn = $bill_num;
					}		  
	  ?>	  
      <tr>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $u; ?></td>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $n; ?></td>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $b; ?></td>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $pm; ?></td>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $y; ?></td>
        <td bgcolor="#FFFFFF" class="style2"><?php echo $bn; ?></td>
      </tr>
	  <?php } ?>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
