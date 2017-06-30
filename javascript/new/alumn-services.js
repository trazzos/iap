
function comprueba_extension(archivo) { 
   extensiones_permitidas = new Array(".jpg");  
      extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
      permitida = false; 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
         if (extensiones_permitidas[i] == extension) { 
         permitida = true; 
         break; 
         } 
      } 
	  
      if (!permitida) { 
         return "no";
      	}else{ 
         return "si"; 
      	} 
		
   return 0; 
}


function saveEditStudentAlumn(){
	
	$("#type").val("saveEditStudentAlumn")

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/student.php',
	  	data: $("#editStudentForm").serialize(true),
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			
		
			if(splitResp[0] == "ok"){
					$("#res_").html(splitResp[1]);
				}
			else if(splitResp[0] == "fail"){
				$("#res_").html(splitResp[1]);
				$("#centeredDivOnPopup").show();
			}else{
				$("#res_").html(response);
			}
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//saveEditStudentAlumn

function ToogleStatusDivOnPopup(){
	$("#centeredDivOnPopup").hide();
}



function estado_dependencia(){
	
	 var tam = $("#tam").val();
	var paisId = $("#pais").val();

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/dependencia-estado.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=estado_dependencia&paisId='+paisId+'&tam='+tam,
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			

			$("#Stateposition").html(response);
				
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//estado_dependencia


function ciudad_dependencia(){
	

	
	 var estadoId = $("#estado").val();
	 var tam = $("#tam").val();

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/dependencia-ciudades.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=loadCities&estadoId='+estadoId+'&tam='+tam,
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			

			$("#Cityposition").html(response);
				
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//estado_dependencia


function estado_dependenciat()
{ 
	
	var tam = $("#tam").val();
   var paisId = $("#paist").val();
   
   // alert(paisId)
	
	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/dependencia-estadot.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=loadCities&paisId='+paisId+'&tam='+tam,
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			

			$("#Statepositiont").html(response);
				
		},
		error:function(){
			alert(msgError);
		}
    });
}




  
  function ciudad_dependenciat(){
	

	
	 var estadoId = $("#estadot").val();
	 var tam = $("#tam").val();

	$.ajax({
	  	type: "POST",
	  	url: WEB_ROOT+'/ajax/dependencia-ciudadest.php',
	  	data: $("#editStudentForm").serialize(true)+'&type=loadCities&estadoId='+estadoId+'&tam='+tam,
		beforeSend: function(){			
			
		},
	  	success: function(response) {	
		
			console.log(response)
			var splitResp = response.split("[#]");
			

			$("#Citypositiont").html(response);
				
		},
		error:function(){
			alert(msgError);
		}
    });
	
}//estado_dependencia

  function updateFoto(){
	  
		var1 = comprueba_extension($("#foto").val())
	
		if(var1=="no"){
			alert("Solo se permiten imagenes con extension .JPG")
			return false;
		}
	
		$("#frmImg").submit()
	
  }