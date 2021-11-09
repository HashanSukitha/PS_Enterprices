<?php 
if(isset($_POST["submit"]))
{


$ClName = $_POST["ClName"];
$ContractNo = $_POST["ContractNo"];
$NIC = $_POST["NIC"];
$CurAddress = $_POST["CurAddress"];
$WrkAddress = $_POST["WrkAddress"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];


function r($r)
{
	$r = str_replace("$","",$r);
	$r = str_replace(" ","",$r);
	$r = $r." $";
	return $r;
}


require('u/fpdf.php');

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
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
		$this->Cell(75,-58,date('d-m-Y'),0,1,'R');
		//$this->Ln(0);
	}
	
	function ContrNo($no)
	{
	  $this->SetFont('Arial','B',16);
	  $this->Cell(190,65,$no,0,1,'R');
	}
	
	function ItemRow()
	{
	  	//$this->Cell(85.5,6.5,'xxxx','LRBT',0,'L',0);
		$this->Cell(27,6.5,'','',0,'L',0);       //empty left space
		$this->Cell(85.5,6.5,'xxxx','',0,'L',0);     //Item Name
		$this->Cell(16,6.5,'xxxx','',0,'C',0);       //Days
		$this->Cell(19.75,6.5,'xxxx','',0,'R',0);    //Daly charg
		$this->Cell(20.25,6.5,'xxxx','',0,'R',0);    //Item Total
		$this->Cell(23.5,6.5,'xxxx','',0,'R',0);    //Deposit Total
		$this->Ln();
	}
	
	function ClientName($ClName)
	{
	  $this->Cell(50,20.25,'',0,1,'R'); //placement from top
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
	  $this->Cell(39,3,$NIC,'',0,'L',0);
	  $this->Cell(20,3,$telephone,'',0,'L',0);
	}
}


$pdf = new PDF('P','mm',array(216,293));
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->Image('bg/bg.jpg', 0, 0, $pdf->w,  $pdf->h);
$pdf->Image('bg/bg.jpg', 0, 0, 216,  293);




$pdf->ContrNo($ContractNo);
$pdf->InvoiceDate();


$pdf->Cell(50,47.25,'',0,1,'R'); //placement from top
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();
$pdf->ItemRow();

$pdf->ClientName($ClName);
$pdf->CurrentAddress($CurAddress);
$pdf->WorkPlaceAddress($WrkAddress);
$pdf->NIC($NIC,$telephone );


//======================================================================



$filename="../../docs/Contracts/".$ContractNo.".pdf";
$pdf->Output($filename,'F');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create a PDF invoice with PHP</title>
<style>
body{background-image:url(img/bg.jpg);
}
a{
color:#999999;
text-decoration:none;
}
a:hover{
color:#999999;
text-decoration:underline;
}
#content{
width:800px;
height:600px;
background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:800px;
height:30px;
padding-top:15px;
color:#666666;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#999999;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:770px;
height:360px;
margin:15px;
color:#999999;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:385px;
height:360px;
float:left;
}
#body_r{
width:385px;
height:360px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #ccc;
background-image:url(img/paper_fibers.png);
color:#999;
margin-left:15px;
padding:5px;
}
#up{
width:770px;
height:40px;
margin:auto;
margin-top:10px;
}
</style>
</head>

<body>
<div id="content">
<div id="title" align="center">Create a PDF invoice with PHP</div>
<div id="body">
<form action="" method="post" enctype="multipart/form-data">


<div id="body_l">
<div id="name"><input name="ClName" placeholder="Insert here your Company Name" type="text" value="Hashan Sukitha Wickramasinghe"/></div>
<div id="name"><input name="ContractNo" placeholder="Insert here your Company Name" type="text" value="5000023"/></div>
<div id="name"><input name="NIC" placeholder="883134540V" type="text"  value="883134540V"/></div>
<div id="name"><input name="CurAddress" placeholder="Insert here your Company Address" type="text" value="No50, hill st Dehiwala"/></div>
<div id="name"><input name="WrkAddress" placeholder="Insert here your Company Address" type="text" value="No50, hill st Dehiwala"/></div>
<div id="name"><input name="email" placeholder="Insert here your Email" type="text" value="psekamuthu@yahoo.com"/></div>
<div id="name"><input name="telephone" placeholder="Insert here your telephone number" type="text" value="011 4579517"/></div>
</div>


<div id="body_r">


</div>
<div id="up" align="center"><input name="file" disabled="disabled" type="file" /></div>
<div id="up" align="center"><input name="submit" style="margin-top:60px;" value="Create your Invoice" type="submit" /><br /><br />

<?php 
if(isset($_POST["submit"]))
{
echo'<a href="invoice.pdf">Download your Invoice</a>';
}
?>
</div>
</form>
</div>
</div>
<div id="footer" align="center">Created by <a href="http://skymbu.info/" target="_blank">Skymbu</a></div>
</body>
</html>
