<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Monthly Basis Contracts Report</td>
  
</tr>
</table>



<?php

		$sql ="SELECT  C.CONTR_NO'CONTR_NO',
					   C.CONTR_AMT'CONTR_AMT',
					   C.PAID_AMT'PAID_AMT',
					   C.CONTR_DATE'CONTR_DATE',
					   C.CONTR_STS'CONTR_STS',
					   C.CONTR_DEP_TOT'CONTR_DEP_TOT',
					   C.PENALTY_AMT'PENALTY_AMT'
			  FROM contract_header C,(
										SELECT DISTINCT CONTR_NO 
										FROM contract_details 
										WHERE RNTL_BASIS='Monthly') CC
			  WHERE C.CONTR_NO=CC.CONTR_NO";

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
					<td>Contract Amount</td>
					<td>Paid Amount</td>
					<td>Contract Date</td>
					<td>Contract Status</td>
					<td>Deposit</td>
					<td>Arrears</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["CONTR_NO"].'</td>
						  <td style="background:#E5BEE8;">'.$row["CONTR_AMT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["PAID_AMT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["CONTR_DATE"].'</td>
						  <td style="background:#F7F9BB;">'.$row["CONTR_STS"].'</td>
						  <td style="background:#F7F9BB;">'.$row["CONTR_DEP_TOT"].'</td>
						  <td style="background:#78E887;">'.$row["PENALTY_AMT"].'</td>
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