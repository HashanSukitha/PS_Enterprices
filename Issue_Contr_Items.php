<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('phpFunctions\config.php');

$sql = "SELECT C.Row_ID, 
			   C.CONTR_NO, 
			   C.ITM_CODE, 
			   C.N_OF_DAYS, 
			   C.DLY_CHRG, 
			   C.H_FROM, 
			   C.H_TO, 
			   C.DPST_AMT, 
			   C.ITM_TOT,
			   C.ISSUED, 
			   C.ALLOWED_QTY, 
			   C.ISSUED_QTY,
			   (SELECT I.ITM_NAME FROM items I WHERE I.ITM_CODE=C.ITM_CODE)'C.ITM_NAME'
FROM `contract_details` C
WHERE ISSUED='NO'";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
echo '<div id="issueCntrItm">';

echo '<div id="dmagEntryFrm" style="height: 405px;">
		<div id="dmgFrmClose" onClick="closeFrm(\'dmagEntryFrm\')">X</div>
		<p id="dmgHeader">Issue Item Entry Form</p>
		<table border="1">
			<tr>
			  <td class="left">Item Code</td>
			  <td class="right"><input type="text" id="issueItmCode" readonly/></td>
			</tr>
			<tr>
			  <td class="left">Contract Number</td>
			  <td class="right"><input type="text" id="issuItmContr" readonly/></td>
			</tr>
			<tr>
			  <td class="left">Issued Location</td>
			  <td class="right"><select id="IssLoc"><option selected></option><option>Office</option><option>Warehouse</option></select></td>
			</tr>
			<tr>
			  <td class="left">Person Name</td>
			  <td class="right"><input type="text" id="issuItmPerName"/></td>
			</tr>
			<tr>
			  <td class="left">Person NIC</td>
			  <td class="right"><input type="text" id="issuItmPerNIC"/></td>
			</tr>
			<tr>
			  <td class="left">Vehicle Number</td>
			  <td class="right"><input type="text" id="issuItmVhNo"/></td>
			</tr>
			<tr>
			  <td class="left">Issuing QTY</td>
			  <td class="right"><input type="text" id="issuQty" readonly/></td>
			</tr>
		</table>
		 <input type="button" id="dmgSave" value="SAVE" onClick="IssueItem()"/>
	  </div>';


		echo '<table border="1">
				<tr><td>Contract Number</td>
					<td>Item Code</td>
					<td>Item Name</td>
					<td>Allowed Qty</td>
					<td>Issued Qty</td>
					<td>Pending Qty</td>
					<td>Qty</td>
					<td></td>
				</tr>';

			while($row = mysqli_fetch_assoc($result)) 
			{		
			 
			 echo '<tr id="'.$row["Row_ID"].'">
			 			<td><p id="contrNo">'.$row["CONTR_NO"].'</p></td>
						<td><p id="itmCode">'.$row["ITM_CODE"].'</p></td>
						<td><p id="itmCode">'.$row["C.ITM_NAME"].'</p></td>
						<td><input type="text" value="'.$row["ALLOWED_QTY"].'" readonly/></td>
						<td><input type="text" value="'.$row["ISSUED_QTY"].'" readonly/></td>
						<td><input type="text" value="'.($row["ALLOWED_QTY"]-$row["ISSUED_QTY"]).'" id="pndnQty" readonly/></td>
<td><input type="text" value="" id="IsuCurntVal" onkeyup="calQty('.$row["Row_ID"].')" placeholder="0" /> <input type="hidden" id="hidnPndnQty" value="'.($row["ALLOWED_QTY"]-$row["ISSUED_QTY"]).'" onBlur="calQty('.$row["Row_ID"].')" /></td>
						<td><input type="button" value="ISSUE" onClick="issueContrItmStore('.$row["Row_ID"].')"/></td>
					</tr>';
			}
		echo '</table>';
	echo '</div>';
}

mysqli_close($con);

?> 