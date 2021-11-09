<?php 
session_start();
include('../config.php');
//require('u/fpdf.php');
require('WriteHTML.php');


$clcode  = $_POST['clcode'];
$cntrNo = $_POST['ContractNo'];  
$contrDeposit =  $_POST['contrDeposit'];

						
//======================================================================

$sql10 = "SELECT CD_CODE FROM code_sys WHERE CD_NAME='Receipt'";
$result10 = mysqli_query($con, $sql10);		
if (!$result10) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
	while($row10 = mysqli_fetch_assoc($result10)) 
	{
		$RcptNo=$row10["CD_CODE"];
		
	}
	mysqli_query($con,"update code_sys SET CD_CODE='".($RcptNo+1)."' WHERE CD_NAME='Receipt'");
}


//======================================================================
$sql12 = "SELECT * FROM customer C , contract_header CC WHERE CC.CL_CODE=C.CL_CODE AND CC.CONTR_NO='".$cntrNo."'";
$result12 = mysqli_query($con, $sql12);		
if (!$result12) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
	while($row12 = mysqli_fetch_assoc($result12)) 
	{
		$ClName=$row12["CL_TITLE"].' '.$row12["CL_NAME"];
		$ClNIC=$row12["CL_NIC"];
		$Clcode=$row12["CL_CODE"];
	}
}
//======================================================================

$pdf=new PDF_HTML();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial');
date_default_timezone_set('Asia/Colombo');

$pdf->WriteHTML('<HR><p ALIGN="left"><B><I>PS Ekamuth Enterprices</I></B><BR>No.50, Hill St, Dehiwala, <BR>Tel :- 011 2 710266 / 011 4 579517</p><BR>
					<P ALIGN="right">Receipt No :- '.$RcptNo.'</P><BR>
					<P ALIGN="right">'.date("Y-m-d h:i").'</P><P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR><P ALIGN="left">Contract No :- '.$cntrNo.'</P><BR><BR><P ALIGN="left">Client Code :- '.$Clcode.'</P><BR><P ALIGN="left">Client NIC :- '.$ClNIC.'</P><BR><P ALIGN="left">Client Name :- '.$ClName.'</P><BR><P ALIGN="center"><B>CONTRACT RECEIPT</B></P>
				<HR>');
				
$pdf->SetFont('Arial','',10);	
$pdf->Cell(10,5,'Code','LTB',0,'C',0);	
$pdf->Cell(70,5,'Desc','LTB',0,'C',0);
$pdf->Cell(10,5,'Basis','LTB',0,'C',0);
$pdf->Cell(10,5,'Count','LTB',0,'C',0);
$pdf->Cell(20,5,'Charge','LTB',0,'C',0);
$pdf->Cell(10,5,'Days','LTB',0,'C',0);
$pdf->Cell(15,5,'From','LTB',0,'C',0);
$pdf->Cell(25,5,'To','LTB',0,'C',0);
$pdf->Cell(20,5,'Total Amt','LRTB',0,'C',0);			
$pdf->WriteHTML('<BR>');


$sql11 = "SELECT * FROM contract_details C , items I WHERE CONTR_NO='".$cntrNo."' AND C.ITM_CODE=I.ITM_CODE";
$result11 = mysqli_query($con, $sql11);		
if (!$result11) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
     $tot=0;
	while($row11 = mysqli_fetch_assoc($result11)) 
	{
		$charge=0;
		if($row11["RNTL_BASIS"]=='Daily')
		{
			$charge=$row11["DLY_CHRG"];
		}
		else
		{
			$charge=$row11["MNLY_CHG"];
		}
		
		$date1=date_create(date("Y-m-d"));
		$date2=date_create($row11["H_TO"]);
		$Ddiff=date_diff($date1,$date2);
			
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(10,5,$row11["ITM_CODE"],'LTB',0,'L',0);	
		$pdf->Cell(70,5,($row11["ITM_NAME"].' '.$row11["SIZE"]),'LTB',0,'L',0);
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(10,5,$row11["RNTL_BASIS"],'LTB',0,'C',0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(10,5,$row11["ALLOWED_QTY"],'LTB',0,'C',0);
		$pdf->Cell(20,5,$charge,'LTB',0,'R',0);
		$pdf->Cell(10,5,$Ddiff->format("%d"),'LTB',0,'C',0);
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(15,5,date("Y-m-d"),'LTB',0,'L',0);
		$pdf->Cell(25,5,($row11["H_TO"].' 09:00 AM'),'LTB',0,'C',0);		
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(20,5,$row11["ITM_TOT"],'LRTB',0,'R',0);
		$pdf->WriteHTML('<BR>');
		
		$tot=$tot+$row11["ITM_TOT"];
		
	}
}
		/* for($i=0;$i<$rowCount;$i++)
		  {
		   $strng='';
		        //============================================
				for($j=0;$j<=9;$j++)
				{
					
					 $strng=$strng.$udxarr[$i][$j]." ";
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
				}

				$pdf->SetFont('Arial','',10);
				$pdf->Cell(20,5,$ItmCode,'LTB',0,'L',0);	
				$pdf->Cell(50,5,$ItmName,'LTB',0,'L',0);
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(20,5,$Hfrom,'LTB',0,'L',0);
				$pdf->Cell(20,5,$Hto,'LTB',0,'L',0);	
				$pdf->SetFont('Arial','',6);
				$pdf->Cell(20,5,$RtnedDate,'LTB',0,'L',0);
				$pdf->SetFont('Arial','',8);
				$pdf->Cell(20,5,$ItmTot,'LTB',0,'R',0);
				$pdf->Cell(20,5,$Pnlty,'LTB',0,'R',0);
				$pdf->Cell(20,5,($ItmTot+$Pnlty),'LRTB',0,'R',0);	
				$pdf->WriteHTML('<BR>');
				//echo $ItmCode." ".$ItmName." ".$Hfrom." ".$Hto." ".$NofDays." ".$DlyChrg." ".$ItmTot." ".$Pnlty." ".$CntrNo." ".$RtnedDate." ".'<br>';
		   } 	*/
		   
		   //============Itm total============================
		   //$pdf->Cell(150,5,'','',0,'L',0);		
		   //$pdf->Cell(20,5,'Item Total','LRTB',0,'L',0);
		   //$pdf->Cell(20,5,'$itmTot','LRTB',0,'R',0);
		   //$pdf->WriteHTML('<BR>');
		   //============pnlty total============================
		   //$pdf->Cell(150,5,'','',0,'L',0);		
		   //$pdf->Cell(20,5,'Penalty Total','LRTB',0,'L',0);
		   //$pdf->Cell(20,5,'$totPnlty','LRTB',0,'R',0);
		   //$pdf->WriteHTML('<BR>');
		   //============grand total============================
		   $pdf->SetFont('Arial','',10);	
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Total Rs.','LRTB',0,'R',0);
		   $pdf->Cell(20,5,$tot,'LRTB',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   //================ Deposit ==========================
		   $pdf->SetFont('Arial','',8);	
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Deposit Rs.','LRTB',0,'R',0);
		   $pdf->Cell(20,5,$contrDeposit,'LRTB',0,'R',0);
			
$pdf->WriteHTML('<BR><BR><HR><p ALIGN="center"><B>Thank You Come Again</B></p><HR>');				
				


$filename="../../docs/ContractReceipts/".$RcptNo.".pdf";
$pdf->Output($filename,'F');
echo $RcptNo;
?>



