
function saveConcepto(){
	
	$("#type").val("saveConcepto")

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/student.php',
	  	data: $("#frmGral").serialize(true)+'&auxMsj=1',
		beforeSend: function(){			
			$("#centeredDivOnPopup").hide();
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if(splitResp[0] == "ok"){
					closeModal()
					$("#contenido").html(splitResp[1]);
				}
			else if(splitResp[0] == "fail"){
				// alert(splitResp[1])
				$("#res_").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}
		},
		// error:function(){
			// alert(msgError);
		// }
    });
	
}//saveConcepto

function closeModal(){
	
	$("#ajax").hide();
	$("#ajax").modal("hide");
	
}