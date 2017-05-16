<?php

session_start();

include 'connection.php';
include 'functions.php'; 

$id = $_SESSION[‘id’];
$_SESSION[‘from’] = 1;


//Check if logged in 
if (strlen($id)==0) 
{		
	header("Location: http://www.giantwheelmag.com/subscription/login.php");			
}	

//Taking details from user table
$query = 'SELECT * FROM user_details WHERE u_id = "' . $id .'"';
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	$_SESSION[‘name’] = $f_name . " ". $l_name;	
	
	$_SESSION[‘pass’] = $pass;
	$_SESSION[‘addr’] = $r_add1."<br>".$radd_2."<br>".$city."<br>".$pin;
	$_SESSION[‘phone’] = $phone;
	$_SESSION[‘email’] = $email;	
	$_SESSION[‘years’] = $years; 
}	


//Taking details from subscription track table
$query = 'SELECT * FROM sub_track WHERE u_id = "' . $id .'"';
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);	
	$_SESSION[‘life’] = $life;
	$_SESSION[‘sent’] = $sent;
	$_SESSION[‘tosend’] = $tosend;
}	

//Taking details from subscription table
$query = 'SELECT * FROM subscription WHERE u_id = "' . $id .'"';
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	$_SESSION[‘status’] = $sub_status;	
	$_SESSION[‘bdate’] = $bill_date;
}	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 20px;
	vertical-align: top;
	color: #000000;
	text-decoration: none;
	padding-left: 10px;
	padding-top: 5px;
	word-spacing: 1px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	vertical-align: top;
	color: #FF0000;
	text-decoration: underline;
	text-transform: uppercase;
	font-weight: bold;
	word-spacing: 1px;
}
.style3 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style4 {font-family: 'EB Garamond', serif;
	font-size: 20px;
	line-height: 23px;
	vertical-align: middle;
	color: #FFFFFF;
	text-decoration: none;
}
.style8 {font-family: 'EB Garamond', serif;
	font-size: 22px;
	padding-top: 15px;
	padding-right: 40px;
	padding-left: 40px;
	line-height: 28px;
	word-spacing: 8px;
}
.s1 {font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}
.s2 {font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
#Layer3 {
	position: relative;
	width:726px;
	height:200px;
	z-index:1;
	left: 320px;
	top: -370px;
	background-color: #FFFFFF;
	border-radius: 20px;
	border: thin solid #666666;	
		
}
#Layer1 {
	position: relative;
	width:100px;
	height:70px;
	z-index:2;
	left: 990px;
	top: -462px;
	margin-bottom: -200px;
}
#Layer2 {
	position: relative;
	visibility: hidden;
	width:200px;
	height:115px;
	z-index:3;
	left: 785px;
	top: -545px;
	margin-bottom: -200px;
}

.tbl {
	background-color: #FFFFFF;
	border-radius: 12px;
	border: thin solid #666666;	
}

.td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	color: #000000;
	text-decoration: none;
	background-color: #fbf20f;
	background-position: center;
	text-align: center;
	border: thin solid #eac704;
	line-height: 30px;
	border-radius: 12px;	
}
.a {
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	text-decoration: none;
	text-transform: uppercase;
}

