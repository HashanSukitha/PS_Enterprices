<?php
include('config.php');
//include('../SMS/customerCreated_SMS.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
//include($root.'/SMS/customerCreated_SMS.php');



$clcode=$_POST['clcode'];
$clTitle=$_POST['clTitle'];
$name=$_POST['name'];
$clNIC=$_POST['clNIC'];
$clCurrAdd=$_POST['clCurrAdd'];
$clPerAdd=$_POST['clPerAdd'];
$clWrkAdd=$_POST['clWrkAdd'];
$clCurTel=$_POST['clCurTel'];
$clPerTel=$_POST['clPerTel'];
$clWrkTel=$_POST['clWrkTel'];
$clEmail=$_POST['clEmail'];
//=======================================
$guTitle=$_POST['guTitle'];
$guName=$_POST['guName'];
$guCurAdd=$_POST['guCurAdd'];
$guPerAdd=$_POST['guPerAdd'];
$guCurTel=$_POST['guCurTel'];
$guPerTel=$_POST['guPerTel'];
$guWrkTel=$_POST['guWrkTel'];
$guEmail=$_POST['guEmail'];
$guNIC=$_POST['guNIC'];



 $sql="UPDATE `customer` SET  				   
 							`CL_TITLE`='".$clTitle."',
 							`CL_NAME`='".$name."',
 							`CL_ADD_B`='".$clCurrAdd."',
 							`CL_ADD_P`='".$clPerAdd."',
 							`CL_ADD_W`='".$clWrkAdd."',
 							`CL_TEL_B`='".$clCurTel."',
 							`CL_TEL_P`='".$clPerTel."',
 							`CL_TEL_W`='".$clWrkTel."',
 							`CL_NIC`='".$clNIC."',
 							`CL_EMAIL`='".$clEmail."'
		WHERE `CL_CODE`='".$clcode."'";
 
 
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
	//$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
	//	  echo $row[0]; 
} 

//=========================================================================================================================================
$sql="UPDATE `guarantor` SET 
			 				`CLCODE`='".$clcode."',
			 				`GU_TITLE`='".$guTitle."',
			 				`GU_NAME`='".$guName."',
			 				`GU_ADD_B`='".$guCurAdd."',
			 				`GU_ADD_P`='".$guPerAdd."',
			 				`GU_TEL1`='".$guCurTel."',
			 				`GU_TEL2`='".$guPerTel."',
			 				`GU_TEL3`='".$guWrkTel."',
			 				`GU_NIC`='".$guNIC."',
			 				`GU_EMAIL`='".$guEmail."'
WHERE `CLCODE`='".$clcode."'";
 
 
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
	//$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
	//	  echo $row[0]; 
} 
?>