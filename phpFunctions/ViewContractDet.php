<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('config.php');
?>

<div class="vwContrSrchBox">
	 	<p>Details</p>
					  
			  <input type="Button" id="ContrGoBack" value=" <<< Back" onclick="Goback()"/>		  
	
</div>

<div id="ContrDetCntnr">

<?php
$x=$_GET['Contr_No'];
//===========================================================================================================================================
$sql10 = "SELECT COUNT(*)'NF_ITEMS' FROM item_taken WHERE CONTR_NO='".$x."'";
$result10 = mysqli_query($con, $sql10);		
if (!$result10) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
	while($row10 = mysqli_fetch_assoc($result10)) 
	{
		$runningItmCnt=$row10["NF_ITEMS"];
	}
}
//===========================================================================================================================================
$sql12 = "SELECT COUNT(*)'IS_ALL_RETURNED' FROM contract_details WHERE CONTR_NO='".$x."' AND RETURN_STS='NO'";
$result12 = mysqli_query($con, $sql12);		
if (!$result12) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
	while($row12 = mysqli_fetch_assoc($result12)) 
	{
		$IsAllRtned=$row12["IS_ALL_RETURNED"];
	}
}
//===========================================================================================================================================
$CONTR_STS='';

$sql = "SELECT * FROM contract_header C, customer CC where C.CL_CODE=CC.CL_CODE AND C.CONTR_NO='".$x."'";
		
