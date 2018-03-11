function onMaterias(){
	
	
	
	Id = $('#posgrado').val();
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/course.php',
	  	data: $("#frmForo").serialize(true)+'&Id='+Id+'&type=onMaterias',
		beforeSend: function(){			
			$('#divContenforo').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
			
					$("#divMateria").html(response);
			

		},
		error:function(){
			alert(msgError);
		}
    });
	
}//activar





function onBuscar(){
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/course.php',
	  	data: $("#frmGral").serialize(true)+'&Id='+Id+'&type=onBuscar',
		beforeSend: function(){			
			$('#divContenforo').html(LOADER3);
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
			
					$("#container").html(response);
			

		},
		error:function(){
			alert(msgError);
		}
    });
	
}//onBuscar



function onImprimir(Id){
	url=WEB_ROOT+"/ajax/reports-materia.php?"+$('#frmFlt').serialize(true)+'&'+$("#frmGral").serialize(true)+'';
	open(url,"Constancia de Estudios","toolbal=0,width=800,resizable=1");
}