function EditTest(){
	
	// alert(WEB_ROOT)
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/configuracion-examen.php',
	  	// data: "type=EditTest&id="+id,
		data: $("#editMajorForm").serialize(true)+'&type=EditTest&activityId='+$("#activityId").val(),
		beforeSend: function(){			
			$("#msj").html(LOADER3);
		},
	  	success: function(response) {	
				console.log(response)
			  // $("#td_"+id).html(response);
			  // $("#td_"+id).toggle();
			  $("#msj").html('');
			 var splitResponse = response.split("[#]");
			  alert("aqui")
			  alert(splitResponse[0])
			 if(splitResponse[0]=="ok"){
				 alert("llega")
				 $("#tblContent2").html(splitResponse[1]);
				 $("#ajax").hide();
				$("#ajax").modal("hide");
			 }else{
				 $("#msj").html(splitResponse[1]);
			 }


		},
		error:function(){
			// alert(msgError);
		}
    });

	
}//AddReg