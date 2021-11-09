<div id="HireTabContainer">

	<div class="HireTabBox" id="HireTab1">
			<div class="HireTabTitleBar" id="HireTabBar1" onclick="tab('HireTab1')">
			   <p>Customer</p>
			</div>
			
			<?php
			echo '<div class="vwSrchBox">';
				echo '<p>Details</p>';
				echo '<div class="srchCntner">
				
					  <input type="text" id="srchByClCode" value="" placeholder="By Code" onKeyUp="SrchByClCode(event)" />
					  <input type="text" id="srchByName" value="" placeholder="By Name"/>
					  <input type="text" id="srchByID" value="" placeholder="By NIC/Passport/DRL" onKeyUp="SrchByClNIC(event)" />
					  
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
	
	<div class="HireTabBox" id="HireTab2">
			<div class="HireTabTitleBar" id="HireTabBar2" onclick="tab('HireTab2')">
			    <p>Items</p>
			</div>
			
			
			<div id="HireItmDtlsCntnr">
				<?php 
				echo '<div class="vwItmSrchBox">';
								echo '<p>Details</p>';
								echo '<div class="srchCntner">
				  
									  <input type="text" id="srchByName" value="By Itm Name"/>
									  <input type="text" id="srchByCatCode" value="Cat Code"/>
									  <input type="text" id="srchByItmCode" value="Itm Code"/>
				  
									 </div>';
				echo '</div>'; 
				?>
				
				<div id="HireItems">
				   <!--load content from js function at header file-->
				</div>
			</div>
			
			
			<div id="SelectedItmsCntner">
			  <p id="header">Selected Items</p>
			  <div id="ItemsGridCntner">
			  		<div id="SeltdItmGridHeader">
						<p id="itmCodeH">Code</p>
						<p id="itmNameH">Item</p>
						<!--<p id="fromH">Hire From</p>-->
						<p id="toH">Hire To</p>
						<p id="itmBsis">Basis</p>
						<p id="nofDaysH" style="width: 143px;">No:of Days/Months</p>
						<!--<p id="dlyChrg">Daily Charg</p>-->
						<p id="itmQty">Qty</p>
						<p id="itmTotl">Item Total</p>
						<p id="itmDpsit">Deposit</p>
					</div>
			  </div>
	
			</div>
			
			<div id="hireItmCntrolBox">
			
			   <div class="GrntotBox">
				   <p>Grand Total</p>
				  <div class="totCntnr">
				   <p class="ItmRs">Rs.</p>
				   <input type="text" id="ItmGtotal" value="0" readonly/>
				  </div>
			   </div>
			   
			   <div class="GrntotBox">
				<p>Deposit Total</p>
				<div class="totCntnr">
					<p class="ItmRs">Rs.</p>
					<input type="text" id="ItmDpsttotal" value="0" />
				</div>
			   </div>
			   
			   <div id="PrntBtnCntner">
				<button id="SaveContr" onclick="SaveContract()" enabled >SAVE CONTRACT</button>
				<button class="genButtons" onclick="PrintContract()">Print Contract</button>
				<button class="genButtons" >Print Stock Release</button>
				<button class="genButtons" onclick="PrintContrReceipt()">Print Contract Receipt</button>
			   </div>
				<input type="text" id="ContrNo" value="" readonly />
			   
			   <iframe id="printDump"></iframe>
			</div>
			
	</div>


</div>
