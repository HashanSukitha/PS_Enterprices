<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>



<div id="stkListRpt">
<table border="1">
<tr>
  <td>Black Listed Customer Details Report</td>
  
</tr>
</table>




<?php

	
		$sql ="SELECT * FROM customer WHERE CL_STS='B'";

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
					<td>Client Name</td>
					<td>Address (Borging)</td>
					<td>Address (Permanent)</td>
					<td>Address (Work Place)</td>
					<td>NIC</td>
					<td>Tel (Borging)</td>
					<td>Address (Permanent)</td>
					<td>Address (Work Place)</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr>
						  <td>'.$row["CL_CODE"].'</td>
						  <td>'.$row["CL_TITLE"].' '.$row["CL_NAME"].'</td>
						  <td>'.$row["CL_ADD_B"].'</td>
						  <td>'.$row["CL_ADD_P"].'</td>
						  <td>'.$row["CL_ADD_W"].'</td>
						  <td>'.$row["CL_NIC"].'</td>
						  <td>'.$row["CL_TEL_B"].'</td>
						  <td>'.$row["CL_TEL_P"].'</td>
						  <td>'.$row["CL_TEL_W"].'</td>
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