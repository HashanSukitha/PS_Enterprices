<?php
//include('config.php');
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include($root.'/phpFunctions/config.php');




$sql = "SELECT * FROM customers";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{

    while($row = mysqli_fetch_assoc($result)) 
	{
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	}
} 
else 
{
    echo "0 results";
}

mysqli_close($con);



?> 