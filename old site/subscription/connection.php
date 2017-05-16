<?php
$user = "sonajake_aplus";
$pass = "siby72";
$host = "localhost";
$db = mysql_connect($host, $user, $pass) or die("Unable to connect to MySQL");

mysql_select_db("sonajake_subscribe", $db) or die(mysql_error($db));

$_SESSION['r1'] = 480;
$_SESSION['r2'] = 900;
$_SESSION['r3'] = 1260;


$qu1 = "SELECT * FROM  user_details";	
$qu2 = "SELECT * FROM  user_details ORDER BY u_id";	

$qs1 = "SELECT * FROM  subscription";	
$qs2 = "SELECT * FROM  subscription ORDER BY u_id";	


$user_details = mysql_query($qu1, $db) or die(mysql_error($db));	
$user_details_order_id = mysql_query($qu2, $db) or die(mysql_error($db));	

$sub = mysql_query($qs1, $db) or die(mysql_error($db));	
$sub_order_id = mysql_query($qs1, $db) or die(mysql_error($db));	

?>