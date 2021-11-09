<?php
include('config.php');


$sql = "SELECT * FROM item_damages WHERE DMG_ITM_CODE='".$_POST['ITMcODE']."' AND DMG_STS='pending'";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con)); 
} 
else 
{
   while($row = mysqli_fetch_assoc($result)) 
	{
        echo $row["DMG_CONTR_NO"].'/'.$row["DMG_ITM_RTN_LOC"]."/".$row["DMG_COMMENTS"]."/";
	}
}

mysqli_close($con);



?> 