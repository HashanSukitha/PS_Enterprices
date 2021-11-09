<?php 
session_start();
include('../config.php');
//require('u/fpdf.php');
require('../GenItmRtnBill/WriteHTML.php');


$cntrNo = $_POST['cntrNo'];

$clCode ='';
$clName =''; 
$ContrAmt ='';
$ContrDate ='';
$ContrDepAmt ='';
$ClAdd1 ='';
$ClAdd2 = ''; 
$ClAdd3 = '';
$ClTel1 = ''; 
$ClTel2 = '';
$ClTel3 = '';
$ClNIC = '';
$ClEmail = '';

$pnlty=0;
$totPnlty=0;

						
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
//=================================================================================================
								
	$result10 =mysqli_query($con1,"SELECT * FROM contract_header C , customer CC WHERE C.CL_CODE=CC.CL_CODE AND	C.CONTR_NO='".$cntrNo."'");
	
	if (!$result10) 
	{
										
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
			$ClAdd2 = $row2["CL_ADD_P"]; 
			$ClAdd3 = $row2["CL_ADD_W"];
			$ClTel1 = $row2["CL_TEL_B"]; 
			$ClTel2 = $row2["CL_TEL_P"];
			$ClTel3 = $row2["CL_TEL_W"];
			$ClNIC = $row2["CL_NIC"];
			$ClEmail = $row2["CL_EMAIL"];
		}								
	}
								
//=================================================================================================
//======================================================================

$pdf=new PDF_HTML();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial');
date_default_timezone_set('Asia/Colombo');

/*$pdf->WriteHTML('<HR><p ALIGN="left"><B><I>PS Ekamuthu Enterprises</I></B><BR>No.50, Hill St, Dehiwala, <BR>Tel :- 011 2 710266 / 011 4 579517</p><BR>			<P ALIGN="right">Receipt No :- '.$RcptNo.'</P><BR><P ALIGN="right">'.date("Y-m-d h:i").'</P><P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR><P ALIGN="left">Contract No :- '.$cntrNo.'</P><BR><P ALIGN="center"><B>Contract Arrears Receipt</B></P><BR><P ALIGN="left"><B>'.$clName.'</B></P><BR><P ALIGN="left">Tel B:- '.$ClTel1.'</P><BR><P ALIGN="left">Tel P:- '.$ClTel2.'</P><BR><P ALIGN="left">Tel W:- '.$ClTel3.'</P><BR><P ALIGN="left">Address B:- '.$ClAdd1.'</P><BR><P ALIGN="left">Address P:- '.$ClAdd2.'</P><BR><P ALIGN="left">Address W:- '.$ClAdd3.'</P><BR><P ALIGN="left">E-Mail :- '.$ClEmail.'</P><BR><P ALIGN="left">NIC :- '.$ClNIC.'</P><BR><P ALIGN="left">Contract Date :- '.$ContrDate.'</P><BR><BR><HR>'); */
//==================================================================================================
$pdf->WriteHTML('<HR>');
$pdf->SetFont('Times','',14);
$pdf->WriteHTML('<B><I><p ALIGN="left">PS Ekamuthu Enterprises</p></I></B><BR>');
$pdf->SetFont('Times','',12);
$pdf->WriteHTML('<p ALIGN="left">No.50, Hill St, Dehiwala, </p><BR>');
$pdf->WriteHTML('<p ALIGN="left">Tel :- 011 2 710266 / 011 4 579517</p><BR><BR>');

$pdf->SetFont('Arial','',18);
$pdf->WriteHTML('<p ALIGN="center">Contract Arrears Receipt</p><BR>');

$pdf->SetFont('Times','',15);
$pdf->WriteHTML('<B><P ALIGN="right">'.$RcptNo.'</P></B><BR>');
$pdf->SetFont('Times','',9);
$pdf->WriteHTML('<P ALIGN="right">'.date("Y-m-d h:i").'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Contract No :- '.$cntrNo.'</P><BR><BR>');

$pdf->SetFont('Times','',20);
$pdf->WriteHTML('<B><I><P ALIGN="left">'.$clName.'</P></I></B><BR>');

$pdf->SetFont('Times','',10);
$pdf->WriteHTML('<P ALIGN="left">Tel B:- '.$ClTel1.'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Tel P:- '.$ClTel2.'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Tel W:- '.$ClTel3.'</P><BR>');

$pdf->WriteHTML('<P ALIGN="left">Address B:- '.$ClAdd1.'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Address P:- '.$ClAdd2.'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">Address W:- '.$ClAdd3.'</P><BR>');

$pdf->WriteHTML('<P ALIGN="left">NIC :- '.$ClNIC.'</P><BR>');
$pdf->WriteHTML('<P ALIGN="left">E-Mail :- '.$ClEmail.'</P><BR>');

