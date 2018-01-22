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
									
			if($.trim(splitResp[0]) == "ok"){
				
				$("#ajax").html(splitResp[1]);
				$("#ajax").show();
				$("#ajax").modal("show");
				$("#ajax").attr("top","500px");
				window.location.href = WEB_ROOT+"/";

			}else if($.trim(splitResp[0]) == "fail"){
				console.log(splitResp[1]);
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
