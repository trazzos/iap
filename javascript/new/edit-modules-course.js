function soloLetras(e){
	
	
	
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " 0123456789";
	especiales = [8,37,39,46];

	tecla_especial = false
	for(var i in especiales){
	if(key == especiales[i]){
	 tecla_especial = true;
	 break;
		} 
	}
	
	
	
	if(letras.indexOf(tecla)==-1 && !tecla_especial)
		return false;
}
	 
	 
$( document ).ready(function() {

    $(document).on("click",".spanDelete",function() {
        var $id = $(this).data('id');
        DeleteActivity($id);
    });

    // $(document).on("click",".spanDeleteResource",function() {
        // var $id = $(this).data('id');
        // DeleteResource($id);
    // });

});


function DeleteActivity(id)
{
    var $message = "¿Está seguro de eliminar esta actividad?";
    bootbox.confirm($message, function(result) {
        if(result == false)
        {
            return;
        }

        $.ajax({
            url : WEB_ROOT+'/ajax/new/activity.php',
            type: "POST",
            data : {type: "deleteActivity", activityId: id},
            success: function(data, textStatus, jqXHR)
            {
                var splitResponse = data.split("[#]");
                ShowStatus(splitResponse[1]);
                $('#tblContent-activities').html(splitResponse[2]);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Algo salio mal, compruebe su conexión a internet');
            }
        });

    });
}

function DeleteResource(id)
{
	
	// alert(id)
    var $message = "¿Está seguro de eliminar este recurso?";
    bootbox.confirm($message, function(result) {
        if(result == false)
        {
            return;
        }

        $.ajax({
            url : WEB_ROOT+'/ajax/new/resource.php',
            type: "POST",
            data : {type: "deleteResource", resourceId: id},
            success: function(data, textStatus, jqXHR)
            {
				console.log(data)
                var splitResponse = data.split("[#]");
                ShowStatus(splitResponse[1]);
                $('#tblContentResources').html(splitResponse[2]);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Algo salio mal, compruebe su conexión a internet');
            }
        });

    });
}



/*
function upFile(Id,reqId,tramiteId){
	// alert("h")
		$(".type").val("upFile");
		$("#auxrequisito").val(reqId);

		// En esta var va incluido $_POST y $_FILES
			var fd = new FormData(document.getElementById("frmGral_"+Id));
			$.ajax({
				url: AJAX_PATH,
				data: fd,
				processData: false,
				contentType: false,
				type: 'POST',
				beforeSend: function(){		
					$("#loader").html(LOADER);
					$("#txtErrMsg").hide(0);
				},
				success: function(response){
					
					console.log(response);
					var splitResp = response.split("[#]");

					$("#loader").html("");
					
					if(splitResp[0] == "ok"){
						$("#preLoad_"+reqId).html(splitResp[1]);		
					}else if(splitResp[0] == "fail"){
						$("#txtErrMsg").show();
						$("#txtErrMsg").show();
						$("#txtErrMsg").html(splitResp[1]);				
					}else{
						alert(msgFail);
					}
				},
			})
			
		}
*/		
		
function SaveCalificacion(Id){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
	  	data: $("#frmCal").serialize(true)+'&type=SaveCalificacion',
		beforeSend: function(){			
			$('#loader').html(LOADER3);
			$('#btnSave').hide();
		},
	  	success: function(response) {	
		$('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				reloadActa(Id)
				
			}else if($.trim(splitResp[0])=="fail"){
				// alert(splitResp[1])
				$('#btnSave').show();
				$('#loader').html('');
				$('#msjd').html(splitResp[1]);
			}
			
				
		},
		error:function(){
			// alert(msgError);
		}
    });
}


function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}


function habilitarEdicion(Id){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
	  	data: $("#frmCal").serialize(true)+'&type=habilitarEdicion',
		beforeSend: function(){			
			$('#loader').html(LOADER3);
			$('#btnSave').hide();
		},
	  	success: function(response) {	
		$('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				reloadActa(Id)
			}else if($.trim(splitResp[0])=="fail"){
				alert(splitResp[1])
			}
			
				
		},
		error:function(){
			// alert(msgError);
		}
    });
}


function validarCal(Id){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
	  	data: $("#frmCal").serialize(true)+'&type=validarCal',
		beforeSend: function(){			
			$('#loader').html(LOADER3);
			$('#btnSave').hide();
		},
	  	success: function(response) {	
		$('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				$('#btnSave').show();
				$('#loader').html('');
				$('#msj').html(splitResp[1]);
				$("#ajax").hide();
				$("#ajax").modal("hide");
			}else if($.trim(splitResp[0])=="fail"){
				alert(splitResp[1])
			}
			
				
		},
		error:function(){
			// alert(msgError);
		}
    });
}



function descargarActa(Id){
	url=WEB_ROOT+"/ajax/acta-calificacion.php?"+$('#frmfiltro').serialize(true)+'&Id='+Id;
	open(url,"voucher","toolbal=0,width=800,resizable=1");
}



function upFile(Id){
	
	// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmFile"));
	fd.append('type','upFile');
	$.ajax({
		url: WEB_ROOT+'/ajax/edit-modules-course.php', 
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
					$('#progress').val(Math.round(Progress));
					$('#porcentaje').html(Math.round(Progress)+'%');
					
					
				},false);
			return XHR;
		},
		success: function(response){
			
			console.log(response);
			// var splitResp = response.split("[#]");
			// $("#loader").html("");
			// alert('llega')
			reloadActa(Id)
		},
	})

}


function reloadActa(Id){
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
	  	data: $("#frmCal").serialize(true)+'&type=reloadActa',
		beforeSend: function(){			
			$('#tblContentActa').html(LOADER3);
			$('#btnSave').hide();
		},
	  	success: function(response) {	
			
			console.log(response)
			
			$('#tblContentActa').html(response);
			
	
		},

    });
}