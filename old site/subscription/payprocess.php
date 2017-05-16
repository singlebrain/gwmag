<?php

session_start();

//This page first takes all the inputs and stores them in variables ..... Line 37
//Validates the coupen codes ....... Line 55
//If any fields are empty it sends appropriate messages with a link to go back .......Process 3
//Next it checks to see if the password and the re-typed password matches.....Process 4
//Next it checks if the user id is already taken ...........Process 5
//If the user id is already taken it sends message ........Process 6
//If user id is not take then it writes the data to user_details database............Process 7
//Next it stores some values into session variables for further use.......Process 8
//Then it displays the thankyou page.......Process 9
//Once the person makes the payment he is moved to the thank you page



// Include
include 'connection.php';
include 'functions.php'; 

// Variables
$hasvalue = 1;
$message ="";
$write = 0;
$id_check=0;


//Assigned the values received from form to variables
//Note: 
//1. This form has been generated with www.fpmgonline.com
//2. Hence the table record name and field name are same
//3. Before wirting to bdatabase the user id is fetched to check if it already exists
//4. At that time the value of $u_id changes and creates problem
//5. Hence user id has been received in a different variable name 


//--------Process 1---- Receive variables
$ccode2 = $_POST['ccode']; 


$gname = $_POST['g_name']; 
$gphone = $_POST['g_phone']; 
$gemail = $_POST['g_email']; 
$gmesg = $_POST['g_mesg'];
$gift = $_POST['gift'];


$name2 = $name;

//check the coupon code
$discount = "no";

if (strlen($ccode2)==0)
  {
  	$discount = "blank";
  }	
  
if($ccode2 == "corpdisc")
{
	$discount = "yes";
}
else
{
	$cquery = "SELECT * FROM  distributors";		
	$cresult = mysql_query($cquery, $db) or die(mysql_error($db));	
	while ($row = mysql_fetch_array($cresult)) 
	{
		extract($row);
		if($ccode2 == $ccode)
		{ 
			$discount = "yes";
		}		
	}	
}

$name = $name2;

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subscription  Form</title>
<style type="text/css">
<!--
.style1 {  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 14px;
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
.style4 {font-family: 'EB Garamond', serif; font-size: 18px; line-height: 20px; vertical-align: top; color: #000000; text-decoration: none; }
.style9 {font-family: 'EB Garamond', serif;
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
.s1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000;
	text-decoration: none;
}
.s2 {font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
.s11 {font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}

#Layer3 {
	position: relative;
	width:650px;
	height:115px;
	z-index:1;
	left: 400px;
	top: -450px;
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
<script src="validation.js" type="text/javascript"></script>
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
    <td><img src="images/top2.jpg" width="1080" height="555"/></td>
  </tr>
</table>
<div id="Layer3">
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10" align="center" valign="top" ><table width="586" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="586" height="20" valign="top" class="style1">
          <!-- ------------------------Php Starts------------------------------ -->
          <?php


//Message if coupon code does not exist
	if ($discount =="no")
	{ 
		echo "<img src='images/speech9.png' width='489' height='319' border='0' usemap='#Map5' />";
		$hasvalue = 0;;
	}	


//---------Process 8-----------Some variables has to be stored sess table as session variables 

$_SESSION[‘date’] = $_SESSION[‘bdate’];
$_SESSION[‘ccode’] = $ccode2;

$_SESSION[‘gift’] = $gift;
$_SESSION[‘gemail’] = $gemail;
$_SESSION[‘gname’] = $gname;
$_SESSION[‘gmesg’] = $gmesg;




    
?>
          <!-- ---------------------Php End--------------------- -->
          &nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">
		<?php 
		if ($write==1) 
		{						
	?>
		<img src="images/speech1.png" width="434" height="258" border="0" usemap="#Map" href="#"  />
		<?php 
			//---------Process 9---------Go to payment 
			if($years==1)
			{
				if($discount == "yes")
				{
					$pg = 'https://www.payumoney.com/paybypayumoney/#/261657';
				}
				else
				{	
					$pg = 'https://www.payumoney.com/paybypayumoney/#/107221';		
				}	
			}	
			elseif($years==2)
			{
				if($discount == "yes")
				{
					$pg = 'https://www.payumoney.com/paybypayumoney/#/261669';
				}
				else
				{
					$pg = 'https://www.payumoney.com/paybypayumoney/#/130487';
				}
			}	
			elseif($years==3)
			{
				if($discount == "yes")
				{
					$pg = 'https://www.payumoney.com/paybypayumoney/#/261681';
				}
				else
				{
					$pg = 'https://www.payumoney.com/paybypayumoney/#/130493';
				}	
			}	
			else
			{
				$pg = 'https://www.payumoney.com/paybypayumoney/#/C0E49E8F47273FD6E8F8AD5F6A55886D';
			}	

	} ?>
	  </td>
  </tr>
</table>
</div>
<map name="Map4" id="Map4"><area shape="rect" coords="187,167,476,218" href="javascript:history.back();" />
</map>

<map name="Map3" id="Map3"><area shape="rect" coords="238,209,508,239" href="javascript:history.back()" />
</map>

<map name="Map2" id="Map2"><area shape="rect" coords="200,168,557,246" href="javascript:history.back()" />
</map>
<map name="Map" id="Map"><area shape="rect" coords="216,185,385,222" href="<?php  echo $pg;  ?>" /></map>


<map name="Map5" id="Map5"></map></body>
</html>


<?php

//mysql_close($db);

?>
