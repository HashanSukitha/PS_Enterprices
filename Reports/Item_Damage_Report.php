<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>


<div id="stkListRpt">
<table border="1">
<tr>
  <td>Damaged Items Report</td>
  
</tr>
</table>



<?php

		$sql ="SELECT * FROM `item_damages` i , items it WHERE i.DMG_ITM_CODE=it.ITM_CODE";

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
					<td>Damaged Reason</td>
					<td>Work Shop Comment</td>
					<td>Damaged Date</td>
					<td>Location</td>
					<td>Completed Date</td>
					<td>Reported Officer</td>
					<td>Completed Officer</td>
					<td>Amount(Cost)</td>
					<td>Status</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td style="background:#E5BEE8;">'.$row["DMG_ITM_CODE"].'</td>
						  <td style="background:#E5BEE8;">'.$row["ITM_NAME"].' '.$row["SIZE"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["DMG_COMMENTS"].'</td>
						  <td style="background:#ED0000;color:#fff;">'.$row["DMG_WRKSHP_CMMT"].'</td>
						  <td style="background:#F7F9BB;">'.$row["DMG_DATE"].'</td>
						  <td style="background:#F7F9BB;">'.$row["DMG_ITM_RTN_LOC"].'</td>
						  <td style="background:#78E887;">'.$row["DMG_CMPLTD_DATE"].'</td>
						  <td style="background:#78E887;">'.$row["DMG_ADD_OFFI"].'</td>
						  <td style="background:#78E887;">'.$row["DMG_CMPLTD_OFFI"].'</td>
						  <td style="background:#78E887;">'.$row["DMG_REP_AMT"].'</td>
						  <td style="background:#78E887;">'.$row["DMG_STS"].'</td>
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