function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}


function onEnviaMsj(id,activo){
	
	
	$('#description').html(tinymce.get('description').getContent());
	
	
	
	var fd = new FormData(document.getElementById("frmGral"));
	fd.append('type',"onEnviaMsj");
	
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/foro.php',
		processData: false,
		contentType: false,
	  	data: fd,
		beforeSend: function(){			
			$('#divContenforo').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
			 location.reload();
					
			

		},
		error:function(){
			alert(msgError);
		}
    });
	
}//activar




function saveNew(id,activo){
	
	$("#type").val("saveNew")

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/foro.php',
	  	data: $("#frmGral").serialize(true)+'&id='+id+'&activo='+activo+'&type=saveNew',
		beforeSend: function(){			
			$('#divContenforo').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
			location.reload();
					
			

		},
		error:function(){
			alert(msgError);
		}
    });
	
}//activar