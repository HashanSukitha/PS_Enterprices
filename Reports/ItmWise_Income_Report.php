<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('../phpFunctions/config.php');
?>

<div id="stkListRpt">
<table border="1">
<tr>
  <td>Item Code</td>
  <td>Item Name</td>
  <td >Income</td>
</tr>



<?php
$sql = 'SELECT I.ITM_CODE"ITM_CODE",
			   I.ITM_NAME"ITMNAME",
	           I.SIZE"SIZE",
		       (SELECT SUM(ITM_TOT) FROM contract_details 
		        WHERE ITM_CODE=I.ITM_CODE
		        GROUP BY ITM_CODE)"INCOME"
		
        FROM items I
        ORDER BY INCOME DESC';

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: loc 1' . mysqli_error($con));
} 
else 
{
    while($row = mysqli_fetch_assoc($result)) 
	{//avlbl
	
		$income=0;
		$income=$row["INCOME"];
		if($income=='')
		{
			$income=0;
		}

		echo '<tr>
 				 <td class="catCode">'.$row["ITM_CODE"].'</td>
 				 <td class="name">'.$row["ITMNAME"].' ('.$row["SIZE"].')</td>
  				 <td class="avlbl" style="text-align:right">'.$income.'</td>
			  </tr>';
		
	}
}

mysqli_close($con);
?>


</table>
</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>