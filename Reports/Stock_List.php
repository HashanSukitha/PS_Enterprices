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
  <td id="itmNm">Item Name<input type="button" value="Print Report" id="prntStockRpt" class="genButtons" style="float:right" onclick="PrintStockReport()"/></td>
  <td class="Itmcounts">Total Count</td>
  <td class="Itmcounts">Available</td>
  <td class="Itmcounts">Hired</td>
  <td class="Itmcounts">Damaged</td>
  <td class="Itmcounts">Inactive</td>
</tr>



<?php
$sql = "SELECT  
				ITM_CAT_CODE ,
				ITM_NAME ,
				SIZE,
				(SELECT COUNT(ITM_CAT_CODE) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE)'TOT_CNT', 
                (SELECT DISTINCT ITM_TYPE FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE GROUP BY ITM_CAT_CODE)'ITMTYPE',
				(SELECT COUNT(ITM_STS) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='A')'AVLBL',
				(SELECT COUNT(ITM_STS) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='H')'HIRD',
				(SELECT COUNT(ITM_STS) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='D')'DMG',
			(SELECT COUNT(ITM_STS) FROM items WHERE ITM_CAT_CODE=I.ITM_CAT_CODE AND ITM_STS='I')'INACTV'
			FROM items I
			GROUP BY ITM_CAT_CODE";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: loc 1' . mysqli_error($con));
} 
else 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
	
		if($row["ITMTYPE"]=='Bulk')
		{
			$sql1 ="SELECT 
							ITM_QTY'B_AVLBL',
							(SELECT SUM(TAKEN_QTY) FROM item_taken WHERE ITM_CODE='".$row["ITM_CAT_CODE"]."')'B_HIRD'
					FROM items
					WHERE ITM_CAT_CODE='".$row["ITM_CAT_CODE"]."' ";
					
			$result1 = mysqli_query($con1, $sql1);

			if (!$result1) 
			{
				die('Error: loc 2' . mysqli_error($con1));
			} 
			else 
			{
				while($row1 = mysqli_fetch_assoc($result1)) 
				{
					$B_AVLBL=0;
					$B_HIRD=0;
					$B_TOT=0;
					
					$B_AVLBL=$row1["B_AVLBL"];
					$B_HIRD=$row1["B_HIRD"];
					
					$B_TOT=$B_AVLBL+$B_HIRD;
					
					if($B_AVLBL=='')
					{
						$B_AVLBL=0;
					}
					
					if($B_HIRD=='')
					{
						$B_HIRD=0;
					}
					
					if($B_TOT=='')
					{
						$B_TOT=0;
					}

					
					echo '<tr>
						  <td class="catCode">'.$row["ITM_CAT_CODE"].'</td>
						  <td class="name">'.$row["ITM_NAME"].' "'.$row["SIZE"].'"'.'</td>
						  <td class="totCnt">'.$B_TOT.'</td>
						  <td class="avlbl">'.$B_AVLBL.'</td>
						  <td class="hird">'.$B_HIRD.'</td>
						  <td class="dmg">0</td>
						  <td class="inactv">0</td>
					  </tr>';
				  }
			}
		}
		else
		{		
			echo '<tr>
					  <td class="catCode">'.$row["ITM_CAT_CODE"].'</td>
					  <td class="name">'.$row["ITM_NAME"].' "'.$row["SIZE"].'"'.'</td>
					  <td class="totCnt">'.$row["TOT_CNT"].'</td>
					  <td class="avlbl">'.$row["AVLBL"].'</td>
					  <td class="hird">'.$row["HIRD"].'</td>
					  <td class="dmg">'.$row["DMG"].'</td>
					  <td class="inactv">'.$row["INACTV"].'</td>
				  </tr>';
		}
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