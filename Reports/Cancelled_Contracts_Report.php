<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Cancelled Contract Report</td>
  
</tr>
</table>



<?php

		$sql ="SELECT * FROM contract_header WHERE CONTR_STS='C'";

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
					<td>Client Number</td>
					<td>Contract Amount</td>
					<td>Number of Items</td>
					<td>Deposit Amount</td>
					<td>Contract Date</td>
					<td>Cancelled Date</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["CONTR_NO"].'</td>
						  <td style="background:#E5BEE8;">'.$row["CL_CODE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["CONTR_AMT"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["N_OF_ITMS"].'</td>
						  <td style="background:#F7F9BB;">'.$row["CONTR_DEP_TOT"].'</td>
						  <td style="background:#F7F9BB;">'.$row["CONTR_DATE"].'</td>
						  <td style="background:#78E887;">'.$row["CONTR_CLOSE_DATE"].'</td>
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