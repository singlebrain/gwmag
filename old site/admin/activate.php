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
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align="center" bgcolor="#999999" class="style2">View Subsciber details </td>
  </tr>
  <tr>
    <td width="138" bgcolor="#D6D6D6">&nbsp;</td>
    <td width="194" bgcolor="#D6D6D6">&nbsp;</td>
    <td width="168" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <form action="" method="post">
  <tr>  
    <td bgcolor="#D6D6D6" class="style3">By User Id </td>
    <td bgcolor="#D6D6D6"><label>
      <select name="uid" class="style3" id="uid">
	  <option>Select Id</option>
	  <?php 
	  	$query = "SELECT u_id FROM user_details";		
		$result = mysql_query($query, $db) or die(mysql_error($db));	
		while ($row = mysql_fetch_array($result))  // loop starts
		{
			extract($row);
		?>
		
		
        <option><?php echo $u_id; ?> </option>
		
		
		<?php
		}
		?>
      </select>
    </label></td>
    <td bgcolor="#D6D6D6"><label>
      <input type="submit" name="Submit" value="   Go   ">
    </label></td>
  </tr>
  </form>
  <tr>
    <td bgcolor="#D6D6D6">&nbsp;</td>
    <td bgcolor="#D6D6D6">&nbsp;</td>
    <td bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" bgcolor="#999999"><a href="menu.php" class="style2">Back</a></td>
  </tr>   
</table>

<?php
//The user Id chose stored in a session variable
if (strlen($_POST['uid'])!=0)
{
$_SESSION['uid'] = $_POST['uid'];

}


//Check if the variable is empty
if (strlen($_POST['uid'])==0) 
{		
	$idhasvalue = 0;			
}	
else 
{

	$query2 = 'SELECT * FROM subscription WHERE u_id = "' . $_SESSION['uid']. '"';

	$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result2)) 
	{
		extract($row);
	}
		
?>
<p>&nbsp;</p>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#999999" class="style2">Account Sratus : <?php if($sub_status == 1){echo "Active";} else{ echo "Inactive";} ?></td>
  </tr>
  <tr>
    <td width="241" bgcolor="#D6D6D6">&nbsp;</td>
    <td width="259" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <form method="post">
  <tr>
    <td align="right" bgcolor="#D6D6D6"><span class="style3">Change to</span>&nbsp;&nbsp; </td>
    <td bgcolor="#D6D6D6"><label>
      <select name="status" class="style3" id="status">
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#D6D6D6">&nbsp;</td>
    <td bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><label>
      <input name="Submit2" type="submit" class="style3" value="Change">
    </label></td>
    </tr>
  </form>
</table>
<?php
}

$status = $_POST['status'];
if(strlen($status)==0)
{ 
}
else
{ 
	$query3 = 'UPDATE subscription SET sub_status = ' . $status. ' WHERE u_id = "' . $_SESSION["uid"] .'"';	
	
	$result = mysql_query($query3, $db) or die(mysql_error($db));
}	

mysql_close($db);
?>
