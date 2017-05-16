<?php
//session_start();

include 'connection.php';
include 'functions.php'; 

$id = $_SESSION[‘id’];


//$_SESSION[‘from’] = 1;



$do = $_GET['do'];

//Check if logged in 
if (strlen($id)==0 ) 
	{		
		$hasvalue = 0;
		header("Location: login.php");
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';		
	}	

if ($do=="out") 
	{		
		$hasvalue = 0;
		session_destroy(); 
		header("Location: login.php");
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';		
	}


//getting the details from user details table
$query = 'SELECT * FROM user_details WHERE u_id = "' . $id. '"';
$result = mysql_query($query, $db) or die(mysql_error($db));	

while ($row = mysql_fetch_array($result)) 
	{
		extract($row);
	}
	
$_SESSION[‘add’] =  $r_add1 . "<br>" . $r_add2 . "<br>" . $city . "<br>" . $pincode  ;
$_SESSION[‘pwd’] = $pass;


//Receive vavariables 
$add1 = $_POST['r_add1'];
$add2 = $_POST['r_add2'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

$job = $_POST['job'];
$cpass = $_POST['cpass'];
$npass = $_POST['npass'];
$npass2 = $_POST['npass2'];


//Session Variables
$_SESSION[‘date’]= $reg_date;
$_SESSION[‘user_id’]= $u_id;
$_SESSION[‘f_name’]= $f_name;
$_SESSION[‘l_name’]= $l_name;
$_SESSION[‘email’]= $email;


//updating address
if ($job == "add")
{
	$query3 = 'UPDATE user_details SET r_add1 = "' . $add1. 			
			'", r_add2 = "' . $add2.  
			'", city = "' . $city.  
			'", pincode = "' . $pincode.  			
			' WHERE u_id = "' . $id .'"';	
	
	$result = mysql_query($query3, $db) or die(mysql_error($db));	
}


//update password
if ($job == "password")
{	
	$go = "no";
	if (strlen($cpass)==0)
	{ $_SESSION[‘mesg’] = "You have left some fields empty. Please fill in all the fields"; header("Location: change.php?do=pass"); }
	elseif (strlen($npass)==0)
	{ $_SESSION[‘mesg’] = "You have left some fields empty. Please fill in all the fields"; header("Location: change.php?do=pass");  }
	elseif (strlen($npass2)==0)
	{ $_SESSION[‘mesg’] = "You have left some fields empty. Please fill in all the fields"; header("Location: change.php?do=pass"); }
	else 
	{
		$query = 'SELECT * FROM user_details ';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);
			if ($pass==$cpass) { $got = "yes"; $go = "yes"; break;} 
			else
			{ $_SESSION[‘mesg’] = "The current password you entered is wrong."; header("Location: change.php?do=pass"); }		
		}	
	}
	
	if ($go =="yes")
	{ 
		if ($npass == $npass2)
		{
			$query3 = 'UPDATE user_details SET pass = "' . $npass. '" WHERE u_id = "' . $id .'"';	
			$result = mysql_query($query3, $db) or die(mysql_error($db));	
			header("Location: change.php?do=p");				
		}	
		else
		{ $_SESSION[‘mesg’] = "The new password you entered did not match the password you retyped."; header("Location: change.php?do=pass");}
	}
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

