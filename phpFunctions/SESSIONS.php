<?php
session_start();
include('config.php');

//header('Location: ../Home.php');
//exit();  
if(!empty($_POST["un"]))
{
		$_SESSION['userName']=$_POST['un'];
		$_SESSION['pwd']=$_POST['pwd'];
		
		//echo $_SESSION['userName'];
		//echo $_SESSION['pwd'];
		

	

		
		
		$sql = "SELECT * FROM officer where USER_NAME='".$_POST['un']."' AND PWD='".$_POST['pwd']."'";
		
		$result = mysqli_query($con, $sql);
		
		if (mysqli_num_rows($result) > 0) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
			
				$sql1 = "SELECT IS_LOGGED FROM officer where USER_NAME='".$_POST['un']."' AND PWD='".$_POST['pwd']."'";	
			    $result1 = mysqli_query($con1, $sql1);
				while($row1 = mysqli_fetch_assoc($result1)) 
				{
					if($row["IS_LOGGED"]=='YES')
					{
		  				die('Multi Windows Not Possiable, Your Have Already Logged In' . mysqli_error($con));
					}
					else
					{
					
							$sql="UPDATE officer SET IS_LOGGED='YES' WHERE USER_NAME='".$_POST['un']."' AND PWD='".$_POST['pwd']."'";
							$res=mysqli_query($con, $sql);

							if (!$res)
							  {
							  	die('Error: ' . mysqli_error($con));
							  }
							  else
							  {
							  		$_SESSION['OFFI_CODE']= $row["OFFI_CODE"];
									$_SESSION['OFFI_FULLNAME']=$row["OFFI_NAME"];
									//header('Location: ../Home.php');
									echo "OK";
							  }
					
						
					}
				}
			
			
			
			   
			}
		} 
		else 
		{
			die('Error: Invalid "User Name" / "Password" ' . mysqli_error($con));

		}
		
		mysqli_close($con);
}

?>