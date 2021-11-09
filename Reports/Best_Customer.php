<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('../phpFunctions/config.php');
?>

<div id="stkListRpt">
Best Value




<?php
$sql = "SELECT (SELECT COUNT( * ) FROM contract_header	WHERE CL_CODE = C.CL_CODE) 'TKN_COUNT',
				C.CL_CODE'CL_CODE', 
				C.CONTR_AMT'CONTR_AMT', 
				(SELECT CONCAT( CL_TITLE, CL_NAME )	FROM customer WHERE CL_CODE = C.CL_CODE) 'NAME'
		FROM (
				SELECT CAST( CONTR_AMT AS DECIMAL( 12, 2 ) ) 'CONTR_AMT', CL_CODE
				FROM contract_header
				ORDER BY CAST( CONTR_AMT AS DECIMAL( 12, 2 ) ) DESC
				LIMIT 10
			 )C";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{	echo '<table border="1">
				<tr>  	
  					<td>Count</td>
  					<td>Client Code</td>
  					<td>Contract Amount</td>
  					<td>Client Name</td>

				</tr>';
    while($row = mysqli_fetch_assoc($result)) 
	{
		echo '<tr>
		
				  <td class="catCode">'.$row["TKN_COUNT"].'</td>
				  <td class="name">'.$row["CL_CODE"].'</td>
				  <td class="totCnt">'.$row["CONTR_AMT"].'</td>
				  <td class="avlbl">'.$row["NAME"].'</td>
				  
			  </tr>';
	}
	echo '</table>';
}
//===========================================================================================================================
$sql = "SELECT  CC.TKN_COUNT'TKN_COUNT',
	   			CC.CL_CODE'CL_CODE',
	   			CONCAT(C.CL_TITLE,C.CL_NAME)'NAME',
	   			(SELECT SUM(CONTR_AMT) FROM contract_header WHERE CL_CODE=CC.CL_CODE )'CONTR_AMT'
		FROM 
			(SELECT COUNT(CL_CODE)'TKN_COUNT',CL_CODE FROM contract_header GROUP BY CL_CODE ORDER BY TKN_COUNT DESC LIMIT 10) CC , customer C
		WHERE CC.CL_CODE=C.CL_CODE";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		echo '<tr>
		
				  <td class="catCode">'.$row["TKN_COUNT"].'</td>
				  <td class="name">'.$row["CL_CODE"].'</td>
				  <td class="totCnt">'.$row["CONTR_AMT"].'</td>
				  <td class="avlbl">'.$row["NAME"].'</td>
				  
			  </tr>';
	}
}

mysqli_close($con);
?>



</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>