<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>GIFT </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css')?>"> 
<link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url('js/custom.js')?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

form header {
  margin: 0 0 20px 0; 
}
form header div {
  font-size: 90%;
  color: #999;
}
form header h2 {
  margin: 0 0 5px 0;
}
form > div {
  clear: both;
  overflow: hidden;
  padding: 1px;
  margin: 0 0 10px 0;
}
form > div > fieldset > div > div {
  margin: 0 0 5px 0;
}
form > div > label,
legend {
  width: 25%;
  float: left;
  padding-right: 10px;
}
form > div > div,
form > div > fieldset > div {
  width: 75%;
  float: right;
}
form > div > fieldset label {
  font-size: 90%;
}
fieldset {
  border: 0;
  padding: 0;
}

input[type=text],
input[type=email],
input[type=url],
input[type=password],
textarea {
  width: 100%;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-right: 1px solid #eee;
  border-bottom: 1px solid #eee;
}
input[type=text],
input[type=email],
input[type=url],
input[type=password] {
  width: 50%;
}
input[type=text]:focus,
input[type=email]:focus,
input[type=url]:focus,
input[type=password]:focus,
textarea:focus {
  outline: 0;
  border-color: #4697e4;
}

@media (max-width: 600px) {
  form > div {
    margin: 0 0 15px 0; 
  }
  form > div > label,
  legend {
    width: 100%;
    float: none;
    margin: 0 0 5px 0;
  }
  form > div > div,
  form > div > fieldset > div {
    width: 100%;
    float: none;
  }
  input[type=text],
  input[type=email],
  input[type=url],
  input[type=password],
  textarea,
  select {
    width: 100%; 
  }
}
@media (min-width: 1200px) {
  form > div > label,
  legend {
    text-align: right;
  }
}
body {background-image: url("<?php echo base_url('images/faqbg.jpg') ?>");}
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
    <a href="javascript:void(0)" onclick="window.location='loadhome'" class="w3-bar-item w3-button w3-padding  w3-hover-blue"><i class="fa fa-th-large fa fa-home w3-margin-right"></i>HOME</a> 
    <a href="javascript:void(0)" onclick="window.location='loadabout'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="javascript:void(0)" onclick="window.location='loadsayso'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-comment w3-margin-right"></i>SAY SO</a>
    <a href="javascript:void(0)" onclick="window.location='loadfaq'" class="w3-bar-item w3-button w3-padding w3-text-teal w3-hover-blue"><i class="fa fa-user fa fa-question-circle w3-margin-right"></i>FAQ</a>
    <a href="javascript:void(0)" onclick="window.location='loadcontact'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    <a href="javascript:void(0)" onclick="window.location='loadjoinus'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-users fa-fw w3-margin-right"></i>JOIN US</a>
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
      <?php
   
        if ($this->session->has_userdata('uid')) {?>
          <button  onclick="window.location='loadsample'" class=" w3-cell w3-button w3-container "><i class="fa fa-book w3-margin-right"></i>READ MAGAZINE</button>
          <?php
        }
     
      else
      {?>
      <button  onclick="window.location='loadsample'" class=" w3-cell w3-button w3-container "><i class="fa fa-book w3-margin-right"></i>REAd SAMPLE</button>
      <?php }?>
      <?php
   
        if ($this->session->has_userdata('uid')) {?>
          <button  onclick="window.location='subscribe'" class=" w3-cell w3-button w3-container "><i class="fa fa-clock-o w3-margin-right"></i>SUBSCRIBE</button>
          <?php
        }
     
      else
      {?>
      <button  onclick="window.location='loadtrial'" class=" w3-cell w3-button w3-container "><i class="fa fa-clock-o w3-margin-right"></i>TRIAL</button>
      <?php }?>
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadgift'"><i class="fa fa-gift w3-margin-right"></i>GIFT</button>
      <?php
   
        if ($this->session->has_userdata('uid')) {?>
          <button  onclick="window.location='logout'" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG OUT</button>
          <?php
        }
     
      else
      {?>
      <button  onclick="window.location='loadloginpage'" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG IN/SIGN UP</button>
      <?php }?>
    </div>    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content w3-display-container" style="max-width:100%; " >
  </div>
</div> 
<script>
// Script to open and close sidebar

