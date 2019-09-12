function enviarArchivo(){
// alert("h")



// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral"));
	$.ajax({
		url : WEB_ROOT+'/ajax/new/personal.php',
		data: fd,
		processData: false,
		contentType: false,
		type: 'POST',
		/*xhr: function(){
				var XHR = $.ajaxSettings.xhr();
				XHR.upload.addEventListener('progress',function(e){
					console.log(e)
					var Progress = ((e.loaded / e.total)*100);
					Progress = (Progress);
					console.log(Progress)
					$('#progress_'+reqId).val(Math.round(Progress));
					$('#porcentaje_'+reqId).html(Math.round(Progress)+'%');


				},false);
			return XHR;
		},*/
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
				closeModal()
			}else if($.trim(splitResp[0]) == "fail"){
				$("#txtErrMsg").show();

			}else{
				alert(msgFail);
			}
		},
	})

}

function onSave(){
	
	
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/new/personal.php',
	  	data: $("#frmGral").serialize(true)+'&type=onSaveDocumento',
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){
					closeModal();
					$("#msj").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
				}
			else if(splitResp[0] == "fail"){
				$("#msj").html(splitResp[1]);
			}
		}
    });
	
}


function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}


function onDelete(Id){
	
	var resp = confirm("Esta seguro de eliminar el Documento?");
	
	if(!resp)
		return;
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/new/personal.php',
	  	data: $("#frmGral").serialize(true)+'&Id='+Id+'&type=onDeleteDocumento',
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){
					$("#msj").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
				}
			else if($.trim(splitResp[0]) == "fail"){
				$("#msj").html(splitResp[1]);
			}
		}
    });
	
}


function cancelarSolicitud(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}