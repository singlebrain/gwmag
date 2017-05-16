<?php


session_start();

// Include
include 'connection.php';
include 'functions.php'; 
include 'comm.php';


//Session variables
$yrs = $_SESSION[‘years’];
$id = $_SESSION[‘id’];
$uname = $_SESSION[‘name’]; 
$date = $_SESSION[‘date’];
$email = $_SESSION[‘email’];
$upass = $_SESSION[‘pass’];
$todo = $_SESSION[‘todo’];

$gift = $_SESSION[‘gift’];
$gemail = $_SESSION[‘gemail’];
$gname = $_SESSION[‘gname’];
$gmesg = $_SESSION[‘gmesg’];



if ($todo == "renew"){ header("Location: thanks.php");} else {


//Life calculation
if ($yrs < 4) 
{
	$life = $yrs * 12;
} 
else 
{
	$life = $yrs;
}

$dt = $date;

$date_array = explode("/",$dt);
$rev_dt = "$date_array[2]/$date_array[1]/$date_array[0]"; 
$stdate = date('1/m/Y', strtotime("+1 month", strtotime($rev_dt))); //first date of next month
$m = "+" . $life.  "month";
$expdate = date('1/m/Y', strtotime($m, strtotime($rev_dt))); //first date of next year

//Generate bill number
$query = "SELECT bill_counter FROM subscription ORDER BY bill_counter";		
$result = mysql_query($query, $db) or die(mysql_error($db));	
while ($row = mysql_fetch_array($result)) 
{
	extract($row);	
}
$counter = $bill_counter;
if ($counter==0)
{
	$counter = 1;
}
else
{
	$counter += 1;
}	 

//Generate bill number
$bill_no = "APM" . $counter;

// Rates Calculation
if ($life == 5)
{
	$rate = 200;
}
elseif ($yrs == 1)
{
	if ($_SESSION[‘ccode’] <>"" ) {$rate = 510;} else {$rate = 540;} 
}
elseif ($yrs == 2)
{
	if ($_SESSION[‘ccode’] <>"" ) {$rate = 960;} else {$rate = 1020;}
}
elseif ($yrs == 3)
{
	if ($_SESSION[‘ccode’] <>"" ) {$rate = 1350;} else {$rate = 1440;}
}

//check if the data already in the table. ...This is to prevent system
//from sending receipts and writing data if the visitor clicks on the 
//rwfresh button

$proceed = "yes";
while ($row = mysql_fetch_array($sub)) 
{
	extract($row);
	
	if ($id==$u_id) 
	{		
		$proceed = "no";	
	}
}	

if ($proceed=="yes") 
{		
		
	//Populate mail variables
	$mesg = ' 
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet" type="text/css">
	<title>Receipt</title>
	<style type="text/css">
	.style1 {
		font-family: "EB Garamond", serif;	
		font-size: 24px;
	}
	.style2 {
		font-family: "EB Garamond", serif;
		font-size: 20px;
		color: #FFFFFF;
	}
	.style3 {
		color: red;
		height: 1px;
		padding: 2px;
	}
	</style>
	</head>
	<body>
	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FF0000">
	  <tr>
		<td height="40" align="center" bgcolor="#ff7e3f" class="style1"><strong>LIFE VALUES FOUNDATION</strong> - An Initiative of Nicholas Brothers </td>
	  </tr>
	  <tr>
		<td height="30" align="center" bgcolor="#9f8850" class="style2"><font color="#FFFFFF">RECEIPT</font></td>
	  </tr>
	  <tr>
		<td valign="top" bgcolor="#f0dba2"><table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="11%">&nbsp;&nbsp;Bill No: </td>
			<td width="13%"><b><font color="red"> ' . $bill_no . ' </font></b></td>
			<td width="56%">&nbsp;</td>
			<td width="7%">Date:</td>
			<td width="13%"><b><font color="red"> '. $date . ' </font></b></td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td bgcolor="#f0dba2"><hr  size="1" noshade class="style3" /></td>
	  </tr>
	  <tr>
		<td bgcolor="#f0dba2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td width="40%" height="18">&nbsp;&nbsp;Received with thanks from </td>
			<td width="60%" height="18"><b><font color="red"> ' . $uname.' </font></b> </td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;A sum of :</td>
			<td height="18"><b><font color="red"> Rs.'. $rate .' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;Towards:</td>
			<td height="18"><b><font color="red">'. $life . ' months subscription of GIANT WHEEL Magazine</font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;User ID:</td>
			<td height="18"><b><font color="red"> '. $id . ' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;&nbsp;Password:</td>
			<td height="18"><b><font color="red"> '. $upass . ' </font></b></td>
		  </tr>
		  <tr>
			<td height="18">&nbsp;</td>
			<td height="18">&nbsp;</td>
		  </tr>		  
		</table></td>
	  </tr>
	  <tr>
		<td height="20" valign="top" bgcolor="#f0dba2"><hr  size="1" noshade class="style3" /></td>
	  </tr>
	</table>	
	</body>
	</html>
	';
	
	//Send Emails
	$email_from = "contact@giantwheelmag.com";
	$email_subject = "Receipt and User Access Details";
	$email_body = $mesg;
	
	if ($gift == "yes")	{$to = $gemail;} else {$to =  $email;}
	$to1 =  "augustine@lifevaluesfoundation.com";
	$to2 =  "contact@giantwheelmag.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $email_from \r\n";
	$headers .= "Reply-To: contact@giantwheelmag.com \r\n";		
	
	//Mail send
	mail($to,$email_subject,$email_body,$headers);
	mail($to1,$email_subject,$email_body,$headers);
	mail($to2,$email_subject,$email_body,$headers);

	$pmode = "payumoney";
	
	//  In case of gift.... send email to receiver
	if ($gift == "yes")
	{
	$mesg = '<html>
			<head>
			<style type="text/css">
			<!--
			body {
				font-family: Verdana, Arial, Helvetica, sans-serif;
			}
			table {
				border-radius: 12px;
				border: thin solid #666666;
			}
			-->
			</style>
			</head>
			<body>
			<p>Dear <b>'.$uname .'</b>, </p>
			<p>Greetings from GIANT WHEEL MAGAZINE. Your friend <b>' .$gname.'</b> has gifted you a subscription of this wonderful magazine. Here is a message from this friend.</p>
			<table width="600" border="0" cellspacing="7" cellpadding="0">
			  <tr>
				<td align="center">'.$gmesg.'</td>
			  </tr>
			</table>
			<p>You can login to the website <a href="http://www.giantwheelmag.com">www.giantwheelmag.com</a> to perform various tasks. Here is your access details.</p>
			<table width="400" border="0" cellspacing="7" cellpadding="0">
			  <tr>
				<td align="center">User Id: '.$id.' <br> Password: '.$upass.'</td>
			  </tr>
			</table>
			</body>
			</html>';
			
	$email_from = "contact@giantwheelmag.com";
	$email_subject = "A GIFT from ". $gname."!! and User Access Details";
	$email_body = $mesg;	
	
	$to = $email;
	$to1 =  "augustine@lifevaluesfoundation.com";
	$to2 =  "contact@giantwheelmag.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $email_from \r\n";
	$headers .= "Reply-To: augustine@lifevaluesfoundation.com \r\n";		
	
	mail($to,$email_subject,$email_body,$headers);
	mail($to1,$email_subject,$email_body,$headers);
	mail($to2,$email_subject,$email_body,$headers);		
	}
	
	// Write to subscription table
	$query = "INSERT INTO subscription (u_id, years, bill_date, pay_mode, bill_counter, bill_num, sub_start_date, sub_exp_date, sub_life, sub_status) VALUES ('$id', '$years', '$date','$pmode','$counter','$bill_no','$stdate','$expdate','$life', '') "; 
	$result = mysql_query($query, $db) or die(mysql_error($db)); 
	
	//write data to subscription track table
	$query2 = "INSERT INTO sub_track ( u_id, bill_date, life, sent, tosend)  VALUES ( '$id', '$date', $life, 0, $life) "; 
 	$result2 = mysql_query($query2, $db) or die(mysql_error($db)); 
	
	
	// write to the ccode table
	if ($yrs == 1){ $comm = $d1;}
	elseif ($yrs == 2){ $comm = $d2;}
	elseif ($yrs == 3){ $comm = $d3;}
	$y = date('Y');
	$m = date('m');

	if ($_SESSION[‘ccode’] <>"" )
	{
	$query3 = "INSERT INTO $_SESSION[‘ccode’] ( ccode, user_id, date, year, month, sub_life, comm)  VALUES ( '$_SESSION[‘ccode’]', '$id', '$date', '$y', '$m', $life, $comm ) "; 
	$result3 = mysql_query($query3, $db) or die(mysql_error($db)); 
	}
	
	mysql_close($db);
}
}


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
	left: 350px;
	top: -450px;
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
    <td><img src="images/top2.jpg" width="1080" height="555" />
    <div id="layer_mesg"><span class="style10"><img src="images/speech2.png" width="578" height="399" /></span></div></td>
  </tr>
</table>


</body>
</html>
