<?php
session_start();
include 'connection.php';

$uid = $_POST['id'];
$do = $_POST['do'];

$flag = 0;
$foun = 1;
if ($do == 1) {$flag = 1;}



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
	font-size: 13px;
	line-height: 23px;
	vertical-align: top;
	color: #000000;
	text-decoration: none;
	word-spacing: 1px;
	padding-right: 5px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; line-height: 10px; vertical-align: top; color: #000000; text-decoration: none; }
.style3 {
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-decoration: none;
	color: #FF0000;
	font-weight: bold;
}
.style6 {font-family: 'EB Garamond', serif; font-size: 20px; line-height: 12px; color: #000000; text-decoration: none; }
.style4 {	font-family: 'EB Garamond', serif;
	font-size: 22px;
	padding-top: 15px;
	padding-right: 40px;
	padding-left: 40px;
	line-height: 28px;
	word-spacing: 8px;
}
.style5 {	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #CCCCCC;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
}
.style6 {	border-top-width: thin;
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
	width:650px;
	height:115px;
	z-index:1;
	left: 400px;
	top: -400px;
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
.tbl2 {	background-color: #FFFFFF;
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
    <td><img src="images/top2.jpg" width="1080" height="555" border="0" /></td>
  </tr>
</table>
<div id="Layer3">
 <table width="610" align="center" class="tbl2"> 
  <tr>
    <td align="center" valign="top" >
	<?php 
	if ($flag == 0)
	{
	?>
	<form id="form1" name="form1" method="post" action="forgot.php">
      <table width="604" height="139" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><table width="517" border="0" align="center" cellpadding="0" cellspacing="5">
              <tr>
                <td width="279" align="left" class="style1">Enter your User Id or email address or mobile number registered with us </td>
                <td width="223"><label>
                  <input name="id" type="text" id="id" />
                  <input name="do" type="hidden" id="do" value="1" />
                </label></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center"><label>
            <input type="image" name="submit" src="images/submit.png" alt="Submit" />
          </label></td>
        </tr>
      </table>
    </form>
	
	  <?php 
	}
	else
	{
		
		$query = 'SELECT * FROM user_details WHERE u_id = "' . $uid .'"';
		$result = mysql_query($query, $db) or die(mysql_error($db));	

		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);
			$e = $email;
			$p = $pass;
			$u = $u_id;
			$found = "1";
		}	

		if (strlen($p)==0) 		
		{		
			$query = 'SELECT * FROM user_details WHERE phone = "' . $uid .'"';
			$result = mysql_query($query, $db) or die(mysql_error($db));	
	
			while ($row = mysql_fetch_array($result)) 
			{
				extract($row);
				$e = $email;
				$p = $pass;
				$u = $u_id;
				$found = "1";							
			}	
		}
		
		if (strlen($p)==0) 
		{		
			$query = 'SELECT * FROM user_details WHERE email = "' . $uid .'"';
			$result = mysql_query($query, $db) or die(mysql_error($db));	
	
			while ($row = mysql_fetch_array($result)) 
			{
				extract($row);
				$e = $email;
				$p = $pass;
				$u = $u_id;
				$found = "1";							
			}	
		}
		
		if ($found=="1")
		{
			$mesg = 'Dear Subscriber, <br><br>As per your request we are sending you your User Id and Password registered with us at GIANT WHEEL magazine. <br><br> User Id: '. $u . ' <br> Password: '. $p . ' <br><br>Please keep this email safe for future reference. <br><br> Also to ensure you receive the mails we send you, make sure you mark this mail as "Not Spam" <br><br>Thank you <br>Team - Giant Wheel Magazine';
	
			$email_from = "contact@giantwheelmag.com";
			$email_subject = "Password Reminder";
			$email_body = $mesg;
			
			
			$to =  $e;
					
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $email_from \r\n";
			$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		
			
			mail($to,$email_subject,$email_body,$headers);
			
			echo "<img src='images/speech6.png' />";
		}	
		else
		{
			echo "<img src='images/speech7.png' />";
		}
	}		
	 ?>	</td>
  </tr>
</table>
</div>
</body>
</html>
