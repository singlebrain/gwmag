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
if (strlen($uid)==0 || $uid == "Select" ) 
{		
	$idhasvalue = 0;			
}	
else
{
	if (strlen($uname)==0 || $uname=="Select" ) 
	{
		$namehasvalue = 0;
	}
}

/*
//if user id is passed
If ($idhasvalue == 1)
{
	
	
}


//if user name is passed
If ($namehasvalue == 1)
{
	$query = 'SELECT * FROM user_details WHERE f_name = "' . $uname. '"';
}

*/

$query = 'SELECT * FROM user_details';	

$result = mysql_query($query, $db) or die(mysql_error($db));	

while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		if ($u_id==$uid || $u_id==$uname ) 
		{				
			break;		
		}
		
		
		
	}
	

$uid=$u_id;

//Get details from subscription table
$query2 = 'SELECT * FROM subscription WHERE u_id = "' . $uid. '"';

$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result2)) 
	{
		extract($row);
	}
	
//Get details subcribtion track 
$query3 = 'SELECT * FROM sub_track WHERE u_id = "' . $uid. '"';

$result3 = mysql_query($query3, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result3)) 
	{
		extract($row);
	}


		
if ($sub_status==0) 
{		
	$status = "Active";		
}		
else
{
	$status = "Inctive";
}	
//#################################

if(strlen($sub_start_date)==0 || $sub_start_date==0)
{
	$startdt = 0;	
}
else
{
	$startdt = date("d/m/Y", $sub_start_date);
}

if(strlen($sub_exp_date)==0 || $sub_exp_date==0)
{
	$expdt = 0;	
}
else
{
	$expdt = date("d/m/Y",  $sub_exp_date);
}



//################################

?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #FF0000}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bolder;
	color: #FFFFFF;
	text-decoration: none;
	line-height: 25px;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 13px;
	line-height: 20px;
	padding-left: 10px;
}
-->
</style>



<table width="457" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F3F3F3">
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><span class="style4">USER DETAILS </span></td>
  </tr>
  <tr>
    <td width="194">&nbsp;</td>
    <td width="263">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">User Id: </td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $u_id; ?></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">User Name </td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $f_name ." ". $l_name; ?></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Registration Date </td>
    <td bgcolor="#DFDFDF" class="style5" ><?php echo $bill_date; ?></td>
  </tr>
  <tr>
    <td class="style5">&nbsp;</td>
    <td class="style5"></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">School Name </td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $school; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">City</td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $city; ?></td>
  </tr>
  <tr>
    <td class="style5">&nbsp;</td>
    <td class="style5"></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#DFDFDF" class="style5">Address</td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $r_add1 ."<br>" . $r_add2 ."<br>" . $city ; ?></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Pincode</td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $pincode; ?></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Phone</td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $phone; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Email</td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $email; ?></strong></td>
  </tr>
  <tr>
    <td class="style5">&nbsp;</td>
    <td class="style5"></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Payment Mode </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $pay_mode; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Date </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $bill_date; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Bill Number </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $bill_num; ?></strong></td>
  </tr>
  <tr>
    <td class="style5">&nbsp;</td>
    <td class="style5"></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Bill Date </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $bill_date; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Subscription Life </td>
    <td bgcolor="#DFDFDF" class="style5"><?php echo $life; ?> Months </td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">No. of Issues Sent  </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $sent; ?></strong></td>
  </tr>
  <tr>
    <td bgcolor="#DFDFDF" class="style5">Issues to be sent  </td>
    <td bgcolor="#DFDFDF" class="style5"><strong><?php echo $tosend; ?></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><a href="view.php" class="style4">Back</a> </td>
  </tr>
</table>

<?php 
mysql_close($db);
?>