<?php 
session_start();

//Include
include 'connection.php';
include 'functions.php'; 

//Flag variable set
$flag = 1;
$proceed = 0;

//Get user details fromt the user tables
$query = 'SELECT * FROM user_details ORDER BY pincode';
$result = mysql_query($query, $db) or die(mysql_error($db));	

//A trick to limit the address in A4
$count = 0;
$height = 20;

?>

<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="style1">

<?php

while ($row = mysql_fetch_array($result)) 
{
	extract($row);
	$uid = $u_id;	
	
	//Get user ID freom subrcription table to see if the payment has been done
	$query2 = 'SELECT * FROM subscription';
	$result2 = mysql_query($query2, $db) or die(mysql_error($db));	
			
	while ($row2 = mysql_fetch_array($result2))
	{
		extract($row2);
		
		if ($u_id == $uid) //Matching the user id in user details table with subscription table
		{
			$proceed = 1; //Record found
			$count = $count + 1;
			if ($count > 24)
			{
				$count = 1;
			} 
		}
	}	
		
	if ($proceed == 1)
	{
		$name= $f_name . " " . $l_name;
		$add = $r_add1 . "<br>" . $r_add2 . "<br>" . $city ." - ". $pincode.  "&nbsp; &nbsp; &nbsp; Ph: " . $phone ;  	
		$proceed = 0;	
			
		if ($flag == 1) //To populate the first colunm
		{  
		?>
				<tr><td width="515" height="122"  valign="top"><strong><?php echo $name; ?> </strong><br>
				  <?php echo $add; ?></td>
		<?php 
			$flag = 2; 
		}
		elseif ($flag == 2) //Populate the second colunm
		{
		?>    				
    				<td width="485"  valign="top"><strong><?php echo $name;?></strong><br><?php echo $add; ?></td>
		<?php 
			$flag = 3;
		}		
		if ($flag == 3)
		{
		?>
			 	</tr>
		<?php 					
			if ($count == 24) 
			{				
				/*echo "<tr><td height='". $height ."'></td></tr>"; 
				$height = $height + 5;*/									
			}							
			$flag = 1;
		}
	}	
}	
?>
</table>

<?php 
mysql_close($db);

?>
