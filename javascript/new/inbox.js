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
				
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//cargaInbox