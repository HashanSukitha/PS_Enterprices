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
					<P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR><P ALIGN="center"><B>Stock Report as at( '.date("Y-m-d h:i").' )</B></P>
				<HR>');	

$pdf->SetFont('Arial','',8);	
$pdf->Cell(15,5,'Cat Code','LTB',0,'C',0);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(100,5,'Item Name','LTB',0,'C',0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(15,5,'Total Count','LTB',0,'C',0);
$pdf->Cell(15,5,'Available','LTB',0,'C',0);	
$pdf->Cell(15,5,'Hired','LTB',0,'C',0);
$pdf->Cell(15,5,'Damaged','LTB',0,'C',0);
$pdf->Cell(15,5,'Inactive','LTBR',0,'C',0);			
$pdf->WriteHTML('<BR>');				
//======================================================================

$sql = "SELECT  
				ITM_CAT_CODE ,
				ITM_NAME ,
				SIZE,
				(SELECT COUNT(ITM_CAT_CODE) FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE)'TOT_CNT', 
                (SELECT DISTINCT ITM_TYPE FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE)'ITMTYPE',
				(SELECT COUNT(ITM_STS) FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='A')'AVLBL',
				(SELECT COUNT(ITM_STS) FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='H')'HIRD',
				(SELECT COUNT(ITM_STS) FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='D')'DMG',
			(SELECT COUNT(ITM_STS) FROM ITEMS WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='I')'INACTV'
			FROM ITEMS I
			GROUP BY ITM_CAT_CODE";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: loc 1' . mysqli_error($con));
} 
else 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
	
		if($row["ITMTYPE"]=='Bulk')
		{
			$sql1 ="SELECT 
							ITM_QTY'B_AVLBL',
							(SELECT TAKEN_QTY FROM item_taken WHERE ITM_CODE='".$row["ITM_CAT_CODE"]."')'B_HIRD'
					FROM ITEMS
					WHERE ITM_CAT_CODE='".$row["ITM_CAT_CODE"]."' ";
					
			$result1 = mysqli_query($con1, $sql1);

			if (!$result1) 
			{
				die('Error: loc 2' . mysqli_error($con1));
			} 
			else 
			{
				while($row1 = mysqli_fetch_assoc($result1)) 
				{
					$B_AVLBL=0;
					$B_HIRD=0;
					$B_TOT=0;
					
					$B_AVLBL=$row1["B_AVLBL"];
					$B_HIRD=$row1["B_HIRD"];
					
					$B_TOT=$B_AVLBL+$B_HIRD;
					
					if($B_AVLBL=='')
					{
						$B_AVLBL=0;
					}
					
					if($B_HIRD=='')
					{
						$B_HIRD=0;
					}
					
					if($B_TOT=='')
					{
						$B_TOT=0;
					}

					  
					  	$pdf->SetFont('Arial','',10);
						$pdf->Cell(15,5,$row["ITM_CAT_CODE"],'LTB',0,'L',0);	
						$pdf->Cell(100,5,$row["ITM_NAME"].' "'.$row["SIZE"],'LTB',0,'L',0);
						$pdf->SetFont('Arial','',9);
						$pdf->Cell(15,5,$B_TOT,'LTB',0,'R',0);
						$pdf->Cell(15,5,$B_AVLBL,'LTB',0,'R',0);	
						$pdf->Cell(15,5,$B_HIRD,'LTB',0,'R',0);
						$pdf->Cell(15,5,'0','LTB',0,'R',0);
						$pdf->Cell(15,5,'0','LTBR',0,'R',0);
						$pdf->WriteHTML('<BR>');
				  }
			}
		}
		else
		{		
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(15,5,$row["ITM_CAT_CODE"],'LTB',0,'L',0);	
				$pdf->Cell(100,5,$row["ITM_NAME"].' "'.$row["SIZE"],'LTB',0,'L',0);
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(15,5,$row["TOT_CNT"],'LTB',0,'R',0);
				$pdf->Cell(15,5,$row["AVLBL"],'LTB',0,'R',0);	
				$pdf->Cell(15,5,$row["HIRD"],'LTB',0,'R',0);
				$pdf->Cell(15,5,$row["DMG"],'LTB',0,'R',0);
				$pdf->Cell(15,5,$row["INACTV"],'LTBR',0,'R',0);
				$pdf->WriteHTML('<BR>');
		}
	}
}


//======================================================================


				

		
		  /* $pdf->SetFont('Arial','',8);	
		   //============Itm total============================
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Item Total','LRTB',0,'L',0);
		   $pdf->Cell(20,5,$itmTot,'LRTB',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   //============pnlty total============================
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Penalty Total','LRTB',0,'L',0);
		   $pdf->Cell(20,5,$totPnlty,'LRTB',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   //============grand total============================
		   $pdf->SetFont('Arial','',10);	
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Total Rs.','LRTB',0,'L',0);
		   $pdf->Cell(20,5,$grandTot,'LRTB',0,'R',0); */
			
$pdf->WriteHTML('<BR><BR><HR><p ALIGN="center"><B>Thank You Come Again</B></p><HR>');				
				


$filename="../../docs/StockReport/StockReport.pdf";
$pdf->Output($filename,'F');
echo $filename;
?>



