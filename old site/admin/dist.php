<?php 

//First check if the session variable have the value "adminsona". If not send them to login page.
//If clicked on create coupons then send to createcoupons.php
//if clicked on View details then send to distview.php
//if clicked on distributor reports send to reports.php

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
<title>Distributors</title>
</head>

<body>
<table width="284" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" bgcolor="#999999"><span class="style1"> MENU</span></td>
  </tr>
  <tr>
    <td align="left" valign="middle" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="343" align="left" valign="middle" bgcolor="#D6D6D6"><a href="createcoupons.php" class="style2">Create Coupon Codes </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="distview.php" class="style2">View Distributor details </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="report1.php" class="style2">Distributor Report </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="mainmenu.php" class="style1">Back</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
