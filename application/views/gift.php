<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>Gift</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css') ?>">
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('images/slides/my-slider.css') ?>"/>
<script src="<?php echo base_url('images/slides/ism-2.2.min.js') ?>"></script>
<style>
.mySlides {display:none}
w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding: ;}
body {font-family: "Verdana":sans-serif;  background-image: url("<?php echo base_url('images/01.jpg') ?>");}
h1,h2,h3,h4,h5,h6 {font-family: "Verdana":sans-serif;}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-animate-left" style=" background-color:#f2f2f2; z-index:3;width:200px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <!-- <img src="/w3images/avatar_g2.jpg" style="width:45%;" class="w3-round"><br><br> -->
    <!-- <h4><b>GIANT WHEEL</b></h4>
     --><!-- <p class="w3-text-grey">Template by W3.CSS</p>
  </div> -->
  <div class="w3-bar-block">
    <a href="loadhome" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-th-large fa fa-home w3-margin-right"></i>HOME</a> 
    <a href="loadabout" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="loadsayso" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-comment w3-margin-right"></i>SAY SO</a>
    <a href="loadfaq" onclick="w3_close()" class="w3-bar-item w3-text-teal w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-question-circle w3-margin-right"></i>FAQ</a>
    <a href="loadcontact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    <a href="loadjoinus" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-users fa-fw w3-margin-right"></i>JOIN US</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px">

  <!-- Header -->
  <header class=" w3-top" id="portfolio" style=" background-color:#f2f2f2; padding-top:1%; padding-bottom:1% ; opacity: 0.9">
  <!-- opacity -->
    <!-- <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:1200px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a> -->
    <div class="w3-cell-row">
      <span class=" w3-left w3-button w3-hide-large w3-large w3-hover-text-grey" onclick="w3_open()" ><i class="fa fa-bars"></i></span>
    <!-- <div class="w3-container">
    <h1><b>My Portfolio</b></h1> -->
    <!-- <div class="w3-section w3-bottombar w3-padding-16"> -->
      <!-- <button class="w3-button w3-black">ALL</button> -->
      <button class=" w3-cell w3-button w3-container "><i class="fa fa-book w3-margin-right"></i>READ SAMPLE</button>
      <button class=" w3-cell w3-button w3-container "><i class="fa fa-clock-o w3-margin-right"></i>TRIAL</button>
      <button class=" w3-cell w3-button w3-container "><i class="fa fa-gift w3-margin-right"></i>GIFT</button>
      <button  onclick="d.getElementById('id01').style.display='block'" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG IN/SIGN UP</button>
    </div>
    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content w3-display-container" style="max-width:100%; " >

  </div>
</div> 

<script>
d=document;
// Script to open and close sidebar
function w3_open() {
    d.getElementById("mySidebar").style.display = "block";
    d.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    d.getElementById("mySidebar").style.display = "none";
    d.getElementById("myOverlay").style.display = "none";
}

