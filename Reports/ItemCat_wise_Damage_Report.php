<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('../phpFunctions/config.php');
?>

<div id="stkListRpt">
<table border="1">
<tr>
  <td id="catCd">Category Code</td>
  <td id="itmNm">Item Name</td>
  <td class="Itmcounts">Damage Count</td>
  <td class="Itmcounts">Item Codes</td>
</tr>



<?php
$sql = "SELECT  ITM_CAT_CODE,
				ITM_NAME ,
				SIZE,
				(SELECT COUNT(ITM_STS) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='D')'DMG_COUNT',
				(SELECT IFNULL(GROUP_CONCAT(ITM_CODE),'-')  FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='D')'ITMCODES'

		FROM items I
		GROUP BY ITM_CAT_CODE
		ORDER BY ITMCODES DESC";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: loc 1' . mysqli_error($con));
} 
else 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
	


					
					echo '<tr>
						  <td class="catCode">'.$row["ITM_CAT_CODE"].'</td>
						  <td class="name">'.$row["ITM_NAME"].' "'.$row["SIZE"].'"'.'</td>
						  <td class="totCnt">'.$row["DMG_COUNT"].'</td>
						  <td class="avlbl">'.$row["ITMCODES"].'</td>
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