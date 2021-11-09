<?php
include('..\phpFunctions\config.php');
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

			   			$sql = str_replace("-", " ", $_GET['qry']);
						$result = mysqli_query($con, $sql);

						if (!$result) 
						{
							die('Error: ' . mysqli_error($con));
						} 
						else 
						{

							echo '<div id="vwCustContainer">';
							while($row = mysqli_fetch_assoc($result)) 
							{		
								echo '<div class="vwRow">';
										echo '<div class="vwLeft">';
										
											  echo '<div class="vwCLCODDE">';
													echo $row["CL_CODE"];
											  echo '</div>';
											  
											  
											  $code=$row["CL_CODE"];
											  $name="'".$row["CL_TITLE"].'.'.$row["CL_NAME"]."'";
											  $nic="'".$row["CL_NIC"]."'";
											  $tel1="'".$row["CL_TEL_B"]."'";
											  $tel2="'".$row["CL_TEL_P"]."'";
											  $tel3="'".$row["CL_TEL_W"]."'";
											  
											echo '<div class="vwDtlBox" onClick="SelectedCustomer('.$code.','.$name.','.$nic.','.$tel1.','.$tel2.','.$tel3.')">';
													echo  '<p class="ClName">Client Name :- '.$row["CL_TITLE"].'.'.$row["CL_NAME"].'</p></br>';
													echo  '<p>Current Address        :- '.$row["CL_ADD_B"].'</p></br>';
													echo  '<p>Permanent Address      :- '.$row["CL_ADD_P"].'</p></br>';
													echo  '<p>Working Place Address  :- '.$row["CL_ADD_W"].'</p></br>';
													echo  '<p>Tel 1                  :- '.$row["CL_TEL_B"].'</p></br>';
													echo  '<p>Tel 2                  :- '.$row["CL_TEL_P"].'</p></br>';
													echo  '<p>Tel 3                  :- '.$row["CL_TEL_W"].'</p></br>';
													echo  '<p>Customer NIC           :- '.$row["CL_NIC"].'</p></br>';
													echo  '<p>Customer E-Mail        :- '.$row["CL_EMAIL"].'</p></br>';
											  echo '</div>';
						
										echo '</div>';
										
									
										
										$imgPath="img_bank/".$row["CL_CODE"].".png";
										
										if (file_exists('../img_bank/'.$row["CL_CODE"].'.png'))
										{
											echo '<a class="example-image-link" href="'.$imgPath.'" data-lightbox="example-1">';
												echo '<div class="vwRight" style="background:url(img_bank/'.$row["CL_CODE"].'.png) no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0);">';   
												echo '</div>';
											echo '</a>';
										} 
										else 
										{
											echo '<div class="vwRight">';   
											echo '</div>';
										}
										
										
										
								echo '</div>';
							}
    						echo '</div>';
						   }

							mysqli_close($con);
							?> 