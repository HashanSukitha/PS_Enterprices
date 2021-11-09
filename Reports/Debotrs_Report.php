<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>



<div id="stkListRpt">
<table border="1">
<tr>
  <td>Debtors (Unpaid Bills)</td>
  
</tr>
</table>




<?php

	
		$sql ="SELECT * FROM `item_return` WHERE  (PNLTY_AMT+AMT)<>PAID_AMT";

		$result = mysqli_query($con, $sql);
		
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td>Contract No</td>
					<td>Item Code</td>
					<td>Return Date</td>
					<td>Returned Qty</td>
					<td>Penalty Amount</td>
					<td>Item Amount</td>
					<td>Paid Amount</td>
					<td>Due Amount</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td>'.$row["CONTR_NO"].'</td>
						  <td>'.$row["ITM_CODE"].'</td>
						  <td>'.$row["RTN_DATE"].'</td>
						  <td>'.$row["RTN_QTY"].'</td>
						  <td>'.$row["PNLTY_AMT"].'</td>
						  <td>'.$row["AMT"].'</td>
						  <td>'.$row["PAID_AMT"].'</td>
						  <td>'.((floatval($row["AMT"])+floatval($row["PNLTY_AMT"]))-floatval($row["PAID_AMT"])).'</td>
					  </tr>';
			}
			
		   echo "</table>";
		
		}
		//======================================================================================================================
		
		
		
	


?>



</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>