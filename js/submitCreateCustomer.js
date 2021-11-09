// JavaScript Document By Hashan Wickramasinghe

function capture() 
{
        var canvas = document.getElementById("imgCanvas");
        var video = document.getElementById("videoElement");

        canvas.getContext('2d').drawImage(video, 0, 0,332,250);

}

function NIC_Validate()
{
	
var NICNO =$("input#CLNIC").val();	

var dataString ='NICNO='+NICNO;

		 $.ajax({
						type: "POST",
						url: "phpFunctions/Validate_NIC.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									if(result == 1)
									{
									   alert("Existing Customer 'NIC/Drivig Licence/Passport'");
									   $("input#CLNIC").val('');
									}
									else if(result == 2)
									{
										alert("This Customer was 'Black Listed', Please Contact the Boss");
									   $("input#CLNIC").val('');
									}
									
								},
            			error: function(data) 
								{
                					$("#controls").append(result);
            					}
						});
}

function validate()
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
					Save();
				}
			}
		}
	}
}

function Save()
{
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
	
	
	
	var dataString ='clTitle='+clTitle+'&name='+name+'&clNIC='+clNIC+'&clCurrAdd='+clCurrAdd+'&clPerAdd='+clPerAdd+'&clWrkAdd='+clWrkAdd+'&clCurTel='+clCurTel+'&clPerTel='+clPerTel+'&clWrkTel='+clWrkTel+'&clEmail='+clEmail+'&guTitle='+guTitle+'&guName='+guName+'&guCurAdd='+guCurAdd+'&guPerAdd='+guPerAdd+'&guCurTel='+guCurTel+'&guPerTel='+guPerTel+'&guWrkTel='+guWrkTel+'&guEmail='+guEmail+'&guNIC='+guNIC;
	
	
			
				j(".preloader").css("display", "block");
				
				 $.ajax({
						type: "POST",
						url: "phpFunctions/createCustomer.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("input#CLCODE").val(result);
									$("#controls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									
									saveImage();
									if (confirm('" '+result+'" Do you want to Continue?'))
									{
										LoadStaus1="";
										LoadStaus2="";
										j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
										$( "#container" ).load( "Machine_Items.php" );
									} 
									else 
									{
										j('.preloader').fadeOut('slow',function(){ j(".preloader").css("display", "none");      });
										$( "#container" ).load( "Create_Customer.php" );
									}
									
								},
            			error: function(data) 
								{
                					$("#controls").append(result);
            					}
						});
}

function saveImage(clcode)
	{ 
	
		var val =$("input#CLCODE").val();
		val=$("input#CLCODE").val();
		var canvas = document.getElementById("imgCanvas");
		var canvasData = canvas.toDataURL("image/png");
		
		
if(canvasData!='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUwAAAD6CAYAAADKin6DAAABWElEQVR4nO3BAQ0AAADCoPdPbQ8HFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPBjEiUAAddCIMcAAAAASUVORK5CYII=')
		{
		var ajax = new XMLHttpRequest();
		alert(canvasData);
        ajax.open("POST",'Generate_Image.php?id='+val,false);
        ajax.setRequestHeader('Content-Type', 'application/upload');
        ajax.send(canvasData );
		}
		

	}
	
