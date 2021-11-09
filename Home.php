<?php 
session_start();

include("Header.php"); 

?>


<div id="MenuBar">
<div id="ShwUserName">
	<p><?php echo $_SESSION['OFFI_FULLNAME'].' ('.$_SESSION['OFFI_CODE'].')'; ?></p>
</div>
	<ul id="mainMenuMainbUl">
<!--===========================================================================================-->
	   <li class="mainMenuItem">Customers
	   		<ul class="mainMenuSubUl">
				<li id="cusReg">Register Customer</li>
				<li id="vwCus">View Customer Details</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	   <li class="mainMenuItem">Hire Items
			<ul class="mainMenuSubUl">
				<li id="regItm">Register Items</li>
				<li id="vwItm">View Item Details</li>
<!--				<li id="rtnItm">Return Item</li>-->
				<li id="chngItmSts">Change Item Status</li>
				<li id="Contr">Contracts</li>
			</ul>
	   </li>
<!--===========================================================================================-->	   
<!--	   <li class="mainMenuItem">Sales Items
			<ul class="mainMenuSubUl">
				<li id="">Register Items</li>
				<li id="">View Item Details</li>
			</ul>
	   </li>-->
<!--===========================================================================================-->
	   <li class="mainMenuItem">Hire
			<ul class="mainMenuSubUl">
				<li id="MchnItms">Items</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	  <!-- <li class="mainMenuItem">Suppliers
			<ul class="mainMenuSubUl">
				<li id="supReg">Register Supplier</li>
				<li id="vwSup">View Supplier Details</li>
			</ul>
	   </li>-->
<!--===========================================================================================-->	   
		<li class="mainMenuItem">Work Shop
			<ul class="mainMenuSubUl">
				<li id="dmgItms">Damage Items</li>
			</ul>
	   </li>
<!--===========================================================================================-->	   
		<li class="mainMenuItem">Stores
			<ul class="mainMenuSubUl">
				<li id="IsuCntrItms">Issue Contract Items</li>
			</ul>
	   </li>
<!--===========================================================================================-->	   
		<li class="mainMenuItem">Debtors
			<ul class="mainMenuSubUl">
				<li id="Vwdbtrs">Pay Unpaid</li>
			</ul>
	   </li>
<!--===========================================================================================-->	   
		<!--<li class="mainMenuItem">Creditors
			<ul class="mainMenuSubUl">
				<li id="Vwdbtrs">View Debtors</li>
			</ul>
	   </li>-->
<!--===========================================================================================-->
	   <li class="mainMenuItem" id="rptLi">Reports
	   		<ul class="mainMenuSubUl">
				<li id="BstCustRpt">Best Customer Report</li>
				<li id="ContrArrRpt">Contract Arrears Report</li>
				<li id="StokListRpt">Stock List Report</li>
				<li id="CntrDly">Contract Daily Report</li>
				<li id="ClosedCntrRpt">Closed Contract Daily Report</li>
				<li id="CntrSumry">Contract Summary Report</li>
				<li id="FstMvngItms">Fast Moving Items Report</li>
				<li id="BlkLstdCusRpt">Black Listed Customer Report</li>
				<li id="dbtrsRpt">Debtors Report (Unpaid Bills)</li>
				<li id="itmwsIncmRpt">Item wise Income Report</li>
				<li id="itmDmgRpt">Item Damage Report</li>
				<li id="ContrCncledRpt">Cancelled Report</li>
				<li id="ItmPrfil">Item Profile</li>
				<li id="CusPrfil">Customer Profile</li>
				<li id="PaidContrs">Paid Contracts(Bill) Report</li>
				<li id="MntlyContrRpt">Monthly Basis Contracts Report</li>
				<li id="ItmwisDmgRpt">Item Category wise Damage Report</li>
				<li id="ArrToDate">Contract Arrears Report(ToDate)</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	   <!--<li class="mainMenuItem">Admin
	   		<ul class="mainMenuSubUl">
				<li>Create Users</li>
				<li>View Users</li>
			</ul>
	   </li>-->
<!--===========================================================================================-->
	</ul>
	<a href="#" id="LogButton" onClick="SysUnload()">Log Out</a>
</div>



<div id="container">

	
	
</div>
<?php include("Footer.php"); ?>