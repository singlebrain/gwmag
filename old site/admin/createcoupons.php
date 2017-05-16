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
<title>Create Coupons</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	font-size: 16px;
	text-transform: uppercase;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	line-height: 30px;
	font-size: 16px;
	text-align: right;
}
-->
</style>
</head>

<body>
<form action="couponprocess.php" method="post">
<table width="502" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#999999"><span class="style1"> MENU</span></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="208" align="right" bgcolor="#D6D6D6" class="style3">Name&nbsp;</td>
    <td width="294" align="left" valign="middle" bgcolor="#D6D6D6"><input name="name" type="text" id="name" size="30" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#D6D6D6" class="style3">Area&nbsp;</td>
    <td align="left" valign="middle" bgcolor="#D6D6D6"><input name="area" type="text" id="area" size="30" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#D6D6D6" class="style3">&nbsp;Email&nbsp;</td>
    <td align="left" valign="middle" bgcolor="#D6D6D6"><input name="email" type="text" id="email" size="30" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#D6D6D6" class="style3">Coupon Code&nbsp; </td>
    <td align="left" valign="middle" bgcolor="#D6D6D6"><input name="ccode" type="text" id="ccode" size="30" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" bgcolor="#D6D6D6"><input name="Submit" type="submit" class="style3" value="Submit" /></td>
    </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#999999"><a href="dist.php" class="style1">Back</a></td>
  </tr>
  <tr>
    <td colspan="2" align="left" bgcolor="#D6D6D6" height="10px"></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#999999"><a href="mainmenu.php" class="style1">Main Menu </a></td>
  </tr>
</table>
</form>
</body>
</html>
