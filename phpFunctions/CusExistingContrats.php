<?php
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');


$sql = "SELECT CONTR_NO FROM `contract_header` WHERE CL_CODE='".$_POST['custCode']."' AND CONTR_STS='A'";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con)); 
} 
else 
{
   while($row = mysqli_fetch_assoc($result)) 
	{
        echo $row["CONTR_NO"].',';
	}
}

mysqli_close($con);



?> 