

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


function addxxx(){
//alert(WEB_ROOT)

new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('frmAddCurricula').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			//alert(response);
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatus(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];
				CloseFview();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
   
}

function borrarNot(id){
new Ajax.Request(WEB_ROOT+'/ajax/notificacion.php', 
	{
		method:'post',
		parameters: {type: "deleteNot",id : id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			alert(response)
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatus(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				$('tblNot').innerHTML = splitResponse[2];
				CloseFview();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
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
		},
	  	success: function(response) {	
			console.log(response)
			var splitResponse = response.split("[#]");
			if($.trim(splitResponse[0]) == "ok"){
				$("#msj").html(splitResponse[1]);
			}else if ($.trim(splitResponse[0]) == "ok"){
				$("#msj").html(splitResponse[2]);
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