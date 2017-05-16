<?php
session_start();


//Include
include 'connection.php';
include 'functions.php'; 



//Variables
$hasvalue  = 1;
$id_exist = 0;
$enter=0;



//Receive values
$user_id = $_POST['user_id'];
$pass = $_POST['password'];



//----------- Process 1  ----------- Check for empty field
if (strlen($user_id)==0) 
{		
	$hasvalue = 0;			
}	
elseif (strlen($pass)==0)
{
	$hasvalue = 0;
}

if ($hasvalue==0) 
{
	$_SESSION[‘message’] =  "FIELD EMPTY ERROR!!! <br> Enter all the fields.";
	errormesg_1();
}
//----------- End of Process 1  -----------




//----------- Process 2  ----------- Validate usrid and password
if ($hasvalue==1) 
{
	$query = "SELECT * FROM admin";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
		
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		
		if ($a_id==$user_id) // if the user id is exist then...
		{		
			$id_exist = 1;
			break;	
		}		
	}
	
	if($id_exist ==0)
	{
		$_SESSION[‘message’] =  "ADMIN ID ERROR!!! <br> Admin does not exist.";
		errormesg_1();
	}
	
	if($id_exist ==1)
	{
		if($a_pass == $pass) // if the password matches the id then...
		{				
		$enter=1;
		}
		else
		{
			$_SESSION[‘message’] =  "PASSWORD does not match!!!.";
			errormesg_1();		
		}
	}	
}

//----------- End of Process 2  -----------




//----------- Process 3  ----------- set session variables
$_SESSION['a_level'] = $a_priority;
$_SESSION['aid'] = $a_id;
//----------- End of Process 3  -----------


//----------- Process 4  ----------- redirection
if($enter ==1)
{		
	if($_SESSION['a_level'] == 3)
	{
		
		?>
<style type="text/css">
<!--
.style2 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px;}
.style7 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	padding: 5px;
}
-->
</style>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CFCFCF" class="style7"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td height="25" align="center" bgcolor="#EEEEEE"><span class="style2">Access </span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#FFFFFF"><span class="style5">sonajake_aplus &nbsp;&nbsp;</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#FFFFFF"><span class="style5">myname_birthyear</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#FFFFFF"><span class="style5">&nbsp;sonajake_subscribe</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center"><a href="admnr.php" target="_blank" class="style6">Click here to admin </a></td>
  </tr>
  <tr>
    <td height="40" align="center"><a href="mn.php" class="style6">Maintainance</a></td>
  </tr>
  <tr>
    <td height="50" align="center" valign="bottom"><a href="javascript:history.back()" class="style6">Click here to log off </a></td>
  </tr>
</table>
<?php
		
	}
	else
	{
		if ($user_id=="adminsona")
		{			
			header("Location: mainmenu.php");

			//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=mainmenu.php">';
		}
		else
		{
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=menu.php">';	
		}	
	}
}
 //----------- End of Process 2  -----------


mysql_close($db);

?>