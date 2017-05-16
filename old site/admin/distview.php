<?php 
session_start();

//Include
include 'connection.php';

/*
1. Check if the person is logged in properly
2. Display data
*/

// 1. Check if the person is logged in properly
if ($_SESSION['aid'] <> "adminsona")
{
	header("Location: http://www.giantwheelmag.com/admin");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Distributor View</title>
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	font-size: 16px;
	text-transform: uppercase;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
	text-decoration: none;
	line-height: 25px;
	font-weight: bold;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #999999;
	border-right-color: #999999;
	border-bottom-color: #999999;
	border-left-color: #999999;	
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	line-height: 20px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 0px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #999999;
	border-right-color: #999999;
	border-bottom-color: #999999;
	border-left-color: #999999;
	padding-left: 5px;
}
.style5 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="769" border="0" align="center" cellpadding="0" cellspacing="0">  
  <tr>
    <td height="30" colspan="7" align="left" bgcolor="#C3C3C3"> <a href="javascript:history.back()" class="style1">&nbsp;&nbsp;&lt;&lt;Back</a> </td>
  </tr>
  <tr>
    <td height="10" colspan="7" align="center"></td>
  </tr>
  <tr>
    <td height="30" colspan="7" align="center" bgcolor="#999999" class="style1">Distributor Details </td>
  </tr>
  <tr>
    <td height="10" colspan="7" align="center"></td>
  </tr>
  <tr>
    <td width="18" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="217" align="center" valign="middle" bgcolor="#FFFFFF" class="style3">Name</td>
    <td width="155" align="center" valign="middle" bgcolor="#FFFFFF" class="style3">Area </td>
    <td width="155" align="center" valign="middle" bgcolor="#FFFFFF" class="style3">Email </td>
    <td width="159" align="center" valign="middle" bgcolor="#FFFFFF" class="style3">Code</td>
    <td width="159" align="center" valign="middle" bgcolor="#FFFFFF" class="style3">Commission</td>
	<td width="18" bgcolor="#FFFFFF"> </td> 
  </tr>
<?php 
$query = "SELECT * FROM  distributors";		
$result = mysql_query($query, $db) or die(mysql_error($db));	

while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	$com = 0;
	$query2 = "SELECT * FROM  $ccode";		
	$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result2)) 
	{
		extract($row);		
		if (date('m') == $month && $year == date('Y'))
		{
			$com = $com + $comm;
		}		
	}	

?>
  <tr>
    <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" valign="middle" bgcolor="#FFFFFF" class="style4"><?php echo $name; ?></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF" class="style4"><?php echo $area; ?></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF" class="style4"><?php echo $email; ?></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF" class="style4"><?php echo $ccode; ?></td>
	<td align="left" valign="middle" bgcolor="#FFFFFF" class="style4"><?php echo $com; ?></td>
	<td width="18"> </td> 
  </tr>
 <?php  }  ?> 
  
  
  <tr>
    <td height="30" colspan="7" align="center" bgcolor="#999999"><a href="javascript:history.back()" class="style1">back</a></td>
  </tr>
</table>
</body>
</html>
