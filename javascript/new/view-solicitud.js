function addSolicitud(){
	
	
	var resp = confirm("¿Desea agregar la Solicitud?");
	
	if(!resp)
		return;
	
	$("#type").val("addSolicitud")
// alert($('#solicitudId').val())
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#editStudentForm").serialize(true)+'&solicitudId='+$('#solicitudId').val()+'&type=addSolicitud',
		beforeSend: function(){			
			$("#container").html('');
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if(splitResp[0] == "ok"){
					// DoSearch()
					$("#msj").html(splitResp[1]);
					$("#container").html(splitResp[2]);
				}
			else if(splitResp[0] == "fail"){
				// alert(splitResp[1])
				$("#msj").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//addSolicitud


function printBoleta(q){
	url=WEB_ROOT+"/ajax/report-card-pdf.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}




function enviarArchivo(){


// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("addMajorForm"));
	$.ajax({
		url: WEB_ROOT+'/ajax/view-solicitud.php',
		data: fd,
		processData: false,
		contentType: false,
		type: 'POST',
		beforeSend: function(){		
			// $("#loader").html(LOADER);
			// $("#erro_"+reqId).hide(0);
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