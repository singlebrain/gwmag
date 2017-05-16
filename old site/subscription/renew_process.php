<?php 

session_start();
include 'connection.php';
include 'functions.php'; 

//Receive the variables
$years = $_POST['years'];
$user_id = $_POST['u_id'];
$password = $_POST['pass']; 


//Check if the fields are empty
$empty = 0;
if (strlen($user_id)==0) 
{		
	$empty = 1;	
}
if (strlen($password)==0) 
{		
	$empty = 1;	
}


if ($empty == 1)
{
	$message = "You have left a field empty. Please go back and fill it.";
}
else
{
	//Check to see if the use id exist
	$exists = 0;
	$query = "SELECT * FROM  user_details";		
	$result = mysql_query($query, $db) or die(mysql_error($db));	
	
	while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
		
		if ($user_id==$u_id) { $exists == 1; $pass2 = $pass; break;}		
	}	
	
	if ($exists==1) { $message = "The User Id you entered does not exist. Please try again.";}		
	else
	{
		//Check to see if the password matches the user id
		$match = 0;
		if ($password == $pass2) { $match = 1;}
		
		If ($match == 0)
		{
			$message = "The password you enterd doesn't match the one that is in our records."; 
			$message = $message  . "<br>Please go back and try again.";
			$message = $message  . "<br>If You are still unable to match the password, please get in touch with us.";
		}
		else
		{	
			//If all is okay then create session variables
			$_SESSION[‘id’] = $user_id;
			$_SESSION[‘years’] = $years;
			$_SESSION[‘todo’] = "renew";
			
			//Navigate to payment page
			if($years==1){ header("Location: https://www.payumoney.com/paybypayumoney/#/107221");}
			if($years==2){ header("Location: https://www.payumoney.com/paybypayumoney/#/130487");}	
			if($years==3){ header("Location: https://www.payumoney.com/paybypayumoney/#/130493");}				
		}	
	}	
}		

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Processing...</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 20px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
	font-weight: bold;
	padding-left: 5px;
	padding-bottom: 7px;
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
	line-height: 17px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
}
.style5	{
	color:#2f4e9d;
	font-weight:bold;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	border: 1px solid #CCCCCC;
}

.style5:focus {
	 outline:none;
}

