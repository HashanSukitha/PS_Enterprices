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

j('#genConSumRpt').click(function(e) 
{ 
	var frm = j('#ConSumFdate').val();
	var to = j('#ConSumTdate').val();
	j( "#container" ).load( "Reports/Contracts_Summary.php?from="+frm+"&to="+to );
		
});
</script>

<div id="stkListRpt">
<table border="1">
<tr>
  <td>Contract Summery Report</td>
  
</tr>
</table>

<table border="1">
<tr>
  <td>From Date</td>
  <td>To Date</td>
  <td></td>
</tr>

<tr>
  <td><input type="text" class="datetimepicker" id="ConSumFdate" value="<?php if(isset($_GET['from'])){echo $_GET['from'];}?>"/></td>
  <td><input type="text" class="datetimepicker" id="ConSumTdate" value="<?php if(isset($_GET['from'])){echo $_GET['to'];}?>"/></td>
  <td><input type="button" id="genConSumRpt" value="Generate"/></td>
</tr>
</table>


<?php
if(isset($_GET['from'])!="")
{
	if(isset($_GET['to'])!="")
	{
		$sql = "SELECT 

		(SELECT SUM(C.ITM_TOT) FROM `contract_details` C ,`contract_header` CC WHERE C.CONTR_NO=CC.CONTR_NO AND C.RNTL_BASIS = 'Daily' AND 
			STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')>=STR_TO_DATE('".$_GET['from']."','%Y-%m-%d') AND STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')<=STR_TO_DATE('".$_GET['to']."','%Y-%m-%d'))'DAILY',
			
		(SELECT SUM(C.ITM_TOT) FROM `contract_details` C ,`contract_header` CC WHERE C.CONTR_NO=CC.CONTR_NO AND C.RNTL_BASIS = 'MONTHLY' AND 
			STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')>=STR_TO_DATE('".$_GET['from']."','%Y-%m-%d') AND STR_TO_DATE(CC.CONTR_DATE,'%Y-%m-%d')<=STR_TO_DATE('".$_GET['to']."','%Y-%m-%d'))'MONTHLY'
		
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
				echo '<tr>
						  <td>Rs. '.$row["DAILY"].'</td>
						  <td>Rs. '.$row["MONTHLY"].'</td>
						  <td>Rs. ' .((double)$row["DAILY"]+$row["MONTHLY"]).'</td>
					  </tr>';
			}
		echo "</table>";
		}
		
		mysqli_close($con);
	}
}
?>



</div>

<script>
j(document).ready(function() 
{
j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
});
</script>