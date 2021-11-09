<?php
include('phpFunctions\config.php');



$sql = "SELECT I.ITM_CAT_CODE'ITM_CAT_CODE',
			   I.ITM_NAME'ITM_NAME',
			   I.ITM_CODE'ITM_CODE',
			   I.SIZE'SIZE',
			   I.ITM_DLY_CHG'ITM_DLY_CHG',
			   I.ITM_DLY_DPST'ITM_DLY_DPST',
			   I.ITM_MNLY_CHG'ITM_MNLY_CHG',
			   I.ITM_MNLY_DPST'ITM_MNLY_DPST',
			   I.ITM_VAL'ITM_VAL',
				(SELECT S.ITM_STS 
	 			 FROM itm_status S 
	 			 WHERE ITM_STS_CODE=I.ITM_STS)'ITM_STS'
		FROM items I";

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
							  
							  echo '<div class="vwDtlBox">';
									echo  '<p>Item Category Code     :- '.$row["ITM_CAT_CODE"].'</p></br>';
									echo  '<p>Item Code              :- '.$row["ITM_CODE"].'</p></br>';
									echo  '<p>Item Name              :- '.$row["ITM_NAME"].'</p></br>';
									echo  '<p>Item Size              :- '.$row["SIZE"].'</p></br>';
									echo  '<p>Daily Charge           :- '.$row["ITM_DLY_CHG"].'</p></br>';
									echo  '<p>Daily Deposit          :- '.$row["ITM_DLY_DPST"].'</p></br>';
									echo  '<p>Monthly Charge         :- '.$row["ITM_MNLY_CHG"].'</p></br>';
									echo  '<p>Monthyl Deposit        :- '.$row["ITM_MNLY_DPST"].'</p></br>';
									echo  '<p>Item Value             :- '.$row["ITM_VAL"].'</p></br>';
					  		  echo '</div>'; 
			
						echo '</div>';
						
						echo '<div class="ItmStsBox">'; ?>
<select <?php if($row["ITM_STS"]=="Damaged") echo 'disabled'; ?>>
<option value="A" <?php if($row["ITM_STS"]=="Available") echo 'selected="selected"'; ?> onClick="UpdateItmStatus('<?php echo $row["ITM_CODE"]; ?>',this.value)">Available</option>
<option value="I" <?php if($row["ITM_STS"]=="Inactive") echo 'selected="selected"'; ?>  onClick="UpdateItmStatus('<?php echo $row["ITM_CODE"]; ?>',this.value)">Inactive</option>
<option value="H" <?php if($row["ITM_STS"]=="Hired") echo 'selected="selected"'; ?>     onClick="UpdateItmStatus('<?php echo $row["ITM_CODE"]; ?>',this.value)">Hired</option>
<option value="D" <?php if($row["ITM_STS"]=="Damaged") echo 'selected="selected"'; ?>   onClick="DamegeEntry('<?php echo $row["ITM_CODE"]; ?>')">Damaged</option>
</select>
							<?php  echo '</div>';
				echo '</div>';
			}
    echo '</div>';
echo '</div>';
}

mysqli_close($con);



?> 