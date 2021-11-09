// JavaScript Document By Hashan Wickramasinghe
function validate()
{
	Save();
}

function Save()
{
	var name = $("input#CLNAME").val();		
			var dataString ='name='+name;

				 $.ajax({
						type: "POST",
						url: "phpFunctions/ajaxsubmit.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									$("input#CLCODE").val(result);
									$("#controls").append('<div class="cretMsg">Details Saved Successfuly</div>');
								},
            			error: function(data) 
								{
                					$("#controls").append(result);
            					}
						});
}
