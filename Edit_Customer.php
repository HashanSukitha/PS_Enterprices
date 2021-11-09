<?php
include('phpFunctions\config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

$sql = "SELECT * FROM customer c , guarantor g where c.CL_CODE=g.CLCODE and c.CL_CODE='".$_GET['clcode']."'";

$result = mysqli_query($con, $sql);

$CL_CODE ="";
$CL_TITLE  ="";
$CL_NAME  ="";
$CL_ADD_B  ="";
$CL_ADD_P  ="";
$CL_ADD_W  ="";
$CL_TEL_B  ="";
$CL_TEL_P  ="";
$CL_TEL_W  ="";
$CL_NIC  ="";
$CL_EMAIL  ="";

$GU_TITLE  ="";
$GU_NAME  ="";
$GU_ADD_B  ="";
$GU_ADD_P  ="";
$GU_ADD_W  ="";
$GU_TEL_B  ="";
$GU_TEL_P  ="";
$GU_TEL_W  ="";
$GU_NIC  ="";
$GU_EMAIL  ="";

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

	while($row = mysqli_fetch_assoc($result)) 
	{		

		$CL_CODE = $row["CL_CODE"];
		$CL_TITLE = $row["CL_TITLE"];
		$CL_NAME = $row["CL_NAME"];
		$CL_ADD_B = $row["CL_ADD_B"];
		$CL_ADD_P = $row["CL_ADD_P"];
		$CL_ADD_W = $row["CL_ADD_W"];
		$CL_TEL_B = $row["CL_TEL_B"];
		$CL_TEL_P = $row["CL_TEL_P"];
		$CL_TEL_W = $row["CL_TEL_W"];
		$CL_NIC = $row["CL_NIC"];
		$CL_EMAIL = $row["CL_EMAIL"];
		
		 
		$GU_TITLE = $row["GU_TITLE"];
		$GU_NAME = $row["GU_NAME"];
		$GU_ADD_B = $row["GU_ADD_B"];
		$GU_ADD_P = $row["GU_ADD_P"];
		$GU_TEL_B = $row["GU_TEL1"];
		$GU_TEL_P = $row["GU_TEL2"];
		$GU_TEL_W = $row["GU_TEL3"];
		$GU_NIC = $row["GU_NIC"];
		$GU_EMAIL = $row["GU_EMAIL"];
	}

}

