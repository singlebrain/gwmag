<?php

session_start();

// Include
include 'connection.php';
include 'functions.php'; 


//Session variables
$yrs = $_SESSION[‘years’];
$id = $_SESSION[‘id’];

//The rest of the things should be done only once. Use sesssion variables to track this
//Check to see if ID field is empty - if so redirect to home page
$_SESSION[‘access’] = $_SESSION[‘access’] + 1;
if ($_SESSION[‘access’] != 1 || strlen($id)==0) 
{		
	header("Location: http://www.giantwheelmag.com");	
}
else
{
	//Calculate months
	$months = $yrs * 12;

	//Get the number of issues ---tosend---  and ---life--- and they need to be incremented
	$query = 'SELECT * FROM sub_track WHERE u_id = "' . $id .'"';
	$result = mysql_query($query, $db) or die(mysql_error($db));
	while ($row = mysql_fetch_array($result)) { extract($row); }
		
	$ts = $tosend + $months;
	$lf = $life + $months;
	$lf2 = $life . " + " . $months;
	

	//Get the bill date and update with renewal date 
	$dt = date("d/m/Y",time());
	$query1 = 'SELECT * FROM subscription WHERE u_id = "' . $id .'"';
	$result1 = mysql_query($query1, $db) or die(mysql_error($db));
	while ($row = mysql_fetch_array($result1)) { extract($row); }
	
	$newdt = $bill_date . " R-" . $dt;
	
	//Get the mail id of the user
	$query2 = 'SELECT * FROM user_details WHERE u_id = "' . $id .'"';
	$result2 = mysql_query($query2, $db) or die(mysql_error($db));
	while ($row = mysql_fetch_array($result2)) { extract($row); }
	
	//Update the subscription table  [sub_status to 0]  [bill_date to billdate plus renewal date]  [sub_life to sub life + renewal months]
	$query3 = 'UPDATE subscription SET sub_status = 0, bill_date = "' . $newdt. '", sub_life = "' . $lf2. '" WHERE u_id = "' . $id .'"';	
	$result3 = mysql_query($query3, $db) or die(mysql_error($db));
	
	//Update sub_track table  [bill_date to new date]   [life to life + months]    [tosend to tosend + months] 	
	$query4 = 'UPDATE sub_track SET bill_date = "'. $newdt . '", life = "' . $lf. '", tosend = "' . $ts. '" WHERE u_id = "' . $id .'"';	
	$result4 = mysql_query($query4, $db) or die(mysql_error($db));

	//send email
	$mesg = '	
	<html>
	<head>
	<title>Ackwledgment</title>
	<style type="text/css">
	<!--
	.style1 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-weight: bold;
		font-size: 18px;
		color: #FFFFFF;
		line-height: 30px;
	}
	.style2 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-weight: bold;
		font-size: 14px;
	}
	.style3 {color: #FF0000}
	-->
	</style>
	</head>
	
	<body>
	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFE8E8">
	  <tr>
		<td height="50" align="center" bgcolor="#D50000"><font size="4px" style="line-height:30px" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF" ><b>GIANT WHEEL</b></font> </td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td align="center">Thank you <font size="3px" color="#FF0000"><B>' . $f_name . ' ' . $l_name . '</B></FONT>  for renewing your subscription. </td>
	  </tr>
	  <tr>
		<td align="center">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="center" class="style2">You will now  continue to enjoy your magazine for <span class="style3"> '. $ts.' </span> issues </td>
	  </tr>
	  <tr>
		<td align="center">&nbsp;</td>
	  </tr>
	</table> 	
	</body>
	</html>
	';
	
	
	$email_from = "contact@giantwheelmag.com";
	$email_subject = "Renewal Acknowledgment";
	$email_body = $mesg;
	
	$to =  "augustine72@zoho.com";
	$to1 =  "augustine@lifevaluesfoundation.com";
	$to2 =  "contact@giantwheelmag.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: GIANT WHEEL MAGAZINE \r\n";
	$headers .= "Reply-To: contact@giantwheelmag.com \r\n";		
		
	mail($to,$email_subject,$email_body,$headers);
	mail($to1,$email_subject,$email_body,$headers);
	mail($to2,$email_subject,$email_body,$headers);
		
}		

mysql_close($db);



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subscription  Form</title>
<style type="text/css">
<!--
.style1 {	font-family: 'EB Garamond', serif;
	font-size: 20px;
	line-height: 23px;
	vertical-align: top;
	color: #000000;
	text-decoration: none;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.style2 {font-family: 'EB Garamond', serif; font-size: 18px; line-height: 12px; vertical-align: top; color: #000000; text-decoration: none; }
.style3 {font-size: 18px}
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
.style9 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 17px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
}
.style5 {	color:#2f4e9d;
	font-weight:bold;
	font-size: 12px;
	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #CCCCCC;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}

.style5:focus {
	 outline:none;
}


.style6 {	color:#2f4e9d;
	font-weight:bold;
	font-size: 12px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #CCCCCC;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
}
.style6:focus {
	 outline:none;
}
.style10 {	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
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
.img1 {
	 object-fit: none; /* Do not scale the image */
 	 object-position: top; /* Center the image within the element */
 	 height: 700px;
 	 width: 1080px;
}
#layer_mesg {
	position: relative;
	width:200px;
	height:115px;
	z-index:1;
	left: 380px;
	top: -460px;
	margin-bottom:-200px;
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
	font-weight: bold;
}
.style5 {font-family: Arial, Helvetica, sans-serif; color: #000000; text-decoration: none; text-transform: uppercase; font-weight: bold; }
.tbl1 {	background-color: #FFFFFF;
	border-radius: 12px;
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
    <div id="layer_mesg"><img src="images/speech8.png" width="494" height="330" /></div></td>
  </tr>
</table>


</body>
</html>
