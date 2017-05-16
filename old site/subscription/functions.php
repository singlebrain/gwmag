<?php
session_start();
// Error message function used in form ptocess.php
function errormesg_1() 
{
?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4"><?php echo $_SESSION[‘message’]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="javascript:history.back()"  class="style4 style1">Back</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php 
}
//---------------------End of ---errormesg_1---- function---------------------- 



//Function to display message and pay button when subscription form has ben filled 
function form_filled_1() 
{
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4">Thank you <b><?php echo $_SESSION[‘f_name’] . " " ?></b>for subscribing to the magazine.<br />
    Please go ahead and make the payment using the button given below. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4">Note 1 : Your user id is: <b><?php echo $_SESSION[‘user_id’] ?></b> </td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4">Note 2: Please enter your user id when asked during the payment. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<?php 
	if ($_SESSION['years']==1)
	{
	?>	
	<div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/107221"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png" /></a></div>
	<?php 
	}
	elseif ($_SESSION['years']==2)
	{
	?>
	<div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/C01404300B99EC3EA2C38A4098C1E654"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png" /></a></div>
	<?php 
	}
	elseif ($_SESSION['years']==3)
	{
	?>
	<div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/372B5E48E1440A26A76337F2290490FE"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png" /></a></div>
	<?php }?>
	</td>
  </tr>
</table>
<?php
}
//----------------------end of -----form_filled_1------function----------------------- 



//Function to display message thanking the customer for payment 
function pay_thanks() 
{
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4">Congratulations!!! You are now a happy subscriber of A+ Magazine. </td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4" >Thank you <strong><?php echo $_SESSION[‘f_name’] ?></strong> for your payment. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="style4">You will shortly receive a receipt email. Please keep this email safe for future references.<br />
Please do fill in the following details to enable us to send you the magazine. Please note that all fields are mandatory.
 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
}
//----------------------end of -----pay_thanks------function----------------------- 




?>