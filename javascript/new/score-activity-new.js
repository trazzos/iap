function saveCalificacion(){

	$("#type").val("saveCalificacion")

	var fd = new FormData(document.getElementById("frmModal"));
			$.ajax({
				url: WEB_ROOT+'/ajax/score-activity-new.php',
				data: fd,
				processData: false,
				contentType: false,
				type: 'POST',
				beforeSend: function(){
					$("#loader").html(LOADER3);
					$("#btnEnviar").hide();
					// $("#erro_"+reqId).hide(0);
				},
				success: function(response){

					console.log(response);
					var splitResp = response.split("[#]");

					$("#loader").html("");
					$("#btnEnviar").show();
					if($.trim(splitResp[0]) == "ok"){

						$("#msjdiv").html(splitResp[1]);
					}else if($.trim(splitResp[0]) == "fail"){
						$("#msjdiv").html(splitResp[1]);
					}else{
						alert('Ocurrio un error');
					}
				},
			})

}//saveCalificacion

function reactivateTest(id){

	$.ajax({
		url: WEB_ROOT+'/ajax/score-activity-new.php',
		data: {
			id: id,
			type: "reactivateTest",
		},
		type: 'POST',
		success: function(response){
			$("#reactivar-"+id).html(response);
		},
	})

}//reactivateTest
