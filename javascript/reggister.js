$(document).ready(function(){
	
	$("#pais").change(function(){ dependencia_estado();});
	$("#estado").change(function(){ dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});


function estado_dependencia()
{
	var paisId = $("#pais").val();
 alert("hola");
 
 
 $.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+"/ajax/dependencia-estado.php",
	  	data: "type=addCliente&paisId="+paisId,
	  	success: function(response) {
		var splitResp = response.split("[#]");
		//alert(splitResp[0]);
		          $("#estado").attr("disabled",false);
				 document.getElementById("estado").options.length=1;
				$('#Stateposition').html(splitResp[0]);

		},
		error:function(){
			  alert("Something went wrong...");
		}
    });
 

}

function dependencia_ciudad()
{
	var code = $("#estado").val();
	$.get("ajax/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}