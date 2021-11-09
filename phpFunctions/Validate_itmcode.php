<?php
include('config.php');


$itmCode=$_POST['itmCode'];

$sql = "SELECT * FROM items WHERE ITM_CODE='".$itmCode."'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{
    
    echo 1;
	

} 
else 
{
    echo 0;
}

mysqli_close($con);



?> 