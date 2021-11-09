<?php
include('config.php');


/*$udxarr    = json_decode(str_replace('\\', '', $_POST['newOrder'])); */
$rowCount  = $_POST['rows'];
$ClintCode = $_POST['CliCode'];
$Camt=$_POST['cntrAmt'];

$CnfItms=$_POST['nfItms'];
$CdepAmt=$_POST['cDepAmt'];

$ContrNo=$_POST['ContrNo'];
$ContrDate=$_POST['cDate'];
//=============================================================================

//$sql="CALL SAV_CONTRACT('".$ClintCode."','".$Camt."','".$Cdate."','".$CnfItms."','".$CdepAmt."',@CONTR_NO)";

//mysqli_query($con,$sql);
//$res=mysqli_query($con, "SELECT @CONTR_NO");


//if (!$res)
//  {
//  die('Error: ' . mysqli_error($con));
//  }
//else
//{
//	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
		   	
		  //============================================
		//  for($i=0;$i<$rowCount;$i++)
		 // {
		 //  $strng='';
		        //============================================
			//	for($j=0;$j<=7;$j++)
			//	{
					
					/* $strng=$strng.$udxarr[$i][$j]." ";
					
					$ItmCode=$udxarr[$i][0];
					$ItmName=$udxarr[$i][1];
					$Hfrom=$udxarr[$i][2];
					$Hto=$udxarr[$i][3];
					$NofDays=$udxarr[$i][4];
					$DlyChrg=$udxarr[$i][5];
					$ItmTot=$udxarr[$i][6];
					$Depst=$udxarr[$i][7];
					
				}
				if($udxarr[$i][0]!='-')
				{ */
					//$sql="CALL SAV_CONTR_ITMS ('".$row[0]."','".$ItmCode."','".$NofDays."','".$DlyChrg."','".$Hfrom."','".$Hto."','".$Depst."','".$ItmTot."')";
					//mysqli_query($con,$sql);
				//}
				//============================================
		   //} 
		   //============================================
		  // echo $row[0];
		  $file = fopen("../docs/Receipts/test.txt","w");
		  



		  	echo fwrite($file,"==============================".PHP_EOL);
			echo fwrite($file,"==== P S Ekamuthu Enterprices  =====".PHP_EOL);
			echo fwrite($file," No.50, Hill St, Dehiwala, Tel:077635821".PHP_EOL);
			echo fwrite($file,"==============================".PHP_EOL);
			echo fwrite($file,$ContrDate."         Receipt No. 30".PHP_EOL);
			echo fwrite($file,"==============================".PHP_EOL);
			echo fwrite($file,"           ITEM DEPOSIT RECEIVED".PHP_EOL);
			echo fwrite($file," ".PHP_EOL);
			echo fwrite($file,"Contract No :- ".$ContrNo.PHP_EOL);
			echo fwrite($file,"Client     No :- ".$ClintCode.PHP_EOL);
			echo fwrite($file,"--------------------------------------------------------".PHP_EOL);
			echo fwrite($file,"Contract Amount :- Rs.".$Camt.PHP_EOL);
			echo fwrite($file,"Deposit Amount  :- Rs.".$CdepAmt.PHP_EOL);
			echo fwrite($file," ".PHP_EOL);
			echo fwrite($file,"==============================".PHP_EOL);
			echo fwrite($file,"======  Thank You Come Again  =====".PHP_EOL);
			echo fwrite($file,"==============================".PHP_EOL);


			
		  fclose($file);
//} 



?>