.td:hover {
	background-color: #fffb8f;
	font-size: 15px;
	font-weight: bold;
}
.style5 {font-family: Arial, Helvetica, sans-serif; color: #000000; text-decoration: none; text-transform: uppercase; font-weight: bold; }
.tbl1 {	background-color: #FFFFFF;
	border-radius: 20px;
	border: thin solid #666666;	
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('../images/top/top_home.jpg','../images/top/top_about.jpg','../images/top/top_say.jpg','../images/top/top_join.jpg','../images/top/top_renew.jpg','../images/top/top_contact.jpg','../images/top/top_login.jpg','../images/top/top2_read.jpg','../images/top/top2_new.jpg','../images/top/top2_trial.jpg','../images/top/top2_gift.jpg','../images/top/top2_faq.jpg')">
<table width="1080" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1080" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="../default.html"><img src="../images/top/top_h.jpg" name="hm" width="88" height="55" border="0" id="hm" onmouseover="MM_swapImage('hm','','../images/top/top_home.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../about.html"><img src="../images/top/top_a.jpg" name="ab" width="147" height="55" border="0" id="ab" onmouseover="MM_swapImage('ab','','../images/top/top_about.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../say.html"><img src="../images/top/top_s.jpg" name="say" width="154" height="55" border="0" id="say" onmouseover="MM_swapImage('say','','../images/top/top_say.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../join.html"><img src="../images/top/top_j.jpg" name="jn" width="164" height="55" border="0" id="jn" onmouseover="MM_swapImage('jn','','../images/top/top_join.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="renew.php"><img src="../images/top/top_r.jpg" name="rn" width="159" height="55" border="0" id="rn" onmouseover="MM_swapImage('rn','','../images/top/top_renew.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../contact.html"><img src="../images/top/top_c.jpg" name="cn" width="196" height="55" border="0" id="cn" onmouseover="MM_swapImage('cn','','../images/top/top_contact.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="login.php"><img src="../images/top/top_l.jpg" name="lg" width="172" height="55" border="0" id="lg" onmouseover="MM_swapImage('lg','','../images/top/top_login.jpg',1)" onmouseout="MM_swapImgRestore()" /></a></td>
      </tr>
      <tr>
        <td><a href="../sample-mag.pdf" target="_blank"><img src="../images/top/top2_rd.jpg" name="rd" width="240" height="41" border="0" id="rd" onmouseover="MM_swapImage('rd','','../images/top/top2_read.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../subscription"><img src="../images/top/top2_nw.jpg" name="nu" width="188" height="41" border="0" id="nu" onmouseover="MM_swapImage('nu','','../images/top/top2_new.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="trial.php"><img src="../images/top/top2_tr.jpg" name="tr" width="239" height="41" border="0" id="tr" onmouseover="MM_swapImage('tr','','../images/top/top2_trial.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="gift.php"><img src="../images/top/top2_gf.jpg" name="gf" width="308" height="41" border="0" id="gf" onmouseover="MM_swapImage('gf','','../images/top/top2_gift.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="../faq.php"><img src="../images/top/top2_f.jpg" name="fq" width="105" height="41" border="0" id="fq" onmouseover="MM_swapImage('fq','','../images/top/top2_faq.jpg',1)" onmouseout="MM_swapImgRestore()" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/top2.jpg" width="1080" height="555" />
      <div id="Layer3">
<?php 
if ($_SESSION[‘status’]==1)
{
	echo "Your Subscription has expired and your account has been deactivated. Please renew your subscription to re-activate your account.";
}
else if (strlen($_SESSION[‘bdate’])==0) 
{		
?>
<form id="payprocess.php" name="payprocess.php" method="post" action="">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><span class="style1">Coupon code </span>: 
      <input name="ccode" type="text" id="ccode" /></td>
    </tr>
    <tr>
      <td height="40" align="center"><input name="Submit" type="submit" class="style3" value="PAY" /></td>
    </tr>
  </table>
</form>
<?php 			
}
else
{	
?>
<table width="703" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="235"><table width="230" border="0" cellspacing="10" cellpadding="0">
      <tr>
        <td height="35" align="center" valign="middle" class="td"><a href="change.php?do=add" class="style1">Change Address </a></td>
      </tr>
      <tr>
        <td width="210" height="35" align="center" valign="middle" class="td"><a href="change.php?do=pass" class="style1">Change Password </a></td>
      </tr>
      <tr>
        <td height="35" align="center" valign="middle" class="td"><a href="gift2.php" class="style1">Gift a Subscription </a></td>
      </tr>      
      <tr>
        <td height="35" align="center" valign="middle" class="td"><a href="change.php?do=out" class="style1">Log-Out</a></td>
      </tr>
    </table></td>
    <td width="468" valign="top"><br /><span class="style3">Hi <?php echo $_SESSION[‘name’]; ?>! </span><span class="style1"><br /><br />
      Welcome back!
      </p>
    </span>
	<br />
   
		<?php 
		if (strlen($_SESSION[‘bdate’])==0) 
		{		
		?>          
          <span class="style3">Note:</span> <span class="style1">Your subscription is not active as you have not been able to make payment. Please click on "Make Payment" button to make the payment.</span>
		<?php 
		}
		else
		{
		?> 
		<span class="style1">
		Your subscription's life is: <b><?php echo $_SESSION[‘life’]; ?> </b> months. <br />
		&nbsp;&nbsp;You have received - <b><?php echo $_SESSION[‘sent’]; ?> </b> issues.  <br />
		&nbsp;&nbsp;You will receive - <b><?php echo $_SESSION[‘tosend’]; ?> </b> more issues.
		</span>
		<?php
		}		
		?>  
		  
		  </td>
  </tr>
</table>

<?php  } ?>
</div>
    </td>
  </tr>
</table>

</body>
</html>