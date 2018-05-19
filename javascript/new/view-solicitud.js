$(document).ready(function(){
	$(".open").click(function(){
		
		
		var elemento = document.querySelectorAll(".page-header-fixed");
		for (var i = 0; i < elemento.length; i++) {
		  elemento[i].classList.add("modal-open");
		}
		
		
		var elemento = document.querySelectorAll(".page-header-fixed");
		for (var i = 0; i < elemento.length; i++) {
		  elemento[i].classList.add("modal-open");
		}
	
	});
   
});
	
	
function addSaveSolicitudOk(){
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#frmGral").serialize(true)+'&solicitudId='+$('#solicitudId').val()+'&type=addSaveSolicitudOk',
		beforeSend: function(){			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if($.trim(splitResp[0]) == "ok"){
				
				if($.trim(splitResp[1]) == "recarga"){
					$("#msj").html(splitResp[2]);
					$("#container").html(splitResp[3]);
				}else{
					$("#ajax").attr("width","100px");
					$("#ajax").attr("top","100px");
					$("#ajax").html(splitResp[1]);
					// $("#ajax").show();
					$("#ajax").modal("show");
				}
						closeModal();
			}
			else if($.trim(splitResp[0]) == "fail"){
				
				ShowStatusPopUp(splitResp[1])
				return;

			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}

function addSolicitud(){

	if($("#solicitudId").val()==''){
		ShowStatusPopUp('Por favor, seleccione el tipo de solicitud')
		return;
	}
		

	$("#type").val("addSolicitud")
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#editStudentForm").serialize(true)+'&solicitudId='+$('#solicitudId').val()+'&type=addSolicitud',
		beforeSend: function(){			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if($.trim(splitResp[0]) == "ok"){
				
				if($.trim(splitResp[1]) == "recarga"){
					$("#msj").html(splitResp[2]);
					$("#container").html(splitResp[3]);
					// descargarConstancias($.trim(splitResp[4]))
				}else{
					showModal("", splitResp[1]);
					// $("#ajax").attr("width","100px");
					// $("#ajax").attr("top","100px");
					// $("#ajax").html(splitResp[1]);
					// $("#ajax").show();
					// $("#ajax").modal("show");
				}
						
			}
			else if($.trim(splitResp[0]) == "fail"){
				
				ShowStatusPopUp(splitResp[1])
				return;

			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//addSolicitud


function addSaveSolicitud(){


	$("#type").val("addSaveSolicitud")
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#frmGral").serialize(true)+'&solicitudId='+$('#solicitudId').val()+'&type=addSaveSolicitud',
		beforeSend: function(){			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if($.trim(splitResp[0]) == "ok"){
					
					// $("#ajax").attr("width","100px");
					// $("#ajax").attr("top","100px");
				closeModal()
				alert	('cerrar')
					$("#msj").html(splitResp[1]);
					$("#container").html(splitResp[2]);
					
					
					
					//if ($('#solicitudId').val()==4){
						
						//descargarConstancias($.trim(splitResp[3]))
					//}
					
					
				}
			else if($.trim(splitResp[0]) == "okBol"){
				//$("#msj").html(splitResp[1]);

				closeModal()
				descargarConstancias($.trim(splitResp[1]));
                // $("#container").html(splitResp[2]);
                reload()
			}
			else if($.trim(splitResp[0]) == "fail"){
				
				$("#msjgg").html(splitResp[1]);
				// return;

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
	
	

	
	var elemento = document.querySelectorAll(".bootbox");
	for (var i = 0; i < elemento.length; i++) {

		$(elemento).remove('div')
	  elemento[i].classList.remove("in");
	}
	
	var elemento = document.querySelectorAll(".modal-backdrop");
	for (var i = 0; i < elemento.length; i++) {
		$(elemento).remove('div')
	  elemento[i].classList.remove("in");
	}

}

function reload(){
	location.reload();
}



function solicitarReferencia(courseId){

	

	
	$("#type").val("solicitarReferencia")
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#editStudentForm").serialize(true)+'&solicitudId='+$('#solicitudId').val()+'&type=solicitarReferencia&courseId='+courseId,
		beforeSend: function(){			
			$("#load").html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			$("#load").html('');
			var splitResp = response.split("[#]");
			if($.trim(splitResp[0]) == "ok"){
					// $("#msj").html(splitResp[1]);
					$("#msj5").html(splitResp[1]);
				}

		},
		error:function(){
			alert(msgError);
		}
    });
	
}



function cancelarSolicitud(){


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


function descargarSolicitud(c,u,s){
	url=WEB_ROOT+"/ajax/formato-baja.php?"+$('#frmfiltro').serialize(true)+'&c='+c+'&u='+u+'&s='+s;
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}


function descargarConstancias(q){

	url=WEB_ROOT+"/ajax/formato-constancia.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Constancia de Estudios","toolbal=0,width=0,resizable=1");
}




function LoadPage(page){

	$("#type").val("LoadPage")
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/view-solicitud.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=LoadPage&page='+page,
		beforeSend: function(){			
			$("#load").html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			
			$("#container").html(response);
				

		},
		error:function(){
			alert(msgError);
		}
    });
	
}
