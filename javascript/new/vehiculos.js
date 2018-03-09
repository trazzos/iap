

function loadFecha(Id){
	 // $.datepicker.setDefaults( $.datepicker.regional['es'] );
		$('#fecha'+Id).datepicker({
		 dateFormat: 'yy-mm-dd',
		}).focus();
}



function loadTR(Id){
	$('#tr_'+Id).toggle();
}




function onBuscar(Id){
	
	
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/new/reportes.php',
	  	data: $("#frmFlt").serialize(true)+'&Id='+Id+'&type=onBuscar',
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



function onLoadPdf(Id){
	url=WEB_ROOT+"/ajax/reports.php?"+$('#frmFlt').serialize(true)+'&'+$("#frmGral").serialize(true)+'&type=vehiculo';
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}