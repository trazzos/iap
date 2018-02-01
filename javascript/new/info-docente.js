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
			else if(splitResp[0] == "fail"){
				$("#msj_"+Id).html(splitResp[1]);
			}
		}
    });
	
}//guardarInformacion


function loadFecha(Id){
	 // $.datepicker.setDefaults( $.datepicker.regional['es'] );
		$('#fecha'+Id).datepicker({
		 dateFormat: 'yy-mm-dd',
		}).focus();
}