</script>
  <div class="w3-container w3-row" style="margin-top:60px;">
  <!-- <div class="w3-content w3-round-xxlarge w3-yellow w3-text-blue" style="margin-top:60px; padding-left:40px">
  </div> -->
  <div class="w3-third">
    
  </div>

  <div class="two-third">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <!-- <td><img src="images/top3.jpg" width="100%" height="inherit"> -->
      <div id="layer-form">
        <form  name="ite" id="ite"  method="post" action="form_process.php">    
          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="40" colspan="2" align="center" valign="middle" bgcolor="#E24323" class="td_red" ><span class="Rate_title">GIFT A SUBSCRIPTION</span> </td>
            </tr>
            <tr>
              <td height="40" colspan="2" align="center" valign="middle" class="title">Please Enter Your Details </td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="center" valign="middle" class="style1"><table width="600" border="0" cellpadding="0" cellspacing="0" class="tbl2">
                 <tr>
                   <td height="10" align="right" valign="middle" class="text"></td>
                   <td height="10" align="left"></td>
                 </tr>
                 <tr>
              <td height="30" align="right" valign="middle" class="text">Your Name </td>
              <td width="362" align="left"><input name="g_name" type="text" class="style5" id="g_name" size="40" />
                <input name="gift" type="hidden" id="gift" value="yes"></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Your Mobile Number </td>
              <td align="left"><input name="g_phone" type="text" class="style5" id="g_phone" size="40" /></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Your Email Address </td>
              <td align="left"><input name="g_email" type="text" class="style5" id="g_email" size="40" /></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Message or Greeting you want to convey </td>
              <td align="left"><textarea name="g_mesg" cols="40" rows="4" class="style5" id="g_mesg"></textarea></td>
            </tr>
            <tr>
              <td height="10" align="right" valign="middle" class="text">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
              </table></td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="center" valign="middle" class="style1">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" colspan="2" align="center" valign="middle" class="title">Please fill in the details of the person to whom you want gift this Subscription. </td>
            </tr>
     
            <tr>
              <td height="30" colspan="2" align="center" valign="top" class="style2"><strong class="titlered">Please note: All the fields are mandatory </strong></td>
            </tr>
           
            <tr>
              <td height="30" colspan="2" align="center" valign="middle" class="style2">
        <table width="600" border="0" cellpadding="0" cellspacing="0" class="tbl2">
                 <tr>
                   <td height="10" align="right" valign="middle" class="text"></td>
                   <td height="10" align="left"></td>
                 </tr>
                 <tr>
              <td width="288" height="30" align="right" valign="middle" class="text">No. of Years </td>
              <td align="left"><select name="years" class="drop" id="years">
                  <option value="1">1 Year</option>
                  <option value="2">2 Years</option>
                  <option value="3" selected="selected">3 Years</option>
                </select>              </td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Create User ID</td>
              <td width="362" align="left"><input name="u_id" type="text" class="style5" id="u_id" size="40" /></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Password</td>
              <td align="left"><input name="pass" type="password" class="style5" id="pass" size="40" /></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Re-type Password </td>
              <td align="left"><input name="pass2" type="password" class="style5" id="pass2" size="40"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Full Name</td>
              <td align="left"><input name="name" type="text" class="style5" id="name" size="40"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Address - Door No. / Block </td>
              <td align="left"><input name="add1" type="text" class="style5" id="add1" size="40" maxlength="50"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Address - Area / Colony </td>
              <td align="left"><input name="add2" type="text" class="style5" id="add2" size="40" maxlength="50"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">City</td>
              <td align="left"><input name="city" type="text" class="style5" id="city" size="40"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Pincode</td>
              <td align="left"><input name="pin" type="text" class="style5" id="pin" size="40" maxlength="6"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Mobile Phone</td>
              <td align="left"><input name="phone" type="text" class="style5" id="phone" size="40" maxlength="10"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Email Id</td>
              <td align="left"><input name="email" type="text" class="style5" id="email" size="40"/></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="text">Coupon Code (if you have one) </td>
              <td align="left"><input name="ccode" type="text" class="style5" id="ccode" size="40"/></td>
            </tr>
            <tr>
              <td height="10" align="right" valign="middle" class="text"></td>
              <td height="10" align="left"></td>
            </tr>
              </table></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="middle" class="style2">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><a href="javascript:void(null)"><img src="images/reg.png" border="0" onClick="MM_callJS('validate()')"  ></a>                <!-- <input type="image" name="submit" src="images/reg.png"  alt="Submit" /> --></td>
            </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
            </tr>
          </table>
        </form>
      </div>
      <div id="layer-rates">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="70" colspan="4" align="center" bgcolor="#E24323"><span class="Rate_title">Subscribe to get GIANT WHEEL <br />
            right at your doorstep! </span> </td>
        </tr>
        <tr>
          <td width="29%" height="30" align="center" bgcolor="#7AAFDB" class="rate_txt">1 year </td>
          <td width="71%" align="center" bgcolor="#B2CDE8" class="rate_txt">Rs. 540 (inclusive of postage)  </td>
        </tr>
        <tr>
          <td height="30" align="center" bgcolor="#7AAFDB" class="rate_txt">2 years </td>
          <td align="center" bgcolor="#B2CDE8" class="rate_txt">Rs. 1020  (inclusive of postage)  </td>
        </tr>
        <tr>
          <td height="30" align="center" bgcolor="#7AAFDB" class="rate_txt">3 years </td>
          <td align="center" bgcolor="#B2CDE8" class="rate_txt">Rs. 1440  (inclusive of postage)  </td>
        </tr>
      </table>
     <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="tbl1 style10"  ><span class="style1"><strong><u>Kindly Note:</u></strong></span> <span class="style2">As we are aligned with the  academic year,  there will no issues of the magazine in the months of <b>April</b> and <b>May.</b> </span> </td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
  </div>
 </div> 
  <!-- Footer -->
  <footer class="w3-container w3-padding-32">
  <div class="w3-row-padding">
  </div>
  </footer>
<!-- login popup -->
<center>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content" class="width:50%;">
      <header class="w3-container w3-blue"> 
        <span onclick="d.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 style=>Login</h2>
      </header>
      <div class="w3-container">
      <!-- create form here -->
        <form action="" autocomplete="on" method="get">
        <input class="w3-input w3-border" type="text" placeholder="username" name="u_name"/>
        <input class="w3-input w3-border" type="password" placeholder="password" name="pass"/>
        <input class="w3-button w3-green w3-container " type="submit" value="Sign In" formmethod="post" name="Sign In"/>
        <input class="w3-button w3-blue w3-container " type="button" name="signup" value="Sign Up"  formaction="">
         
        </form>
      </div>
    </div>
  </div>
<!-- End page content -->
</div>
</body>
</html>