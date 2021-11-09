<?php
session_start();

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('../phpFunctions/config.php');
?>

<script>
			 j(".datetimepicker").datetimepicker({
				dayOfWeekStart : 1,
				lang:"en",
				disabledDates:["1986/01/08","1986/01/09","1986/01/10"],
				startDate:	"2015/07/02",
				minView: 2,
  				format: 'Y-m-d'
			}); 


			//j(".datetimepicker").datetimepicker({value:"2015/04/15 05:03",step:10});
</script>

<script>

j('#genConDlyRpt').click(function(e) 
{ 
	var asAtDate = j('#ContrAsAtDate').val();
	
	j( "#container" ).load( "Reports/Contracts_Daily_Report.php?asAtDate="+asAtDate);
		
});
</script>

<div id="stkListRpt">
<table border="1">
<tr>
  <td>Contract Daily Report</td>
  
</tr>
</table>

<table border="1">
<tr>
  <td>As At Date</td>
  <td></td>
</tr>

<tr>
  <td><input type="text" class="datetimepicker" id="ContrAsAtDate" value="<?php if(isset($_GET['asAtDate'])){echo $_GET['asAtDate'];}?>"/></td>
  <td><input type="button" id="genConDlyRpt" value="Generate"/></td>
</tr>
</table>


<?php

	if(isset($_GET['asAtDate'])!="")
	{
		$sql ="SELECT 

		(SELECT IFNULL(SUM(C.ITM_TOT),0) FROM `contract_details` C ,`contract_header` CC WHERE C.CONTR_NO=CC.CONTR_NO AND C.RNTL_BASIS = 'Daily' AND 
			STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')=STR_TO_DATE('".$_GET['asAtDate']."','%Y-%m-%d'))'DAILY',
			
		(SELECT IFNULL(SUM(C.ITM_TOT),0) FROM `contract_details` C ,`contract_header` CC WHERE C.CONTR_NO=CC.CONTR_NO AND C.RNTL_BASIS = 'Monthly' AND 
			STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')=STR_TO_DATE('".$_GET['asAtDate']."','%Y-%m-%d'))'MONTHLY',
			
		
		(SELECT COUNT(*) FROM `contract_header` CC WHERE STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')=STR_TO_DATE('".$_GET['asAtDate']."','%Y-%m-%d'))'CONTR_COUNT'
		
		FROM DUAL";

		$result = mysqli_query($con, $sql);
		
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td>Contract Totals(DAILY)</td>
					<td>Contract Totals(MONTHLY)</td>
					<td>TOTAL</td>
				</tr>";
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<tr style="background:#F7F9BB;">
						  <td>Rs. '.$row["DAILY"].'</td>
						  <td>Rs. '.$row["MONTHLY"].'</td>
						  <td style="background:#07D304;">Rs. ' .((double)$row["DAILY"]+$row["MONTHLY"]).'</td>
					  </tr>
					  <tr style="background:#F7F9BB;">
					  	  <td></td>
						  <td></td>
						  <td>'.$row["CONTR_COUNT"].'</td>
					  </tr>';
			}
		echo "</table>";
		}
		//======================================================================================================================
		
		$sql ="SELECT CC.CONTR_NO'CONTR_NO',
				 	  CC.CONTR_AMT'CONTR_AMT',
					  CC.CONTR_DEP_TOT'CONTR_DEP_TOT',
					  (SELECT RNTL_BASIS FROM `contract_details` WHERE CONTR_NO=CC.CONTR_NO GROUP BY CONTR_NO)'BASIS',
					   CC.CONTR_DATE'CONTR_DATE',
					   (SELECT H_TO FROM contract_details WHERE CONTR_NO=CC.CONTR_NO LIMIT 1)'DUE_DATE',
					   (SELECT (CC.CONTR_NO-CONTR_NO) FROM contract_header ORDER BY CONTR_NO asc LIMIT 1)'COUNT',
					   (SELECT SUM(CHG) FROM(SELECT (DLY_CHRG*ISSUED_QTY)'CHG' FROM contract_details WHERE CONTR_NO=CC.CONTR_NO))'DLY_CHRG',
					   (SELECT SUM(CHG) FROM(SELECT (MNLY_CHG*ISSUED_QTY)'CHG' FROM contract_details WHERE CONTR_NO=CC.CONTR_NO))'MNLY_CHG'
		 		FROM `contract_header` CC WHERE	STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')=STR_TO_DATE('".$_GET['asAtDate']."','%Y-%m-%d')";
		
		$result = mysqli_query($con, $sql);
		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		   
		} 
		else 
		{
			echo "<table border='1'>
				<tr>
					<td></td>
					<td>Contract Number</td>
					<td>Contract Date</td>
					<td>Due Date</td>
					<td>Days</td>
					<td>Basis</td>
					<td>Charge Per Day</td>
					<td>Contract Amount</td>
					<td>Deposit Amount</td>
				</tr>";
				$cntrAmt=0;
				$depAmt=0;
				$count=1;
				$charg='';
				$dalyIncome=0;
				
			while($row = mysqli_fetch_assoc($result)) 
			{
				if($row["COUNT"]=='0')
				{
					$count=1;
				}
				else
				{
					$count=$row["COUNT"];
				}
				
				if($row["BASIS"]=='Daily')
				{
					$charg=$row["DLY_CHRG"];
				}
				else
				{
					$charg=$row["MNLY_CHG"];
				}
				
				//echo substr($row["CONTR_DATE"],0,10);
				//echo date_format(date_create($row["CONTR_DATE"]), 'Y-m-d');
				
				$date1 = new DateTime($row["CONTR_DATE"]);
				$date2 = new DateTime($row["DUE_DATE"]);
				//echo $date1->format('Y-m-d');
				//echo $date2->format('Y-m-d');
				
				//$date1=date_format(date_create($row["CONTR_DATE"]), 'Y-m-d');//date_create('2015-09-26');
				//$date2=date_format(date_create($row["DUE_DATE"]), 'Y-m-d');//date_create('2015-09-30');
				
				$Ddiff=date_diff($date1,$date2);
				$Ddiff=(($Ddiff->format("%a")));
				$Ddiff=($Ddiff+1);
				
				$dalyIncome=$dalyIncome+$charg;
				
				echo '<tr style="background:#F7F9BB;">
						  <td>'.$count.'</td>
						  <td>'.$row["CONTR_NO"].'</td>
						  <td>'.$row["CONTR_DATE"].'</td>
						  <td>'.$row["DUE_DATE"].'</td>
						  <td>'.$Ddiff.'</td>
						  <td>'.$row["BASIS"].'</td>
						  <td>'.$charg.'</td>
						  <td>Rs. '.$row["CONTR_AMT"].'</td>
						  <td>Rs. ' .$row["CONTR_DEP_TOT"].'</td>
					  </tr>';
					  $cntrAmt=$cntrAmt+$row["CONTR_AMT"];
					  $depAmt=$depAmt+$row["CONTR_DEP_TOT"];
					  
					  $count=$count+1;
			}	
				echo '<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td style="background:#EF4A4A;">SUM = </td>
						<td style="background:#8EFF8E;">Rs. '.$dalyIncome.'</td>
						<td style="background:#07D304;">Rs. '.$cntrAmt.'</td>
						<td style="background:#FBBDFC;">Rs. '.$depAmt.'</td>
					  </tr>';
						
			echo "</table>";
		}
		
		mysqli_close($con);
	}

?>



</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>