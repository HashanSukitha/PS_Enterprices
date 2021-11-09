<?php
session_start();
include('config.php');


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




$sql="CALL INS_ITEMS('".$itmCatCode."','".$itmCode."','".$ItmName."','".$size."','".$itmDlyChg."','".$itmDlyDpst."','".$itmMnlyChg."','".$itmMnlyDpst."','".$itmVal."','".$_SESSION['OFFI_CODE']."','".$itmQty."','".$itmType."')";




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