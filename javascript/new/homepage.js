




  
function onVerPass(){
	 // $('#show').attr('checked', false);

      name = $('#nuevo').attr('name'); 
      value = $('#nuevo').attr('value');

      if($('#nuevo').attr('checked'))
      {
         html = '<input type="text" name="'+ name + '" value="' + value + '" id="nuevo"/>';
         $('#nuevo').after(html).remove();
      }

      else
      {
         html = '<input type="nuevo" name="'+ name + '" value="' + value + '" id="nuevo"/>';
         $('#nuevo').after(html).remove();
      }
  
}


function onSavePass(){
	
	$("#type").val("onSavePass")

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/student.php',
	  	data: $("#frmPass").serialize(true)+'&type=onSavePass',
		beforeSend: function(){			
			$("#res_").html('Cargando..');
		},
	  	success: function(response) {	
			$("#res_").html('');
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0]) == "ok"){
					location.reload();
				}
			else if($.trim(splitResp[0]) == "fail"){

				$("#res_").html(splitResp[1]);
			
			}
			

		},
		error:function(){
			alert(msgError);
		}
    });
	
}//activar

function CalificacionesAct(id){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/studentCurricula.php',
	  	data: "type=calificaciones&id="+id,
		beforeSend: function(){			
			// $("#td_"+id).html(LOADER3);
		},
	  	success: function(response) {	
		
			  $("#td_"+id).html(response);
			  $("#td_"+id).toggle();


		},
		error:function(){
			alert(msgError);
		}
    });
	
}//AddReg


function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}


// function CalificacionesAct(id){

// grayOut(true);
	// $('fview').show();

		
	// new Ajax.Request(WEB_ROOT+'/ajax/studentCurricula.php', 
	// {
		// method:'post',
		// parameters: {type: "calificaciones", id:id},
    // onSuccess: function(transport){
			// var response = transport.responseText || "no response text";
			// FViewOffSet(response);
			// Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			// Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			// Event.observe($('editRole'), "click", EditRole);

		// },
    // onFailure: function(){ alert('Something went wrong...') }
  // });
// }


function borrarNot(id){

	$.ajax({
		type: "POST",
		url: WEB_ROOT+'/ajax/notificacion.php',
		data: {type: "deleteNot",id : id},
		success: function(response) {

			var splitResponse = response.split("[#]");
			if($.trim(splitResponse[0]) == "ok"){
				ShowStatus(splitResponse[1])
				$('#tblNot').html(splitResponse[2]);
				CloseFview();
			}else if ($.trim(splitResponse[0]) == "ok"){
				ShowStatus(splitResponse[1])
			}INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE CHIAPAS, A.C
		},
		error:function(){
			alert(msgError);
		}
	});

}//CalificacionesAct


function CalificacionesExa(id){

$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/studentCurricula.php',
	  	data: "type=calificacionesExa&id="+id,
		beforeSend: function(){			
			// $("#td_"+id).html(LOADER3);
		},
	  	success: function(response) {	
		
			  $("#td_"+id).html(response);
			  $("#td_"+id).toggle();

		},
		error:function(){
			alert(msgError);
		}
    });


}



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
				$("#msj5").html(splitResponse[1]);
				$("#load").html('');
			}else if ($.trim(splitResponse[0]) == "ok"){
				$("#msj5").html(splitResponse[2]);
			}
			  

		},
		error:function(){
			alert(msgError);
		}
    });


}


function descargaFormato(courseId,semestreId){
	url=WEB_ROOT+"/ajax/formato-reinscripcion.php?"+$('#frmfiltro').serialize(true)+'&courseId='+courseId+'&semestreId='+semestreId;
	open(url,"voucher","toolbal=0,width=800,resizable=1");
}



function abrirReins(subjectId,courseId,semesterId){
	
	$("#tabla1").hide();
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/homepage.php',
	  	data: "type=abrirReins&subjectId="+subjectId+'&courseId='+courseId+'&semesterId='+semesterId,
		beforeSend: function(){			
			// $("#td_"+id).html(LOADER3);
		},
	  	success: function(response) {	
			console.log(response)
			var splitResponse = response.split("[#]");
			
				$("#modal1").html(splitResponse[1]);
	
		},
		error:function(){
			alert(msgError);
		}
    });
}



function verCalendario(){
	url=WEB_ROOT+"/ajax/pagos.php?"+$('#frmfiltro').serialize(true);
	open(url,"voucher","toolbal=0,width=800,resizable=1");
}




function printReferencia(){
	url=WEB_ROOT+"/ajax/referencia_pdf.php?"+$('#frmfiltro').serialize(true);
	open(url,"voucher","toolbal=0,width=800,resizable=1");
}