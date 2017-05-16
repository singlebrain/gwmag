<?php

// Error message function used in form ptocess.php
function errormesg_1() 
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
    <td colspan="2" align="center"><?php echo $_SESSION[‘message’]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="javascript:history.back()">Back</a></td>
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
    <td colspan="2" align="center">Thank you <b><?php echo $_SESSION[‘f_name’] . " " ?></b>for subscribing to the magazine.<br />
    Please go ahead amd make the payment using the button given below. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Note 1 : Your user id is: <b><?php echo $_SESSION[‘user_id’] ?></b> </td>
  </tr>
  <tr>
    <td colspan="2" align="center">Note 2: Please enter your user id when asked during the payment. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div class="pm-button"><a href="https://www.payumoney.com/paybypayumoney/#/F1C1D2E68A763D8609BD13643D9D9CC8"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png" /></a></div></td>
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
    <td colspan="2" align="center">Congratulations!!! You are now a happy subscriber of A+ Magazine. </td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Thank you <strong><?php echo $_SESSION[‘f_name’] ?></strong> for your payment. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">You will shortly receive a receipt email. Please keep this email safe for future references. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
}
//----------------------end of -----pay_thanks------function----------------------- 


// Error message function 2
function errormesg_2() 
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
    <td colspan="2" align="center"><?php echo $_SESSION[‘message’]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

<?php
}
//----------------------end of -----Error message  2 ------function----------------------- 



function errormesg_3() 
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
    <td colspan="2" align="center"><?php echo $_SESSION[‘message’]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="../admin">Login</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php 
}

?>