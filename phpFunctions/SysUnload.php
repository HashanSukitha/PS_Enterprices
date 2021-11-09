<?php
session_start();
include('config.php');


$sql="UPDATE officer SET IS_LOGGED='NO' WHERE OFFI_CODE='".$_SESSION['OFFI_CODE']."'";
							$res=mysqli_query($con, $sql);

							if (!$res)
							  {
							  	die('Error: ' . mysqli_error($con));
							  }
							  else
							  {
							    echo "OK";
							  }
?>