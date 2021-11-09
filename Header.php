<!DOCTYPE html>
<meta charset="utf-8">
<head>
<title>$$$</title>

<link rel="stylesheet" href="css/styles.css"/>
<link rel="stylesheet" href="css/lightbox.css"/>
<link rel="stylesheet" href="css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>

<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>

<script type="text/javascript" src="js/submitCreateCustomer.js"></script>
<script type="text/javascript" src="js/submitCreateSupplier.js"></script>
<script type="text/javascript" src="js/submitAddItem.js"></script>
<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>

<script type="text/javascript" src="js/updateEditItemDetails.js"></script>

<script type="text/javascript" src="js/loadingoverlay.js"></script>
<script type="text/javascript" src="js/loadingoverlay.min.js"></script>


<script>

var j = jQuery.noConflict();
var LoadStaus1="";
var LoadStaus2="";

j(document).ready(function() 
{

//j(window).load(function(){
	//$('.preloader').fadeOut('slow',function(){$(this).remove();});
	j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
//});


	j('li#cusReg').click(function(e) 
	   { 
		j( "#container" ).load( "Create_Customer.php" );
	   });

   j('li#vwCus').click(function(e) 
	   { 
		j( "#container" ).load( "View_Customer.php" );
	   });
	   
	j('li#supReg').click(function(e) 
	   { 
		j( "#container" ).load( "Create_Supplier.php" );
	   });
	   
 	j('li#vwSup').click(function(e) 
	   { 
		j( "#container" ).load( "View_Supplier.php" );
	   });
	   
	j('li#regItm').click(function(e) 
	   { 
		j( "#container" ).load( "Add_Item.php" );
	   });
	   
    j('li#vwItm').click(function(e) 
	   { 
		j( "#container" ).load( "View_Items.php" );
	   });
	   
	j('li#MchnItms').click(function(e) 
	   { 
	   	LoadStaus1="";
		LoadStaus2="";
		selectedCusCode="";
		rowId=0;
		rowCount=0;
		GranTot=0;
		GrnDepTot=0;
		insrtCount=0; 
		Items = [[,,,,,,,]];
		NofItems=0;
		
		
		j( "#container" ).load( "Machine_Items.php" );
	   });
	 
	 j('li#Contr').click(function(e) 
	   { 
	    ReturnItems = [[,,,,,,,]];
		RntItmCount=0;
		TOT=0;
		Descunt=0;
		pnltyTot=0;
		Gtot=0;
		
		qry='SELECT * FROM contract_header';

		qry = qry.replace(/\s+/g, '-');
		
		
		j( "#container" ).load( "Contracts.php?qry="+qry);

	   });
	   
	j('li#chngItmSts').click(function(e) 
	   { 
		j( "#container" ).load( "Change_Item_Status.php" );
	   });
	   
	j('li#dmgItms').click(function(e) 
	   { 
		j( "#container" ).load( "Damage_Items.php" );
	   });
	 
	 
	  j('li#StokListRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Stock_List.php" );
	   });
	   
	   j('li#CntrSumry').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Contracts_Summary.php" );
	   });
	   
	    j('li#CntrDly').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Contracts_Daily_Report.php" );
	   });
	   
	    j('li#BstCustRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Best_Customer.php" );
	   });
	   
	   j('li#FstMvngItms').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Fast_Moving_Items.php" );
	   });
	   
	   
	   j('li#BlkLstdCusRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Black_Listed_Customers_Report.php" );
	   });
   
   	   j('li#ClosedCntrRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Closed_Contracts_Report.php" );
	   });
	   
	   j('li#ContrArrRpt').click(function(e) 
	   { 
	   
	   //alert('123');
	   	 j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Contract_Arrears.php" );
		//j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
		
	   });
	    
	   j('li#IsuCntrItms').click(function(e) 
	   { 
		j( "#container" ).load( "Issue_Contr_Items.php" );
	   });
	   
	   j('li#dbtrsRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Debotrs_Report.php" );
	   });
	   
	   j('li#itmDmgRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Item_Damage_Report.php" );
	   });
	   
	   
	   j('li#itmwsIncmRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/ItmWise_Income_Report.php" );
	   });
	   
	   j('li#ContrCncledRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Cancelled_Contracts_Report.php" );
	   });
	   
	   j('li#ItmPrfil').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Item_Profile.php" );
	   });
	   
	   j('li#PaidContrs').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Paid_Contracts.php" );
	   });
	   
	    j('li#MntlyContrRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Montly_Basis_Report.php" );
	   });
	   
	   j('li#CusPrfil').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Customer_Profile.php" );
	   });
	   
	   
	   j('li#ItmwisDmgRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/ItemCat_wise_Damage_Report.php" );
	   });
	  
	  
	   j('li#ArrToDate').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Contract_Arrears_To_Date.php" );
	   });
	  
	  j('li#ItmCatwisDetRpt').click(function(e) 
	   { 
	   	j(".preloader").css("display", "block");
		j( "#container" ).load( "Reports/Item_Category_wise_Detail_Report.php" );
	   });
	   
});


</script>

<script> 

function playBeep() 
{
	var beep=document.getElementById('beep');
	beep.playbackRate  =2;
	beep.play();
	
} 

</script> 

<script>


function tab(tabId)
{
//page loade controller
//=================================================================================================================
		if((LoadStaus1=='')&&(tabId=='HireTab1'))
		{
			var qry='SELECT * FROM customer  WHERE CL_STS="A"';
			qry = qry.replace(/\s+/g, '-');
			
		  j( "#HireCustomer" ).load( "phpFunctions/getHireCustomers.php?qry="+qry );
		  //alert('tab 1 loaded');
		  LoadStaus1='load';
		 }
		 else if((LoadStaus2=='')&&(tabId=='HireTab2'))
		{
		  j( "#HireItems" ).load( "phpFunctions/getHireItems.php" );
		  //alert('tab 2 loaded');
		  LoadStaus2='load';
		 }
		 
	 
//tab collapser
//=================================================================================================================	
	var height = j("#"+tabId).css( "height" );

		if((height=="45px")&&(tabId=='HireTab1'))
		{
			
		  j("#"+tabId).animate({height: "500px"});
		}
		else
		{
			if(tabId=='HireTab1')
		   {
			j("#"+tabId).animate({height: "45px"});
			}
		}
	   //===================================================================	
		if((height=="45px")&&(tabId=='HireTab2'))
		{
		  j("#"+tabId).animate({height: "700px"});
		}
		else
		{
		   if(tabId=='HireTab2')
		   {
			j("#"+tabId).animate({height: "45px"});
			}
		}
}


</script>

<script>
var selectedCusCode="";


function SelectedCustomer(custCode,cusName,custNIC,cnt1,cnt2,cnt3)
{
	CusExistingContrats(custCode);

	selectedCusCode=custCode;
	
	   j('#SelectedCusCode').val(custCode);
	   j('#HireSlctdCusName').text(cusName);
	   j('#HireSlctdCusNIC').text(custNIC);
	   j('#HireSlctdCusCntct').text('');
	   
	   j('#HireSlctdCusCntct').append('<p>'+cnt1+'</p>');
	   j('#HireSlctdCusCntct').append('<p>'+cnt2+'</p>');
	   j('#HireSlctdCusCntct').append('<p>'+cnt3+'</p>');

}

