<?php 
session_start();

if ($_SESSION['aid'] <> "adminsona")
{
	header("Location: http://www.giantwheelmag.com/admin");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	font-size: 16px;
	text-transform: uppercase;
}
.style1:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: underline;
	font-size: 17px;
	text-transform: uppercase;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	text-decoration: none;
	line-height: 30px;
	padding-left: 20px;
}
.style2:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 17px;
	color: #000000;
	text-decoration: underline;
	line-height: 30px;
	padding-left: 20px;
}
-->
</style>
<title>Main Menu</title>
</head>

<body>
<table width="284" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" bgcolor="#999999"><span class="style1">Main MENU</span></td>
  </tr>
  <tr>
    <td align="left" valign="middle" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="343" align="left" valign="middle" bgcolor="#D6D6D6"><a href="menu.php" class="style2">Subscribers</a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="user_add.php"></a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="dist.php" class="style2">Distributors</a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="../admin" class="style1">Logout</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
