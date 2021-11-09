
<div class="frame">	

<div class="preloader" style="display:none;"></div>

	 <form>
		 <div id="cretCol2" class="creCols">
		 	 <p>Edit Item Details</p>
		    <div class="innerCol" id="sup">
				
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Category Code
					 </div>
					 
					 <div class="cretControls">
						<input type="text" name="ITMCATCODE" id="ITMCATCODE" value="<?php echo $_GET['catCode']; ?>" />
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Code
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMCODE" id="ITMCODE" value="<?php echo $_GET['itmCode']; ?>" onblur="Edit_ItmCode_Validate()"  />
					   <input type="hidden" id="hdenOrignlItmCod" value="<?php echo $_GET['itmCode']; ?>" />
					 </div>
				 </div>
			
			     <div class="cretContner">
					 <div class="cretDescrptns">
						Item Description
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMNAME" id="ITMNAME"  value="<?php echo str_replace("-", " ", $_GET['iname']) ?>" />
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Size
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMSIZE" id="ITMSIZE" value="<?php echo str_replace("-", " ", $_GET['isize']) ?>" />
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Daily Charge
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMDLYCHG" id="ITMDLYCHG"  value="<?php echo $_GET['dlyChg']; ?>" />
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Daily Deposit
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMDLYDPST" id="ITMDLYDPST" value="<?php echo $_GET['dlyDep']; ?>" />
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Monthly Charge
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMMNLYCHG" id="ITMMNLYCHG" value="<?php echo $_GET['mnlyChg']; ?>" />
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Monthly Deposit
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMMNLYDPST" id="ITMMNLYDPST" value="<?php echo $_GET['mnlyDep']; ?>" />
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Value
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMVAL" id="ITMVAL" value="<?php echo $_GET['iVal']; ?>" />
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Type
					 </div>
					 
					 <div class="cretControls">
					   <select id="itmType" onchange="ValidateItemTypeEdit()">
					   		<option selected></option>
							<option <?php if($_GET["itype"]=="Individual") echo 'selected="selected"'; ?> >Individual</option>
							<option <?php if($_GET["itype"]=="Bulk") echo 'selected="selected"'; ?>  >Bulk</option>
					   </select>
					 </div>
				  </div>
				  
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Qty
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" id="itmQty" value="<?php echo $_GET['itmQty']; ?>"/>
					 </div>
				  </div>
			
			 </div>
		 </div>

		 <div id="ItmControls" class="creCols">
		   <input type="button" name="SUPSAVE" value="Update" class="Button" id="supsave" onclick="validateItemEdit()"/>
		 </div>
		 
		 
	  </form>
</div>	