function CusExistingContrats(custCode)
{

var dataString ='custCode='+custCode;
$.ajax({
						type: "POST",
						url: "phpFunctions/CusExistingContrats.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									if(result!=' ')
									{
									alert('This Customer has Running Bills ('+result+') are You Sure ?');
									}

								},
            			error: function(data) 
								{
                					alert(data);
            					}
						});
}

</script>

<script>
var rowId=0;
var rowCount=0;
var GranTot=0;
var GrnDepTot=0;
var insrtCount=0;

/*var Items = [
  //              [/*itmCode*///],
  //              [/*itmName*/],
   //             [/*fDate*/],
  //              [/*tDate*/],
    //            [/*nofDays*/],
    //            [/*dlyChrg*/],
     //           [/*itmtotal*/],
     //           [/*deposit*/],
     //          ];                 //unlimited length array 
	 
var Items = [[,,,,,,,,,,]]; //unlimited length array


function ItemCount(ItemCode,ItmName,dlyChrg,mnlyChrg,qty,type)
{
	if (rowCount<8)
	{
		rowCount=rowCount+1;
		GetItem(ItemCode,ItmName,dlyChrg,mnlyChrg,qty,type);
	}
	else
	{
	  alert("Number of Items exceeded, Please go for Secound Contract");
	}
}

function GetItem(ItemCode,ItmName,dlyChrg,mnlyChrg,qty,type)
{
var dataString ='rowId='+rowId+'&ItemCode='+ItemCode+'&ItmName='+ItmName+'&dlyChrg='+dlyChrg+'&qty='+qty+'&mnlyChrg='+mnlyChrg+'&type='+type;
$.ajax({
						type: "POST",
						url: "phpFunctions/ItmRow.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("#ItemsGridCntner").append(result);
									rowId=rowId+1;
									UIA(rowId-1);
									insrtCount=insrtCount+1;
									contrTotal();
									totalDpst(rowId);
								},
            			error: function(data) 
								{
                					$("#ItemsGridCntner").append(result);
            					}
						});
}

function RemoveItmRow(RemovRowId)
{
		j("#"+RemovRowId+"").remove();
		 		
			Items[0,RemovRowId][0] = '-';
			Items[0,RemovRowId][1] = '-';
			Items[0,RemovRowId][2] = '-';
			Items[0,RemovRowId][3] = '-';
			Items[0,RemovRowId][4] = '-';
			Items[0,RemovRowId][5] = '0';
			Items[0,RemovRowId][6] = '0';
			Items[0,RemovRowId][7] = '0';
			
		if(parseInt(rowCount)!=0)
		{
			rowCount=rowCount-1;		
			contrTotal();
			totalDpst(Items.length);
		}
}

function itemTotal(id)
{
var qtyVal= j("#"+id+" p.itmQty input").val();
var AvlblQty = j("#"+id+" p.charges input#AvlblItmQty").val();

		if(parseInt(AvlblQty)<parseInt(qtyVal))
		{
			alert('Not Enough Stock,Please Enter Less Amount');
			j("#"+id+" p.itmQty input").val('');
		}
		else
		{
			
			 if(qtyVal=='')
			 {
				j("#"+id+" p.itmQty input").val(1);
			 }
			
				 var itmtotal=0;
				 var days=j("#"+id+" p.noFDays input").val();
				 
				 var dlyChrge=j("#"+id+" p.charges input#dailyCharg").val();
				 var mnlyChrge=j("#"+id+" p.charges input#monthlyCharg").val();
				 
				 var NoFitems=j("#"+id+" p.itmQty input").val();
				 
				 var bsis =j("#"+id+" p.itmBasis select#basis").val();
				 
				 if(bsis=='Daily')
				 {
					itmtotal=((days*dlyChrge)*NoFitems);
				 }
				 else
				 {
					itmtotal=((days*mnlyChrge)*NoFitems);
				 }
				 
				 
				 
				 j("#"+id+" p.itmTot input").val(itmtotal);
				  
				 
				 UIA(id);
				 contrTotal();
		}
}

function contrTotal()
{

	GranTot=0;
	
	var rows=rowId;
	
	if(rows!=0)
	{
	  rows=(rows-1);
	}
	
	for(i=0;i<=rows;i++)
	{
		GranTot=(parseFloat(Items[0,i][8])+parseFloat(GranTot));
	}

	j('input#ItmGtotal').val(GranTot);

}


function totalDpst(Rowid)
{
var dpsitVal= j("#"+Rowid+" p.dpsit input").val();


 if(dpsitVal=='')
 {
 	j("#"+Rowid+" p.dpsit input").val(0);
 }
 
 
UIA(Rowid) 
 GrnDepTot=0;
	
	var rows=rowId;
	
	if(rows!=0)
	{
	  rows=(rows-1);
	}
	
	for(i=0;i<=rows;i++)
	{
		GrnDepTot=(parseFloat(Items[0,i][9])+parseFloat(GrnDepTot));
	}

	//alert(rows);
	j('input#ItmDpsttotal').val(GrnDepTot);
}

function validateDate(Rowid)
{
var todate = j("#" + Rowid + " p.hirTo input").val();
	if((getCurrentTime().substring(0, 10))>=todate)
	{
		alert('Cannot put "Hire To" on the same Date or Less Date');
		j("#" + Rowid + " p.hirTo input").val('');
	}
	else
	{
		UIA(Rowid);
	}
}

function UIA(Rowid) //Update Item Arry
{
var icode = j("#" + Rowid + " p.codeVal").text();
var name = j("#" + Rowid + " p.nameVal").text();
var todate = j("#" + Rowid + " p.hirTo input").val();
var basis = j("#" + Rowid + " p.itmBasis select#basis").val();
var ndays = j("#" + Rowid + " p.noFDays input").val();
var Dlychrg = j("#" + Rowid + " p.charges input#dailyCharg").val();
var Mntlychrg = j("#" + Rowid + " p.charges input#monthlyCharg").val();
var itmQty = j("#" + Rowid + " p.itmQty input").val();
var itot = j("#" + Rowid + " p.itmTot input").val();
var dpst = j("#" + Rowid + " p.dpsit input").val();
var itype = j("#" + Rowid + " p.charges input#itmType").val();


Items[0,Rowid] = [icode,name,todate,basis,ndays,Dlychrg,Mntlychrg,itmQty,itot,dpst,itype];

}


</script>

<script>

