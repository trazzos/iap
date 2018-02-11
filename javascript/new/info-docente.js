function guardarInformacion(Id){
	


	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/info-docente.php',
	  	data: $("#frmGral_"+Id).serialize(true)+'&Id='+Id+'&type='+Id,
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){
					$("#msj_"+Id).html(splitResp[1]);
				}
			else if($.trim(splitResp[0]) == "fail"){
				$("#msj_"+Id).html(splitResp[1]);
			}
		}
    });
	
}//guardarInformacion



function loadFecha(Id){
	 // $.datepicker.setDefaults( $.datepicker.regional['es'] );
		$('#fecha'+Id).datepicker({
		changeYear: true,
		
		}).focus();
}



function loadMunicipio(){
	
	Id = $("#estado").val();
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/info-docente.php',
	  	data: $("#frmGral_").serialize(true)+'&type=loadMunicipio&Id='+Id,
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			$('#divCiudad').html(response);
		}
    });
	
}