$pdf->WriteHTML('<B><P ALIGN="left">Contract Date :- '.$ContrDate.'</P></B><BR>');
$pdf->WriteHTML('<HR>');

				
$pdf->SetFont('Arial','',8);	
$pdf->Cell(10,5,'Code','LTB',0,'C',0);	
$pdf->Cell(60,5,'Desc','LTB',0,'C',0);
$pdf->Cell(18,5,'From','LTB',0,'C',0);
$pdf->Cell(18,5,'To','LTB',0,'C',0);	
$pdf->Cell(15,5,'Qty','LTB',0,'C',0);
$pdf->Cell(15,5,'Charge','LTB',0,'C',0);
$pdf->Cell(15,5,'Days','LTB',0,'C',0);
$pdf->Cell(15,5,'Amount','LTB',0,'C',0);
$pdf->Cell(15,5,'Pnlty Amt','LTB',0,'C',0);
$pdf->Cell(15,5,'Total Amt','LRTB',0,'C',0);			
$pdf->WriteHTML('<BR>');


		$result =mysqli_query($con,"CALL GET_CONTR_ITMS('".$cntrNo."')");

		if (!$result) 
		{							
			die('Error: ' . mysqli_error($con));
		} 
		else 
		{
			while($row = (mysqli_fetch_assoc($result)))
			{	//$row["TAKEN_DAT"]
				//==========================================================================
				date_default_timezone_set('Asia/Colombo');
				
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
				
				//$date1=date_create(date("Y-m-d"));
				//$date2=date_create($row["HTO"]);
				//$Ddiff=date_diff($date1,$date2);
				
				//if(date('H:i', time())>'09:00')
			 	//{
				//	$Ddiff=$Ddiff+1 ;
			 	//}
				
				//==========================================================================
				//$pdf->SetFont('Arial','',12);
				$pdf->Cell(10,5,$row["ITM_CDE4"],'LTB',0,'L',0);	
				$pdf->Cell(60,5,$row["ITMNM"],'LTB',0,'L',0);

				$pdf->Cell(18,5,$row["TAKEN_DAT"],'LTB',0,'C',0);
				$pdf->Cell(18,5,$row["HTO"],'LTB',0,'C',0);	

				$pdf->Cell(15,5,$row["TKNQTY1"],'LTB',0,'R',0);
				$pdf->Cell(15,5,$charge,'LTB',0,'R',0);
				$pdf->Cell(15,5,$Ddiff,'LTB',0,'C',0);
				//$pdf->Cell(15,5,$row["DAYS1"],'LTB',0,'C',0);
				$pdf->Cell(15,5,$row["ITM_CHRG1"],'LRTB',0,'C',0);
				$pdf->Cell(15,5,$pnlty,'LTB',0,'R',0);
				$pdf->Cell(15,5,(floatval($row["ITM_CHRG1"])+floatval($pnlty)),'LRTB',0,'R',0);
	
				$pdf->WriteHTML('<BR>');
				
				$totPnlty=$totPnlty+$pnlty;

			  }
		   } 	
		   //============Itm total============================
		   $pdf->Cell(151,5,'','',0,'L',0);		
		   $pdf->Cell(30,5,'Contract Amount','',0,'L',0);
		   $pdf->Cell(15,5,$ContrAmt,'',0,'R',0);
		   
		   $pdf->WriteHTML('<BR>');
		   $pdf->Cell(151,5,'','',0,'L',0);		
		   $pdf->Cell(30,5,'Penalty Amount','',0,'L',0);
		   $pdf->Cell(15,5,$totPnlty,'',0,'R',0);
		   
		   $pdf->WriteHTML('<BR>');
		   $pdf->Cell(151,5,'','',0,'L',0);		
		   $pdf->Cell(30,5,'Sub Total','',0,'L',0);
		   $pdf->Cell(15,5,($ContrAmt+$totPnlty),'',0,'R',0);
		   
		   $pdf->WriteHTML('<BR>');
		   $pdf->Cell(151,5,'','',0,'L',0);		
		   $pdf->Cell(30,5,'Deposit Amount','',0,'L',0);
		   $pdf->Cell(15,5,$ContrDepAmt,'',0,'R',0);
		   
		   $pdf->WriteHTML('<BR>');
		   $pdf->Cell(151,5,'','',0,'L',0);		
		   $pdf->Cell(30,5,'Penging Arrears','',0,'L',0);
		   $pdf->Cell(15,5,(($ContrDepAmt-($ContrAmt+$totPnlty))*-1),'',0,'R',0);
		   
		   
		   

		  
			
$pdf->WriteHTML('<BR><BR><HR><p ALIGN="center"><B>Thank You Come Again</B></p><HR>');				
				


$filename="../../docs/ContrArrBill/".$RcptNo.".pdf";
$pdf->Output($filename,'F');
echo $RcptNo;
?>



