<?php

session_start();

include 'connection.php';
include 'functions.php'; 

$id = $_SESSION[‘id’];

//Check if logged in 
if (strlen($id)==0) 
{		
	$hasvalue = 0;
	$_SESSION[‘loginerr’] = "You are not authenticated to view this page. Please log in!!!";	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';		
}	


$yr = $_GET['yr'];
$_SESSION['years'] = $yr;
if (strlen($yr)!=0) 
{		
	while ($row = mysql_fetch_array($qu1)) 
	{
		extract($row);
		if ($u_id==$user_id) 
		{		
			break;	
		}
				
	}	

	$query3 = 'UPDATE sess SET uid = "' . $user_id. 			
			'", uname = "' . $name.  
			'", date = "' . $reg_date.  
			'", email = "' . $email. 
			'", upass = "' . $pass.  
			'", years = ' . $years. 			    
			' WHERE no = "' . 1 .'"';
	$result = mysql_query($query3, $db) or die(mysql_error($db));	
}

if ($yr == 1){ header("Location: https://www.payumoney.com/paybypayumoney/#/107221");}
if ($yr == 2){ header("Location: https://www.payumoney.com/paybypayumoney/#/130487");}
if ($yr == 3){ header("Location: https://www.payumoney.com/paybypayumoney/#/130493");}

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
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
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
#pay {
	position: relative;
	width:726px;
	height:115px;
	z-index:1;
	left: 300px;
	top: -370px;
	margin-bottom:-200px;
}

#Layer1 {
	position: relative;
	width:100px;
	height:70px;
	z-index:1;
	left: 990px;
	top: -462px;
	margin-bottom: -200px;
}
#Layer2 {
	position: relative;
	visibility: hidden;
	width:200px;
	height:115px;
	z-index:2;
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
    <td><img src="images/top2.jpg" width="1080" height="555" border="0" />
      <div id="pay">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#C6E8FF">
        <tr>
          <td width="251" valign="top"><table width="230" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td width="210" height="35" align="center" valign="middle" class="style4"><a href="change.php?do=add"><img src="images/changeadd.png" width="215" height="32" border="0" /></a></td>
              </tr>
              <tr>
                <td height="35" align="center" valign="middle" class="style4"><a href="change.php?do=pass"><img src="images/changepass.png" width="215" height="32" border="0" /></a></td>
              </tr>
              <tr>
                <td height="35" align="center" valign="middle" class="style4"><img src="images/pay.png" width="215" height="32" border="0" /></td>
              </tr>
              <tr>
                <td height="35" align="center" valign="middle" class="style4"><a href="change.php?do=out"><img src="images/logout.png" width="215" height="32" border="0" /></a></td>
              </tr>
          </table></td>
          <td width="610" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><span class="style1">To
                      <?php if (strlen($_SESSION['user_id'])==0){echo " make payment ";} else {echo " renew subscription ";}?>
                  for 1 year subscription</span><a href="pay.php?yr=1" target="_blank" class="style2"> Click here!</a></td>
              </tr>
              <tr>
                <td><span class="style1">To
                      <?php if (strlen($_SESSION['user_id'])==0){echo " make payment ";} else {echo " renew subscription ";}?>
                  for 2 year subscription</span><a href="pay.php?yr=2" target="_blank" class="style2"> Click here!</a></td>
              </tr>
              <tr>
                <td><span class="style1">To
                      <?php if (strlen($_SESSION['user_id'])==0){echo " make payment ";} else {echo " renew subscription ";}?>
                  for 3 year subscription</span><a href="pay.php?yr=3" target="_blank" class="style2"> Click here!</a></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
</html>
