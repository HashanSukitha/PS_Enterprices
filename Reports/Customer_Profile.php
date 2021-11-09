<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Customer Profile</td>
  
</tr>
</table>



<?php

		$sql ="SELECT C.CL_CODE 'CL_CODE', 
		
					 (SELECT COUNT( * )
					 FROM contract_header
					 WHERE CL_CODE = C.CL_CODE) 'CONTR_COUNT', 

					 (SELECT COUNT( * )
					 FROM contract_header
					 WHERE CL_CODE = C.CL_CODE AND CONTR_STS = 'A') 'A_CONTR_COUNT', 

					 (SELECT COUNT( * )
					 FROM contract_header
					 WHERE CL_CODE = C.CL_CODE AND CONTR_STS = 'I') 'I_CONTR_COUNT', 

					 (SELECT SUM( CONTR_AMT - PAID_AMT )
					 FROM contract_header
					 WHERE CL_CODE = C.CL_CODE) 'ARREARS', 

					 (SELECT SUM( PAID_AMT )
					 FROM contract_header
					 WHERE CL_CODE = C.CL_CODE) 'INCOME'

                FROM customer C";

		$result = mysqli_query($con, $sql);
		
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td>Client Code</td>
					<td>Number Of Contracts</td>
					<td>Active Contracts</td>
					<td>Closed Contracts</td>
					<td>Arrears</td>
					<td>Income</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["CL_CODE"].'</td>
						  <td style="background:#E5BEE8;">'.$row["CONTR_COUNT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["A_CONTR_COUNT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["I_CONTR_COUNT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["ARREARS"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["INCOME"].'</td>
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