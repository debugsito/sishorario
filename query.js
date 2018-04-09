$(document).on('ready',function(){
						var url = "bloquear.php";                                      

						$.ajax({                        
						   type: "POST",                 
						   url: url,                    
						   data: $("#formulario").serialize(),
						   success: function(data)            
						   {
							 $('#resp').html(data);           
						   }
						 });

					});