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
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
 <form action="" method="post">
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2">Manage Subsciber details </td>
    </tr>
  <tr>
    <td width="254">&nbsp;</td>
    <td width="246">&nbsp;</td>
    </tr>
 
  <tr>  
    <td>By User Id </td>
    <td><label>
      <input name="uid" type="text" id="uid" />
    </label></td>
    </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
   
  <tr>  
    <td>By User Name </td>
    <td><label>
      <input name="uname" type="text" id="uname" />
    </label></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <input name="select" type="hidden" id="select" value="2" />
    </label></td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="Submit" value="   Go   " /></td>
    </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="menu.php">Back to Menu</a> </td>
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
}		

?>