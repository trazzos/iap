function cargaInbox(tipo,courseMId){  
	
	// alert(tipo)

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/student.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=cargaInbox&tipo='+tipo+'&courseMId='+courseMId,
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			

			$("#contentInbox").html(response);
			if (tipo=='enviados'){
				$("#linkEnviado").addClass("active");
				$("#linkEntrada").removeClass("active");
				$("#linkBorrador").removeClass("active");
				$("#linkEliminado").removeClass("active");
			}else if (tipo=='entrada'){
				$("#linkEntrada").addClass("active");
				$("#linkEnviado"). removeClass("active");
				$("#linkBorrador").removeClass("active");
				$("#linkEliminado").removeClass("active");
			}else if (tipo=='borrador'){
				$("#linkBorrador").addClass("active");
				$("#linkEntrada").removeClass("active");
				$("#linkEnviado"). removeClass("active");
				$("#linkEliminado").removeClass("active");
			}else if (tipo=='eliminados'){
				$("#linkEliminado").addClass("active");
				$("#linkBorrador").removeClass("active");
				$("#linkEntrada").removeClass("active");
				$("#linkEnviado"). removeClass("active");
				
			}
			
				
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//cargaInbox

function SaveMsj(courseMId,status){
	
	$("#type").val("saveReply")
	
	if(status=='borrar'){
		var resp = confirm("Seguro de  eliminar el mensaje?");
	
		if(!resp)
			return;
		
		window.location.href = WEB_ROOT+"/inbox/id/"+courseMId;
	}

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/foro.php',
	  	data: $("#frmGral").serialize(true)+'&courseMId='+courseMId+'&status='+status,
		beforeSend: function(){			
			$("#centeredDivOnPopup").hide();
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if(splitResp[0] == "ok"){
					closeModal()
					window.location.href = WEB_ROOT+"/inbox/id/"+courseMId;
					// $("#contenido").html(splitResp[1]);
				}
			else if(splitResp[0] == "fail"){
				// alert(splitResp[1])
				$("#res_").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}
		},
		// error:function(){
			// alert(msgError);
		// }
    });
	
}//SaveMsj

function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}