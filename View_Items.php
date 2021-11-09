<?php
include('phpFunctions\config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');



$sql = "SELECT I.ITM_CAT_CODE'ITM_CAT_CODE',
			   I.ITM_NAME'ITM_NAME',
			   I.ITM_CODE'ITM_CODE',
			   I.SIZE'SIZE',
			   I.ITM_DLY_CHG'ITM_DLY_CHG',
			   I.ITM_DLY_DPST'ITM_DLY_DPST',
			   I.ITM_MNLY_CHG'ITM_MNLY_CHG',
			   I.ITM_MNLY_DPST'ITM_MNLY_DPST',
			   I.ITM_VAL'ITM_VAL',
			   I.ITM_QTY'ITM_QTY',
				(SELECT S.ITM_STS 
	 			 FROM itm_status S 
	 			 WHERE ITM_STS_CODE=I.ITM_STS)'ITM_STS',
			   I.ITM_TYPE'ITM_TYPE'
		FROM items I";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

echo '<div class="vwItmSrchBox">';
		echo '<p>Item Details</p>';
		echo '<div class="srchCntner">
			  
			  <input type="text" id="srchByName" value="By Itm Name"/>
			  <input type="text" id="srchByCatCode" value="By Category Code"/>
			  <input type="text" id="srchByCntct" value="By Itm Code"/>
			  
			  </div>';
echo '</div>';

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
							  		echo  '<p>Item Qty     :- '.$row["ITM_QTY"].'</p></br>';
									echo  '<p>Item Category Code     :- '.$row["ITM_CAT_CODE"].'</p></br>';
									echo  '<p>Item Code              :- '.$row["ITM_CODE"].'</p></br>';
									echo  '<p>Item Name              :- '.$row["ITM_NAME"].'</p></br>';
									echo  '<p>Item Size              :- '.$row["SIZE"].'</p></br>';
									echo  '<p>Daily Charge           :- '.$row["ITM_DLY_CHG"].'</p></br>';
									echo  '<p>Daily Deposit          :- '.$row["ITM_DLY_DPST"].'</p></br>';
									echo  '<p>Monthly Charge         :- '.$row["ITM_MNLY_CHG"].'</p></br>';
									echo  '<p>Monthyl Deposit        :- '.$row["ITM_MNLY_DPST"].'</p></br>';
									echo  '<p>Item Value             :- '.$row["ITM_VAL"].'</p></br>';
									echo  '<p>Item Type             :- '.$row["ITM_TYPE"].'</p></br>';
					  		  echo '</div>';
							  
							  
							  $sql1 = "SELECT T.CONTR_NO'CON_NO'
									  FROM (SELECT CONTR_NO FROM `contract_details` WHERE ITM_CODE='".$row["ITM_CODE"]."') T , `contract_header` C
									  WHERE C.CONTR_NO=T.CONTR_NO AND
	     							  C.CONTR_STS='A'";

										$result1 = mysqli_query($con1, $sql1);
										
										if (!$result1) 
										{
											die('Error: ' . mysqli_error($con1));
										} 
										else 
										{
											echo '<div class="takenContr">';
											while($row1 = mysqli_fetch_assoc($result1)) 
											{	
												 if(isset($row1["CON_NO"]))
												 {
												 echo $row1["CON_NO"].'<br>';
												 }
											}
											echo '</div>';
										}
							  
							  
							  
							  
		                      $code=$row["ITM_CODE"];
							   echo '<div class="editBtnBox"><a href="javascript:editItem(\''.$row["ITM_QTY"].'\',\''.$row["ITM_CODE"].'\',\''.$row["ITM_CAT_CODE"].'\',\''.$row["ITM_NAME"].'\',\''.$row["SIZE"].'\',\''.$row["ITM_DLY_CHG"].'\',\''.$row["ITM_DLY_DPST"].'\',\''.$row["ITM_MNLY_CHG"].'\',\''.$row["ITM_MNLY_DPST"].'\',\''.$row["ITM_VAL"].'\',\''.$row["ITM_TYPE"].'\')" class="EditBtn">Edit</a></div>';
			
						echo '</div>';
						
				echo '</div>';
			}
    echo '</div>';
}

mysqli_close($con);



?> 