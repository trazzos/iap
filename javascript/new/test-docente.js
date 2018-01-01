function SaveEncuesta(Id){
	
	// alert(response)
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/test-docente.php',
	  	data: "type=SaveEncuesta&Id="+Id+'&'+$("#frmGral").serialize(true),
		beforeSend: function(){			
			// $(".loader").html(LOADER);
			// $(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok"){							
				window.location.href = WEB_ROOT+"/";
				// $("#msjEncuesta").html(splitResp[1]);
				// $("#div_encuesta").hide();
				// $(".iniciar").show();
			}else if(splitResp[0] == "fail"){
				
				console.log(splitResp[1]);
				// alert(splitResp[1])
				$("#msj").html(splitResp[1]);
			}else{
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			// alert(response);
		}
    });

}//SaveEncuesta
