<?php
session_start();
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');


$itmCatCode=$_POST['itmCatCode'];
$itmCode=$_POST['itmCode'];
$ItmName=$_POST['ItmName'];
$size=$_POST['size'];
$itmDlyChg=$_POST['itmDlyChg'];
$itmDlyDpst=$_POST['itmDlyDpst'];
$itmMnlyChg=$_POST['itmMnlyChg'];
$itmMnlyDpst=$_POST['itmMnlyDpst'];
$itmVal=$_POST['itmVal'];
$itmType=$_POST['itmType'];
$itmQty=$_POST['itmQty'];
$itmOriCode=$_POST['itmOriCode'];//contains original item code before update







$sql="UPDATE items SET ITM_CAT_CODE='".$itmCatCode."', ITM_CODE='".$itmCode."', ITM_NAME='".$ItmName."', SIZE='".$size."', ITM_DLY_CHG='".$itmDlyChg."', ITM_DLY_DPST='".$itmDlyDpst."', ITM_MNLY_CHG='".$itmMnlyChg."', ITM_MNLY_DPST='".$itmMnlyDpst."', ITM_VAL='".$itmVal."', ITM_QTY='".$itmQty."', ITM_TYPE='".$itmType."' WHERE ITM_CODE='".$itmOriCode."'";




$res=mysqli_query($con,$sql);


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  echo '<div id="cretMsgContainer">
		<div class="cretMsg">Ooooops, Sorry</div>
		<div>Page is broken</div>
	  </div>
	 '; 
  }
else
{
	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
		  echo $row[0]; 
} 
?>