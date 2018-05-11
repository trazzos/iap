
function enviarArchivo(Id){

	var fd = new FormData(document.getElementById("frmDoc_"));

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
					$('#progress_').val(Math.round(Progress));
					$('#porcentaje_').html(Math.round(Progress)+'%');
					
					
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
				$("#tblContent").html(splitResp[2]);
				closeModal()
			}else if($.trim(splitResp[0]) == "fail"){
				$("#txtErrMsg").show();
	
			}else{
				alert(msgFail);
			}
		},
	})
}


function enviarArchivoActa(Id){

	var fd = new FormData(document.getElementById("frmDoc_"));

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
					$('#progress_').val(Math.round(Progress));
					$('#porcentaje_').html(Math.round(Progress)+'%');
					
					
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
				$("#tblContent").html(splitResp[2]);
				closeModal()
			}else if($.trim(splitResp[0]) == "fail"){
				$("#txtErrMsg").show();
	
			}else{
				alert(msgFail);
			}
		},
	})
}

function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}





function onDelete(id,courseId)
{
	
	var resp = confirm("Seguro de  eliminar el Documento?");
	
		if(!resp)
			return;
	
    $.ajax({
        url : WEB_ROOT+'/ajax/new/personal.php',
        type: "POST",
        data : {type: "onDeletePlan", id:id,courseId:courseId},
        success: function(data)
        {
           console.log(data);
		    var splitResp = data.split("[#]");
			 if($.trim(splitResp[0]) == "ok")
            {
               $("#msj").html(splitResp[1]);
				$("#tblContent").html(splitResp[2]);
            }
            else
            {
               alert('Ocurrio un error');
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexión a internet');
        }
    });
}





function onDeleteCarta(id,courseId)
{
	
	var resp = confirm("Seguro de  eliminar el Documento?");
	
		if(!resp)
			return;
	
    $.ajax({
        url : WEB_ROOT+'/ajax/new/personal.php',
        type: "POST",
        data : {type: "onDeleteCarta", id:id,courseId:courseId},
        success: function(data)
        {
           console.log(data);
		    var splitResp = data.split("[#]");
			 if(splitResp[0] == "ok")
            {
               $("#msj").html(splitResp[1]);
				$("#tblContent").html(splitResp[2]);
            }
            else
            {
               alert('Ocurrio un error');
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexión a internet');
        }
    });
}



function onDeleteCarta(id,courseId)
{
	
	var resp = confirm("Seguro de  eliminar el Documento?");
	
		if(!resp)
			return;
	
    $.ajax({
        url : WEB_ROOT+'/ajax/new/personal.php',
        type: "POST",
        data : {type: "onDeleteCarta", id:id,courseId:courseId},
        success: function(data)
        {
           console.log(data);
		    var splitResp = data.split("[#]");
			 if(splitResp[0] == "ok")
            {
               $("#msj").html(splitResp[1]);
				$("#tblContent").html(splitResp[2]);
            }
            else
            {
               alert('Ocurrio un error');
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexión a internet');
        }
    });
}




function onDeleteEncuadre(id,courseId)
{
	
	var resp = confirm("Seguro de  eliminar el Documento?");
	
		if(!resp)
			return;
	
    $.ajax({
        url : WEB_ROOT+'/ajax/edit-modules-course.php',
        type: "POST",
        data : {type: "onDeleteEncuadre", id:id,courseId:courseId},
        success: function(data)
        {
           console.log(data);
		    var splitResp = data.split("[#]");
			 if(splitResp[0] == "ok")
            {
               $("#msj").html(splitResp[1]);
				$("#tblContent").html(splitResp[2]);
            }
            else
            {
               alert('Ocurrio un error');
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexión a internet');
        }
    });
}




function onDeleteRubrica(id,courseId)
{
	
	var resp = confirm("Seguro de  eliminar el Documento?");
	
		if(!resp)
			return;
	
    $.ajax({
        url : WEB_ROOT+'/ajax/edit-modules-course.php',
        type: "POST",
        data : {type: "onDeleteRubrica", id:id,courseId:courseId},
        success: function(data)
        {
           console.log(data);
		    var splitResp = data.split("[#]");
			 if(splitResp[0] == "ok")
            {
               $("#msj").html(splitResp[1]);
				$("#tblContent").html(splitResp[2]);
            }
            else
            {
               alert('Ocurrio un error');
            }
        },
        error: function ()
        {
            alert('Algo salio mal, compruebe su conexión a internet');
        }
    });
}


function verTr(Id){
	
	
	$('#tr_'+Id).toggle();
}




function onSendContrato(){

// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral"));
	$.ajax({
		url : WEB_ROOT+'/ajax/info-docente.php',
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
					$('#progress_').val(Math.round(Progress));
					$('#porcentaje_').html(Math.round(Progress)+'%');
					
					
				},false);
			return XHR;
		},
		beforeSend: function(){		
			// $("#loader").html(LOADER);
			// $("#erro_"+reqId).hide(0);
		},
		success: function(response){
			
			console.log(response)
			var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){
					closeModal()
					$("#msj").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
				}
			else if($.trim(splitResp[0]) == "fail"){
				$("#msjErr").html(splitResp[1]);
			}
		},
	})
	
}


function onSendContratoFirmado(){

// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral_"));
	$.ajax({
		url : WEB_ROOT+'/ajax/info-docente.php',
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
					$('#progress_1').val(Math.round(Progress));
					$('#porcentaje_1').html(Math.round(Progress)+'%');
					
					
				},false);
			return XHR;
		},
		beforeSend: function(){		
			// $("#loader").html(LOADER);
			// $("#erro_"+reqId).hide(0);
		},
		success: function(response){
			
			console.log(response)
			var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){
					closeModal()
					$("#msj").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
				}
			else if($.trim(splitResp[0]) == "fail"){
				$("#msjErr").html(splitResp[1]);
			}
		},
	})
	
}