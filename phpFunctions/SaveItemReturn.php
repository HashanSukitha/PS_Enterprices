<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('config.php');
include('../SMS/ItmReturnedSMS.php');


$udxarr    = json_decode(str_replace('\\', '', $_POST['newOrder']));
$rowCount  = $_POST['rows'];
$payingAmt = $_POST['payingAmt'];
//$ClintCode = $_POST['CliCode'];
//$Camt=$_POST['cntrAmt'];
//$Cdate=$_POST['cntrDate'];
//$CnfItms=$_POST['nfItms'];
//$CdepAmt=$_POST['cDepAmt'];

//=============================================================================

//$sql="CALL SAV_CONTRACT('".$ClintCode."','".$Camt."','".$Cdate."','".$CnfItms."','".$CdepAmt."',@CONTR_NO)";

//mysqli_query($con,$sql);
//$res=mysqli_query($con, "SELECT @CONTR_NO");


//if (!$res)
//  {
 // die('Error: ' . mysqli_error($con));
//  }
//else
//{
//	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	 
	$CntrNo='';	   	
		  //============================================
		  for($i=0;$i<$rowCount;$i++)
		  {
		   $strng='';
		        //============================================
				for($j=0;$j<=13;$j++)
				{
					
					 //$strng=$strng.$udxarr[$i][$j]." ";
					//echo $strng;
					//echo "<br>";
					//SAV_CONTR_ITMS
					$ItmCode=$udxarr[$i][0];
					$ItmName=$udxarr[$i][1];
					$Hfrom=$udxarr[$i][2];
					$Hto=$udxarr[$i][3];
					$NofDays=$udxarr[$i][4];
					$DlyChrg=$udxarr[$i][5];
					$ItmTot=$udxarr[$i][6];
					$Pnlty=$udxarr[$i][7];
					$CntrNo=$udxarr[$i][8];
					$RtnedDate=$udxarr[$i][9];
					$RtngQty=$udxarr[$i][10];
					$IsPartial=$udxarr[$i][11];
					$tknID=$udxarr[$i][12];
					$basis=$udxarr[$i][13];
					
					
				}
				//echo $strng.'<br>';
				
echo $ItmCode." ".$ItmName." ".$Hfrom." ".$Hto." ".$NofDays." ".$DlyChrg." ".$ItmTot." ".$Pnlty." ".$CntrNo." ".$RtnedDate." ".$_SESSION['OFFI_CODE']." ".$RtngQty." ".$IsPartial." ".$tknID." ".$basis.'<br>';


//=========================================================================================
$res1='';$res2='';$res3='';$res4='';$res5='';$res6='';$res7='';$res8='' ;$res9=''; $res10=''; $res11=''; $res13='';

				if($IsPartial=='no')
				{
				//======================================================================================
$res1=mysqli_query($con,"update item_taken SET RETURNED_QTY=(RETURNED_QTY+".$RtngQty.") WHERE CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."' AND TAKEN_ID='".$tknID."'");
					if (!$res1)
					{
						 die('Error: at Query 1' . mysqli_error($con));
					}
$res2=mysqli_query($con,"update contract_details SET PNLTY_AMT=(PNLTY_AMT+".$Pnlty.") , RTNED_OFFI_CODE='".$_SESSION['OFFI_CODE']."' , RETURN_DATE='".$RtnedDate."', RETURN_STS='YES' where CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."'");
					if (!$res2)
					{
						 die('Error: at Query 2' . mysqli_error($con));
					}
				//======================================================================================
				}
				elseif($IsPartial=='yes')
				{
				//======================================================================================
$res3=mysqli_query($con,"update contract_details SET PNLTY_AMT=(PNLTY_AMT+".$Pnlty.")  where CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."'");
					if (!$res3)
					{
						 die('Error: at Query 3' . mysqli_error($con));
					}
$res4=mysqli_query($con,"update item_taken SET RETURNED_QTY=(RETURNED_QTY+".$RtngQty.") WHERE CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."' AND TAKEN_ID='".$tknID."'");
					if (!$res4)
					{
						 die('Error: at Query 4' . mysqli_error($con));
					}
				//======================================================================================
				}
				elseif($IsPartial=='Final')
				{
				//======================================================================================
$res5=mysqli_query($con,"update item_taken SET RETURNED_QTY=(RETURNED_QTY+".$RtngQty.") WHERE CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."' AND TAKEN_ID='".$tknID."'");
					if (!$res5)
					{
						 die('Error: at Query 5' . mysqli_error($con));
					}
$res6=mysqli_query($con,"update contract_details SET PNLTY_AMT=(PNLTY_AMT+".$Pnlty.") , RTNED_OFFI_CODE='".$_SESSION['OFFI_CODE']."' , RETURN_DATE='".$RtnedDate."' , RETURN_STS='YES' where CONTR_NO='".$CntrNo."' AND ITM_CODE='".$ItmCode."'");
					if (!$res6)
					{
						 die('Error: at Query 6' . mysqli_error($con));
					}
				//======================================================================================
				}
					$isPaid='';
					
					if(floatval($payingAmt)>0)
					{
						$isPaid='yes';
					}
					elseif(floatval($payingAmt)==0 || floatval($payingAmt)=='')
					{
						$isPaid='no';
					}
					
$res7=mysqli_query($con,"INSERT INTO item_return(ITM_CODE,CONTR_NO,RTN_DATE,RTN_QTY,OFFI_CODE,PNLTY_AMT,AMT,PAID_AMT,PAID) VALUES('".$ItmCode."','".$CntrNo."','".$RtnedDate."','".$RtngQty."','".$_SESSION['OFFI_CODE']."','".$Pnlty."','".$ItmTot."','".$payingAmt."','".$isPaid."')");
					if (!$res7)
					{
						 die('Error: at Query 7' . mysqli_error($con));
					}

//========================================== AUTO CLOSE CONTRACT ======================================================

				$sql12 = "SELECT COUNT(*)'IS_ALL_RETURNED' FROM contract_details WHERE CONTR_NO='".$CntrNo."' AND RETURN_STS='NO'";
				$res8 = mysqli_query($con, $sql12);		
				if (!$res8)
				{
							 die('Error: at Query 8' . mysqli_error($con));
				}
				else
				{
					while($row12 = mysqli_fetch_assoc($res8)) 
					{
						$IsAllRtned=$row12["IS_ALL_RETURNED"];
					}
				}
					if($IsAllRtned==0)
					{
						$res9=mysqli_query($con,"update contract_header SET CONTR_STS='I' , CONTR_CLOSE_DATE='".$RtnedDate."' WHERE CONTR_NO='".$CntrNo."'");
						if (!$res9)
						{
							 die('Error: at Query 9' . mysqli_error($con));
						}
					}
				
//====================================================================================================================
					$Itype='';
				$res10 = mysqli_query($con, "SELECT ITM_TYPE FROM items WHERE ITM_CODE='".$ItmCode."'");		
					if (!$res10)
					{
						 die('Error: at Query 10' . mysqli_error($con));
					}
					else
					{
						while($row12 = mysqli_fetch_assoc($res10)) 
						{
							$Itype=$row12["ITM_TYPE"];
						}
					}
					
					
					if($Itype=='Individual')
					{
						$res11=mysqli_query($con,"update items SET ITM_STS='A' WHERE ITM_CODE='".$ItmCode."'");
						if (!$res11)
						{
						 die('Error: at Query 11' . mysqli_error($con));
						}
					}
					else
					{
						$res12=mysqli_query($con,"update items SET ITM_QTY=(ITM_QTY+".$RtngQty.") WHERE ITM_CODE='".$ItmCode."'");
						if (!$res12)
						{
						 die('Error: at Query 12' . mysqli_error($con));
						}
					}
				
//====================================================================================================================
$res13=mysqli_query($con,"update contract_header SET PENALTY_AMT=(PENALTY_AMT+".$Pnlty."), PAID_AMT=(PAID_AMT+".$payingAmt.")  where CONTR_NO='".$CntrNo."'");
					if (!$res13)
					{
						 die('Error: at Query 13' . mysqli_error($con));
					}							

		   } 

ItemReturnedSMS($CntrNo,$con);



?>