function SaveContract()
{
 
 var ClCode = selectedCusCode;
 var ContrAmt= j('input#ItmGtotal').val();
 
 var currentTime = new Date();
 var month = currentTime.getMonth() + 1;
 var day = currentTime.getDate();
 var year = currentTime.getFullYear(); //GETS CURRENT DATE
 
 var month = month.toString();
 var day = day.toString();
 var hours = (currentTime.getHours()).toString();
 var minuts = (currentTime.getMinutes()).toString();

 if(month.length==1)
 {
  	month = "0" + month;
 }
 if(day.length==1)
 {
 	day = "0" + day;
 }
 if(hours.length==1)
 {
 	hours = "0" + hours;
 }
 if(minuts.length==1)
 {
 	minuts = "0" + minuts;
 }
 
 var ContrDate=(year + "-" + month + "-" + day +" "+ hours + ":" + minuts);  
 var NofItems=rowCount; 
 var ContrDepstAmt= j('input#ItmDpsttotal').val();					
			
 var stringed = JSON.stringify(Items);


	if(selectedCusCode!='')
	{
		  if((NofItems!=0)||(NofItems!=''))
		  {
		    
			if(j('input#ItmGtotal').val()!=0)
			{
			j('.preloader').css("display","Block"); 
			j.ajax(
			{
				type: 'post',
				url: 'phpFunctions/SaveContract.php',
				data: { newOrder: stringed ,
						rows:insrtCount,
						CliCode:ClCode,
						cntrAmt:ContrAmt,
						cntrDate:ContrDate,
						nfItms:NofItems,
						cDepAmt:ContrDepstAmt
					   },
				success: function(result)
				{
							 j('input#ContrNo').val(result);
							 
							 if (confirm('Do you want to Add another ?'))
							 {
								clearAll();
								LoadStaus1='';
								LoadStaus2='';
								j( "#container" ).load( "Hire_Items.php" );
								//location.reload("Header.php");
							 } 
							 else 
							 {
								j('#SaveContr').prop('disabled', true);
							 }
							 j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
							 //clearAll();
						},
				error: function(data) 
						{
							alert(result);
						}
			})
			}
			else
			{
				alert("Cannot Save with '0' Total");
			}
		  }
		  else
		  {
			alert("Please Select Items");
		  }
	 }
	 else
	 {
	   alert("Please Select a Customer");
	 }
}

function PrintContract()
{
	if(j("input#ContrNo").val()!='')
	{
		//alert("im print");
		j.ajax(
			{
				type: 'post',
				url: 'phpFunctions/GenContract/GenerateCntrPDF.php',
				data: { clcode: j("input#SelectedCusCode").val(),
						ContractNo: j("input#ContrNo").val()
					   },
				success: function(result)
				{
							// j('input#ContrNo').val(result);
							 //alert(result);
							// if (confirm('Do you want to Add another ?'))
							 //{
								//clearAll();
								//LoadStaus1='';
								window.open('docs/Contracts/'+result+'.pdf', '_blank' );
								//LoadStaus2='';
								//j( "#container" ).load( "Hire_Items.php" );
								//location.reload("Header.php");
							// } 
							// else 
							// {
							//	j('#SaveContr').prop('disabled', true);
							// }
							 //clearAll();
						},
				error: function(data) 
						{
							alert(result);
						}
			})
	}
	else
	{
		alert("Please Create a Contract First");
	}

}

function clearAll()
{


	for(var i=0;i<=rowCount;i++) 
	{
	 Items[i] = []; 
	}
	
	
	rowId=0;
	rowCount=0;
	GranTot=0;
	selectedCusCode='';
}

