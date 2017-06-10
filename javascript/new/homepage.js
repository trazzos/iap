<<<<<<< 58e3275b296180f21a2858ced0e37f70f1107103
function CalificacionesAct(id){
	// alert("f")
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/studentCurricula.php',
	  	data: "type=calificaciones&id="+id,		
	  	success: function(response) {	

			console.log(response)
			// var splitResp = response.split("[#]");
									
			// if(splitResp[0] == "ok")
				$("#frmModal").html(response);
			// else
				// alert(msgFail);
=======


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

>>>>>>> 3fbc77da4e97d049d09566c31bc75342f5732446
		},
		error:function(){
			alert(msgError);
		}
    });
	
<<<<<<< 58e3275b296180f21a2858ced0e37f70f1107103
	$("#frmModal").modal("show");
	
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
=======
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

>>>>>>> 3fbc77da4e97d049d09566c31bc75342f5732446
}