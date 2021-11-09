<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Fast Moving Items Report</td>
  
</tr>
</table>



<?php

		$sql ="SELECT I.ITM_CODE'ITM_CODE',
					  (SELECT COUNT(ITM_CODE) FROM contract_details WHERE ITM_CODE=I.ITM_CODE)'ITMCOUNT',
	   				  (I.ITM_NAME)'ITMNAME',
					   I.SIZE'SIZE'
			   FROM items I
			   ORDER BY `ITMCOUNT`  DESC";

		$result = mysqli_query($con, $sql);
		
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td>Item Code</td>
					<td>Movement Count</td>
					<td>Item Name</td>
					<td>Item Size</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["ITM_CODE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["ITMCOUNT"].'</td>
						  <td style="background:#F7F9BB;">'.$row["ITMNAME"].'</td>
						  <td style="background:#78E887;">'.$row["SIZE"].'</td>
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