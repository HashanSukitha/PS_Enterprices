<?php

function 1CustomerCreatedSMS($tp)
{
	$user = "94776629914";
	$password = "1529";
	$text = urlencode("Dear Valued Customer , Thank You for Registering with us. (PS Ekamuthu Enterprices)");
	$to = $tp;//"94783497220";
	
	
	$baseurl ="http://nssl.textit.biz/sendmsg";
	$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
	$ret = file($url);
	
	
	$res= explode(":",$ret[0]);
	
	//if (trim($res[0])=="OK")
	//{
	//echo "Message Sent - ID : ".$res[1];
	//}
	//else
	//{
	//echo "Sent Failed - Error : ".$res[1];
	//}
}

?>