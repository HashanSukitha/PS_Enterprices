<div class="frame">	
	 <form>
		 <div id="cretCol2" class="creCols">
		 	 <p>Item Details</p>
		    <div class="innerCol" id="sup">
				
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Category Code
					 </div>
					 
					 <div class="cretControls">
						<input type="text" name="ITMCATCODE" id="ITMCATCODE" onKeyPress="playBeep();" />
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Code
					 </div>
					 
					 <div class="cretControls">
						<input type="text" name="ITMCODE" id="ITMCODE" onKeyPress="playBeep();" onblur="ITMCode_Validate()"  />
					 </div>
				 </div>
			
			     <div class="cretContner">
					 <div class="cretDescrptns">
						Item Description
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMNAME" id="ITMNAME" onKeyPress="playBeep();"/>
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Size
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMSIZE" id="ITMSIZE" onKeyPress="playBeep();"/>
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Daily Charge
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMDLYCHG" id="ITMDLYCHG" onKeyPress="playBeep();"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Daily Deposit
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMDLYDPST" id="ITMDLYDPST" onKeyPress="playBeep();"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Monthly Charge
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMMNLYCHG" id="ITMMNLYCHG" onKeyPress="playBeep();"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Monthly Deposit
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMMNLYDPST" id="ITMMNLYDPST" onKeyPress="playBeep();"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Value
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="ITMVAL" id="ITMVAL" onKeyPress="playBeep();"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Type
					 </div>
					 
					 <div class="cretControls">
					   <select id="itmType" onchange="ValidateItemType()">
					   		<option selected></option>
							<option>Individual</option>
							<option>Bulk</option>
					   </select>
					 </div>
				  </div>
				  
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Item Qty
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" id="itmQty" readonly/>
					 </div>
				  </div>
			
			 </div>
		 </div>

		 <div id="ItmControls" class="creCols">
		   <input type="button" name="SUPSAVE" value="Save" class="Button" id="supsave" onclick="validateItem()"/>
		 </div>
		 
		 
	  </form>
</div>	