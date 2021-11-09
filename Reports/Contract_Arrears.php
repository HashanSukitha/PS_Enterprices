<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>



<?php
//===========================================================================================================================================

//===========================================================================================================================================
//$result1 =mysqli_query($con,"SELECT CONTR_NO'C_NO' FROM contract_header");

//if (!$result1) 
//{
//	die('Error: ' . mysqli_error($con));
//} 
//else 
//{
//	$i=1;
//	while($row1 = (mysqli_fetch_assoc($result1)))
//	{
			//echo $row1["C_NO"].'<br>';
//			$contract[$i] = $row1["C_NO"];
//			$i=$i+1;
//	}
//}
//===========================================================================================================================================
//echo sizeof($contract);
//for ($x = 1; $x <= sizeof($contract); $x++) 
//{
//".$contract[$x]."
$contrPnalty ='';
$rowCount=0;
$gblboxCount=0;
$shouldShow='';
//echo $contract[$x];

		$result =mysqli_query($con,"CALL RPT_CONTR_ARREARS_DET()");

				if (!$result) 
				{
					echo '<script>
							j(document).ready(function() 
							{
								j(".preloader").fadeOut("slow",function(){ j(".preloader").css("display", "none");      });
							});
						  </script>';
											
											
					die('Error: ' . mysqli_error($con));
				} 
				else 
				{
					
					
					//echo '<div id="contrRight">';
						//echo '<div id="CntrItmDetBox" style="overflow: scroll;">';
								echo '<div class="ContrItmDetHeaders">
										<p>Contract Arrears Details</p>
										<input type="button" value="Print All" id="ArrPrintAll" onclick="PrintArrSmryReport()"/>
										<input type="button" value="Print Arrears Only" id="ArrPrint" onclick="PrintArrOnlyReport()"/>
									  </div>';
								
								$rowCount=0;

				$contrNo='';
				$OldcontrNo='';
				$contrPnlty=0;
				$pnlty=0;
				$boxCount=00;
				$times=0;
				$clCode='';
				$clName=''; 
				$ContrAmt='';
				$ContrDate='';
				$ContrDepAmt='';
				$ClAdd1='';
				$ClAdd2='';
				$ClAdd3='';
				$ClTel1='';
				$ClTel2 ='';
				$ClTel3='';
				$ClNIC='';
				$ClEmail='';
						
							while($row = (mysqli_fetch_assoc($result)))
							{
					
									$contrPnlty=$contrPnlty+$pnlty;
									
								$contrNo=$row["CNTRNO"];
								if($OldcontrNo!=$contrNo)
								{

									if($times!=0)
									{
									
									
									
										
											echo '<table border="0" style="float:right">
													<tr class="ArrBillRowDesc">
														<td><p>Contract Amount</p></td>
														<td><p id="ArrBillContrTot">'.$ContrAmt.'</td>
													</tr>
													<tr class="ArrBillRowDesc">
														<td><p>Penalty Amount</p></td>
														<td><p id="ArrBillPnltyTot">'.$contrPnalty.'</td>
													</tr>
													<tr class="ArrBillRowDesc">
														<td><p>Sub Total</p></td>
														<td><p id="ArrBillSubTot">'.(floatval($ContrAmt)+floatval($contrPnalty)).'</td>
													</tr>
													<tr class="ArrBillRowDesc">
														<td><p>Deposit Amount</p></td>
														<td><p id="ArrBillDepAmt">'.$ContrDepAmt.'</td>
													</tr>
													
													<tr class="ArrBillRowDesc">
														'.calPending($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty))).'
													</tr>
												  </table>';
										$shouldShow = calPending($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty)));
										
								if(substr($shouldShow,7,1)=='P')
							 	{
								echo '<script> 
											j(document).ready(function() 
											{
							j("#'.$gblboxCount.'Box .RptContrHeader").append("<p class=\'topArr\'>'.calAmtArr($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty))).' /=</p>");
											});
										</script>';
								}
									}	
								
								$times=1;  
								
								//=================================================================================================
								
									$result10 =mysqli_query($con1,"SELECT * FROM contract_header C , customer CC WHERE C.CL_CODE=CC.CL_CODE AND	C.CONTR_NO='".$row["CNTRNO"]."'");
	
									if (!$result10) 
									{
										echo '<script>
												j(document).ready(function() 
												{
												j(".preloader").fadeOut("slow",function(){ j(".preloader").css("display", "none");      });
												});
											</script>';
											
										die('Error: ' . mysqli_error($con1));
									} 
									else 
									{
										while($row2 = (mysqli_fetch_assoc($result10)))
										{
										
											$clCode = $row2["CL_CODE"];
											$clName = $row2["CL_TITLE"].' '.$row2["CL_NAME"]; 
											$ContrAmt = $row2["CONTR_AMT"];
											$ContrDate = $row2["CONTR_DATE"];
											$ContrDepAmt = $row2["CONTR_DEP_TOT"];
											//echo $row2["CONTR_DEP_TOT"];
											$ClAdd1 = $row2["CL_ADD_B"];
											$ClAdd2 = $row2["CL_ADD_B"]; 
											$ClAdd3 = $row2["CL_ADD_W"];
											$ClTel1 = $row2["CL_TEL_B"]; 
											$ClTel2 = $row2["CL_TEL_P"];
											$ClTel3 = $row2["CL_TEL_W"];
											$ClNIC = $row2["CL_NIC"];
											$ClEmail = $row2["CL_EMAIL"];
										}
									}
								//mysqli_close($con1);
								//=================================================================================================
								
								echo '  </td>
									  </tr>
									</table>';
									
									//echo '<p>'.substr($shouldShow,7,1).'</p>';
								echo '</div>';
								
								if(substr($shouldShow,7,1)=='R')
							 	{
							 	
									echo '<script> 
											j(document).ready(function() 
											{
												j("#'.$gblboxCount.'Box").css("display", "none");
											});
										</script>';
							 	}
								
								$contrPnalty=0;
								
								
								
								echo '<div class="arrBillDetBox" id="'.$boxCount.'Box'.'">
<div class="RptContrHeader" onClick="toggleBox(\''.$boxCount.'Box'.'\')"><p>Contract No :- '.$row["CNTRNO"].'</p><input type="button" class="arrPrintBill" Value="Print" onClick="PrintContrArrBill('.$row["CNTRNO"].')" /></div>';
//client details and contract details
		echo '<table border="0" style="width:600px;">
				<tr>
					<td>
					<table border="0">
						<tr><td>Client Code<p id="ArrBillClcode">'.$clCode.'</P></td>
							<td>'.$row2["CONTR_NO"].'<p id="ArrBillClName">'.$clName.'</p></td>
						</tr>
					</table>
					</td>
				</tr>
			
				<tr>
					<td>
						<table border="0" style="float:left;">
							<tr><td>Contract Date :-</td><td><p id="ArrBilCntrDte">'.$ContrDate.'</p></td></tr>
							<tr><td>E-Mail :-</td><td><p id="ArrBilMail">'.$ClEmail.'</p></td></tr>
							<tr><td>NIC :-</td><td><p id="ArrBilNIC">'.$ClNIC.'</p></td></tr>
						</table>
						<table border="0" style="float:right;">
							<tr>
								<td>Bording :-</td><td><p id="ArrBilClTel1">'.$ClTel1.'</p></td>
								<td><p id="ArrBilClAdd1">'.$ClAdd1.'</p></td>
							</tr>
							<tr>
								<td>Permanent :-</td><td><p id="ArrBilClTel2">'.$ClTel2.'</p></td>
								<td><p id="ArrBilClAdd2">'.$ClAdd2.'</p></td>
							</tr>
							<tr>
								<td>Work Place :-</td><td><p id="ArrBilClTel3">'.$ClTel3.'</p></td>
								<td><p id="ArrBilClAdd3">'.$ClAdd3.'</p></td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td><hr>';				
							
										$gblboxCount=$boxCount;
												
												
												
									echo '<div id="SeltdItmGridHeader">
										<p id="itmCodeH">Code</p>
										<p id="itmNameH">Item</p>
										<p id="fromH">Hire From</p>
										<p id="toH">Hire To</p>
										<p id="nofDaysH">No:of Days</p>
										<p id="dlyChrg">Charge</p>
										<p id="qty">Qty</p>
										<p id="itmTotl">Item Total</p>
										<p id="itmPnlty">Item Penalty</p>
									</div>';	
												
									$OldcontrNo=$row["CNTRNO"];
									$contrPnlty=0;
									
									$boxCount=($boxCount+1);
								}		
									

				//==============================================================================================================================
												date_default_timezone_set('Asia/Colombo');
									
									$pnlty=0;
									$date1=date_create(date("Y-m-d"));
									$date2=date_create($row["HTO"]);
									$Ddiff=date_diff($date1,$date2);
									
								if($date2<=$date1)
								{
										$Ddiff=(($Ddiff->format("%a")));
										
										 if(date('H:i', time())>'09:00')
										 {
											$Ddiff=$Ddiff+1 ;
										 }
							
									if($row["BASIS"]=="Daily")
									{
										$pnlty=(( floatval($Ddiff) * floatval($row["DLYCHG1"]))*$row["TKNQTY1"]);
									}
									else
									{
										$pnlty=((  floatval($Ddiff) * floatval($row["MNTLY_CHG"]))*$row["TKNQTY1"]);
									}
									
									$contrPnalty=floatval($contrPnalty)+floatval($pnlty);
								}
								
								if($row["BASIS"]=='Daily')
								{
									$ItmTotal=floatval((floatval($row["DLYCHG1"])*$row["DAYS1"])*$row["TKNQTY1"]);
									$charge=$row["DLYCHG1"];
									
								}
								else
								{
									$ItmTotal=floatval((floatval($row["MNTLY_CHG"])*$row["DAYS1"])*$row["TKNQTY1"]);
									$charge=$row["MNTLY_CHG"];
									
								}
								
								
				//=========================================================================================================================	
									
									echo '<div id="'.$rowCount.'"  class="SlctdItmRow">
											<p class="codeVal">'.$row["ITM_CDE4"].'</p>
											<p class="nameVal">'.$row["ITMNM"].'</p>
											<p class="hirFrm"><input class="dts" id="fday"  type="text" value="'.$row["TAKEN_DAT"].'" readonly/></p>
											<p class="hirTo"><input class="dts" id="tday"  type="text" value="'.$row["HTO"].'" readonly/></p>
											<p class="noFDays"><input class="dts" type="text" value="'.$Ddiff.'" readonly/></p>
											<p class="dlyChrg"><input class="dts" type="text" value="'.$charge.'" readonly title="'.$row["BASIS"].'"/></p>
											<p class="qty"><input id="itmqty" class="dts" type="text" value="'.$row["TKNQTY1"].'" readonly  /></p>
											<p class="itmTot"><input class="dts" type="text" value="'.$ItmTotal.'" readonly/></p>
											<p class="itmPnlty"><input class="dts" type="text" value="'.$pnlty.'" readonly/></p>
											
											<p class="hidnVals" style="display:none;"><input type="hidden" id="takenId" value="'.$row["TAKEN_ID"].'"  /> </p>
											
											
										</div>'; 
									
			
									$rowCount=$rowCount+1;	
							   					
							}
							
							//if($ContrDepAmt<(floatval($ContrAmt)+floatval($contrPnalty)))
							//{
								
							//}
							
							
								echo '<table border="0" style="float:right">
											<tr class="ArrBillRowDesc">
												<td><p>Contract Amount</p></td>
												<td><p id="ArrBillContrTot">'.$ContrAmt.'</td>
											</tr>
											<tr class="ArrBillRowDesc">
												<td><p>Penalty Amount</p></td>
												<td><p id="ArrBillPnltyTot">'.$contrPnalty.'</td>
											</tr>
											<tr class="ArrBillRowDesc">
												<td><p>Sub Total</p></td>
												<td><p id="ArrBillSubTot">'.(floatval($ContrAmt)+floatval($contrPnalty)).'</td>
											</tr>
											<tr class="ArrBillRowDesc">
												<td><p>Deposit Amount</p></td>
												<td><p id="ArrBillDepAmt">'.$ContrDepAmt.'</td>
											</tr>
											
											<tr class="ArrBillRowDesc">
												'.calPending($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty))).'
											</tr>
											
										  </table>';
							 
							 $shouldShow = calPending($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty)));
							 
							if(substr($shouldShow,7,1)=='P')
							 	{
								echo '<script> 
											j(document).ready(function() 
											{
							j("#'.$gblboxCount.'Box .RptContrHeader").append("<p class=\'topArr\'>'.calAmtArr($ContrDepAmt,(floatval($ContrAmt)+floatval($contrPnalty))).' /=</p>");
											});
										</script>';
								}
							 
							 
							 
							 
							 
							 
							
							
				//=============================================================================================================================================	
				
						
				//=============================================================================================================================================					
							//echo '</div>';
						//echo '</div>';
						
 
				}
//} 
//=========================================================================================
//=========================================================================================



mysqli_close($con);

function calPending($depAmt,$SubTot)
{
$pay='';
$amt=(floatval($SubTot)-floatval($depAmt));

	if($amt<0)
	{
		$amt=$amt*-1;
		$pay='<td><p>Refunding Amount</p></td><td><p id="ArrBillpndngAmt">'.$amt.'</p></td>';
			  
	}
	elseif($amt>=0)
	{
		$pay='<td><p>Penging Amount</p></td>
			  <td><p id="ArrBillpndngAmt">'.$amt.'</p></td>';
	}
	return $pay;
}

function calAmtArr($depAmt,$SubTot)
{
$pay='';
$amt=(floatval($SubTot)-floatval($depAmt));

	if($amt<0)
	{
		$amt=$amt*-1;
		$pay=$amt;
			  
	}
	elseif($amt>=0)
	{
		$pay=$amt;
	}
	return $pay;
}

?>
<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>





</div>