function PrintContrReceipt()
{
 if(j("input#ContrNo").val()!='')
	{
		//alert("im print");
		j.ajax(
			{
				type: 'post',
				url: 'phpFunctions/GenContrReceipt/GenerateContrRecitPDF.php',
				data: { clcode: j("input#SelectedCusCode").val(),
						ContractNo: j("input#ContrNo").val(),
						contrDeposit: j("input#ItmDpsttotal").val()
					   },
				success: function(result)
						{
								window.open('docs/ContractReceipts/'+result+'.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})
	}
	else
	{
		alert("Please Create a Contract First");
	}
 
}

</script>

<script>

function Goback()
{
		qry='SELECT * FROM contract_header';
		qry = qry.replace(/\s+/g, '-');
		
		j( "#container" ).load( "Contracts.php?qry="+qry);
		
		ReturnItems = [[,,,,,,,]];
		RntItmCount=0;
		TOT=0;
		Descunt=0;
		pnltyTot=0;
		Gtot=0;
}

function ViewContDet(cntrNo)
{
		j( "#container" ).load( "phpFunctions/ViewContractDet.php?Contr_No="+cntrNo );

}

</script>

<script>

function UpdateItmStatus(itmCode,sts)
{
  //alert(itmCode+' '+sts);
  
	var dataString ='itmCode='+itmCode+'&itmSts='+sts;
			
				 $.ajax({
						type: "POST",
						url: "phpFunctions/Update_Itm_Satus.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									//$("#ItmControls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									j( "#container" ).load( "Change_Item_Status.php" );
								},
            			error: function(data) 
								{
                					$(".vwItmSrchBox").append(result);
            					}
						});

}

function UpdateDmgItmStatus(itmCode,sts)
{
  //alert(itmCode+' '+sts);
  
	var dataString ='itmCode='+itmCode+'&itmSts='+sts;
			
				 $.ajax({
						type: "POST",
						url: "phpFunctions/Update_Itm_Satus.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									//$("#ItmControls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									j( "#container" ).load( "Damage_Items.php" );
								},
            			error: function(data) 
								{
                					$(".vwItmSrchBox").append(result);
            					}
						});

}

</script>

<script>
function minimizeToLeft()
{
//alert("ds");
var size=document.getElementById("CntrClintDetBox").style.width;

	if(size=="0px")
	{
	document.getElementById("CntrClintDetBox").style.width = "455px";
	document.getElementById("contrRight").style.width = "755px";
	}
	else
	{
	document.getElementById("CntrClintDetBox").style.width = "0px";
	document.getElementById("contrRight").style.width = "97%";
	}


}
</script>

<script>

var ReturnItems = [[,,,,,,,,,,,,,]];
var RntItmCount=0;
var TOT=0;
var Descunt=0;
var pnltyTot=0;
var Gtot=0;

function addToItmRtn(id,isPartRtn)
{

	if(isPartRtn=='no')
	{
		
		var icode = j("#cntrItmDetHolder #" + id + " p.codeVal").text();
		var name = j("#cntrItmDetHolder #" + id + " p.nameVal").text();
		var fdate = j("#cntrItmDetHolder #" + id + " p.hirFrm input").val();
		var todate = j("#cntrItmDetHolder #" + id + " p.hirTo input").val();
		var ndays = j("#cntrItmDetHolder #" + id + " p.noFDays input").val();
		var ichrg = j("#cntrItmDetHolder #" + id + " p.dlyChrg input").val();
		var bsis = j("#cntrItmDetHolder #" + id + " p.dlyChrg input").attr("title");
		var itot = j("#cntrItmDetHolder #" + id + " p.itmTot input").val();
		var pnlt = j("#cntrItmDetHolder #" + id + " p.itmPnlty input").val();
		var iqty = j("#cntrItmDetHolder #" + id + " p.qty input").val();
		var itknId = j("#cntrItmDetHolder #" + id + " p.hidnVals input#takenId").val();
		
		j("#ReturnedItemCntnr").append('<div id="'+RntItmCount+'"  class="SlctdItmRow"><p class="codeVal">'+icode+'</p><p class="nameVal">'+name+'</p><p class="hirFrm"><input class="dts" id="fday"  type="text" value="'+fdate+'" readonly/></p><p class="hirTo"><input class="dts" id="tday"  type="text" value="'+todate+'" readonly/></p><p class="noFDays"><input class="dts" type="text" value="'+ndays+'" readonly/></p><p class="dlyChrg"><input class="dts" type="text" value="'+ichrg+'" readonly title="'+bsis+'"/></p><p class="qty"><input id="itmqty" class="dts" type="text" value="'+iqty+'" readonly /></p><p class="itmTot"><input class="dts" type="text" value="'+itot+'" readonly/></p><p class="itmPnlty"><input class="dts" type="text" value="'+pnlt+'" readonly/></p><p class="hidnVals" style="display:none;"><input type="hidden" id="takenId" value="'+itknId+'"/></p></div>');
		
		j("#cntrItmDetHolder #" + id).remove();
		
		URIA(RntItmCount,'no');
		
	}
	else
	{
		URIA(RntItmCount,isPartRtn);
	}
		
	j('#ReturnedItemCntnr #'+id+' .itmRbuttn').remove();
	
	getItmTot(RntItmCount);
	
	RntItmCount=RntItmCount+1;
}

function URIA(Rowid,isPartRtn) //Update Return Item Arry
{

	var icode = j("#ReturnedItemCntnr #" + Rowid + " p.codeVal").text();
	var name = j("#ReturnedItemCntnr #" + Rowid + " p.nameVal").text();
	var fdate = j("#ReturnedItemCntnr #" + Rowid + " p.hirFrm input").val();
	var todate = j("#ReturnedItemCntnr #" + Rowid + " p.hirTo input").val();
	var ndays = j("#ReturnedItemCntnr #" + Rowid + " p.noFDays input").val();
	var dchrg = j("#ReturnedItemCntnr #" + Rowid + " p.dlyChrg input").val();
	var itot = j("#ReturnedItemCntnr #" + Rowid + " p.itmTot input").val();
	var pnlt = j("#ReturnedItemCntnr #" + Rowid + " p.itmPnlty input").val();
	var iqty = j("#ReturnedItemCntnr #" + Rowid + " p.qty input").val();
	var itknId = j("#ReturnedItemCntnr #" + Rowid + " p.hidnVals input#takenId").val();
	var bsis = j("#ReturnedItemCntnr #" + Rowid + " p.dlyChrg input").attr("title");
	var contrNo = j("#cntrNo").text();
	
	ReturnItems[0,RntItmCount] = [icode,name,fdate,todate,ndays,dchrg,itot,pnlt,contrNo,getCurrentTime(),iqty,isPartRtn,itknId,bsis];
	//alert(RntItmCount);
	//alert(ReturnItems[0,Rowid]);
	//alert(ReturnItems);

}

function getItmTot(id)
{

    j("#Descunt").attr("readonly", false); 
	j("#prcnge").prop("disabled", false);



	TOT=(parseFloat(ReturnItems[0,id][6])+parseFloat(TOT));
	pnltyTot=(parseFloat(ReturnItems[0,id][7])+parseFloat(pnltyTot));
	Gtot=(parseFloat(TOT)+parseFloat(pnltyTot));
	
	j('input#itmTot').val(TOT);
	j('input#itmPnltyTot').val(pnltyTot);	
	j('input#itmGrTot').val(Gtot);

	
	var contrPlty =j('input#CtrPnltAmt').val();
	var itmPnlty = j('#ReturnedItemCntnr #'+id+' p.itmPnlty input').val();
	
	var CAmt =j('input#CtrAmt').val();
	var itmAmt = j('#ReturnedItemCntnr #'+id+' p.itmTot input').val();
	
	var contrDpst =j('input#totDepst').val();
	
	contrPlty=(parseFloat(contrPlty)-parseFloat(itmPnlty));
	CAmt=(parseFloat(CAmt)-parseFloat(itmAmt));
	
	
	
	if(contrDpst==0)
	{
		pay=CAmt+contrPlty;
	}
	else
	{
		pay=((CAmt+contrPlty)-contrDpst)*-1;
	}
	//===================================================================================
	
	j('#contrDetControlBox input#CtrPnltAmt').val(contrPlty);
	j('#contrDetControlBox input#CtrAmt').val(CAmt);
	//j('input#pay').val(pay);
	
	//===================================================================================
	if(CAmt==0)
	{
		if(contrDpst!=0)
		{
			contrDpst = parseFloat(contrDpst)-(parseFloat(j('#itmGrTot').val()));
			
			var isMinus = (contrDpst.toString()).substring(0, 1);
			
			if(isMinus!="-")
			{
				j("#RfndContrDpst").css("display", "block");
				j('input#totDepst').val(contrDpst);
			}
			else
			{
			    j('#contrDetControlBox input#totDepst').val(0);
			}
		}
	}
}

function discount()
{

	var chkSts=document.getElementById("prcnge").checked;
	
	
	if(j('#Descunt').val()=='')
	{
		j('#Descunt').val('0');
	}
	
	var prcntge=j('#Descunt').val();
	
	if(chkSts==true)
	{
	  j('input#itmGrTot').val((Gtot-((Gtot/100)*parseFloat(prcntge))));
	}
	else
	{
	 j('input#itmGrTot').val((Gtot-prcntge));
	}

}

function SaveItmReturn()
{
 	
 var stringed = JSON.stringify(ReturnItems);

	var sts = j("#paidTick").is(':checked');
	var payingAmount=j("#payAmt").val();
	
	if(sts==true)
	{
		payingAmount=j("#payAmt").val();
	}
	
	if(sts==true &&(payingAmount==0 || payingAmount==''))
	{
		alert("Please Enter Paying Amount or Untick 'PAID'");
	}
	else if(sts==false && parseFloat(payingAmount)!=0)
	{
		alert("Please Select 'PAID'");
	}
	else
	{
		j(".preloader").css("display", "block");
		
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/SaveItemReturn.php',
				data: {
						newOrder: stringed ,
						rows:RntItmCount,
						payingAmt:payingAmount
					   },
				success: function(result)
						{
							 j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");});
							 j('#temp').append(result);

						},
				error: function(data) 
						{
							alert(result);
						}
			})
	 }

}

