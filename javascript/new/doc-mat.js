function onBuscar(Id){
	
	
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/new/personal.php',
	  	data: $("#frmFlt").serialize(true)+'&Id='+Id+'&type=onBuscarMacth',
		beforeSend: function(){			
			// $('#tblContent').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			// var splitResp = response.split("[#]");

			
				$("#container").html(response);
				// $("#container").html(splitResp[2]);
			
		}
    });
	
}


