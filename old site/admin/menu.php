<?php
session_start();
include 'functions.php'; 

$_SESSION[‘rec’] = 0;
$a_id = $_SESSION['aid'] ;
$a_priority = $_SESSION['a_level']; 
?>


<title>Menu</title>
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
<?php 
if ($a_priority ==1)
{
?>

<table width="284" border="0" align="center" cellpadding="0" cellspacing="0">  
  <tr>
    <td height="30" align="center" bgcolor="#999999"><span class="style1">MENU</span></td>
  </tr>
  <tr>
    <td align="left" valign="middle" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="343" align="left" valign="middle" bgcolor="#D6D6D6"><a href="select_user.php" class="style2">Edit subscriber details</a> </td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="user_add.php" class="style2">Create subscribers </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="print.php" target="_blank" class="style2">Print Name and address </a></td>
  </tr>
  
  <tr>
    <td align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="../admin" class="style1">Logout</a></td>
  </tr>
</table>
<?php
}
elseif ($a_priority ==2)
{
?>

<table width="284" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" bgcolor="#999999" class="style1">MENU</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
  <tr>
    <td width="343" align="left" bgcolor="#D6D6D6"><a href="view.php" class="style2">View / Edit subscriber details </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="activate.php" class="style2">Activate Subscriber </a></td>
  </tr>
  
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="sendmail.php" class="style2">Send Emails</a> </td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="acc.php" class="style2">Accounts</a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="emails.php" class="style2">Email Address</a> </td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="user_add.php" class="style2">Create subscribers </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="print.php" target="_blank" class="style2">Print Name and address </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="update.php" class="style2">Update Subscription status </a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="editadd.php" class="style2">Edit Subscriber Addresses</a> </td>
  </tr>
   <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="sendgreeting.php" class="style2">Send Season's Greetings </a> </td>
  </tr>
   <tr>
    <td align="left" bgcolor="#D6D6D6"><a href="receipt.php" class="style2">Send Receipt </a> </td>
  </tr>
   <tr>
     <td bgcolor="#D6D6D6"><a href="reminderstatus.php" class="style2">Reminder Status</a> </td>
   </tr>
  <tr>
    <td align="center" bgcolor="#D6D6D6">&nbsp;</td>
  </tr>
	<?php 
  	if ($_SESSION['aid']=="adminsona")
	{ 
	?>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="javascript:history.back()" class="style1">&lt;&lt;Back</a></td>
  </tr>
  <?php  } else {  ?>
  <tr>
    <td height="30" align="center" bgcolor="#999999"><a href="../admin" class="style1">Logout</a></td>
  </tr>
  <?php  } ?>
</table>
<?php
}
else
{
	$_SESSION[‘message’] =  "You are not authorised to view this page!!!";
	errormesg_3();	
}
?>