<div class="frame">	
	 <form>
		 <div id="cretCol2" class="creCols">
		 	 <p>Supplier Details</p>
		    <div class="innerCol" id="sup">
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Supplier Code
					 </div>
					 
					 <div class="cretControls">
						<input type="text" name="SUPCODE" id="SUPCODE" readonly />
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Title
					 </div>
					 
					 <div class="cretControls">
					   <select id="SUPTITLE" name="SUPTITLE" style="font-size:15px">
					   		<option>Mr.</option>
							<option>Mrs.</option>
							<option>Miss</option>
							<option>Company</option>
					   </select>
					 </div>
				 </div>
			
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Name
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="SUPNAME" id="SUPNAME"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
					   Current Address
					 </div>
					 
					 <div class="cretControls">
					   <textarea id="SUPCURADD" name="SUPCURADD" cols="35" rows="1"></textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
					   Permanet Address
					 </div>
					 
					 <div class="cretControls">
					   <textarea id="SUPPERADD" name="SUPPERADD" cols="35" rows="1"></textarea>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Current)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="SUPCURTEL"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Permanent)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="SUPPERTEL"/>
					 </div>
				 </div>
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Tel(Work Place)
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="SUPWRKTEL"/>
					 </div>
				 </div>
							
				 <div class="cretContner">
					 <div class="cretDescrptns">
						Fax
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" name="SUPFAX" id="SUPFAX"/>
					 </div>
				 </div>	
				 
				 <div class="cretContner">
					 <div class="cretDescrptns">
						E-mail
					 </div>
					 
					 <div class="cretControls">
					   <input type="text" id="SUPEMAIL" name="SUPEMAIL" style="font-family:Arial, Helvetica, sans-serif"/>
					 </div>
				 </div>
				 
			 </div>
		 </div>

		 <div id="SupControls" class="creCols">
		   <input type="button" name="SUPSAVE" value="Save" class="Button" id="supsave" onclick="validateSupplier()"/>
		 </div>
		 
		 
	  </form>
</div>	