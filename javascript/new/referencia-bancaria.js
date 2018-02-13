

function solicitarReferencia(id){

$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/homepage.php',
	  	data: "type=solicitarReferencia&id="+id,
		beforeSend: function(){			
			// $("#td_"+id).html(LOADER3);
			$("#load").html(LOADER3);
		},
	  	success: function(response) {	
			console.log(response)
			var splitResponse = response.split("[#]");
			if($.trim(splitResponse[0]) == "ok"){
				ShowStatus('La solicitud se envio correctamente');
				// setTimeout("",3000);
				location.href = WEB_ROOT+"/homepage";
			}else if ($.trim(splitResponse[0]) == "ok"){
				$("#msj5").html(splitResponse[2]);
			}
			  

		},
		error:function(){
			alert(msgError);
		}
    });


}