<?php 
if(isset($_POST["submit"]))
{
$company = $_POST["company"];
$address = $_POST["address"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$number = $_POST["number"];
$item = $_POST["item"];
$price = $_POST["price"];
$vat = $_POST["vat"];
$bank = $_POST["bank"];
$iban = $_POST["iban"];
$paypal = $_POST["paypal"];
$com = $_POST["com"];
$pay = 'Payment information';
$price = str_replace(",",".",$price);
$vat = str_replace(",",".",$vat);
$p = explode(" ",$price);
$v = explode(" ",$vat);
$re = $p[0] + $v[0];
function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = $r." $";
return $r;
}
$price = r($price);
$vat = r($vat);
require('u/fpdf.php');

class PDF extends FPDF
{

function Footer7()
{
$this->SetY(-15);
$this->SetFont('Arial','I',10);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function ClientName()
	{
	  $this->SetY(5);
	  $this->SetX(0);
	  $this->SetFont('Arial','',12);

	  $this->Cell(0,2 ,'========================================','',0,'R',0);
	  $this->Cell(0,8 ,'======= P S Ekamuthu Enterprices =======','',0,'R',0);
	  $this->Cell(0,17,' No.50, Hill St, Dehiwala, Tel:077635821             ','',0,'R',0);
	  $this->Cell(0,22 ,'========================================','',0,'R',0);
	  
	  
	  
	  $this->Cell(0,74,'========================================','',0,'R',0);
	  //$this->SetFont('Times','',8);
	 // $this->Cell(0,4,' No.50, Hill St, Dehiwala, Tel:077635821','LRTB',1,'R');
	}

}

//$pdf = new PDF();
$pdf = new PDF('P','mm',array(75,100));
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->Image('bg/bg.jpg', 0, 0, $pdf->w,  $pdf->h);
//$fpdf->Image('logo/bg.jpg', 0, 0, $fpdf->w, $fpdf->h);
//$pdf->SetFont('Times','',10);
//$pdf->SetTextColor(32);
//$pdf->Cell(0,1,'========================================','LRTB',1,'R');
//$pdf->Ln(0);

//$pdf->Cell(0,4,'======= P S Ekamuthu Enterprices =======','LRTB',1,'R');

//$pdf->Cell(0,4,'   50, Hill St, Dehiwala, Tel:077635821   ','LRTB',1,'L');
//$th Cell(117,6.5,'','LRTB',0,'R',0);
$pdf->ClientName();
/*Cell(0,5,$company,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Invoice Number ',$number);
$pdf->ChapterTitle('Invoice Date ',date('d-m-Y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Price',1,1,'C');
$pdf->Cell(170,7,$item,1,0,'L',0);
$pdf->Cell(20,7,$price,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'VAT',1,0,'R',0);
$pdf->Cell(20,7,$vat,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$re." $",1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,$pay,0,1,'L');
$pdf->Cell(0,5,$bank,0,1,'L');
$pdf->Cell(0,5,$iban,0,1,'L');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,5,'PayPal:',0,1,'L');
$pdf->Cell(0,5,$paypal,0,1,'L');
$pdf->Cell(190,40,$com,0,0,'C'); */
$filename="invoice.pdf";
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
<div id="name"><input name="company" placeholder="Insert here your Company Name" value="ddfddsf" type="text" /></div>
<div id="name"><input name="address" placeholder="Insert here your Company Address" value="ddfddsf" type="text" /></div>
<div id="name"><input name="email" placeholder="Insert here your Email" type="text" value="ddfddsf" /></div>
<div id="name"><input name="telephone" placeholder="Insert here your telephone number" value="ddfddsf" type="text" /></div>
<div id="name"><input name="number" placeholder="Invoice number" type="text" value="ddfddsf" /></div>
<div id="name"><input name="item" placeholder="Item" type="text" value="ddfddsf" /></div>
</div>
<div id="body_r">
<div id="name"><input name="price" placeholder="Insert here price" value="ddfddsf" type="text" /></div>
<div id="name"><input name="vat" placeholder="Insert here your VAT" value="ddfddsf" type="text" /></div>
<div id="name"><input name="bank" placeholder="Insert the name of your Bank" value="ddfddsf" type="text" /></div>
<div id="name"><input name="iban" placeholder="Insert here your IBAN number" value="ddfddsf" type="text" /></div>
<div id="name"><input name="paypal" placeholder="Insert here your PayPal address" value="ddfddsf" type="text" /></div>
<div id="name"><input name="com" placeholder="Add a comment" type="text" value="ddfddsf" /></div>
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
