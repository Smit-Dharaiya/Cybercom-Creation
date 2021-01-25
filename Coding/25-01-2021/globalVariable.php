<?php 

$ip = $_SERVER['REMOTE_ADDR'];

function ipadd()
{
	global $ip;
	echo "Your ip is : ".$ip;
}
ipadd();

 ?>