<div id="HireTabContainer">

	<div class="HireTabBox" id="HireTab1">
			<div class="HireTabTitleBar" id="HireTabBar1" onclick="tab('HireTab1')">
			   <p>Customer</p>
			</div>
			
			<?php
			echo '<div class="vwSrchBox">';
				echo '<p>Details</p>';
				echo '<div class="srchCntner">
				
					  <input type="text" id="srchByClCode" value="By Code"/>
					  <input type="text" id="srchByName" value="By Name"/>
					  <input type="text" id="srchByID" value="By NIC/Passport/DRL"/>
					  <input type="text" id="srchByCntct" value="By Contact Number"/>
					  
					  </div>';
			echo '</div>';
			?>
			
			<div id="HireCustomer">
			   <!--load content from js function at header file-->
			</div>
			
			<div id="HireSlctdClntDtls">
			
				
				<input type="text" id="SelectedCusCode" readonly/>
				
				<div class="HireSlctdBox">
					<label>CustomerName :- </label>
					<div id="HireSlctdCusName" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				<div class="HireSlctdBox">
					<label>NIC/Drivig Licence/Passport :- </label>
					<div id="HireSlctdCusNIC" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				<div class="HireSlctdBox">
					<label>Customer Contacts :- </label>
					<div id="HireSlctdCusCntct" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				
			</div>
	</div>
	
	<div class="HireTabBox" id="HireTab2" style="height: 600px;">
			<div class="HireTabTitleBar" id="HireTabBar2" >
			    <p>Items</p>
			</div>
			
	</div>


</div>
