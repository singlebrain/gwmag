<?php 
include 'connection.php';
session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Address</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #FFFFFF;
	line-height: 25px;
	text-decoration: none;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #999999;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	color: #666666;
	line-height: 22px;
	padding-left: 20px;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="editaddprocess.php">
  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" bgcolor="#969696"><span class="style1">Edit Address</span> </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>
	<?php 
	$query = "SELECT * FROM  user_details";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		
		if ($count == $_SESSION[‘rec’])
		{		
	?>	
    <tr>
      <td height="0" align="left" bgcolor="#F0F0F0" class="style3">Rec No.: <?php  echo $_SESSION[‘rec’]; ?> </td>
    </tr>
    <tr>
      <td height="0" align="left" bgcolor="#F0F0F0" class="style3">Name : <?php  echo $f_name . " " . $l_name;  ?></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#F0F0F0"><span class="style3">User Id: <?php  echo $u_id;  ?> </span></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0"><input name="uid" type="hidden" id="uid" value="<?php  echo $u_id;  ?>">
      <input name="task" type="hidden" id="task" value="1"></td>
    </tr>
    <tr>
      <td height="25" align="center" bgcolor="#F0F0F0"><input name="add1" type="text" class="style2" id="add1" value="<?php  echo $r_add1;  ?>" size="50" /></td>
    </tr>
    <tr>
      <td height="25" align="center" bgcolor="#F0F0F0"><input name="add2" type="text" class="style2" id="add2" value="<?php  echo $r_add2;  ?>" size="50" /></td>
    </tr>
    <tr>
      <td height="25" align="center" bgcolor="#F0F0F0"><input name="city" type="text" class="style2" id="city" value="<?php  echo $city;  ?>" size="50" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0"><input name="pincode" type="text" class="style2" id="pincode" value="<?php  echo $pincode;  ?>" size="50" /></td>
    </tr>
	<?php  
		break; 
		}
	$count = $count + 1;	
	}  ?>
    <tr>
      <td align="center" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0"><input name="Submit" type="submit" class="style3" id="Submit" value="Change And Move Next --&gt;" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F0F0F0">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#969696" height="5"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#969696" class="style1">Jump</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#F0F0F0">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center" bgcolor="#F0F0F0"><form name="form2" method="post" action="editaddprocess.php">
      <span class="style3">
      <input name="task" type="hidden" id="task" value="2">
      Jump to record no: </span><span class="style2">&nbsp;</span> 
      <input name="jump" type="text" class="style2" id="jump" size="5">
        &nbsp;
        <input name="Submit2" type="submit" class="style3" value="GO">
    </form>    </td>
  </tr>
  <tr>
    <td height="15"></td>
  </tr>
   <tr>
      <td align="center" bgcolor="#969696"><a href="menu.php" class="style1">Back</a></td>
    </tr>
</table>
</body>
</html>
