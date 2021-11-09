<?php 
include('../config.php');
require('u/fpdf.php');



//echo $ContractNo;





//$ClName = $_POST["ClName"];
$clcode = $_POST["clcode"];
$ContractNo = $_POST["ContractNo"];
$telephone='0';
//$NIC = $_POST["NIC"];
//$CurAddress = $_POST["CurAddress"];
//$WrkAddress = $_POST["WrkAddress"];
//$email = $_POST["email"];
//$telephone = $_POST["telephone"];


/*function r($r)
{
	$r = str_replace("$","",$r);
	$r = str_replace(" ","",$r);
	$r = $r." $";
	return $r;
} */




class PDF extends FPDF
{ 
//$this->Cell(117,6.5,'','LRTB',0,'R',0); TO SEE THE GRID USE "LRTB"
	function Header()
	{
		if(!empty($_FILES["file"]))
		{
		$uploaddir = "logo/";
		$nm = $_FILES["file"]["name"];
		$random = rand(1,99);
		move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
		$this->Image($uploaddir.$random.$nm,10,10,20);
		unlink($uploaddir.$random.$nm);
	   }
	  
		$this->SetFont('Arial','B',12);
		$this->Ln(1);
	}
	
	function Footer()
	{
		//$this->SetY(-15);
		//$this->SetFont('Arial','I',8);
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	function ChapterTitle($num, $label)
	{
		$this->SetFont('Arial','',12);
		//$this->SetFillColor(200,220,255);
		$this->Cell(0,6,"$num $label",0,1,'L',true);
		$this->Ln(0);
	}
	
	function InvoiceDate()
	{
		$this->SetFont('Arial','',9);
		//$this->SetFillColor(249,249,249);
		$this->Cell(75,-60,date('d-m-Y h:i'),0,1,'R');
		//$this->Ln(0);
	}
	
	function ContrNo($no)
	{
	  $this->SetFont('Arial','B',16);
	  $this->Cell(190,65,$no,0,1,'R');
	}	 
	
	function ItemRow($con,$ContractNo)
	{   
		$rowC=0;
	  	$sql="SELECT (SELECT ITM_NAME FROM items WHERE ITM_CODE=C.ITM_CODE)'NAME',
			 	C.N_OF_DAYS'DAYS',
			 	C.DLY_CHRG'D_CHRG', 
		 	 	C.ITM_TOT'TOT',
		 	 	C.DPST_AMT'DP_AMT',
				C.ITM_CODE'ITM_CODE'
			 FROM contract_details C WHERE CONTR_NO=".$ContractNo;

		
		$res=mysqli_query($con,$sql);
		//print_r($res);
		
		if (!$res) 
		{
			die('Error: ' . mysqli_error($con));
		} 
		else 
		{
		  
			while($row = mysqli_fetch_assoc($res)) 
			{
			
				$this->Cell(27,6.5,'','',0,'L',0);       //empty left space
				$this->Cell(85.5,6.5,$row["NAME"].' ('.$row["ITM_CODE"].')','',0,'L',0);     //Item Name
				$this->Cell(16,6.5,$row["DAYS"],'',0,'C',0);       //Days
				$this->Cell(19.75,6.5,$row["D_CHRG"],'',0,'R',0);    //Daly charg
				$this->Cell(20.25,6.5,$row["TOT"],'',0,'R',0);    //Item Total
				$this->Cell(23.5,6.5,$row["DP_AMT"],'',0,'R',0);    //Deposit Total
				$this->Ln();
				$rowC=$rowC+1;
			}
			
			$this->fill($rowC);
		}			
	}
	
	function fill($rowC)
	{
	 
		for($i=1;$i<=(8-$rowC);$i++)
		{
				$this->Cell(27,6.5,'','',0,'L',0);       //empty left space
				$this->Cell(85.5,6.5,'','',0,'L',0);     //Item Name
				$this->Cell(16,6.5,'','',0,'C',0);       //Days
				$this->Cell(19.75,6.5,'','',0,'R',0);    //Daly charg
				$this->Cell(20.25,6.5,'','',0,'R',0);    //Item Total
				$this->Cell(23.5,6.5,'','',0,'R',0);    //Deposit Total
				$this->Ln();
		}
	}
	
	function ClientName($ClName)
	{
	  $this->Cell(50,22.25,'',0,1,'R'); //placement from top
	  $this->Cell(117,6.5,'','',0,'R',0);
	  $this->Cell(78,6.5,$ClName,'',0,'L',0);
	}
	
	function CurrentAddress($CurAddress)
	{
	  $this->SetFont('Arial','',8);
	  $this->Cell(50,6,'',0,1,'R'); //placement from top
	  $this->Cell(132,3,'','',0,'R',0);
	  $this->Cell(63,3,$CurAddress,'',0,'L',0);
	}
	
	function WorkPlaceAddress($WrkAddress)
	{
	  $this->SetFont('Arial','',8);
	  $this->Cell(50,9,'',0,1,'R'); //placement from top
	  $this->Cell(128,3,'','',0,'R',0);
	  $this->Cell(67,3,$WrkAddress,'',0,'L',0);
	}
	
	function NIC($NIC,$telephone )
	{
	  $this->SetFont('Arial','',8);
	  $this->Cell(50,8.5,'',0,1,'R'); //placement from top
	  $this->Cell(134,3,'','',0,'R',0);
	  $this->Cell(42,3,$NIC,'',0,'L',0);
	  $this->Cell(19,3,$telephone,'',0,'L',0);
	}
}

		$sql="SELECT  CONCAT(CL_TITLE,'.',CL_NAME)'NAME',
				CL_ADD_B,
				CL_ADD_P,
				CL_ADD_W,
				CL_NIC,
				CL_TEL_B,
				CL_TEL_P,
				CL_TEL_W
		FROM customer
		WHERE CL_CODE=".$clcode;
		
		$res=mysqli_query($con,$sql);

		if (!$res) 
				{
					die('Error: ' . mysqli_error($con));
				} 
				else 
				{
					while($row = mysqli_fetch_assoc($res)) 
					{
					
						$ClName = $row["NAME"];
						$NIC = $row["CL_NIC"];
						$CurAddress =$row["CL_ADD_P"];
						$WrkAddress = $row["CL_ADD_W"];
						
						
						$telephone = $row["CL_TEL_P"];
						

						
						
					}
				}

$pdf = new PDF('P','mm',array(216,293));
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Image('bg/bg.jpg', 0, 0, 216,  293);




$pdf->ContrNo($ContractNo);
$pdf->InvoiceDate();


$pdf->Cell(50,49.25,'',0,1,'R'); //placement from top
$pdf->ItemRow($con,$ContractNo);

$pdf->ClientName($ClName);
$pdf->CurrentAddress($CurAddress);
$pdf->WorkPlaceAddress($WrkAddress);
$pdf->NIC($NIC,$telephone);


//======================================================================



$filename="../../docs/Contracts/".$ContractNo.".pdf";
$pdf->Output($filename,'F');
echo $ContractNo;





?>



