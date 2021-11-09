<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Paid Contracts(Bill) Report</td>
  
</tr>
</table>



<?php

		$sql ="SELECT *
				FROM `contract_header`
				WHERE CONTR_AMT = PAID_AMT";

		$result = mysqli_query($con, $sql);
		
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td>Contract Number</td>
					<td>Client Code</td>
					<td>Contract Date</td>
					<td>Contract Closed Date</td>
					<td>Deposit Returned</td>
					<td>Arrears Charges</td>
					<td>Contract Amount</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["CONTR_NO"].'</td>
						  <td style="background:#E5BEE8;">'.$row["CL_CODE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["CONTR_DATE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["CONTR_CLOSE_DATE"].'</td>
						  <td style="background:#F7F9BB;">'.$row["CONTR_DEP_TOT"].'</td>
						  <td style="background:#F7F9BB;">'.$row["PENALTY_AMT"].'</td>
						  <td style="background:#78E887;">'.$row["CONTR_AMT"].'</td>
					  </tr>';
			}
			
			
			echo "</table>";
		}
		
		


?>



</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>