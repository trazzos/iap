function SaveEncuesta(Id){
	
	// alert(response)
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/test-docente.php',
	  	data: "type=SaveEncuesta&Id="+Id+'&'+$("#frmGral").serialize(true),
		beforeSend: function(){			
			$("#msj").html('Cargando....');
			$("#btnSaveEncuesta").hide();
			// $(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if($.trim(splitResp[0]) == "ok"){
				$(".modal fade in").attr("top","89px"); 
				$("#ajax").attr("top","800px");
				$("#ajax").attr("padding","0 10px"); 
				$("#ajax").attr("padding-right","0 17px"); 
				$("#ajax").html(splitResp[1]);
				$("#ajax").show();
				$("#ajax").modal("show");
				$("#ajax").attr("top","800px");
				$("#ajax").attr("padding","0 10px"); 
				$("#ajax").attr("padding-right","0 17px"); 
				$(".modal fade in").attr("top","89px"); 
				setTimeout('afterFiveSeconds()',3000)
				
				

			}else if($.trim(splitResp[0]) == "fail"){
				$("#btnSaveEncuesta").show();
				console.log(splitResp[1]);
				// alert(splitResp[1])
				$("#msj").html(splitResp[1]);
			}else{
				$("#btnSaveEncuesta").show();
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			// alert(response);
		}
    });

}//SaveEncuesta


function afterFiveSeconds(){
	
window.location.href = WEB_ROOT+"/";

}