$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{					
		while($row = mysqli_fetch_assoc($result)) 
		{
				$CONTR_STS=$row["CONTR_STS"];
			echo '<div id="UpdateDepositBox">
							<div id="dmgFrmClose" onClick="closeFrm(\'UpdateDepositBox\')">X</div>
							<p id="dmgHeader">Update Contract Deposit Form</p>
							<table border="1">
								<tr>
									<td class="left">Contract Number</td>
									<td><input type="text" id="UpdtDpstContNo" value="'.$row["CONTR_NO"].'" readonly/></td>
								</tr>
								<tr>
									<td class="left">Deposit Amount</td>
									<td><input type="text" id="UpdtDpstAmt" value="'.$row["CONTR_DEP_TOT"].'" readonly/></td>
								</tr>
								<tr>
									<td class="left">New Deposit Amount</td>
									<td><input type="text" id="UpdtDpstNewAmt" value=""/></td>
								</tr>
							</table>
							<input type="Button" value="UPDATE" id="UpdtDpstButtn" onClick="UpdateDeposit(\''.$row["CONTR_NO"].'\')"/>
				</div>';
			echo '<div id="dmagEntryFrm">
						<div id="dmgFrmClose" onClick="closeFrm(\'dmagEntryFrm\')">X</div>
						<p id="dmgHeader">Damage Item Entry Form</p>
						<table border="1">
							<tr>
							  <td class="left">Item Code</td>
							  <td class="right"><input type="text" id="dmgItmCode"/></td>
							</tr>
							<tr>
							  <td class="left">Contract Number</td>
							  <td class="right"><input type="text" id="dmgItmContr"/></td>
							</tr>
							<tr>
							  <td class="left">Returned Location</td>
							  <td class="right"><select id="DmgRtnLoc"><option>Office</option><option>Warehouse</option></select></td>
							</tr>
							<tr>
							  <td class="left">Comments</td>
							  <td class="right"><textarea col="50" rows="10" id="dmgComment"></textarea></td>
							</tr>
						</table>
						 <input type="button" id="dmgSave" value="SAVE" onClick="saveDmages()"/>
					</div>';	
			
					
							
		    echo '<div id="CntrClintDetBox">';
					
				if($row["CONTR_STS"]=='I')
				{
					 echo '<div id="closedBanner""></div>';
				}
				else
				{
					echo '<div id="closedBanner" style="display:none;"></div>';
				}
					 
				echo '<div id="minimizeCusDet" onClick="minimizeToLeft()"></div>';
			      
			    echo '<div class="ContrHeaders">
						<p>Customer Details</p>
					  </div>';
				
				echo '<div id="cntrCusDetHolder">';
						echo'<div id="cntrCusdetBox">';
						
						$imgPath='img_bank/'.$row["CL_CODE"].'.png';
						$imgBoxString='';
						if (file_exists('../img_bank/'.$row["CL_CODE"].'.png'))
						{
							$imgBoxString= '<a class="example-image-link" href="'.$imgPath.'" data-lightbox="example-1" style="float:right">
												<div class="vwRight" style="background:url(img_bank/'.$row["CL_CODE"].'.png) no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0);">   
												</div>
											</a>';
						} 
						else 
						{
							$imgBoxString= '<div class="vwRight">   
											</div>';
						}
						
						echo '<table border="1">
						
								<tr>
									<td width="115px">'.$imgBoxString.'</td>
									<td style="text-align:center;"></td>
								</tr>
								
								<tr>
									<td>Customer Code</td>
									<td>'.$row["CL_CODE"].'</td>
								</tr>
								
								<tr>
									<td>Customer Name</td>
									<td>'.$row["CL_NAME"].'</td>
								</tr>
								
								<tr>
									<td>NIC/Drivig Licence/Passport</td>
									<td>'.$row["CL_NIC"].'</td>
								</tr>
								
								<tr>
									<td>E-mail</td>
									<td>'.$row["CL_EMAIL"].'</td>
								</tr>
								
								<tr>
									<td>Contact Numbers</td>
									<td>
										<table border="1" width="100%">
											<tr><td>Bording</td><td>'.$row["CL_TEL_B"].'</td></tr>
											<tr><td>Permanent</td><td>'.$row["CL_TEL_P"].'</td></tr>
											<tr><td>Work Place</td><td>'.$row["CL_TEL_W"].'</td></tr>
										</table>
									</td>
								</tr>
								
								<tr>
									<td>Addresses</td>
									<td><table border="1" width="100%">
											<tr><td>Bording</td><td>'.$row["CL_ADD_B"].'</td></tr>
											<tr><td>Permanent</td><td>'.$row["CL_ADD_P"].'</td></tr>
											<tr><td>Work Place</td><td>'.$row["CL_ADD_W"].'</td></tr>
										</table>
								</tr>
								
								
							  </table>';
						echo'</div>';	
					
					
	$contrAmt='';
	$contrDpsitAmt='';
	$contrPnalty='';
				
				echo '</div>';
				
				echo '<div class="ContrHeaders">
						<p>Contract Details</p>
				  	  </div>';
				  
				echo '<div id="cntrDetHolder">';  
				
					
				
				  echo '<table border="1">
				  			<tr>
								<td>Contract Number</td>
								<td><div id="cntrNo">'.$row["CONTR_NO"].'</div></td>
							</tr>
							
							<tr>
								<td>Contract Date</td>
								<td>'.$row["CONTR_DATE"].'</td>
							</tr>
							
							<tr>
								<td>Number of Items</td>
								<td>'.$row["N_OF_ITMS"].'</td>
							</tr>
							
							<tr>
								<td>Contract Amount</td>
								<td>Rs.'.$row["CONTR_AMT"].'</td>
							</tr>
							
							<tr>
								<td>Deposit Amount</td>
								<td><p style="float: left;margin: 0; width: 20px;">Rs.</p><p id="ContrDepsitAmt" style=" float: left;margin: 0; width: 100px;">'.$row["CONTR_DEP_TOT"].'</p>';   
								if($CONTR_STS=='A')
								{
				echo '<input type="button" id="UpdtDepstBtn" value="UPDATE" onClick="ShowUpdateDeposit('.$row["CONTR_NO"].')" /> ';
								}
						echo '</td>
						</tr>
							
							<tr>
								<td style="color:#FF0000;font-weight:Bold">Close Contract</td>';
								
								if($CONTR_STS=='A')
								{
								   echo '<td> <input type="button" value="CLOSE" id="ClosContrBtn" onClick="CloseContr('.$x.')" /> </td>';
								}
								else
								{
								echo '<td></td>';
								}
								
							echo '</tr>
							<tr>
								<td>Add Extra Charge</td>
								<td>
								    Description<input type="text" id="extraDesc" /></br>
									Amount<input type="text" id="extraAmt"/>
									<input type="button" value="ADD" onClick="saveExtraCharges('.$x.')" /></td>
							</tr>
				  		</table>';
						
				  echo '<div id="temp" style="height:226px;overflow:scroll">
						  </div>';
						  
				echo '</div>';
				
				
			echo '</div>';
			
			$contrAmt=$row["CONTR_AMT"];
			$contrDpsitAmt=$row["CONTR_DEP_TOT"];
			$contrPnalty=$row["PENALTY_AMT"];
			
		}
}
//=========================================================================================
echo '<div id="ReturningQtyBox" style="height:167px; width:332px; left:38%;">
							<div id="dmgFrmClose" onClick="closeFrm(\'ReturningQtyBox\')">X</div>
							<p id="dmgHeader">Returning Quantity Form</p>
							<table border="1">
							
								<tr>
									<td class="left">Item Code</td>
									<td><input type="text" id="RtningItmCode" value="" readonly style="text-align:center;"/></td>
								</tr>
								<tr>
									<td class="left">Quantity</td>
									<td><input type="text" id="RtningQty" value="" onKeyUp="validateQty()" /></td>
								</tr>
								<div id="PartRtnRowValues" style="display:none">
									<input id="RtnIrowId" type="hidden" value=""/>
									<input id="RtnIdesc" type="hidden" value=""/>
									<input id="RtnIhfrom" type="hidden" value=""/>
									<input id="RtnIhto" type="hidden" value=""/>
									<input id="RtnIdays" type="hidden" value=""/>
									<input id="RtnIbsis" type="hidden" value=""/>
									<input id="RtnIcharg" type="hidden" value=""/>
									<input id="RtnIqty" type="hidden" value=""/>
									<input id="RtnItot" type="hidden" value=""/>
									<input id="RtnIpnlty" type="hidden" value=""/>
									<input id="RtnItknId" type="hidden" value=""/>
								</div>
							</table>
							<input type="Button" value="Return" id="RetuningRtnBtn" onClick="validatePartReturn()" style="margin:10px 117px 0 0;"/>
				</div>';
