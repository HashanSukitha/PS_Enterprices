// JavaScript Document By Hashan Wickramasinghe



function validateSupplier()
{
	SaveSupplier();
}

function SaveSupplier()
{
	var name = $("input#SUPNAME").val();		
			var dataString ='name='+name;

				 $.ajax({
						type: "POST",
						url: "phpFunctions/createSupplier.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("input#SUPCODE").val(result);
									$("#SupControls").append('<div class="cretMsg">Details Saved Successfuly</div>');
									
								},
            			error: function(data) 
								{
                					$("#SupControls").append(result);
            					}
						});
}


	
