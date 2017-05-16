<?php 
session_start();


//Include
include 'connection.php';
include 'functions.php'; 


$uid = $_SESSION['view_uid'];
$uname = $_SESSION['view_uname'];


$idhasvalue = 1;
$namehasvalue = 1;

//Checlk if form has sent any values
if (strlen($uid)==0 || $uid == "Select") 
{		
	$idhasvalue = 0;			
}	
else
{
	if (strlen($uname)==0 || $uname=="Select") 
	{
		$namehasvalue = 0;
	}
}



//if user id is passed
If ($idhasvalue == 1)
{
	$query = 'SELECT * FROM user_details WHERE u_id = "' . $uid .'"';	
	
}


//if user name is passed
If ($namehasvalue == 1)
{
	$query = 'SELECT * FROM user_details WHERE f_name = "' . $uname. '"';
}

$result = mysql_query($query, $db) or die(mysql_error($db));	

while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
	}

$uid=$u_id;
//Get details from subscription table
$query2 = 'SELECT * FROM subscription WHERE u_id = "' . $uid. '"';

$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result2)) 
	{
		extract($row);
	}
		
//Check if form has been submitted....do only if form has not been submitted
if ($_POST['submit'] == 0)
{
?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {
	color: #FF0000;
	padding-top: 10px;
	padding-right: 0px;
	padding-bottom: 10px;
	padding-left: 0px;
	margin-top: 10px;
	margin-bottom: 10px;
}
-->
</style>
<form name="form1" method="post" action="">

<table width="433" border="0" align="center" cellpadding="0" cellspacing="2">
  <tr>
    <td colspan="4">USER DETAILS </td>
  </tr>
  <tr>
    <td width="216">&nbsp;</td>
    <td width="211">&nbsp;</td>
    </tr>
  <tr>
    <td>User Id: </td>
    <td><span class="style1"><?php echo $u_id; ?></span></td>
    </tr>
  <tr>
    <td>User Name </td>
    <td><span class="style1"><?php echo $f_name ." ". $l_name; ?></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
    </tr>
  <tr>
    <td valign="top">Address</td>
    <td><span class="style2"><strong>
      <textarea name="add1" rows="7" id="add1"><?php echo $r_add1; ?></textarea>
      <label></label>
    </strong></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style2"><strong>
      <input name="add2" type="text" id="add2" value="<?php echo $r_add2; ?>" />
    </strong></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style2"><strong>
      <input name="add3" type="text" id="add3" value="<?php echo $r_add3; ?>" />
    </strong></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style2"><strong>
      <input name="add4" type="text" id="add4" value="<?php echo $r_add4; ?>" />
    </strong></span></td>
  </tr>
  <tr>
    <td>Pincode</td>
    <td><span class="style2"> <strong><input name="pin" type="text" id="pin" value="<?php echo $pincode; ?>"></strong></span></td>
    </tr>
  <tr>
    <td>Phone</td>
    <td><span class="style2"><strong><input name="phone" type="text" id="phone" value="<?php echo $phone; ?>"></strong></span></td>
    </tr>
  <tr>
    <td>Email</td>
    <td><span class="style2"><strong>
      <input name="email" type="text" id="email" value="<?php echo $email; ?>">
      </strong></span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style2">
      <input name="submit" type="hidden" id="submit" value="1">
    </span></td>
    </tr>
  <tr>
    <td colspan="4" align="center"><label>
      <input type="submit" name="Submit" value="Submit" />
    </label></td>
  </tr>
  <tr>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><a href="javascript:history.back()">Back</a> </td>
  </tr>
</table>
</form>
<p>
  <?php 
}
else
{
//receive values
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$add3 = $_POST['add3'];
$add4 = $_POST['add4'];
$pin = $_POST['pin'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$query3 = 'UPDATE user_details SET r_add1 = "' . $add1. 
			'", r_add1 = "' . $add1. 
			'", r_add2 = "' . $add2.  
			'", r_add3 = "' . $add3.  
			'", r_add4 = "' . $add4.  
			'", pincode = ' . $pin. 
			', phone = ' . $phone.  
			', email = "' . $email.    
			'" WHERE u_id = "' . $uid .'"';	
			

$result = mysql_query($query3, $db) or die(mysql_error($db));


?>

<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">UPDATION DONE!!! </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="menu.php">Back to Menu</a> </td>
  </tr>
</table>

<?php 
}

mysql_close($db);
?>


