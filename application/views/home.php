<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>GWMag</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
<script src="<?php echo base_url('js/custom.js')?>"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<style>
body {background-image: url("<?php echo base_url('images/bg.jpg') ?>");}
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
    <a href="javascript:void(0)" onclick="window.location='loadhome'" class="w3-bar-item w3-button w3-padding w3-text-teal w3-hover-blue"><i class="fa fa-th-large fa fa-home w3-margin-right"></i>HOME</a> 
    <a href="javascript:void(0)" onclick="window.location='loadabout'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="javascript:void(0)" onclick="window.location='loadsayso'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-comment w3-margin-right"></i>SAY SO</a>
    <a href="javascript:void(0)" onclick="window.location='loadfaq'" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-question-circle w3-margin-right"></i>FAQ</a>
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
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadsample'"><i class="fa fa-book w3-margin-right"></i>READ SAMPLE</button>
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadtrial'"><i class="fa fa-clock-o w3-margin-right"></i>TRIAL</button>
      <button class=" w3-cell w3-button w3-container " onclick="window.location='loadgift'"><i class="fa fa-gift w3-margin-right"></i>GIFT</button>
      <button  onclick="$('#id01').show();" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG IN/SIGN UP</button>
    </div>
    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content w3-display-container" id="slideshow" onmouseover="clearTimeout(slider);" onmouseleave="setTimeout(carousel, 2000);" style="max-width:100%; " >
  <!-- <img class="mySlides" src="slides/01.jpg" style="width:100%"> -->
  <img class="mySlides w3-image w3-animate-right" id="slideshow" src="<?php echo base_url('images/slides/1.jpg') ?>" style="width:100%">
  <img class="mySlides w3-image w3-animate-right" id="slideshow" src="<?php echo base_url('images/slides/2.jpg') ?>" style="width:100%">
  <img class="mySlides w3-image w3-animate-right" id="slideshow" src="<?php echo base_url('images/slides/3.jpg') ?>" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-button w3-left w3-hover-text-khaki" id="left" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-button w3-right w3-hover-text-khaki" id="right" onclick="plusDivs(1)">&#10095;</div>
    <!-- <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span> -->
  </div>
</div> 
<script>
$(document).ready(function(){
  $("#slideshow").on("swipeleft",function(){
    plusDivs(-1);
  });
  $("#slideshow").on("swiperight",function(){
    plusDivs(+1);
  });                         
});
d=document;
var slideIndex = 0;
var time=6000;
var slider;
carousel();

function carousel() {
    var i;
    var x = d.getElementsByClassName("mySlides");  
    $(".mySlidesdes").hide();
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}    
    // x[slideIndex-1].style.display = "block";
      $(x[slideIndex-1]).show();  
   currentDiv(slideIndex);
    slider=setTimeout(carousel, time); // Change image every 6 seconds
}
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = d.getElementsByClassName("mySlides");
  // var dots = d.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  // for (i = 0; i < dots.length; i++) {
  //    dots[i].className = dots[i].className.replace(" w3-orange", "");
  // }
  //put slide animation
   x[slideIndex-1].style.display = "block";  
  // dots[slideIndex-1].className += " w3-orange";
}
</script>
<!-- insert here -->

  <!-- Footer -->
  <footer class="w3-container w3-padding-32">
  <div class="w3-row-padding">
    <div class="w3-third w3-center">
      <img src="<?php echo base_url('images/lvf-green.png') ?>" height=250dpx width=250dpx/>
        </div>
<br>
    <div class="w3-twothird w3-light-grey" style="opacity: 0.9">
      <br><p class="w3-text-black  ">dummy text this is used to enter describtion about life values foundation    </p><br><br>
    </div>    
  </div>
  </footer>

<!-- Contact Section -->

  <div class="w3-container w3-padding-large" style="background-color: #f2f2f2;opacity: 0.9">
    <h4 class="w3-light-grey" id="contact"><b> Get In Touch!</b></h4>


    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Feedback</label>
        <input class="w3-input w3-border" type="text" name="Feedback" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Feedback</button>
    </form>
    <h4 id="contact"><b>Contact Us </b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px ;opacity: 2">
      <div class="w3-third w3-yellow">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-black"></i></p>
        <p><br>contact@giantwheelmag.com<br><br></p>
      </div>
      <div class="w3-third w3-lime">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-black"></i></p>
        <p>No.19 New Rajanna Layout,<br>Horamavu Agara,<br>Bangalore 560043</p>
      </div>
      <div class="w3-third w3-khaki">
        <p><i class="fa fa-phone w3-xxlarge w3-text-black"></i></p>
        <p>+91 7899016707<br>+91 9741435333<br>+91 9341220784
        </p>
      </div>
    </div>
  </div>


  
  <!-- <div class="w3-black w3-center w3-padding-24"></div> -->

<!-- login popup -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content" class="width:50%;">
      <header class="w3-container w3-blue"> 
        <span onclick="$('#id01').hide();" 
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
        <button onclick="$('#id02').show();" class="w3-button w3-blue w3-container ">ign up</button>
        </form>
      </div>
    </div>
  </div>

  <div id="id02" class="w3-modal">
    <div class="w3-modal-content" class="width:50%;">
      <header class="w3-container w3-blue"> 
        <span onclick="$('#id01').hide();" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 style=>Login</h2>
      </header>
      <div class="w3-container">
      <!-- create form here -->
        <form action="" autocomplete="on" method="get">
        <input class="w3-input w3-border" type="text" placeholder="username" name="u_name"/>
        <input class="w3-input w3-border" type="password" placeholder="password" name="pass1"/>
        <input class="w3-input w3-border" type="password" placeholder="repassword" name="pass2"/>
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