.style4 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 23px;
	vertical-align: middle;
	color: #FFFFFF;
	text-decoration: none;
}	
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 12px; vcolor: #000000; text-decoration: none; }
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; line-height: 20px; font-weight:normal; vertical-align: top; color: red; text-decoration: none; }
.style3 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 18px; line-height: 12px; color: #000000; text-decoration: none; }
.style7 {font-size: 16px; line-height: 20px; font-weight:bold}
.style9 {
	color:#2f4e9d;
	font-weight:normal;
	font-size: 14px;
	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #CCCCCC;
	border-top-style: none;
	border-right-style: none;
	border-left-style: none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
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
.s1 {font-family: Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #000;
	text-decoration: none;
}
.s2 {font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
}
#Layer4 {
	position: relative;
	width:650px;
	height:350px;
	z-index:1;
	left: 400px;
	top: -250px;
	margin-bottom:-200px;
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
	top: -510px;
	margin-bottom: -200px;
}
#Layer2 {
	position: relative;
	visibility: hidden;
	width:200px;
	height:115px;
	z-index:3;
	left: 785px;
	top: -593px;
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
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 20px;
	vertical-align: top;
	color: #000000;
	text-decoration: none;
	padding-left: 10px;
	padding-top: 5px;
	word-spacing: 1px;
}
.td1 {	font-family: Arial, Helvetica, sans-serif;
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
    <td><img src="images/top2.jpg" width="1080" height="608" border="0" /></td>
  </tr>
</table>
<div id="Layer4">
<table width="538" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="253" valign="top"><table width="230" border="0" cellspacing="10" cellpadding="0">
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
        <td align="center" valign="top" class="style3">
		<?php 
			if ($do == "add")
			{	
				job_add();
			}
			elseif ($do == "pass")
			{
				job_pass();
			}			
			elseif ($do == "pay")
			{ 
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=pay.php">';
			}
			else
			{
				echo "Data updated!!!";
			}	
			
			?>        </td>
      </tr>
</table>
</div>
</body>
</html>
<?php 
//Function job add
function job_add() 
{
?>

<form action="change.php" method="post">
 	<table width="473" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td height="20" colspan="2" class="style2">Your Current Address is: </td>
      </tr>
              <tr>
                <td height="20" colspan="2" class="style5">
				<?php 	echo $_SESSION[‘add’]; 	?></td>
      </tr>
				
              <tr>
                <td height="20" colspan="2" class="style2">Change it to: </td>
      </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="style3">Address - Door No. / Block</td>
                <td height="20" ><input name="add1" type="text" id="add1" /></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="style3">Address - Area / Colony</td>
                <td height="20" ><input name="add2" type="text" id="add2" /></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="style3">City</td>
                <td height="20" ><input name="city" type="text" id="city" /></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="style3">Pincode</td>
                <td height="20" ><input name="pincode" type="text" id="pincode" /></td>
              </tr>
              <tr>
                <td width="137" height="20" align="right" valign="middle" class="style3">&nbsp;</td>
                <td width="155" height="20" >&nbsp;</td>
              </tr>
              <tr>
                <td height="20" colspan="2" align="center"><label>
                  <input name="job" type="hidden" id="job" value="add" />
                  <input type="submit" name="Submit" value="Submit" />
                </label></td>
      </tr>
  </table>
</form>

<?php 
}
//end function................................................................



//Function password
function job_pass()
{
?>
<form id="form1" name="form1" method="post" action="change.php?do=pass">
              <table width="450" border="0" cellspacing="10" cellpadding="0">
                <tr>
                  <td colspan="2" align="center" ><?php  echo $_SESSION[‘mesg’];  ?> </td>
                </tr>
              
                <tr>
                  <td width="262" height="20" align="right" >Enter current password&nbsp;&nbsp;</td>
                  <td width="243" align="left" class="style2"><input name="cpass" type="password" id="cpass" c /></td>
                </tr>
                <tr>
                  <td height="20" align="right">Enter your new password  &nbsp;</td>
                  <td align="left"><span class="style2">
                    <input name="npass" type="password" id="pass"  />
                  </span></td>
                </tr>
				<tr>
                  <td height="20" align="right">Retype your new password  &nbsp;</td>
                  <td align="left"><span class="style2">
                    <input name="npass2" type="password" id="pass"  />
                  </span></td>
                </tr>
                <tr>
                  <td height="20" align="center"></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td height="20" colspan="2" align="center"><label>
                    <input name="job" type="hidden" id="job" value="password" />
                    <input type="submit" name="Submit2" value="Submit" />
                  </label></td>
                </tr>
              </table>
</form>			
<?php
}		
//function end...........................................................................................
?>

