function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}


function loadFecha(Id){
	 // $.datepicker.setDefaults( $.datepicker.regional['es'] );
		$('#fecha_'+Id).datepicker({
		changeYear: true,
		
		}).focus();
}




function saveEditContrato(){
	


	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/info-docente.php',
	  	data: $("#frmGral").serialize(true)+'&type=saveEditContrato',
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
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
		}
    });
	
}//saveEditContrato



function onDownLoadCedula(q){
	url=WEB_ROOT+"/ajax/cedula-contrato.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Cedula Contrato","toolbal=0,width=800,resizable=1");
}

function onOpenLoad(){
	$("#divForm").toggle();
}


function onSendDoc(){

// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral"));
	$.ajax({
		url : WEB_ROOT+'/ajax/info-docente.php',
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




function onSendContrato(){

// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral"));
	$.ajax({
		url : WEB_ROOT+'/ajax/info-docente.php',
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