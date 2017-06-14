<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$index = $this->session->userdata('index');
?>
<!DOCTYPE html>
<html>
<title>About</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/w3.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
<script src="<?php echo base_url('js/custom.js')?>"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php //echo base_url('images/slides/my-slider.css') ?>"/> -->
<!-- <script src="<?php// echo base_url('images/slides/ism-2.2.min.js') ?>"></script>
 -->
 <style>
 h1{
  display: none; !important
 }
.navi {
    border: solid black;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;

}


.right {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    
}

.left {
    transform: rotate(135deg);
    -webkit-transform: rotate(135deg);
}
</style>

<!-- Overlay effect when opening sidebar on small screens -->
<script>
$(document).ready(function(){
  $("#page").on("swipeleft",function(){
    next();
  });
  $("#page").on("swiperight",function(){
    prev();
  });                         
});
var path="<?php echo base_url().'images/sample/' ?>";
var d=document;
var index=<?php echo $index ?>;
// Script to open and close sidebar
function next(){
  index=index+1;
  // alert(index);
  <?php $index=$index+1; ?>;
  var npath=path+index+'.jpg';
  // $.get();
  $('#page').attr('src',npath).animate({opacity: '0'}, 10).animate({opacity: '1'}, "slow");
}

function prev(){
  index=index-1;
  <?php $index=$index-1; ?>;
  if(index==0){
   index=1; 
  }
  var npath=path+index+'.jpg';
  $('#page').attr('src',npath).animate({opacity: '0'}, 10).animate({opacity: '1'}, "slow");
}
</script>
<!-- about -->
<div class="w3-content w3-display-container w3-center" style="max-height:40px; padding-top: 20px; width: 100%" >
  <img class="w3-image w3-animate-zoom w3-center" id="page" src="<?php echo base_url().'images/sample/'.$index.'.jpg' ?>" align="middle" vspace="0px 450px" style="max-height: 650px;">
  <a href="javascript:void(null)" onclick="next()"><i class="arrow right navi" style="float: right;">next</i></a>
  <a href="javascript:void(null)" onclick="prev()"><i class="arrow left navi" style="float: left;">ʌǝɹd</i></a>
  </div>
      </div>
    </div>
  </div>
<!-- End page content -->
</div>
</body>
</html>