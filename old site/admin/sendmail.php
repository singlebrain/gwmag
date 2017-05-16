<?php 
session_start();

//Include files
include 'connection.php';
include 'functions.php'; 

//receive variables
$flag = $_POST['flag'];
$_SESSION[‘sub’] = $_POST['sub'];
$_SESSION[‘body’] = $_POST['body'];

//Define variables
$hasvalue = 1;
$do = 1;


if (strlen($flag)== 0) 
{	
	$do = 0;
}	

if ($do == 1)
{
	//Check for empty
	if (strlen($sub)==0) 
	{		
		$_SESSION[‘dispmsg’] = "Your subject field is left empty!!!";
		display();
		$hasvalue = 0;
	}	
	elseif (strlen($body)==0) 
	{		
		$_SESSION[‘dispmsg’] = "Your body field is left empty!!!";
		display();
		$hasvalue = 0;
	}	
	
	if ($hasvalue == 1)
	{
		//Fetch User Id from subscription table i.e those who have paid
		$query = "SELECT email FROM  user_details";	
		$result = mysql_query($query, $db) or die(mysql_error($db));	
				
		while ($row = mysql_fetch_array($result)) 
		{
			extract($row);
					
			$_SESSION[‘email’] = $email;
							
			sendmail();	
		}	
		
		$_SESSION[‘dispmsg’] = "Your mail has been sent to all!!!";
		display();
	
	}
}


function sendmail()
{
		
	$mesg = $_SESSION[‘body’];
	
	$email_from = "contact@giantwheelmag.com";
	$email_subject = $_SESSION[‘sub’];
	$email_body = $mesg;
	
	$to =  $_SESSION[‘email’];
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $email_from \r\n";
	$headers .= "Reply-To: contact@giantwheelmag.com \r\n";		
	
	mail($to,$email_subject,$email_body,$headers);	

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Send Email</title>
</head>

<body>

  <form id="form1" name="form1" method="post" action="sendmail.php">
    <table width="542" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td width="138">&nbsp;</td>
        <td width="217">&nbsp;</td>
      </tr>
      <tr>
        <td>Subject:</td>
        <td><label>
          <input name="sub" type="text" id="sub" size="70" />
        </label></td>
      </tr>
      <tr>
        <td valign="top">Body:</td>
        <td><label>
          <textarea name="body" cols="70" rows="10" id="body"></textarea></label></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top"><label>
          <input name="flag" type="hidden" id="flag" value="1" />
          <input type="submit" name="Submit" value="Submit" />
        </label></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="top"><a href="javascript:history.back();">&lt;&lt;Back</a></td>
      </tr>
    </table>
  </form>
<p>&nbsp;</p>
<?php 
function display()
{
?>
  <table width="389" border="0" align="center" cellpadding="0" cellspacing="10">
    <tr>
      <td align="center"><?php echo $_SESSION[‘dispmsg’];?> </td>
    </tr>
  </table>
<?php 
	$_SESSION[‘dispmsg’] = "";
}
 ?>  
  <p>&nbsp;</p>
</body>
</html>
