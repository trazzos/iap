
function deleteResource(Id){
	
	var resp = confirm("Seguro de  eliminar la actividad?");
	
	if(!resp)
		return;
	
	// alert('dd')
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
		data: "type=deleteResource"+'&Id='+Id,
		beforeSend: function(){			
			// $('#loader').html(LOADER3);
			// $('#btnSave').hide();
		},
	  	success: function(response) {	
			// $('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				location.reload();
				
			}else if($.trim(splitResp[0])=="fail"){
				// $('#btnSave').show();
				// $('#loader').html('');
				// $('#msjd').html(splitResp[1]);
			}
			
				
		},
		error:function(){

		}
    });
	
}

function deleteAct(Id){
	
	var resp = confirm("Seguro de  eliminar la actividad?");
	
	if(!resp)
		return;
	
	// alert('dd')
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
		data: "type=deleteAct"+'&Id='+Id,
		beforeSend: function(){			
			// $('#loader').html(LOADER3);
			// $('#btnSave').hide();
		},
	  	success: function(response) {	
			// $('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				location.reload();
				
			}else if($.trim(splitResp[0])=="fail"){
				// $('#btnSave').show();
				// $('#loader').html('');
				// $('#msjd').html(splitResp[1]);
			}
			
				
		},
		error:function(){

		}
    });
	
}
		
function SaveAc(Id){
	
	
	$('#description').html(tinymce.get('description').getContent());
	
	// alert('dd')
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/edit-modules-course.php', 
	  	data: $("#frmGral").serialize(true)+'&type=SaveActividad',
		beforeSend: function(){			
			// $('#loader').html(LOADER3);
			// $('#btnSave').hide();
		},
	  	success: function(response) {	
			// $('divLoading').hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				location.reload();
				
			}else if($.trim(splitResp[0])=="fail"){
				// $('#btnSave').show();
				// $('#loader').html('');
				// $('#msjd').html(splitResp[1]);
			}
			
				
		},
		error:function(){

		}
    });
}


function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}




function saveRecursos(Id){
	
	// En esta var va incluido $_POST y $_FILES
	var fd = new FormData(document.getElementById("frmGral"));
	fd.append('type','saveRecursos');
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
			// $("#msjCourse").html(response);
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0])=="ok"){
				location.reload();
			}else if($.trim(splitResp[0])=="fail"){
				alert(splitResp[1])
			}else{
				alert('Ocurrio un error....')
			}
			// alert('llega')
			closeModal()
		},
	})

}


