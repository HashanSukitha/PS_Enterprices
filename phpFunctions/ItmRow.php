<?php

$rowId=$_POST['rowId'];
$ItemCode=$_POST['ItemCode'];
$ItmName=$_POST['ItmName'];
$dlyChrg=$_POST['dlyChrg'];
$mnlyChrg=$_POST['mnlyChrg'];
$type=$_POST['type'];
$qty=$_POST['qty']; 


//echo '<script src="dtm/jquery.datetimepicker.js"><script>';
	echo '<script>
			j(".datetimepicker").datetimepicker({
				dayOfWeekStart : 1,
				lang:"en",
				disabledDates:["1986/01/08","1986/01/09","1986/01/10"],
				startDate:	"2015/07/02",
				minView: 2,
  				format: "Y-m-d"
			});

			//j(".datetimepicker").datetimepicker({value:"2015/04/15 05:03",step:10});




		</script>'; 
		
//if($_POST['qty']=="")
//{
/*echo '<div id="'.$rowId.'" class="SlctdItmRow">
			<p class="codeVal">'.$ItemCode.'</p>
			<p class="nameVal">'.$ItmName.'</p>
			<p class="hirFrm"><input style="background:#DDDDDD;" id="fday" readonly class="datetimepickerNoooo" value="-" text="text" onblur="UIA('.$rowId.')"/></p>
			<p class="hirTo"><input id="tday" readonly class="datetimepicker" value="-" text="text" onblur="UIA('.$rowId.')"/></p>
			<p class="noFDays"><input class="dts" text="text" onKeyUp="itemTotal('.$rowId.')"  value="0"/></p>
			<p class="dlyChrg"><input class="dts" text="text" value="'.$dlyChrg.'" readonly /></p>
			<p class="itmTot"><input class="dts" text="text" readonly value="0"/></p>
			<p class="dpsit"><input class="dts" text="text" onKeyUp="totalDpst('.$rowId.')" value="0"/></p>
			<p class="itmQty"><input class="dts" text="text" value="1" readonly style="background:#DDDDDD;"/></p>
			<p class="ItmClose"  onClick="RemoveItmRow('.$rowId.')">X</p>
	   </div>';
}
else
{ */
if($type=='Individual')
{
	$readonly='readonly style="background:#CFCFCF;"';
}
else
{
	$readonly='';
}

echo '<div id="'.$rowId.'" class="SlctdItmRow">
			<p class="codeVal">'.$ItemCode.'</p>
			<p class="nameVal">'.$ItmName.'</p>
			<!--<p class="hirFrm"><input style="background:#DDDDDD;" id="fday" readonly class="datetimepickerNoooo" value="-" text="text" onblur="UIA('.$rowId.')"/></p>-->
			<p class="charges" style="display:none">
													<input id="dailyCharg" class="dts" type="hidden" value="'.$dlyChrg.'"/>
													<input id="monthlyCharg" class="dts" type="hidden" value="'.$mnlyChrg.'"/>
													<input id="itmType" class="dts" type="hidden" value="'.$type.'"/>
													<input id="AvlblItmQty" class="dts" type="hidden" value="'.$qty.'"/>
			</p>
			<p class="hirTo"><input id="tday" readonly class="datetimepicker" value="-" text="text" onblur="validateDate('.$rowId.')"/></p>
			<p class="itmBasis"><select id="basis" onChange="itemTotal('.$rowId.')">
									<option selected >Daily</option>
									<option>Monthly</option>
								</select>
			</p>
			<p class="noFDays" style="width: 139px !important;text-align: center;"><input class="dts" text="text" onKeyUp="itemTotal('.$rowId.')"  value="0"/></p>
			<p class="itmQty"><input class="dts" text="text" '.$readonly.' onKeyUp="itemTotal('.$rowId.')" value="1"/></p>
			
			<p class="itmTot"><input class="dts" text="text" readonly value="0"/></p>
			<p class="dpsit"><input class="dts" text="text" onKeyUp="totalDpst('.$rowId.')" value="0"/></p>
			
			
			<p class="ItmClose"  onClick="RemoveItmRow('.$rowId.')">X</p>
	   </div>';
//}

?>