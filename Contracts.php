<?php
include('phpFunctions\config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

$sql = "SELECT *
		FROM contract_header";
		
$sql = str_replace("-", " ", $_GET['qry']);

$result = mysqli_query($con,$sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
echo '<div class="vwContrSrchBox">';
	 	echo '<p>Contracts</p>';
		echo '<div class="srchCntner">
			  
			  <input type="text" id="srchByCusId" value="" placeholder="Customer NIC" onkeyup="SrchContrByCusId(event)" />
			  <input type="text" id="srchByContrNo" value="" placeholder="Contract Number" onkeyup="SrchContrByContrNo(event)"/>
			  
			  </div>';
echo '</div>';


echo '<div id="vwContrContainer">';
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		
		echo '<div class="vwRow">';
					
					if($row["CONTR_STS"]!='A')
					{
					 echo '<div id="closedBanner"></div>';
					 }
						echo '<div class="vwLeft">';
						
							  echo '<div class="vwItemCode">';
									echo '<div class="ContrCodeCntner">'.$row["CONTR_NO"]."</div>";
									//echo '<div class="vwItmSts" style="'.$color.'"></div>';
							  echo '</div>';

							  echo '<div class="editBtnBox"><a href="javascript:ViewContDet('.$row["CONTR_NO"].')" class="EditBtn">View</a></div>';

						echo '</div>';
						
						$no=$row["CONTR_NO"].'.pdf';
						if(file_exists ("docs/Contracts/".$no))
						{
							echo '<a href="docs/Contracts/'.$no.'" target="_blank" title="Reprint"><div class="ReprintBtn"></div></a>';
						}
						
				echo '</div>';
	}
echo '</div>';
}


mysqli_close($con);
?>