.style6:focus {
	 outline:none;
}
.s1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}
.s2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
.style7 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 23px;
	font-weight: bold;
	color: #FFFFFF;
}
.style8 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 15px;
}
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	line-height: 17px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
	font-weight: bold;
}
.style9a {	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	line-height: 17px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
	font-weight: bold;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #2D70A6;
	border-right-color: #2D70A6;
	border-bottom-color: #2D70A6;
	border-left-color: #2D70A6;
}
.style12 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	line-height: 17px;
	color: #000000;
	text-decoration: none;
	padding-right: 5px;
	font-weight: bold;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #2D70A6;
	border-right-color: #2D70A6;
	border-bottom-color: #2D70A6;
	border-left-color: #2D70A6;
}
#layer-rates {
	position: relative;
	width:381px;
	height:115px;
	z-index:1;
	left: 20px;
	top: -340px;
	margin-bottom: -200px;
}
#layer-mesg {
	position: relative;
	width:634px;
	height:115px;
	z-index:2;
	left: 415px;
	top: -480px;
	margin-bottom: -200px;
}
.style11 {
	font-size: 18px;
	color: #FF0000;
}
#Layer1 {
	position: relative;
	width:100px;
	height:70px;
	z-index:3;
	left: 990px;
	top: -570px;
	margin-bottom: -200px;
}
#Layer2 {
	position: relative;
	visibility: hidden;
	width:200px;
	height:115px;
	z-index:4;
	left: 785px;
	top: -652px;
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
<body onLoad="MM_preloadImages('../images/top/top_home.jpg','../images/top/top_about.jpg','../images/top/top_say.jpg','../images/top/top_join.jpg','../images/top/top_renew.jpg','../images/top/top_contact.jpg','../images/top/top_login.jpg','../images/top/top2_read.jpg','../images/top/top2_new.jpg','../images/top/top2_trial.jpg','../images/top/top2_gift.jpg','../images/top/top2_faq.jpg')">
<table width="1080" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1080" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="../default.html"><img src="../images/top/top_h.jpg" name="hm" width="88" height="55" border="0" id="hm" onMouseOver="MM_swapImage('hm','','../images/top/top_home.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../about.html"><img src="../images/top/top_a.jpg" name="ab" width="147" height="55" border="0" id="ab" onMouseOver="MM_swapImage('ab','','../images/top/top_about.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../say.html"><img src="../images/top/top_s.jpg" name="say" width="154" height="55" border="0" id="say" onMouseOver="MM_swapImage('say','','../images/top/top_say.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../join.html"><img src="../images/top/top_j.jpg" name="jn" width="164" height="55" border="0" id="jn" onMouseOver="MM_swapImage('jn','','../images/top/top_join.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="renew.php"><img src="../images/top/top_r.jpg" name="rn" width="159" height="55" border="0" id="rn" onMouseOver="MM_swapImage('rn','','../images/top/top_renew.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../contact.html"><img src="../images/top/top_c.jpg" name="cn" width="196" height="55" border="0" id="cn" onMouseOver="MM_swapImage('cn','','../images/top/top_contact.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="login.php"><img src="../images/top/top_l.jpg" name="lg" width="172" height="55" border="0" id="lg" onMouseOver="MM_swapImage('lg','','../images/top/top_login.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
      </tr>
      <tr>
        <td><a href="../sample-mag.pdf" target="_blank"><img src="../images/top/top2_rd.jpg" name="rd" width="240" height="41" border="0" id="rd" onMouseOver="MM_swapImage('rd','','../images/top/top2_read.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../subscription"><img src="../images/top/top2_nw.jpg" name="nu" width="188" height="41" border="0" id="nu" onMouseOver="MM_swapImage('nu','','../images/top/top2_new.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="trial.php"><img src="../images/top/top2_tr.jpg" name="tr" width="239" height="41" border="0" id="tr" onMouseOver="MM_swapImage('tr','','../images/top/top2_trial.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="gift.php"><img src="../images/top/top2_gf.jpg" name="gf" width="308" height="41" border="0" id="gf" onMouseOver="MM_swapImage('gf','','../images/top/top2_gift.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a><a href="../faq.php"><img src="../images/top/top2_f.jpg" name="fq" width="105" height="41" border="0" id="fq" onMouseOver="MM_swapImage('fq','','../images/top/top2_faq.jpg',1)" onMouseOut="MM_swapImgRestore()" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/top.jpg" width="1080" height="660" />
      <div id="layer-mesg">
        	
          <table width="589" height="181" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl1">
            <tr>
              <td height="40" colspan="2" align="center" valign="middle" class="style2"><strong>Please note: All the fields are mandatory </strong></td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="center" valign="middle" class="style2"><?php  echo $message;  ?></td>
            </tr>
            <tr>
              <td width="288" height="30" align="right" valign="middle" class="style2">&nbsp;</td>
              <td width="362" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center" ><a href="javascript:history.back()" class="style1">Back</a></td>
            </tr>
          </table>
      </div>
<div id="layer-rates">
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="70" colspan="4" align="center" bgcolor="#E24323"><span class="style7">Subscribe to get GIANT WHEEL <br />
        right at your doorstep! </span> </td>
    </tr>
    <tr>
      <td width="29%" height="30" align="center" bgcolor="#7AAFDB" class="style12">1 year </td>
      <td width="71%" align="center" bgcolor="#B2CDE8" class="style9a">Rs. 540 (inclusive of postage) </td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#7AAFDB" class="style12">2 years </td>
      <td align="center" bgcolor="#B2CDE8" class="style9a">Rs. 1020  (inclusive of postage) </td>
    </tr>
    <tr>
      <td height="30" align="center" bgcolor="#7AAFDB" class="style12">3 years </td>
      <td align="center" bgcolor="#B2CDE8" class="style9a">Rs. 1440  (inclusive of postage) </td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="tbl1"  ><span class="style1"><u>Kindly Note:</u></span> <span class="style2">As we are aligned with the  academic year,  there will no issues of the magazine in the months of <b>April</b> and <b>May.</b> </span> </td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
</html>
