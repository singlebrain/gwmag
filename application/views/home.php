<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('images/slides/my-slider.css') ?>"/>
<script src="<?php echo base_url('images/slides/ism-2.2.min.js') ?>"></script>
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
body {font-family: "Verdana":sans-serif;background-image: url("<?php echo base_url('images/3.jpg') ?>");}
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
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal w3-hover-blue"><i class="fa fa-th-large fa fa-home w3-margin-right"></i>HOME</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-comment w3-margin-right"></i>SAY SO</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-user fa fa-question-circle w3-margin-right"></i>FAQ</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hover-blue"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
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
      <button  onclick="document.getElementById('id01').style.display='block'" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG IN/SIGN UP</button>
    </div>
    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content w3-display-container" style="max-width:100%; padding-top: 10%;" >
  <!-- <img class="mySlides" src="slides/01.jpg" style="width:100%"> -->
  <img class="mySlides w3-image w3-animate-right" src="<?php echo base_url('images/slides/01.jpg') ?>" style="width:100%">
  <img class="mySlides w3-image w3-animate-right" src="<?php echo base_url('images/slides/02.jpg') ?>" style="width:100%">
  <img class="mySlides w3-image w3-animate-right" src="<?php echo base_url('images/slides/03.jpg') ?>" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div> 
<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}    
    x[slideIndex-1].style.display = "block";  
   currentDiv(slideIndex);
    // if (hover==true) {
    //   setTimeout(carousel, 20000);
    // }
    setTimeout(carousel, 6000); // Change image every 2 seconds
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
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-orange", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-orange";
}
</script>
<!-- insert here -->

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32">
  <div class="w3-row-padding">
    <div class="w3-third">
      <img src="<?php echo base_url('images/lvf-green.png') ?>" height=250dpx width=250dpx/>
        </div>
    <div class="w3-twothird">
      <p class="w3-text-white">dummy text this is used to enter describtion about life values foundation</p>
    </div>    
  </div>
  </footer>

<!-- Contact Section -->

  <div class="w3-container w3-padding-large" style="background-color: #f2f2f2;opacity: 0.7">
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
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
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
<center>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content" class="width:50%;">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2 style=>Login</h2>
      </header>
      <div class="w3-container">
      <!-- create form here -->
        <form action="" autocomplete="on" method="post">
        <input class="w3-input w3-border" type="text" placeholder="username" name="u_name"/>
        <input class="w3-input w3-border" type="password" placeholder="password" name="pass"/>
        <input class="w3-button w3-green w3-container " type="submit" value="Sign In" name="Sign In"/>
        <input class="w3-button w3-blue w3-container " type="button" name="signup" value="Sign Up" formmethod="get" formaction="">
          
        </form>
      </div>
    </div>
  </div>
<!-- End page content -->
</div>


</body>
</html>