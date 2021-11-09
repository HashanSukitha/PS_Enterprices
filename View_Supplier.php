<?php
include('phpFunctions\config.php');



$sql = "SELECT * FROM suppliers";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

echo '<div class="vwSupSrchBox">';
		echo 'Supplier Details';
echo '</div>';

    echo '<div id="vwCustContainer">';
	while($row = mysqli_fetch_assoc($result)) 
	{		
		echo '<div class="vwRow">';
				echo '<div class="vwLeft">';
				
					  echo '<div class="vwCLCODDE">';
							echo $row["SUP_CODE"];
					  echo '</div>';
					  
					  echo '<div class="vwDtlBox">';
							echo  $row["SUP_NAME"];
					  echo '</div>';

				echo '</div>';
				
				
				
				
				
				
				
				
		echo '</div>';
	}
    echo '</div>';
}

mysqli_close($con);



?> 