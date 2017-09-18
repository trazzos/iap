function cargaCalendario(Id){
	// $.datepicker.setDefaults( $.datepicker.regional['es'] );
		$('#fecha_'+Id).datepicker({
		 dateFormat: 'yy-mm-dd',
		}).focus();
}



function buscarSolicitud(){
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/solicitud.php',
	  	data: "type=buscarSolicitud&"+$("#frmFiltro").serialize(true),
		beforeSend: function(){			
			$("#loader").html(LOADER3);
		},
	  	success: function(response) {

		$("#loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
											
				$("#contenido").html(response);

		},
		error:function(){
			alert(msgError);
		}
    });
	

	
}//addHeredero


function enviarArchivo(){


// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("addMajorForm"));
	$.ajax({
		url: WEB_ROOT+'/ajax/solicitud.php',
		data: fd,
		processData: false,
		contentType: false,
		type: 'POST',
		beforeSend: function(){		
			$("#loader3").html(LOADER3);
			$("#addMajor").hide();
		},
		success: function(response){
			
			console.log(response);
			var splitResp = response.split("[#]");

			// $("#loader").html("");
			
			if($.trim(splitResp[0]) == "ok"){
				$("#msj").html(splitResp[1]);
				$("#container").html(splitResp[2]);
				closeModal();
			}else if($.trim(splitResp[0]) == "fail"){
					$("#addMajor").show();
					$("#msj").html(splitResp[1]);			
			}else{
				// alert(msgFail);
			}
		},
	})
	
}



function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}