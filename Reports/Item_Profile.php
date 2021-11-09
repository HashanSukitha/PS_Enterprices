<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Item Profile</td>
  
</tr>
</table>



<?php

		$sql ="SELECT *
			   FROM (
					 SELECT I.ITM_CODE 'ITM_CODE', 
					 
					 		(
							 SELECT SUM( IR.PAID_AMT )
							 FROM item_return IR
							 WHERE IR.ITM_CODE = I.ITM_CODE AND 
							 IR.PAID = 'yes'
							 ) 'INCOME', 
							 
							I.ITM_NAME'ITM_NAME', 
							I.SIZE'SIZE', 
							
							(
							 SELECT COUNT( DMG_ITM_CODE )
							 FROM item_damages
							 WHERE DMG_ITM_CODE = I.ITM_CODE
							 ) 'DMG_COUNT'
							 
					 FROM items I
					)X
				ORDER BY X.INCOME DESC ";

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
					<td>Item Desc</td>
					<td>Damage Count</td>
					<td>Income</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["ITM_CODE"].'</td>
						  <td style="background:#E5BEE8;">'.$row["ITM_NAME"].' '.$row["SIZE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["DMG_COUNT"].'</td>
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