<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>Welcome</title>
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

    <div class="w3-cell-row">
      <span class=" w3-left w3-button w3-hide-large w3-large w3-hover-text-grey" onclick="w3_open()" ><i class="fa fa-bars"></i></span>
  
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadsample'"><i class="fa fa-book w3-margin-right"></i>READ SAMPLE</button>
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadtrial'"><i class="fa fa-clock-o w3-margin-right"></i>TRIAL</button>
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
    </div>
    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content " style="max-width:100%; " >
  </div>
</div> 
<script>

</script>
<!-- footer -->
<div class="w3-content w3-display-container">
<div class="w3-row-padding" style="width: 100%;">

    <!-- Left Column -->
    <div class="w3-main" style="margin-top:100px; width: 100%;">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <!-- <img src="/w3images/avatar_hat.jpg" style="width:100%" alt="Avatar"> -->
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2>Welcome,</h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>Jane Doe</p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>ex@mail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Subscription Details</b></p>
          <p>Start Date</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
          <time>1-6-2017</time>
            <!-- <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div> -->
          </div>
          <p>End Date</p>

          <div class="w3-light-grey w3-round-xlarge w3-small">
          <time>1-6-2018</time>
            <!-- <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              <div class="w3-center w3-text-white">80%</div>
            </div> -->
          </div>
          <p>No of Copies left</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">12</div>
          </div>
          <!-- <p>Media</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:50%">50%</div>
          </div> -->
          <br>

          <!-- <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          <p>English</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Spanish</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          <p>German</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
          </div>
          <br> -->
          <p class="w3-display-container">
          <button class="w3-btn w3-teal" onclick="">Renew</button>
          <button class="w3-button w3-right" onclick=""> Change Address</button>
          </p>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

  <div class="w3-container mar">
  <div class="w3-content w3-round-xxlarge w3-yellow w3-text-blue" style="padding-left:40px;">
  <?php echo validation_errors();?>
                    <?php echo form_open( base_url().'index.php/welcome/checklogin'); ?>

  </div>
  <div class="w3-border">
    <table>
      <tr>
        
      </tr>
    </table>
  </div>
  <div style="float:right">
    <!-- <img src="<?php echo base_url('images/faq.jpg') ?>"> -->
  </div>
 </div> 
 </div>
 </div>

<!-- End page content -->
</div>
</body>
</html>