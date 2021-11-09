<?php
include('../phpFunctions/config.php');


//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');


function ContrCreatedSMS($ContrNo,$con5)
{
	$tp='';
	
		$sql5 = "SELECT CL_TEL_B,
	   				   CL_TEL_P,
	   				   CL_TEL_W 
				FROM `contract_header` C , `customer` CL
				WHERE C.CL_CODE=CL.CL_CODE AND
	  				  C.CONTR_NO='".$ContrNo."' ";
					  
		
				  
		$result5 = mysqli_query($con5, $sql5);
		if (!$result5) 
		{
			die('Error: loc 1' . mysqli_error($con5));
		} 
		else 
		{
			while($row5 = mysqli_fetch_assoc($result5)) 
			{
			
				if(substr($row5["CL_TEL_B"],0,2)=='07')
				{
					$tp=$row5["CL_TEL_B"];
				}
				elseif(substr($row5["CL_TEL_P"],0,2)=='07')
				{
					$tp=$row5["CL_TEL_P"];
				}
				elseif(substr($row5["CL_TEL_W"],0,2)=='07')
				{
					$tp=$row5["CL_TEL_W"];
				}
			}
		}





	//$user = "94776629914";
	//$password = "1529";
	//$text = urlencode("Dear Valued Customer , You Contract Numner is ".$ContrNo." ---Thank You--- (PS Ekamuthu Enterprices)");
	//$to = $tp;
	
	
	//$baseurl ="http://nssl.textit.biz/sendmsg";
	//$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
	//$ret = file($url);
	
	
	//$res= explode(":",$ret[0]);
	
	//-------------------------------------------------------------------------------------
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