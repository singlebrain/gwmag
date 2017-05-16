<?php
session_start();

// Include
include 'connection.php';
include 'functions.php'; 

$query = "SELECT * FROM user_details";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
	}	



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subscription  Form</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="user_process.php">
<table width="413" border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td width="193">&nbsp;</td>
    <td width="205">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Note: All the fields are mandatory </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Years</td>
    <td><select name="years" id="years">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3" selected="selected">3</option>
    </select>    </td>
  </tr>
  <tr>
    <td>User Id </td>
    <td><label>
    <input type="text" name="u_id" id="u_id" />
    </label></td>
  </tr>
  <tr>
    <td>User Name </td>
    <td><input type="text" name="f_name" id="f_name" /></td>
  </tr>
  <tr>
    <td>Payment Mode </td>
    <td><input type="text" name="paymode" id="paymode" value="Cash" /></td>
  </tr>
  <tr>
    <td>Cheque No (if applicable) </td>
    <td><input type="text" name="chkno" id="chkno" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Residential Address:<br />
      (Address to which the 
      magazine will be sent) </td>
  </tr>
  <tr>
    <td>Door No. / Street Name <br />
        <br /></td>
    <td><textarea name="r_add1" cols="16" rows="5" id="r_add1"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Parent Mobile</td>
    <td><input type="text" name="phone" id="phone" /></td>
  </tr>
  <tr>
    <td>Parent Email</td>
    <td><label>
    <input type="text" name="email" id="email" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Subscription Life </td>
    <td><label>
      <select name="sublife" id="sublife">
        <option value="10">10</option>
        <option value="12" selected="selected">12</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label>
    <input type="submit" name="submit" id="submit" value="Submit" />
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="menu.php">Back</a></td>
  </tr>
</table>
</form>
</body>
</html>
