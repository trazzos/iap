function descargarSolicitud(q){
	url=WEB_ROOT+"/ajax/formato-baja.php?"+$('#frmfiltro').serialize(true)+'&q='+q;
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}


function adjuntarSolicitud(){
	$('#frmGral').submit();
}	





function saveBaja(id,activo){
	
	
	var resp = confirm("Seguro de continuar con el proceso de baja?");
	
	if(!resp)
		return;
	
	$("#type").val("saveBaja")

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/unsubscribe.php',
	  	data: $("#frmGral").serialize(true)+'&id='+id+'&activo='+activo+'&type=saveBaja',
		beforeSend: function(){			
			$('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			// $("#res_8").html(response);
		// DoSearch();
			if($.trim(splitResp[0]) == "ok"){
					// $("#tblContent").html(splitResp[2]);
					// alert("d");
					// DoSearch();
					 location.reload();
				}
			else if($.trim(splitResp[0]) == "fail"){
				$("#res_8").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//desactivar