//=========================================================================================

$result =mysqli_query($con,"CALL GET_CONTR_ITMS('".$x."')");

if (!$result) 
{
	//die('Error: ' . mysqli_error($con));
} 
else 
{
	
	
    echo '<div id="contrRight">';
		echo '<div id="CntrItmDetBox">';
			    echo '<div class="ContrItmDetHeaders">
						<p>Item Details</p>
					  </div>';
				echo '<div id="SeltdItmGridHeader">
						<p id="itmCodeH">Code</p>
						<p id="itmNameH">Item</p>
						<p id="fromH">Hire From</p>
						<p id="toH">Hire To</p>
						<p id="nofDaysH">No:of Days</p>
						<p id="dlyChrg">Charge</p>
						<p id="qty">Qty</p>
						<p id="itmTotl">Item Total</p>
						<p id="itmPnlty">Item Penalty</p>
					</div>';	
				$rowCount=0;
			echo '<div id="cntrItmDetHolder">';

			while($row = (mysqli_fetch_assoc($result)))
			{
							
							//if($row["I_PNLTY1"]==0){ $pnlty=0; } else { $pnlty=$row["I_PNLTY1"];}
//<p class="itmPnlty"><input class="dts" text="text" value="'.$pnlty.'" readonly/></p>
//==============================================================================================================================PANELTY SECTION
		date_default_timezone_set('Asia/Colombo');
		
		$pnlty=0;
		$date1=date_create(date("Y-m-d"));
		$date2=date_create($row["HTO"]);
		$Ddiff=date_diff($date1,$date2);
		
	if($date2<=$date1)
	{
			$Ddiff=(($Ddiff->format("%a")));
			
			 if(date('H:i', time())>'09:00')
			 {
				$Ddiff=$Ddiff+1 ;
			 }

		if($row["BASIS"]=="Daily")
		{
			$pnlty=(( floatval($Ddiff) * floatval($row["DLYCHG1"]))*$row["TKNQTY1"]);
		}
		else
		{
			$pnlty=((  floatval($Ddiff) * floatval($row["MNTLY_CHG"]))*$row["TKNQTY1"]);
		}
		
		$contrPnalty=$contrPnalty+$pnlty;
	}
	
	if($row["BASIS"]=='Daily')
	{
		$ItmTotal=(($row["DLYCHG1"]*$row["DAYS1"])*$row["TKNQTY1"]);
		$charge=$row["DLYCHG1"];
		
	}
	else
	{
		$ItmTotal=(($row["MNTLY_CHG"]*$row["DAYS1"])*$row["TKNQTY1"]);
		$charge=$row["MNTLY_CHG"];
		
	}
	
	if($row["ITM_TYPE"]=='Bulk')
	{
		$QtyBtn='style="width:68px;"/>
					<input style="width:10px;" id="RtnOtherQtyBtn" type="button" value="..." 
					onClick="showRtnBox(\''.$row["ITM_CDE4"].'\',\''.$rowCount.'\',\''.$row["ITMNM"].'\',\''.$row["TAKEN_DAT"].'\',\''.$row["HTO"].'\',\''.$row["DAYS1"].'\',\''.$row["BASIS"].'\',\''.$row["TKNQTY1"].'\',\''.$ItmTotal.'\',\''.$pnlty.'\',\''.$charge.'\',\''.$row["TAKEN_ID"].'\')"/>';
	}
	else
	{
		$QtyBtn='/>';
	}
		//$pnlty = date("h:i");  date("Y-m-d");  date("h:i");  date('H:i', time());
//=========================================================================================================================END PANELTY SECTION		
					echo '<div id="'.$rowCount.'"  class="SlctdItmRow">
							<p class="codeVal">'.$row["ITM_CDE4"].'</p>
							<p class="nameVal">'.$row["ITMNM"].'</p>
							<p class="hirFrm"><input class="dts" id="fday"  type="text" value="'.$row["TAKEN_DAT"].'" readonly/></p>
							<p class="hirTo"><input class="dts" id="tday"  type="text" value="'.$row["HTO"].'" readonly/></p>
							<p class="noFDays"><input class="dts" type="text" value="'.$row["DAYS1"].'" readonly/></p>
							<p class="dlyChrg"><input class="dts" type="text" value="'.$charge.'" readonly title="'.$row["BASIS"].'"/></p>
							<p class="qty">
									<input id="itmqty" class="dts" type="text" value="'.$row["TKNQTY1"].'" readonly 
									'.$QtyBtn.'
							</p>
							<p class="itmTot"><input class="dts" type="text" value="'.$ItmTotal.'" readonly/></p>
							<p class="itmPnlty"><input class="dts" type="text" value="'.$pnlty.'" readonly/></p>
							<p class="itmRbuttn">
												<select>
													<option></option> 
													<option onclick="addToItmRtn('.$rowCount.',\'no\')">Returned</option>
													<option onClick="DamegeEntry('.$row["ITM_CDE4"].')">Damaged</option>
												</select>
							</p>
							<p class="hidnVals" style="display:none;"><input type="hidden" id="takenId" value="'.$row["TAKEN_ID"].'"  /> </p>
							
							
						</div>';
								
					$rowCount=$rowCount+1;							
			}
//=============================================================================================================================================	


		if($runningItmCnt==0)
		{
			echo '<div style="background:#00007D; color: #F70000; font-size: 25px; margin: 0 auto; padding: 20px; text-align: center; width: 210px;">
						 			No Items Issued Yet
			      </div>';
			
		}
		if($IsAllRtned==0)
		{
			echo '<div style="background:#0BB200; color: #F70000; font-size: 25px; margin: 0 auto; padding: 20px; text-align: center; width: 210px;">
						 			All Items Returned
			      </div>';
		}	
		
		
//=============================================================================================================================================					
			echo '</div>';
		echo '</div>';
		
		echo '<div id="ReturnedItemCntnr">
					<div id="SeltdItmGridHeader">
						<p id="itmCodeH">Code</p>
						<p id="itmNameH">Item</p>
						<p id="fromH">Hire From</p>
						<p id="toH">Hire To</p>
						<p id="nofDaysH">No:of Days</p>
						<p id="dlyChrg">Charge</p>
						<p id="qty">Qty</p>
						<p id="itmTotl">Item Total</p>
						<p id="itmPnlty">Item Penalty</p>
					</div>
			  </div>';
			  
			 if($contrDpsitAmt==0)
			 {
			 	$amt=($contrAmt+$contrPnalty);
			 }
			 else
			 { 
			 	 if($contrAmt>$contrDpsitAmt)
				 {
				 	$amt=(($contrAmt+$contrPnalty)-$contrDpsitAmt);
				 }
				 else
				 {
				 	$amt=(($contrAmt+$contrPnalty)-$contrDpsitAmt)*-1;
				 }
				
			 }
			
		echo '<div id="contrDetControlBox">
				
				<p class="TotHeaders">Contract Totals</p>
				
				<table border="1">
					<tr>
						<td>Deposit Amount</td>
						<td></td>
						<td>Contract Amount</td>
						<td></td>
						<td>Penalty</td>
					</tr>
					
					<tr>
						
						<td>
							Rs.<input type="text" readonly value="'.$contrDpsitAmt.'" id="totDepst"/><br>
							   <input type="button"  value="REFUND" id="RfndContrDpst" onClick="CloseContr('.$x.')"/>
						</td>
						<td> </td>
						<td>Rs.<input type="text"  value="'.$contrAmt.'" id="CtrAmt" readonly/></td>
						<td> </td>
						<td>Rs.<input type="text"  value="'.$contrPnalty.'" id="CtrPnltAmt" readonly/></td>
					</tr>
				</table>
				
				
				<p class="TotHeaders">Item Totals</p>
				
				<table border="1">
						<tr>
							<td id="paidColorShowBox" style="background:#F7DA00">PAID<input onChange="paidTickChange()" type="checkBox" value="Paid" id="paidTick"/> </td>
							<td>Descount    <input type="checkbox" id="prcnge" value="" onchange="discount()" disabled />%</td>
						</tr>
						<tr>
		<td>
		Grand Total: Rs.  <input type="text" id="itmGrTot" value="0" readonly/>Paying Amt<input type="text" id="payAmt" value="0"/><br>Total: <input type="text" id="itmTot" value="0" readonly/> Penalty: <input type="text" id="itmPnltyTot" value="0" readonly/>
		</td>
							<td><input type="text" id="Descunt" value="0" onkeyup="discount()" readonly/></td>
						</tr>
				</table>
				
					<div id="BtnCntner">';
					
					
								if($CONTR_STS=='A')
								{
								
								echo '<input type="button" id="SaveReturnItm" value="Save Item Return" onclick="SaveItmReturn()"/>
									  <input type="button" value="Print Receipts" onClick="PrintItmRtnReceipt()" class="genButtons" style="float: left; height:50px;"/>';
									  
								echo'<script> j(document).ready(function() 
											  {
											 
											    j("#closedBanner").hide(); 
											  });
									 </script>';
								}
								else
								{
								echo'<script> j(document).ready(function() 
											  {
											  
											    j("#closedBanner").show(); 
											  });
									 </script>';
								}

					echo	'<input type="button"  value="clear" onclick="clr()"/>
					</div>
			  </div>';
			  
			  
	echo '</div>';		  
		 
}

mysqli_close($con);

?>




</div>