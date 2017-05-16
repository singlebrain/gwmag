<?php

session_start();


//Include
include 'connection.php';
include 'functions.php'; 



//Variables

//Fecthing user id and populating
?>
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	line-height: 25px;
	text-decoration: none;
	font-size: 15px;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	margin-left: 10px;
	padding-left: 10px;
}
-->
</style>
 <form action="" method="post">
<table width="492" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><span class="style2">Manage Subsciber details</span> </td>
    </tr>
  <tr>
    <td width="254" bgcolor="#D6D6D6">&nbsp;</td>
    <td width="246" bgcolor="#D6D6D6">&nbsp;</td>
    </tr>
 
  <tr>  
    <td bgcolor="#F5F5F5" class="style3">By User Id </td>
    <td bgcolor="#F5F5F5"><label>
      <select name="uid" class="style3" id="uid">
	  <option >Select</option>
	  <?php 
	  	$query = "SELECT u_id FROM user_details";		
		$result = mysql_query($query, $db) or die(mysql_error($db));	
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);
		?>
        <option><?php echo $u_id; ?> </option>
		<?php
		}
		?>
      </select>
    </label></td>
    </tr>
   
  <tr>
    <td height="40" colspan="2" align="center" bgcolor="#D6D6D6">OR</td>
    </tr>
  <tr>  
    <td bgcolor="#F5F5F5" class="style3">By User Name </td>
    <td bgcolor="#F5F5F5"><label>
      <select name="uname" class="style3" id="uname">
        <option >Select</option>
		<?php 
	  	$query = "SELECT * FROM user_details";		
		$result = mysql_query($query, $db) or die(mysql_error($db));	
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);
		?>
		<option value="<?php echo $u_id; ?>"><?php echo $f_name . " " . $l_name ; ?></option>
		<?php
		}
		?>
      </select>
    </label></td>
    </tr>
  <tr>
    <td bgcolor="#D6D6D6">&nbsp;</td>
    <td bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#EBEBEB" class="style3">Now Select what you want to do. </td>
    </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#EBEBEB"><label>
      <select name="select" size="3" class="style3">
        <option value="0" selected="selected">Select</option>
        <option value="1">View</option>
        <option value="2">Edit</option>
        <option value="3">Send Receipt</option>
      </select>
    </label></td>
    </tr>
  <tr>
    <td bgcolor="#D6D6D6">&nbsp;</td>
    <td bgcolor="#D6D6D6">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#D6D6D6"><input type="submit" name="Submit" value="   Go   " /></td>
    </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><a href="menu.php" class="style2">Back to Menu</a> </td>
  </tr> 
</table>
 </form> 
<?php 

$_SESSION['view_uid'] = $_POST['uid'];
$_SESSION['view_uname'] = $_POST['uname'];
$select = $_POST['select'];
$hasvalue=1;

if (strlen($_SESSION['view_uid'])==0)
{
	if (strlen($_SESSION['view_uname'])==0)
	{
		$hasvalue=0;
	}	
}


if ($hasvalue==1)
{
	if ($select==0)
	{
		$_SESSION[‘message’] =  "You have not selected what you want to do!!! <br> Go back and select if you want to edit or view user details.";
		errormesg_2();
	}
	elseif ($select==1)
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=display.php">';
	}
	elseif ($select==2)
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=edit.php">';
	}
	elseif ($select==3)
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=sendreceipt.php">';
	}
}		

?>