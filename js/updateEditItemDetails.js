// JavaScript Document By Hashan Wickramasinghe

function Edit_ItmCode_Validate()
{
	var itmCode = $("input#ITMCODE" ).val();
	var itmOriCode = $("input#hdenOrignlItmCod").val();
	
	if(itmCode!=itmOriCode)
	{
	var dataString ='itmCode='+itmCode;
	 $.ajax({
						type: "POST",
						url: "phpFunctions/Validate_itmcode.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									
									
									if(result == 1)
									{
										
									   alert("Existing Item Code");
									   $("input#ITMCODE" ).val('');
									}
									
								},
            			error: function(data) 
								{
                					$("#ItmControls").append(result);

            					}
						});
	}
}

function ValidateItemTypeEdit()
{
	var initmType = $("#itmType").val();
	
	if(initmType=='Individual')
	{
		j("input#itmQty").attr("readonly", true);
		j("input#itmQty").val(1);
		j("input#itmQty").css("background", "#F6F6F6");
	}
	else if(initmType=='Bulk')
	{	
		j("input#itmQty").val('');
		j("input#itmQty").attr("readonly", false);
		j("input#itmQty").css("background", "#FFFFFF");
	}
	
}

function validateItemEdit()
{
	var initmcatcode=$("input#ITMCATCODE" ).val();
	var initmCode = $("input#ITMCODE" ).val();
	var inItmName = $("input#ITMNAME").val();
	var insize = $("input#ITMSIZE" ).val();
	var initmDlyChg = $("input#ITMDLYCHG").val();
	var initmDlyDpst = $("input#ITMDLYDPST").val();
	var initmMnlyChg = $("input#ITMMNLYCHG").val();
	var initmMnlyDpst = $("input#ITMMNLYDPST").val();
	var initmVal = $("input#ITMVAL").val();
	var initmType = $("#itmType").val();
	var initmQty = $("input#itmQty").val();
	
	if (initmcatcode == null ||  initmcatcode == "")
	{
		
		alert("Enter 'Item Category Code'");
	}
	else
	{
		if(initmCode == null ||  initmCode == "")
		{
			alert("Enter 'Item Code' ");
		}
		else
		{
				if(inItmName == null ||  inItmName == "")
				{
						
					alert("Enter 'Item Description'");
				}
				else
				{
					if(insize == null ||  insize == "")
					{
							
						alert("Enter 'Item Size'");
					}
					else
					{
						
						if(initmDlyChg == null ||  initmDlyChg == "")
						{
							alert("Enter 'Item Daily Charge'");
						}
						else
						{
							
							if(initmDlyDpst == null ||  initmDlyDpst == "")
							{
								
								alert("Enter 'Item Daily Deposit'");
								
							}
							else
							{
								
								if(initmMnlyChg == null ||  initmMnlyChg == "")
								{
								
									alert("Enter 'Item Monthly Charge'");
								
								}
								else
								{
								   if(initmMnlyDpst == null ||  initmMnlyDpst == "")
									{
								
										alert("Enter 'Item Monthly Deposit'");
								
									}
									else
									{
										if(initmVal == null ||  initmVal == "")
										{
								
											alert("Enter 'Item Value'");
								
										}
										else
										{
											if(initmType == null ||  initmType == "")
											{
											alert("Select 'Item Type'");
											}
											else
											{
												if(initmQty == null ||  initmQty == "")
												{
													alert("Enter 'Item Quantity'");
												}
												else
												{
													if (confirm('Are you Sure?'))
													{
														SaveEditItem();
													} 
													
												}
											}
										}
									}
								}
								
							}
							
						
						}
						
					}
				}
		}
	}
}

function SaveEditItem()
{
	
	var itmCatCode = $( "#ITMCATCODE" ).val();
	var itmCode = $( "#ITMCODE" ).val();
	var ItmName = $("input#ITMNAME").val();
	var size = $( "#ITMSIZE" ).val();
	var itmDlyChg = $("input#ITMDLYCHG").val();
	var itmDlyDpst = $("input#ITMDLYDPST").val();
	var itmMnlyChg = $("input#ITMMNLYCHG").val();
	var itmMnlyDpst = $("input#ITMMNLYDPST").val();
	var itmVal = $("input#ITMVAL").val();
	var itmType = $("#itmType").val();
	var itmQty = $("input#itmQty").val();
	var itmOriCode = $("input#hdenOrignlItmCod").val();
	//var ItmPrice = $("input#ITMPRCE").val();
	//var ItmQty = $("input#ITMQTY").val();
	
	
	
	
	
	
			var dataString ='itmCatCode='+itmCatCode+'&itmCode='+itmCode+'&ItmName='+ItmName+'&size='+size+'&itmDlyChg='+itmDlyChg+'&itmDlyDpst='+itmDlyDpst+'&itmMnlyChg='+itmMnlyChg+'&itmMnlyDpst='+itmMnlyDpst+'&itmVal='+itmVal+'&itmType='+itmType+'&itmQty='+itmQty+"&itmOriCode="+itmOriCode;
			
			
			
	//j(window).load(function(){
							  j(".preloader").css("display", "block");
							  
	
	 //});
			
				 $.ajax({
						type: "POST",
						url: "phpFunctions/UpdateItem.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("#ItmControls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									
									j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
								},
            			error: function(data) 
								{
                					$("#ItmControls").append(result);
            					}
						});
}


	
