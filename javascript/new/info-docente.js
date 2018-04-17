function guardarInformacion(Id){
	
// alert('hola')

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




function onChangePicture(Id){

	var fd = new FormData(document.getElementById("frmFoto"));
	fd.append('type','onChangePicture');
	fd.append('personalId',Id);
	// +'&cId=admin',
	$.ajax({
		url : WEB_ROOT+'/ajax/new/personal.php',
		data: fd,
		processData: false,
		contentType: false,
		type: 'POST',
		xhr: function(){
				var XHR = $.ajaxSettings.xhr();
				XHR.upload.addEventListener('progress',function(e){
					console.log(e)
					var Progress = ((e.loaded / e.total)*100);
					Progress = (Progress);
					console.log(Progress)
					$('#progress_'+Id).val(Math.round(Progress));
					$('#porcentaje_'+Id).html(Math.round(Progress)+'%');
					
					
				},false);
			return XHR;
		},
		beforeSend: function(){		
			// $("#loader").html(LOADER);
			// $("#erro_"+reqId).hide(0);
		},
		success: function(response){
			
			console.log(response);
			var splitResp = response.split("[#]");
			$("#loader").html("");
			if($.trim(splitResp[0]) == "ok"){
				$("#msj").html(splitResp[1]);
				$("#contenido").html(splitResp[2]);
				// closeModal()
				location.reload();
			}else if($.trim(splitResp[0]) == "fail"){
				$("#txtErrMsg").show();
	
			}else{
				alert(msgFail);
			}
		},
	})
}

function onVerPass(){
	
	$("#pass1").toggle();
	$("#pass2").toggle();
	
}