function PrintItmRtnReceipt()
{
 	
 var stringed = JSON.stringify(ReturnItems);
 var isFinal="no";
 
 if(j("#cntrItmDetHolder").text()=='')
 {
 	isFinal="yes";
 	
 }
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/GenItmRtnBill/GenerateItmRtnBillPDF.php',
				data: {
						newOrder: stringed ,
						rows:RntItmCount,
						Gtot:j('input#itmGrTot').val(),
						tot:j('input#itmTot').val(),
						totPnlty:j('input#itmPnltyTot').val(),
						cntrNo:j('#cntrNo').text(),
						dpsit:j("p#ContrDepsitAmt").text(),
						isFinl:isFinal
					   },
				success: function(result)
				{
							// j('#temp').append(result);
							 window.open('docs/ItemReturnReceipts/'+result+'.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})

}

function clr()
{
j('#temp').html('');
}

function PrintContrArrBill(cntrNum)
{
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/GenArrBill/ArrBill.php',
				data: {
						
						cntrNo:cntrNum
						
					   },
				success: function(result)
				{
							// j('#temp').append(result);
							 window.open('docs/ContrArrBill/'+result+'.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})

}

</script>

<script>

function CloseContr(cntrNo)
{
	if (confirm('Do you want to Cancel ?'))
	{
		 j.ajax(
						{
						type: 'post',
						url: 'phpFunctions/Cancel_Contract.php',
						data: {
								
								cntrNo:cntrNo
								
							   },
						success: function(result)
						{
									// j('#temp').append(result);
									alert(result);
									 
						},
						error: function(data) 
						{
									alert(result);
						}
					});
	
		ViewContDet(cntrNo);
	}

}
</script>

<script>
function SysUnload()
{
	if (confirm('Are you sure ?'))
	{
			j.ajax({
					type: 'post',
					url: 'phpFunctions/SysUnload.php',
					data: {
						   },
					success: function(result)
					{
						
						//alert(result);
						if(result=="OK")
						{
						   window.location.replace("index.php");
						}
						else
						{
							alert(result);
						}
					},
					error: function(data) 
					{
							alert(data);
					}	
		
			});

	}
}
function SysUnload1()
{
	
			j.ajax({
					type: 'post',
					url: 'phpFunctions/SysUnload.php',
					data: {
						   },
					success: function(result)
					{
						
						//alert(result);
						if(result=="OK")
						{
						   window.location.replace("index.php");
						}
						else
						{
							alert(result);
						}
					},
					error: function(data) 
					{
							alert(data);
					}	
		
			});

	
}
</script>

<script>

var damageItem="";

function DamegeEntry(itmcode)
{
	document.getElementById("dmagEntryFrm").style.display = "block";
	document.getElementById("dmgItmCode").value =itmcode;
	damageItem=itmcode;
}

function closeFrm(frmId)
{
	if (confirm('Close ?'))
	{
		 j( "#"+frmId ).slideUp( "slow", function() {
			//after Animation complete. 
		});
	}
}

function saveDmages()
{
	var dmgitmCmmnt;
	var dmgitmContr;
	
var currentdate = new Date(); 
var currentMonth = (currentdate.getMonth()+1);
var currentDay = currentdate.getDate();
var currentMin = currentdate.getMinutes();
var currentHr  = currentdate.getHours();
	
var datetime = currentdate.getFullYear() + "-" + currentDay + "-" + currentMonth + " " + currentHr + ":" + currentMin;
	
	dmgitmCmmnt=document.getElementById("dmgComment").value;
	dmgitmContr=document.getElementById("dmgItmContr").value;
	
	if(dmgitmContr=="")
	{
		alert("Please Enter the Contract Number");
	}
	else if(dmgitmContr.length<10)
	{
		alert("Invalid Contract Number");
	}
	else if(dmgitmCmmnt=="")
	{
		alert("Please Enter the Comment");
	}
	else if(dmgitmCmmnt.length<=5)
	{
		alert("Invalid Comment");
	}
	else
	{
		if (confirm('Are you sure ?'))
		{
				j.ajax(
				{
					type: 'post',
					url: 'phpFunctions/SaveDamages.php',
					data: { 
							itmCode:document.getElementById("dmgItmCode").value,
							ContrNo: dmgitmContr,
							DmgItmLoc:document.getElementById("DmgRtnLoc").value,
							dmgCmnt:document.getElementById("dmgComment").value,
							dmgDate: datetime
						   },
					success: function(result)
					{

							alert(result);	 
							UpdateItmStatus(damageItem,'D');
							j( "#dmagEntryFrm" ).slideUp( "slow", function() 
							{
							});	 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
		}
	 }
   
}

function saveDmagesWorkshop()
{
	
var currentdate = new Date(); 
var currentMonth = (currentdate.getMonth()+1);
var currentDay = currentdate.getDate();
var currentMin = currentdate.getMinutes();
var currentHr  = currentdate.getHours();
	
var datetime = currentdate.getFullYear() + "-" + currentDay + "-" + currentMonth + " " + currentHr + ":" + currentMin;
		
	
		if (confirm('Are you sure ?'))
		{
				j.ajax(
				{
					type: 'post',
					url: 'phpFunctions/SaveDamagesWorkshop.php',
					data: { 
							itmCode:document.getElementById("dmgItmCode").value,
							dmgCmpltdCmnt:document.getElementById("WrkShpComment").value,
							cmpltdDate: datetime,
							dmgItmRepAmt:document.getElementById("dmgItmRepAmt").value
						   },
					success: function(result)
					{

							alert(result);	 
							UpdateDmgItmStatus(document.getElementById("dmgItmCode").value,'A');
							j( "#dmagEntryFrm" ).slideUp( "slow", function() 
							{
							});	 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
		}
	 
   
}

function ViewDMGdetails(itmCde)
{
	document.getElementById("dmagEntryFrm").style.display = "block";
	document.getElementById("dmgItmCode").value =itmCde;
	j.ajax(
	{
					type: 'post',
					url: 'phpFunctions/getItemDMGgetails.php',
					data: { 
							ITMcODE:itmCde
						   },
					success: function(result)
					{	
							var str = result;
							
							document.getElementById("dmgItmContr").value =str.split("/")[0];
							j("#DmgRtnLoc").val(str.split("/")[1]);
							document.getElementById("dmgComment").value = str.split("/")[2];
							 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
}

</script>

<script>

function ShowUpdateDeposit(contrNo)
{
document.getElementById("UpdateDepositBox").style.display = "block";
}

function UpdateDeposit(contrNo)
{
	var currentdate = new Date(); 
	var currentMonth = (currentdate.getMonth()+1);
	var currentDay = currentdate.getDate();
	var currentMin = currentdate.getMinutes();
	var currentHr  = currentdate.getHours();
		
	var datetime = currentdate.getFullYear() + "-" + currentDay + "-" + currentMonth + " " + currentHr + ":" + currentMin;
	
	var oldAmt = document.getElementById("UpdtDpstAmt").value;
	var newAmt = document.getElementById("UpdtDpstNewAmt").value;
	
	if((newAmt==0)||(newAmt==""))
	{
		alert("Pleas Enter New Deposit Amount");
	}
	else
	{
		if (confirm('Are you sure ?'))
		{
				j.ajax(
				{
					type: 'post',
					url: 'phpFunctions/Update_DepositAmount.php',
					data: { 
							contrNo:contrNo,
							OldAmt:oldAmt,
							NewAmt:newAmt,
							updtDate:datetime
						   },
					success: function(result)
					{

							alert(result);	 
							j( "#UpdateDepositBox" ).slideUp( "slow", function() 
							{
								j( "#container" ).load( "phpFunctions/ViewContractDet.php?Contr_No="+contrNo );
							});	 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
		}
	}
}

</script>

<script>
function getCurrentTime()
{
	var currentdate = new Date(); 
	var currentMonth = (currentdate.getMonth()+1);
	var currentDay = currentdate.getDate();
	var currentMin = currentdate.getMinutes();
	var currentHr  = currentdate.getHours();
	
	 var currentMonth = currentMonth.toString();
	 var currentDay = currentDay.toString();
	 var currentHr = currentHr.toString();
	 var currentMin = currentMin.toString();
	
	 if(currentMonth.length==1)
	 {
		currentMonth = "0" + currentMonth;
	 }
	 if(currentDay.length==1)
	 {
		currentDay = "0" + currentDay;
	 }
	 if(currentHr.length==1)
	 {
		currentHr = "0" + currentHr;
	 }
	 if(currentMin.length==1)
	 {
		currentMin = "0" + currentMin;
	 }
			
		var datetime = currentdate.getFullYear() + "-" + currentMonth + "-" + currentDay + " " + currentHr + ":" + currentMin;
		return datetime;
}
</script>

<script>

var pndnQty=0;

function issueContrItmStore(rowId)
{
	//alert(rowId);
	document.getElementById("dmagEntryFrm").style.display = "block";
	document.getElementById("issueItmCode").value = j("#issueCntrItm table tr#"+rowId+" td p#itmCode").html();
	document.getElementById("issuItmContr").value = j("#issueCntrItm table tr#"+rowId+" td p#contrNo").html();
	document.getElementById("issuQty").value = j("#issueCntrItm table tr#"+rowId+" td input#IsuCurntVal").val();
	
	document.getElementById("issuItmPerName").value="";
	document.getElementById("issuItmPerNIC").value="";
	document.getElementById("issuItmVhNo").value="";
	document.getElementById("IssLoc").value="";
	
	pndnQty = j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val();
	
}

function calQty(rowId)
{
	
	var pendingQty = j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val();
	var tempPendingQty= j("#issueCntrItm table tr#"+rowId+" td input#hidnPndnQty").val();
	var currentQty =j("#issueCntrItm table tr#"+rowId+" td input#IsuCurntVal").val();
	
	if(parseInt(tempPendingQty)<parseInt(currentQty))
	{
		alert('Cannot issue more than Allowed Amount');
		j("#issueCntrItm table tr#"+rowId+" td input#IsuCurntVal").val('');
		j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val(tempPendingQty);
	}
	else if((currentQty=="0")||(currentQty=="."))
	{
		alert('Invalid Qty');
		j("#issueCntrItm table tr#"+rowId+" td input#IsuCurntVal").val('');
		j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val(tempPendingQty);
	}
	else if(currentQty=="")
	{
		alert('Invalid Qty');
		j("#issueCntrItm table tr#"+rowId+" td input#IsuCurntVal").val('');
		j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val(tempPendingQty);
	}
	else
	{
		//alert(rowId);
		j("#issueCntrItm table tr#"+rowId+" td input#pndnQty").val(parseInt(tempPendingQty)-parseInt(currentQty));
	}
}

function IssueItem()
{
	var ItmCode = document.getElementById("issueItmCode").value;
	var ContrNo = document.getElementById("issuItmContr").value;	
	var perName = document.getElementById("issuItmPerName").value;
	var perNic = document.getElementById("issuItmPerNIC").value;
	var vhNo = document.getElementById("issuItmVhNo").value;
	var qty = document.getElementById("issuQty").value;
	var IsuLoc = document.getElementById("IssLoc").value;
	 
	
	if(qty=="")
	{
		alert("Cannot Proceed with empth Qty");
	}
	else if(perName=="")
	{
		alert("Please Enter Person Name");
	}
	else if(perNic=="")
	{
		alert("Please Enter Person NIC");
	}
	else if(IsuLoc=="")
	{
		alert("Please Select the Issue Location");
	}
	else
	{
		if (confirm('Are you sure ?'))
		{
				j.ajax(
				{
					type: 'post',
					url: 'phpFunctions/IssueItems.php',
					data: { 
							itmCode:ItmCode,
							ContrNo:ContrNo,
							tknDate:(getCurrentTime().toString()).substring(0, 10),
							tknQty:qty,
							personNIC:perNic,
							personName:perName,
							vhNum:vhNo,
							pnDnQty:pndnQty,
							loc:IsuLoc
						   },
					success: function(result)
					{
	 
							j( "#dmagEntryFrm" ).slideUp( "slow", function() 
							{
								j( "#container" ).load( "Issue_Contr_Items.php" );
							});	 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
		}
	}
}

</script>

<script>

function showRtnBox(itmCode,rowid,desc,tkndate,hto,days,basis,qty,tot,pnlty,chrg,tknId)
{
	j('#ReturningQtyBox').css("display","block");
	
	j('input#RtningItmCode').val(itmCode);
	j('#PartRtnRowValues input#RtnIrowId').val(rowid);
	j('#PartRtnRowValues input#RtnIdesc').val(desc);
	j('#PartRtnRowValues input#RtnIhfrom').val(tkndate);
	j('#PartRtnRowValues input#RtnIhto').val(hto);
	j('#PartRtnRowValues input#RtnIdays').val(days);
	j('#PartRtnRowValues input#RtnIbsis').val(basis);
	j('#PartRtnRowValues input#RtnIcharg').val(chrg);
	j('#PartRtnRowValues input#RtnIqty').val(qty);
	j('#PartRtnRowValues input#RtnItot').val(tot);
	j('#PartRtnRowValues input#RtnIpnlty').val(pnlty);
	j('#PartRtnRowValues input#RtnItknId').val(tknId);
}

function validateQty()
{
	var qty = j('#PartRtnRowValues input#RtnIqty').val();
	var rtningQty = j('input#RtningQty').val();
	
	if(parseInt(qty)<parseInt(rtningQty))
	{
		alert('Returning Qty is larger than Taken Qty');
		j('input#RtningQty').val('');
	}
}

function validatePartReturn()
{
	
	var rtningQty = j('input#RtningQty').val();
	
	if(rtningQty=='' || rtningQty=='0' || rtningQty== null)
	{		
		alert('Enter Returning Qty');
	}
	else
	{
		returnPartFromItems();
	}
	
}

function returnPartFromItems()
{
	var RtnType='';
	
	var itmCode = j('input#RtningItmCode').val();
	var rowid = j('#PartRtnRowValues input#RtnIrowId').val();
	var desc = j('#PartRtnRowValues input#RtnIdesc').val();
	var tkndate = j('#PartRtnRowValues input#RtnIhfrom').val();
	var hto = j('#PartRtnRowValues input#RtnIhto').val();
	var days = j('#PartRtnRowValues input#RtnIdays').val();
	var basis = j('#PartRtnRowValues input#RtnIbsis').val();
	var chrg = j('#PartRtnRowValues input#RtnIcharg').val();
	var qty = j('#PartRtnRowValues input#RtnIqty').val();
	var tot = j('#PartRtnRowValues input#RtnItot').val();
	var pnlty = j('#PartRtnRowValues input#RtnIpnlty').val();
	var rtningQty = j('input#RtningQty').val();
	var itknId = j("#PartRtnRowValues input#RtnItknId").val();
	  
	

	//============================================ panelty
	var ipnlty = j("#cntrItmDetHolder #" + rowid + " p.itmPnlty input").val();		
	pnlty =	((ipnlty/qty)*rtningQty);	
	j("#cntrItmDetHolder #" + rowid + " p.itmPnlty input").val(pnlty);			
		
									
	//=========================================qty								
	var iqty = j("#cntrItmDetHolder #" + rowid + " p.qty input#itmqty").val();
	qty = parseInt(iqty)-parseInt(rtningQty);
	
	if(qty==0)
	{
		RtnType='Final';
	}
	else
	{
		RtnType='yes'
	}
	
	j("#cntrItmDetHolder #" + rowid + " p.qty input#itmqty").val(qty);
	//alert(iqty);
	
	//============================================ total
	var itot = j("#cntrItmDetHolder #" + rowid + " p.itmTot input").val();
	itot = ((chrg*qty)*days);
	reningTot = ((chrg*rtningQty)*days);
	j("#cntrItmDetHolder #" + rowid + " p.itmTot input").val(itot);
//alert(itot);
	//============================================
	


	j("#ReturnedItemCntnr").append('<div id="'+RntItmCount+'"  class="SlctdItmRow"><p class="codeVal">'+itmCode+'</p><p class="nameVal">'+desc+'</p><p class="hirFrm"><input class="dts" id="fday"  type="text" value="'+tkndate+'" readonly/></p><p class="hirTo"><input class="dts" id="tday"  type="text" value="'+hto+'" readonly/></p><p class="noFDays"><input class="dts" type="text" value="'+days+'" readonly/></p><p class="dlyChrg"><input class="dts" type="text" value="'+chrg+'" readonly title="'+basis+'"/></p><p class="qty"><input id="itmqty" class="dts" type="text" value="'+rtningQty+'" readonly /></p><p class="itmTot"><input class="dts" type="text" value="'+reningTot+'" readonly/></p><p class="itmPnlty"><input class="dts" type="text" value="'+pnlty+'" readonly/></p><p class="hidnVals" style="display:none;"><input type="hidden" id="takenId" value="'+itknId+'"/></p></div>');
		//alert('');			
			
	
	//============================================
	j("#ReturningQtyBox").slideUp( "slow", function() {
			//after Animation complete. 
		});
		
	addToItmRtn(rowid,RtnType);
		
	if(RtnType=='Final')
	{
		j("#cntrItmDetHolder #" + rowid).remove();
	}
}

</script>

<script>
function editItem(itmQty,itmCode,catCode,itname,itsize,dlyChg,dlyDep,mnlyChg,mnlyDep,iVal,itype)
{
		var iname = itname.replace(/\s+/g, '-');
		var isize = itsize.replace(/\s+/g, '-');
j( "#container" ).load("Edit_Item.php?itmQty="+itmQty+"&itmCode="+itmCode+"&catCode="+catCode+"&iname="+iname+"&isize="+isize+"&dlyChg="+dlyChg+"&dlyDep="+dlyDep+"&mnlyChg="+mnlyChg+"&mnlyDep="+mnlyDep+"&iVal="+iVal+"&itype="+itype);


}

function saveEditItem(itmCode)
{

	var qty = j('#editItmCntner input#ItmQty').val();
	
		j.ajax({
					type: 'post',
					url: 'phpFunctions/SaveEditItme.php',
					data: { 
							itmCode:itmCode,
							QTY:qty
						   },
					success: function(result)
					{
							alert(result);	  
					},
					error: function(data) 
					{
							alert(data);
					}
				})
	
}

</script>

<script>

function SrchContrByContrNo(event)
{
	var id = j('#srchByContrNo').val();
	
	if(event.keyCode==13 && id!='')
	{
 		qry='SELECT * FROM contract_header WHERE CONTR_NO="'+id+'" ';
		qry = qry.replace(/\s+/g, '-');
	    j( "#container" ).load( "Contracts.php?qry="+qry);
	}
	else if(event.keyCode==13 && id=='')
	{
		qry='SELECT * FROM contract_header';
		qry = qry.replace(/\s+/g, '-');
		j( "#container" ).load( "Contracts.php?qry="+qry);
	}
	
	
}

function SrchContrByCusId(event)
{
	var nic = j('#srchByCusId').val();
	
	if(event.keyCode==13 && nic!='')
	{
 		qry='SELECT * FROM contract_header cc , customer c where cc.CL_CODE=c.CL_CODE AND  c.CL_NIC="'+nic+'" ';
		qry = qry.replace(/\s+/g, '-');
		j( "#container" ).load( "Contracts.php?qry="+qry);
	}
	else if(event.keyCode==13 && nic=='')
	{
		qry='SELECT * FROM contract_header';
		qry = qry.replace(/\s+/g, '-');
		j( "#container" ).load( "Contracts.php?qry="+qry);
	}
}

function SrchByClCode(event)
{
	var clcode = j('#srchByClCode').val();
	
	if(event.keyCode==13 && clcode!='')
	{
 		var qry='SELECT * FROM customer  WHERE CL_CODE="'+clcode+'" AND CL_STS="A"';
		qry = qry.replace(/\s+/g, '-');
		j( "#HireCustomer" ).load( "phpFunctions/getHireCustomers.php?qry="+qry );
	}
	else if(event.keyCode==13 && clcode=='')
	{
		var qry='SELECT * FROM customer  WHERE CL_STS="A"';
		qry = qry.replace(/\s+/g, '-');
		j( "#HireCustomer" ).load( "phpFunctions/getHireCustomers.php?qry="+qry );
	}
}

function SrchByClNIC(event)
{
	var clNIC = j('#srchByID').val();
	
	if(event.keyCode==13 && clNIC!='')
	{
		var qry='SELECT * FROM customer  WHERE CL_NIC="'+clNIC+'" AND CL_STS="A"';
		qry = qry.replace(/\s+/g, '-');
		j( "#HireCustomer" ).load( "phpFunctions/getHireCustomers.php?qry="+qry );
	}
	else if(event.keyCode==13 && clNIC=='')
	{
		var qry='SELECT * FROM customer  WHERE CL_STS="A"';
		qry = qry.replace(/\s+/g, '-');
		j( "#HireCustomer" ).load( "phpFunctions/getHireCustomers.php?qry="+qry );
	}
}

</script>

<script>
function BlackList(id)
{
	//alert(id);
	if (confirm('Are you sure ?'))
		{
				j.ajax(
				{
					type: 'post',
					url: 'phpFunctions/BlackListCustomer.php',
					data: { 
							CusId:id
						   },
					success: function(result)
					{
							alert('Customer Black Listed Successfully '+result);
							j( "#container" ).load( "View_Customer.php" );	 
					},
					error: function(data) 
					{
							alert(data);
					}
				})
		}
}
</script>

<script>
function toggleBox(boxId)
{

	var height = j("#"+boxId).css( "height" );

		if(height=="43px")
		{

		  j("#"+boxId).css('height', 'auto');

		}
		else
		{
			j("#"+boxId).animate({height: "43px"});
		}

}
</script>

<script>

function PrintStockReport()
{
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/GenStockReport/GenerateStockRptPDF.php',
				success: function(result)
				{
							// j('#temp').append(result);
							 window.open('docs/StockReport/StockReport.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})

}
function PrintArrSmryReport()
{
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/GenContrArrsSumryReport/ArrearsSummary.php',
				success: function(result)
				{
							// j('#temp').append(result);

							 window.open('docs/ContrArrsSmryReport/ArrsSmryReport.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})

}
function PrintArrOnlyReport()
{
				j.ajax(
				{
				type: 'post',
				url: 'phpFunctions/GenContrArrsOnlyReport/ArrearsOnly.php',
				success: function(result)
				{
							// j('#temp').append(result);

							 window.open('docs/ContrArrsOnlyReport/ArrsOnlyReport.pdf', '_blank' );
						},
				error: function(data) 
						{
							alert(result);
						}
			})

}

</script>

<script>

var myVar;

j(document).ready(function() 
{
	 myVar = setInterval(paidClrChnger, 1000);
});

function paidClrChnger() 
{
	// green 'rgb(6, 219, 88)'
	// red rgb(247, 0, 0)
	// blue rgb(0, 70, 247)
	// yellow rgb(247, 218, 0)
	
    Bgcolor=j("#paidColorShowBox").css("background-color");
	
	if(Bgcolor=='rgb(6, 219, 88)')
	{
		j("td#paidColorShowBox").css("background-color", "rgb(247, 0, 0)");
	}
	else if(Bgcolor=='rgb(247, 0, 0)')
	{
		j("td#paidColorShowBox").css("background-color", "rgb(0, 70, 247)");
	}
	else if(Bgcolor=='rgb(0, 70, 247)')
	{
		j("td#paidColorShowBox").css("background-color", "rgb(247, 218, 0)");
	}
	else if(Bgcolor=='rgb(247, 218, 0)')
	{
		j("td#paidColorShowBox").css("background-color", "rgb(6, 219, 88)");
	}
	//j("td#paidColorShowBox").css("background-color", "yellow");
}

function paidTickChange()
{
var sts = j("#paidTick").is(':checked');

	if(sts==true)
	{
	 clearInterval(myVar);
	 j("td#paidColorShowBox").css("background-color", "rgb(6, 219, 88)");
	}
	else
	{
		myVar = setInterval(paidClrChnger, 1000);
	}

}


</script>


<script>
function editClient(client_code)
{
//alert(client_code);
j(".preloader").css("display", "block");
j( "#container" ).load( "Edit_Customer.php?clcode="+client_code);


}

function validateEdited()
{
	var inName =$("input#CLNAME").val();
	var inNIC =$("input#CLNIC").val();	
	var inAdd1 =$("#CLCURRADD").val();
	var inAdd2 =$("#CLPERRADD").val();
	var inAdd3 =$("#CLWRKADD").val();
	
	var inTel1 =$("#CLCURTEL").val();
	var inTel2 =$("#CLPERTEL").val();
	var inTel3 =$("#CLWRKTEL").val();
	
	if (inName == null ||  inName == "")
	{
		
		alert("Enter 'Name'");
	}
	else
	{
		if(inNIC == null ||  inNIC == "")
		{
			alert("Enter 'NIC/Drivig Licence/Passport' ");
		}
		else
		{
			if((inAdd1 == "") && (inAdd2 == "") && (inAdd3 == ""))
			{
					
				alert("Enter at least one Address");
			}
			else
			{
				if((inTel1 == "") && (inTel2 == "") && (inTel3 == ""))
				{
						
					alert("Enter at least one Phone Number");
				}
				else
				{
					SaveEdited();
				}
			}
		}
	}
}

function SaveEdited()
{
	var clcode = $("input#CLCODE").val();
	var clTitle = $( "#CLTITLE option:selected" ).text();
	var name = $("input#CLNAME").val();	
	var clNIC = $("input#CLNIC").val();	
	var clCurrAdd = $("textarea#CLCURRADD").val();
	var clPerAdd = $("textarea#CLPERRADD").val();
	var clWrkAdd = $("textarea#CLWRKADD").val();
	var clCurTel = $("input#CLCURTEL").val();
	var clPerTel = $("input#CLPERTEL").val();
	var clWrkTel = $("input#CLWRKTEL").val();
	var clEmail = $("input#CLEMAIL").val();
	//=================================================
	var guTitle = $( "#GUTITLE option:selected" ).text();
	var guName = $("input#GUNAME").val();
	var guCurAdd = $("textarea#GUCURADD").val();
	var guPerAdd = $("textarea#GUPERADD").val();
	var guCurTel = $("input#GUCURTEL").val();	
	var guPerTel = $("input#GUPERTEL").val();	
	var guWrkTel = $("input#GUWRKTEL").val();
	var guEmail = $("input#GUEMAIL").val();
	var guNIC = $("input#GUNIC").val();
	
	
	
	var dataString ='clcode='+clcode+'&clTitle='+clTitle+'&name='+name+'&clNIC='+clNIC+'&clCurrAdd='+clCurrAdd+'&clPerAdd='+clPerAdd+'&clWrkAdd='+clWrkAdd+'&clCurTel='+clCurTel+'&clPerTel='+clPerTel+'&clWrkTel='+clWrkTel+'&clEmail='+clEmail+'&guTitle='+guTitle+'&guName='+guName+'&guCurAdd='+guCurAdd+'&guPerAdd='+guPerAdd+'&guCurTel='+guCurTel+'&guPerTel='+guPerTel+'&guWrkTel='+guWrkTel+'&guEmail='+guEmail+'&guNIC='+guNIC;
	
	
			
				j(".preloader").css("display", "block");
				
				 $.ajax({
						type: "POST",
						url: "phpFunctions/EditCustomer.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("input#CLCODE").val(result);
									$("#controls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									

									//alert(clcode);
									saveImage(clcode);
									alert("Saved SuccessFully");
										
										$( "#container" ).load( "View_Customer.php" );
									j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
									
								},
            			error: function(data) 
								{
                					$("#controls").append(result);
            					}
						});
}

</script>

<script>
function saveExtraCharges(Contr_no)
{

	
	var Desc = j('#extraDesc').val();
	var Amt = j('#extraAmt').val();
	
		j.ajax({
					type: 'post',
					url: 'phpFunctions/Add_Extre_Charges.php',
					data: { 
							contr_no:Contr_no,
							desc:Desc,
							amt:Amt
						   },
					success: function(result)
					{
							alert(result);	  
					},
					error: function(data) 
					{
							alert(data);
					}
				})
	
}
</script>


</head>
<body>
<div class="preloader"></div>
<audio id="beep">
  <source src="sounds/beep.wav" type="audio/wav">
Your browser does not support the audio element.
</audio>



