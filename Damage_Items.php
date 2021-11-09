<?php
include('phpFunctions/config.php');



$sql = "SELECT I.ITM_CAT_CODE'ITM_CAT_CODE',
			   I.ITM_NAME'ITM_NAME',
			   I.ITM_CODE'ITM_CODE',
			   I.SIZE'SIZE',
			   I.ITM_DLY_CHG'ITM_DLY_CHG',
			   I.ITM_DLY_DPST'ITM_DLY_DPST',
			   I.ITM_MNLY_CHG'ITM_MNLY_CHG',
			   I.ITM_MNLY_DPST'ITM_MNLY_DPST',
			   I.ITM_VAL'ITM_VAL',
			   (SELECT S.ITM_STS FROM itm_status S  WHERE ITM_STS_CODE=I.ITM_STS)'ITM_STS',
			   (SELECT DMG_DATE FROM item_damages WHERE DMG_ITM_CODE=I.ITM_CODE AND DMG_STS='pending')'DMG_DATE'
		FROM items I, item_damages D
		WHERE I.ITM_STS='D' AND 
			   D.DMG_STS='pending' AND
			   I.ITM_CODE=D.DMG_ITM_CODE";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

echo '<div class="vwItmSrchBox">';
		echo '<p>Change Item Status</p>';
		echo '<div class="srchCntner">
			  
			  <input type="text" id="srchByName" value="By Itm Name"/>
			  <input type="text" id="srchByCatCode" value="By Category Code"/>
			  <input type="text" id="srchByCntct" value="By Itm Code"/>
			  
			  </div>';
echo '</div>';

echo '<div id="dmagEntryFrm" style="height: 525px;">
		<div id="dmgFrmClose" onClick="closeFrm(\'dmagEntryFrm\')">X</div>
		<p id="dmgHeader">Damage Item Entry Form</p>
		<table border="1">
			<tr>
			  <td class="left">Item Code</td>
			  <td class="right"><input type="text" id="dmgItmCode" readonly /></td>
			</tr>
			<tr>
			  <td class="left">Job Number</td>
			  <td class="right"><input type="text" id="dmgItmContr"/></td>
			</tr>
			<tr>
			  <td class="left">Returned Location</td>
			  <td class="right"><select disabled id="DmgRtnLoc"><option>Office</option><option>Warehouse</option></select></td>
			</tr>
			<tr>
			  <td class="left">Comments</td>
			  <td class="right"><textarea readonly col="50" rows="10" id="dmgComment"></textarea></td>
			</tr>
			<tr>
			  <td class="left">Work Shop Comments</td>
			  <td class="right"><textarea col="50" rows="10" id="WrkShpComment"></textarea></td>
			</tr>
			<tr>
			  <td class="left">Amount</td>
			  <td class="right"><input type="text" id="dmgItmRepAmt"/></td>
			</tr>
		</table>
		 <input type="button" id="dmgSave" value="SAVE" onClick="saveDmagesWorkshop()"/>
	  </div>';


echo '<div id="ItmStsChng">';
    echo '<div id="vwItmContainer">';
			while($row = mysqli_fetch_assoc($result)) 
			{		
			 $color='';
			 if ($row["ITM_STS"]=='Available')
			 {
			   $color='background:#19C100;';
			 }
			 else if($row["ITM_STS"]=='Inactive')
			 {
			   $color='background:#4400E2;';
			 }
			 elseif($row["ITM_STS"]=='Damaged')
			 {
			   $color='background:#E20000;';
			 }
			 elseif($row["ITM_STS"]=='Hired')
			 {
			   $color='background:#959694;';
			 }
			
				echo '<div class="vwRow">';
						echo '<div class="vwLeft">';
						
							  echo '<div class="vwItemCode">';
							        echo '<div class="ItmCatCode">'.$row["ITM_CAT_CODE"].'</div>';
									echo '<div class="itmCodeCntner">'.$row["ITM_CODE"]."</div>";
									echo '<div class="vwItmSts" style="'.$color.'">'.$row["ITM_STS"].'</div>';
							  echo '</div>';
							  
							  echo '<div class="vwDtlBox" style="width:390px">';
									echo  '<p>Item Category Code     :- '.$row["ITM_CAT_CODE"].'</p></br>';
									echo  '<p>Item Code              :- '.$row["ITM_CODE"].'</p></br>';
									echo  '<p>Item Name              :- '.$row["ITM_NAME"].'</p></br>';
									echo  '<p>Item Size              :- '.$row["SIZE"].'</p></br>';
					  		  echo '</div>'; 
							  
							  echo '<div class="editBtnBox">
							  				<a href="javascript:ViewDMGdetails('.$row["ITM_CODE"].')" class="EditBtn">View</a>
									</div>';
			
						echo '</div>';
						
						echo '<div id="dmgDate">'.$row["DMG_DATE"].'</div>';
						
						//echo '<div class="ItmStsBox">'; ?>
									<!--<select>
<option onclick="UpdateDmgItmStatus('<?php //echo $row["ITM_CODE"]; ?>','A')" value="A" <?php //if($row["ITM_STS"]=="Available") echo 'selected="selected"'; ?>>Available</option>
<option onclick="UpdateDmgItmStatus('<?php //echo $row["ITM_CODE"]; ?>','D')" value="D" <?php //if($row["ITM_STS"]=="Damaged") echo 'selected="selected"'; ?>>Damaged</option>
									</select>-->
							<?php  //echo '</div>';
				echo '</div>';
			}
    echo '</div>';
echo '</div>';
}

mysqli_close($con);



?> 