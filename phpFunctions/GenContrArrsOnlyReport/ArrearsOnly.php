<?php
session_start();
include('../config.php');
//require('u/fpdf.php');
require('../GenItmRtnBill/WriteHTML.php');


$pdf=new PDF_HTML();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial');
date_default_timezone_set('Asia/Colombo');

$pdf->WriteHTML('<HR><p ALIGN="left"><B><I>PS Ekamuth Enterprices</I></B><BR>No.50, Hill St, Dehiwala, <BR>Tel :- 011 2 710266 / 011 4 579517</p><BR>
					<P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR><P ALIGN="center"><B>Contract Arrears Report</B></P><P ALIGN="center"><B>( '.date("Y-m-d h:i").' )</B></P>
				<HR>');	

$pdf->SetFont('Arial','',7);	
$pdf->Cell(10,5,'Contract','LTB',0,'C',0);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,5,'Client Name','LTB',0,'C',0);
$pdf->SetFont('Arial','',6);
$pdf->Cell(15,5,'Contract Amt','LTB',0,'C',0);
$pdf->Cell(15,5,'Arrears Amt','LTB',0,'C',0);	
$pdf->Cell(15,5,'Arrears Days','LTB',0,'C',0);	
$pdf->Cell(15,5,'Deposit','LTBR',0,'C',0);
$pdf->Cell(15,5,'Pending','LTBR',0,'C',0);
$pdf->WriteHTML('<BR>');				
//===========================================================================================================================================

$contrPnalty ='';
$rowCount=0;
$totPnlty=0;
$cntrNum='';
$clientName='';
$afterDepsit=0;
//echo $contract[$x];

		$result =mysqli_query($con,"CALL RPT_CONTR_ARREARS_DET()");

				if (!$result) 
				{		
					die('Error: ' . mysqli_error($con));
				} 
				else 
				{

								
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
										if(($ContrDepAmt-($ContrAmt+$contrPnalty))>=0)
										{
										}
										else
										{
											$pdf->SetFont('Arial','',11);	
											$pdf->Cell(10,5,$cntrNum,'LTB',0,'C',0);
											$pdf->SetFont('Arial','',7);
											$pdf->Cell(100,5,$clientName,'LTB',0,'L',0);
									
											$pdf->SetFont('Arial','',8);
											$pdf->Cell(15,5,$ContrAmt,'LTB',0,'R',0);
											$pdf->Cell(15,5,$contrPnalty,'LTB',0,'R',0);
											$pdf->Cell(15,5,$Ddiff,'LTB',0,'R',0);
											$pdf->Cell(15,5,$ContrDepAmt,'LTBR',0,'R',0);
											$pdf->Cell(15,5,(($ContrDepAmt-($ContrAmt+$contrPnalty))*-1),'LTBR',0,'R',0);
											
											$afterDepsit=$afterDepsit+(($ContrDepAmt-($ContrAmt+$contrPnalty))*-1);
											
											$totPnlty=$totPnlty+$contrPnalty;
			
											$pdf->WriteHTML('<BR>');
										}
									}	
								
								$times=1;  
								
								//=================================================================================================
								
									$result10 =mysqli_query($con1,"SELECT * FROM contract_header C , customer CC WHERE C.CL_CODE=CC.CL_CODE AND	C.CONTR_NO='".$row["CNTRNO"]."'");
	
									if (!$result10) 
									{	
										die('Error: ' . mysqli_error($con1));
									} 
									else 
									{
										while($row2 = (mysqli_fetch_assoc($result10)))
										{
										
											$clCode = $row2["CL_CODE"];
											$clName = $row2["CL_TITLE"].$row2["CL_NAME"]; 
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

								//=================================================================================================

								$contrPnalty=0;
								
								





						
					$cntrNum=$row["CNTRNO"];
					$clientName='('.$clCode.') '.$clName.' ( '.$ClTel1.','.$ClTel2.','.$ClTel3.' )';
								
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
									
									
			
									$rowCount=$rowCount+1;	
							   					
							}
							if(($ContrDepAmt-($ContrAmt+$contrPnalty))>=0)
							{
							}
							else
							{
								$pdf->SetFont('Arial','',11);	
								$pdf->Cell(10,5,$cntrNum,'LTB',0,'C',0);
								$pdf->SetFont('Arial','',7);
								$pdf->Cell(100,5,$clientName,'LTB',0,'L',0);
								
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(15,5,$ContrAmt,'LTB',0,'R',0);
								$pdf->Cell(15,5,$contrPnalty,'LTBR',0,'R',0);
								$pdf->Cell(15,5,$Ddiff,'LTB',0,'R',0);
								$pdf->Cell(15,5,$ContrDepAmt,'LTBR',0,'R',0);
								$pdf->Cell(15,5,(($ContrDepAmt-($ContrAmt+$contrPnalty))*-1),'LTBR',0,'R',0);
								
								$afterDepsit=$afterDepsit+(($ContrDepAmt-($ContrAmt+$contrPnalty))*-1);
							}
							
							$totPnlty=$totPnlty+$contrPnalty;
							
							$pdf->WriteHTML('<BR>');
							
							$pdf->Cell(10,5,'','',0,'R',0);
							$pdf->Cell(100,5,'','',0,'R',0);
							$pdf->Cell(15,5,'','LTB',0,'R',0);
							$pdf->Cell(15,5,$totPnlty,'LTBR',0,'R',0);
							$pdf->Cell(15,5,'','LTB',0,'R',0);
							$pdf->Cell(15,5,'','LTBR',0,'R',0);
							$pdf->Cell(15,5,$afterDepsit,'LTBR',0,'R',0);
								
								
								
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
		$pay='<td><p>Refunding Amount</p></td>
			  <td><p id="ArrBillpndngAmt">'.$amt.'</p></td>';
	}
	elseif($amt>=0)
	{
		$pay='<td><p>Penging Amount</p></td>
			  <td><p id="ArrBillpndngAmt">'.$amt.'</p></td>';
	}
	return $pay;
}


$pdf->WriteHTML('<BR><BR><HR><p ALIGN="center"><B>Thank You Come Again</B></p><HR>');				
				


$filename="../../docs/ContrArrsOnlyReport/ArrsOnlyReport.pdf";
$pdf->Output($filename,'F');
echo $filename;
?>
