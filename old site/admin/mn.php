<?php 
session_start();


//Include
include 'connection.php';
include 'functions.php'; 


$prss = $_GET["prss"];

if ($prss == "a")
{
	$uid = $_GET["uid"];
	
	$d_query1 = 'DELETE FROM user_details WHERE u_id ="' .$uid .'"';
	$result = mysql_query($d_query1, $db) or die(mysql_error($db));	
	header("Location: mn.php");		
}

if ($prss == "b");
{
	$uid = $_GET["uid2"];

	$d_query2 = 'DELETE FROM subscription WHERE u_id ="' .$uid .'"';
	$result = mysql_query($d_query2, $db) or die(mysql_error($db));
	
}

//	header("Refresh:0");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Maintainance</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 5px;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-top: 3px;
	padding-bottom: 3px;
	padding-left: 5px;
	font-weight: bold;
}

-->
</style>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="398" height="40" valign="top"><a href="javascript:history.back();" class="style1">&lt;&lt;Back</a></td>
    <td width="17">&nbsp;</td>
    <td width="585">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" class="style3">User Details </td>
    <td>&nbsp;</td>
    <td align="center" class="style3">Subscription</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="19%" bgcolor="#F3F3F3" class="style3">Action</td>
        <td width="19%" bgcolor="#F3F3F3" class="style3">Sl.No</td>
        <td width="62%" bgcolor="#F3F3F3" class="style3">User Id </td>
      </tr>
	  <?php 		
		while ($row = mysql_fetch_array($user_details_order_id)) 
		{
			extract($row);		
			
			$uid = $u_id;
			$sno = $sno + 1;
			
	  ?>
      <tr>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><a href="mn.php?prss=a&amp;uid=<?php echo $uid;?>">DELETE</a></td>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><?php echo $sno;?></td>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><?php echo $uid;?></td>
      </tr>
	  <?php }?>
    </table></td>
    <td>&nbsp;</td>
    <td valign="top" bgcolor="#E2E2E2"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="28%" bgcolor="#F3F3F3" class="style3">User Id </td>
        <td width="39%" bgcolor="#F3F3F3" class="style3">Pay Mode </td>
        <td width="13%" bgcolor="#F3F3F3" class="style3">Sl. No </td>
        <td width="20%" bgcolor="#F3F3F3" class="style3">Action</td>
      </tr>
	  <?php 		
		while ($row = mysql_fetch_array($sub_order_id)) 
		{	
			extract($row);
			
			$uid2 = $u_id;  
			$pay = $pay_mode;
			$sn = $sn + 1;
			
	  ?>
      <tr>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><?php echo $uid2;?></td>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><?php echo $pay;?></td>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><?php echo $sn;?></td>
        <td height="55" valign="top" bgcolor="#FFFFFF" class="style2"><a href="mn.php?prss=b&amp;uid2=<?php echo $uid2;?>">DELETE</a></td>
      </tr>
	  <?php }?>
    </table></td>
  </tr>
</table>
</body>
</html>
