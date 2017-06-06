<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>FAQ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php //echo base_url('images/slides/my-slider.css') ?>"/>
<script src="<?php //echo base_url('images/slides/ism-2.2.min.js') ?>"></script>
 --><style>
/*.mySlides {display:none}
w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding: ;}
*/body {font-family: "Verdana":sans-serif;  background-image: url("<?php echo base_url('images/faqbg.jpg') ?>");}
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
      <button  onclick="document.getElementById('id01').style.display='block'" class=" w3-cell w3-button w3-container "><i class="fa fa-user-circle w3-margin-right"></i>LOG IN/SIGN UP</button>
    </div>
    <!-- </div> -->
  </header>
<!-- slider -->
<div class="w3-content w3-display-container" style="max-width:100%; " >

  </div>
</div> 

<script>
// Script to open and close sidebar
var d=document;
function w3_open() {
  $("#mySidebar").show();
  $("#myOverlay").show();
    // d.getElementById("mySidebar").style.display = "block";
    // d.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  $("#mySidebar").hide();
  $("#myOverlay").hide();
    // d.getElementById("mySidebar").style.display = "none";
    // d.getElementById("myOverlay").style.display = "none";
}
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
  function togle(q){
    // hide();
    $(q).toggle();
    $(q).css("color","black");

  }
</script>
<div class="w3-row-padding">
    <div class=" w3-center" style="margin-top: 60px">
      <img src="<?php echo base_url('images/gwlogo.png') ?>">
        </div>
  <div class="w3-container">

  <div class="w3-content w3-round-xxlarge w3-yellow w3-text-blue" style=" padding-left:40px">
    <ul class="w3-ul" style="list-style-type:disc;">
    <style type="text/css">
    </style>
    <!-- qn1 -->
    <li><a href="javascript:void(null)" onclick="togle('#a')">What is this website all about?</a>
    <p id='a' style="display:none;">This is the official website of GIANT WHEEL, India’s first life values and life skills comic monthly.
</p></li>
    <!-- qn2 -->
    <li><a href="javascript:void(null)" onclick="togle('#b')">What kind of magazine is GIANT WHEEL?</a>
    <p id='b' style="display:none;">GIANT WHEEL addresses three key needs that are felt today by parents and educators alike.
The first need is to provide valuable and insightful inputs on the life values front. Life values are deteriorating in today’s fast paced world and children are being inundated by confusing and conflicting messages from media, peers and family. As family structures break apart and quality time decreases, parents are finding it very difficult to provide the right inputs. The GIANT WHEEL magazine aims to fill that gap in an engaging, interesting and non-preachy manner. 
 
The second need is the much required Life Skills. Reading, writing, memorizing, speaking, presenting, etc. are things that children are normally required to do. But there are more skilful and effective ways of doing all these and more. The GIANT WHEEL magazine will impart valuable soft skills in very issue.
 
The third need is to spend quality time with children. The GIANT WHEEL magazine is an excellent tool to spend quality time with your child.</p></li>
    <!-- qn3 -->
    <li><a href="javascript:void(null)" onclick="togle('#c')">What more does this magazine have?</a>
    <p id='c' style="display:none;">There are sections featuring debates, insights, biographies, history, science, career guidance, quotes, facts, jokes and lots more.</p></li>
    <!-- qn4 -->
    <li><a href="javascript:void(null)" onclick="togle('#d')">Who is this magazine for?</a>
    <p id='d' style="display:none;">For all children who have started reading for themselves.</p></li>
    <!-- qn5 -->
    <li><a href="javascript:void(null)" onclick="togle('#e')">My child is too young to read for himself/herself. Can I not read it to him/her?</a>
    <p id='e' style="display:none;">You most certainly can.</p></li>
    <!-- qn6 -->
    <li><a href="javascript:void(null)" onclick="togle('#f')">How do I get this magazine?</a>
    <p id='f' style="display:none;">To get this magazine, all you have to do is to click on the SUBSCRIBE button and subscribe to the magazine.</p></li>
    <!-- qn7 -->
    <li><a href="javascript:void(null)" onclick="togle('#g')">I filled in the subscription form but when I clicked the REGISTER AND PAY button, the screen went blank / the PayUmoney website did not work / my internet connection failed / my system re-started. What do I do?</a>
    <p id='g'style="display:none;">Your registration process has been interrupted. This is what you would need to do. 
1. Press the LOGIN button which you can find on top of every page.
2. Using your Login Id and Password, Log in to your account. 
3. Then press the MAKE PAYMENT button in the login page to make the payment.Once the payment is made, your registration process will be completed and you will get a receipt.</p></li>
    <!-- qn8 -->
    <li><a href="javascript:void(null)" onclick="togle('#h')">My registration process has been interrupted and I tried to login as mention in the above question, but I was not able to login. What do I do now?</a>
    <p id='h' style="display:none;">You are not able to login, because your details have not been registered successfully with us. What you could do is: Press the SUBSCRIBE button, go through the subscription process all over again and complete the process successfully.</p></li>
    <!-- qn9 -->
    <li><a href="javascript:void(null)" onclick="togle('#i')">I am unable to make the payment through the PayUmoney website. What do I do?</a>
    <p id='i' style="display:none;">You can drop us an e-mail to contact@giantwheelmag.com mentioning your user id and we will send you our bank details. You can then do an online fund transfer to us. Once that is done please send us an email with your transaction id. We wil then activate your acount.</p></li>
    <!-- qn10 -->
    <li><a href="javascript:void(null)" onclick="togle('#j')">I made the payment successfully, but I did not get a receipt. What now?</a>
    <p id='j' style="display:none;">Nothing to worry about. Just get in touch with us through email or phone and we will sort the issue out.</p></li>
    <!-- qn11 -->
    <li><a href="javascript:void(null)" onclick="togle('#k')">I have successfully subscribed. When will I get my first issue?</a>
    <p id='k' style="display:none;">When you subscribe to our magazine in a particular month, your first issue will be dispatched on the first week of the next month. 

Eg. 1. 
If you subscribe in the month of June, your first copy will be sent to you on the first week of July.

However we are aligned to the school academic year and so we do not publish issues in the month of April and May.

Eg. 2.
If you subscribe in the month of March your first issue will be sent to you on the first week of June.</p></li>
    <ol>
  </div>
  <div style="float:right">
    <!-- <img src="<?php echo base_url('images/faq.jpg') ?>"> -->
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