mysqli_close($con);

 

	
echo '<div class="frame">	
	 <form>
	  
		  <div id="cretCol1" class="creCols">
		      <p>Customer Details</p>
		    <div class="innerCol">
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						CLCODE
					 </div>
					 
					 <div class="cretControls">
						<input type="text" name="CLCODE" id="CLCODE" readonly value="'.$CL_CODE.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Title
					 </div>
					 
					 <div class="cretControls">
					   <select name="CLTITLE" id="CLTITLE" style="font-size:15px">
					   		<option'; if($CL_TITLE =="Mr.") echo 'selected="selected"'; echo '>Mr. </option>
							<option'; if($CL_TITLE =="Mrs.") echo 'selected="selected"'; echo '>Mrs. </option>
							<option'; if($CL_TITLE =="Miss.") echo 'selected="selected"'; echo '>Miss. </option>
							<option'; if($CL_TITLE =="Company:-") echo 'selected="selected"'; echo '>Company:- </option>
					   </select>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Name
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLNAME" id="CLNAME" value="'.$CL_NAME.'"/>
					 </div>
				 </div>
				   
				 <div class="cretContner">
					 <div class="cretDescrptns">
						NIC/Drivig Licence/Passport
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLNIC" id="CLNIC" onblur="NIC_Validate()" value="'.$CL_NIC.'"/>
					 </div>
				 </div>
				   
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Current Address (Bording)
					 </div>
					 
					 <div class="cretControls">
						<textarea name="CLCURRADD" id="CLCURRADD" cols="35" rows="1">'.$CL_ADD_B.'</textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Permanent Address (NIC)
					 </div>
					 
					 <div class="cretControls">
						<textarea name="CLPERRADD" id="CLPERRADD" cols="35" rows="1">'.$CL_ADD_P.'</textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Working Place Address (Site)
					 </div>
					 
					 <div class="cretControls">
						<textarea name="CLWRKADD" id="CLWRKADD" cols="35" rows="1">'.$CL_ADD_W.'</textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Current)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLCURTEL" id="CLCURTEL" value="'.$CL_TEL_B.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Permanent)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLPERTEL" id="CLPERTEL" value="'.$CL_TEL_P.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Work Place)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLWRKTEL" id="CLWRKTEL" value="'.$CL_TEL_W.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						E-mail
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="CLEMAIL" id="CLEMAIL" style="font-family:Arial, Helvetica, sans-serif" value="'.$CL_TEL_W.'"/>
					 </div>
				 </div>
				 
			</div>
		 </div>
		 
		 <div id="cretCol2" class="creCols">
		 	 <p>Guarantor Details</p>
		    <div class="innerCol">
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Title
					 </div>
					 
					 <div class="cretControls">
					   <select name="GUTITLE" id="GUTITLE" style="font-size:15px">
					   		<option'; if($GU_TITLE =="Mr.") echo 'selected="selected"'; echo '>Mr. </option>
							<option'; if($GU_TITLE =="Mrs.") echo 'selected="selected"'; echo '>Mrs. </option>
							<option'; if($GU_TITLE =="Miss.") echo 'selected="selected"'; echo '>Miss. </option>
							<option'; if($GU_TITLE =="Company:-") echo 'selected="selected"'; echo '>Company:- </option>
					   </select>
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Name
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUNAME" id="GUNAME" value="'.$GU_NAME.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						NIC
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUNIC" id="GUNIC" value="'.$GU_NIC.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
					   Current Address
					 </div>
					 
					 <div class="cretControls">
					   <textarea name="GUCURADD" id="GUCURADD" cols="35" rows="1">'.$GU_ADD_B.'</textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
					   Permanet Address
					 </div>
					 
					 <div class="cretControls">
					   <textarea name="GUPERADD" id="GUPERADD" cols="35" rows="1">'.$GU_ADD_P.'</textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Current)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUCURTEL" id="GUCURTEL" value="'.$GU_TEL_B.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Permanent)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUPERTEL" id="GUPERTEL" value="'.$GU_TEL_P.'"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Work Place)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUWRKTEL" id="GUWRKTEL" value="'.$GU_TEL_W.'"/>
					 </div>
				 </div>
								
				 <div class="cretContner">
					 <div class="cretDescrptns">
						E-mail
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="GUEMAIL" id="GUEMAIL" style="font-family:Arial, Helvetica, sans-serif" value="'.$GU_EMAIL.'"/>
					 </div>
				 </div>
			 </div>
		 </div>';
		 
		 if (file_exists('img_bank/'.$CL_CODE.'.png'))
		 {
		 
		 }
		 else
		 {
		echo '<div class="creCols" id="cretCol3" >
		    <div class="innerCol">
		 	 <video  autoplay="true" id="videoElement" width="332" height="250">
	
			 </video>
			  </br>
	           <input type="button" name="tkPhto" value="Take Photo" class="Button" onClick="capture()" id="tkPhto"/>
			   <canvas id="imgCanvas" width="332px" height="250px"></canvas>
	 		</div>
		 </div>'; 
		 
		 echo '<script>
							 var video = document.querySelector("#videoElement");	
						navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
						
						if (navigator.getUserMedia) 
						{       
							navigator.getUserMedia({video: true}, handleVideo, videoError);
						}
						
						function handleVideo(stream) 
						{
							video.src = window.URL.createObjectURL(stream);
						}
						
						function videoError() 
						{
							// do something
						}
		 	   </script>';
		 }
		 
		 echo '<div id="controls" class="creCols">
		   <input type="button" name="CLSAVE" value="Save Edited" class="Button" id="clsave" onclick="validateEdited()"/>
		 </div>
	  </form>
</div>';	  
?>  
	  
<script>
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });


	/**/
</script>