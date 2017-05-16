<?php 
session_start();

include 'connection.php';

/*
1. Check if proper authentication is there to view this page
2. Receive variables
3. If this is the first task then populate the name and code
4. if this is the second task navigate to report
*/

// 1. Check if proper authentication is there to view this page
if ($_SESSION['aid'] <> "adminsona")
{
	header("Location: http://www.giantwheelmag.com/admin");
}



// 2. Receive variables
$task = $_POST['task'];
$code = $_POST['name'];
if ($name =="select") { $code = $_POST['code'];}

$name1 = $_POST['name'];
$code1 = $_POST['code'];
$month1 = $_POST['month'];
$year1 = $_POST['year'];

if ($task==1)
{
	$query = "SELECT * FROM  distributors";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		if ($code==$ccode)
		{
			$_SESSION[‘code’] = $code;
			$_SESSION[‘name’] = $name;
			$code2 = $ccode;
			$name2 = $name;
		} 
		
	}	

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Distributor Report</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	text-decoration: none;
	font-size: 16px;
	text-transform: uppercase;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	text-decoration: none;
	line-height: 30px;
	border: 1px solid #999999;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000000;
	text-decoration: none;
	line-height: 30px;	
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
	text-decoration: none;
	line-height: 25px;	
}
.border {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #999999;
	border-right-color: #999999;
	border-bottom-color: #999999;
	border-left-color: #999999;
}
-->
</style>
</head>

<body>

<!-- FORM TO ENTER EITHER THE NAME OR THE CODE OF THE DISTRIBUTOR -->
<form id="form1" name="form1" method="post" action="report1.php">
  <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" align="center" bgcolor="#999999" class="style1">Select Name</td>
      <td width="72" rowspan="2" align="center" class="style3">OR</td>
      <td align="center" bgcolor="#999999" class="style1">Select Code </td>
      <td width="114" rowspan="2" align="center" class="style1"><input name="task" type="hidden" id="task" value="1" />
      <input name="Submit" type="submit" class="style3" value="   Go   " /></td>
    </tr>
    <tr>
      <td width="218" height="40" align="center" class="border"><select name="name" class="style2" id="name">
	  <option value="select">Select</option>
	  
<!-- PHP TO POPULATE THE CODE DROP DOWN MENU -->	  
 <?php 
		$query = "SELECT * FROM  distributors";		
		$result = mysql_query($query, $db) or die(mysql_error($db));
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);						
?>
        <option value="<?php  echo $ccode;?>"><?php  echo $name;?></option> <!-- PUPULATE THE CODE -->
<?php   } ?>		
      </select></td>

<!-- PHP TO POPULATE THE NAME -->
      <td width="146" align="center" class="border"><select name="code" class="style2" id="code">
	  <option value="select">Select</option>
 <?php 
		$query = "SELECT * FROM  distributors";		
		$result = mysql_query($query, $db) or die(mysql_error($db));
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);						
?>	  
        <option value="<?php  echo $ccode;?>"><?php  echo $ccode;?></option> <!-- NAME DROP DOWN -->
<?php   } ?>		
        </select>      </td>
    </tr>
  </table>
</form>

<!-- FIRST PART OVER-->



<!-- SECOND PART START -->

<?php  if ($task == 1) {  ?>
&nbsp;
<form id="form2" name="form2" method="post" action="report1.php">
  <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" align="center" bgcolor="#999999" class="style1">Month</td>
      <td width="71" rowspan="2" align="center" class="style3">OR</td>
      <td align="center" bgcolor="#999999" class="style1">year </td>
      <td width="112" rowspan="2" align="center" class="style1">
	  	<input name="task" type="hidden" id="task" value="2" />
		<input name="name" type="hidden" id="name" value="<?php echo $name;?>" />
		<input name="code" type="hidden" id="code" value="<?php echo $code;?>" />
        <input name="Submit2" type="submit" class="style3" value="   Go   " /></td>
    </tr>
    <tr>
      <td width="219" height="40" align="center" class="border"><select name="month" class="style2" id="month">
	  
 <!-- PHP CODE TO POPULATE THE MONTH -->         
<?php 
$m1 = 0;
$query = "SELECT * FROM  $code2 ORDER BY month";		
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	if ($m1 <> $month)
	{	
?>		  
		  <option value="<?php echo $month ?>"><?php echo $month ?></option> <!-- MONTH DROP DOWN -->
		  
<?php
	} 
	$m1 = $month;	
} 
?>		  
      </select></td>
      <td width="148" align="center" class="border"><select name="year" class="style2" id="select2">

<!-- PHP TO POPULATE YEAR DROP DOWN -->          
<?php 
$y1 = 0;
$query = "SELECT * FROM  $code2 ORDER BY year";		
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	if ($y1 <> $year)
	{
?>					  
		  <option value="<?php echo $year ?>"><?php echo $year ?></option> <!-- YEAR DROP DOWN -->
<?php
	} 
	$y1 = $year;	
} 
?>	    
	    </select>
      </td>
    </tr>
  </table>
</form>

<!-- SECOND PART OVER -->




<!-- THIRD PART START -->

<?php  }  if ($task == 2) {?>
&nbsp;
<table width="600" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td bgcolor="#999999"><table width="600" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td colspan="4" align="center" bgcolor="#C5C5C5" class="style3">Name : <?php  echo $_SESSION[‘name’];  ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code: <?php  echo $_SESSION[‘code’];  ?> </td>
        </tr>
      <tr>
        <td width="168" align="center" bgcolor="#E2E2E2" class="style4">User ID </td>
        <td width="127" align="center" bgcolor="#E2E2E2" class="style4">Date </td>
        <td width="121" align="center" bgcolor="#E2E2E2" class="style4">Life</td>
        <td width="179" align="center" bgcolor="#E2E2E2" class="style4">Commission</td>
      </tr>
<?php 
$query = "SELECT * FROM  $code1";		
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	if ($month1 == $month && $year1 == $year)
	{
?>	  
      <tr>
        <td align="center" bgcolor="#FFFFFF" class="style4"><?php  echo $user_id; ?></td>
        <td align="center" bgcolor="#FFFFFF" class="style4"><?php  echo $date; ?></td>
        <td align="center" bgcolor="#FFFFFF" class="style4"><?php  echo $sub_life; ?></td>
        <td align="center" bgcolor="#FFFFFF" class="style4"><?php  echo $comm; ?></td>
      </tr>
<?php  }} } ?>	  
    </table></td>
  </tr>
</table>
<br />
&nbsp;
<table width="284" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="343" height="30" align="center" bgcolor="#999999"><a href="javascript:history.back()" class="style1">Back</a></td>
  </tr>
</table>
</body>
</html>
