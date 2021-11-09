<?php
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

$NICNO=$_POST['NICNO'];

$sql = "SELECT * FROM customer WHERE CL_NIC='".$NICNO."'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{

    // normal existing
	// 
	
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["CL_STS"]=='B')
		{
		  	echo 2;
		}
		else
		{
			echo 1;
		}
	}
	
} 
else 
{
    echo 0;
}

mysqli_close($con);



?> 