
function sincronizarDB(){
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/sincronizar.php',
	  	data: "type=sincronizarDB&"+$("#frmFiltro").serialize(true),
		beforeSend: function(){			
			$("#loader").html(LOADER3);
		},
	  	success: function(response) {

		
		console.log(response)
		$("#loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
											
				$("#contenido").html(response);

		},
		error:function(){
			// alert(msgError);
		}
    });
	

	
}//sincronizarDB