// function toggle(q){
//   hide();
//   d.getElementById(q).style.color = "black";
//   d.getElementById(q).style.display = "block";
// }
// function hide(){
//   d.getElementById('a').style.display = 'none';
//   d.getElementById('b').style.display = 'none';
//   d.getElementById('c').style.display = 'none';
//   d.getElementById('d').style.display = 'none';
//   d.getElementById('e').style.display = 'none';
//   d.getElementById('f').style.display = 'none';
//   d.getElementById('g').style.display = 'none';
//   d.getElementById('h').style.display = 'none';
//   d.getElementById('i').style.display = 'none';
//   d.getElementById('j').style.display = 'none';
//   d.getElementById('k').style.display = 'none';
  
// }


</script>
<div class="w3-row-padding">
    <div class=" w3-center" style="margin-top: 60px;width:100%;">
      <img src="<?php echo base_url('images/gwlogo.png') ?>">
        </div>
  <div class="w3-container mar">
  <div class="w3-content w3-round-xxlarge w3-grey w3-text-black" style="padding-left:40; opacity: 0.9"><br>                       
                        <?php echo validation_errors();?>
                        <?php echo form_open( base_url().'index.php/welcome/checkgift'); ?>
    <form>
  <header>
    <h2>  Gift a subscribtion</h2>
    <div>Enter the appropriate details in the given form </div>
  </header>
  <div>
    <label class="desc" id="title1" for="Field1">Your name</label>
    <div>
      <input name="uname" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">Your mobile number</label>
    <div>
      <input name="umobile" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">Your E-mail address</label>
    <div>
      <input name="uemail" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
   <div>
    <label class="desc" id="title1" for="Field1">Type the message to be conveyed(optional)</label>
    <div>
      <input name="uemail" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div class="w3-white">All the forms below are mandatory.</div>
   <div>
    <label class="desc" id="title1" for="Field1">First Name</label>
    <div>
      <input name="fname" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
   <div>
    <label class="desc" id="title1" for="Field1">Last Name</label>
    <div>
      <input name="lname" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">Username</label>
    <div>
      <input name="username" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
      <div>
    <label class="desc" id="title1" for="Field1">Set a new password</label>
    <div>
      <input  name="pass1" type="password" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
    <div>
    <label class="desc" id="title1" for="Field1">Retype password</label>
    <div>
      <input  name="pass2" type="password" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">E-mail</label>
    <div>
      <input name="email" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
<div>
    <label class="desc" id="title1" for="Field1">Mobile Number</label>
    <div>
      <input name="mobile" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">School</label>
    <div>
      <input name="school" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">Class</label>
    <div>
      <input name="class" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
 
  <div>
    <label class="desc"  for="Field106">
      Select the period of subscription
    </label>
    <div>
    <select  name="period" class="field select medium" tabindex="11"> 
      <option value="1">1 year</option>
      <option value="2">2 year</option>
      <option value="3">3 year</option>
    </select>
    </div>
  </div>
  
  <div>
    <label class="desc" id="title1" for="Field1">Address (Line1)</label>
    <div>
      <input name="add1" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
   <div>
    <label class="desc" id="title1" for="Field1">Address (Line2)</label>
    <div>
      <input name="add2" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
  <div>
    <label class="desc" id="title1" for="Field1">City</label>
    <div>
      <input name="city" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
     
  <div>
    <label class="desc" id="title1" for="Field1">Pin code</label>
    <div>
      <input name="pin" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
<div>
    <label class="desc" id="title1" for="Field1">Country</label>
    <div>
      <input name="country" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>
    <div>
    <label class="desc" id="title1" for="Field1">Coupon code(if any)</label>
    <div>
      <input name="coupon" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>

  
  <div>
    <div>
      <button class="w3-button  w3-purple w3-left-align" type="submit" >Gift the subscription</button>
    </div>
  </div>
</form>
  <div style="float:right">
    <!-- <img src="<?php echo base_url('images/faq.jpg') ?>"> -->
  </div>
 </div> 
 <div id="layer-rates">
      <table width="100%" border="0" border-left-width ="150"; cellpadding="10" cellspacing="1">
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
          <td height="30" border="10" colspan="2" align="center" bgcolor="#FFFFFF" class="tbl1 style10"  ><span class="style1"><strong><u>Kindly Note:</u></strong></span> <span class="style2">As we are aligned with the  academic year,  there will no issues of the magazine in the months of <b>April</b> and <b>May.</b> </span> </td>
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

<!-- End page content -->
</div>
</body>
</html>