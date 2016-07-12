Event.observe(window, 'load', function() {
	Event.observe($('btnAddStudent'), "click", AddStudentDiv);
	
	AddEditStudentListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteStudentPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditStudentPopup(id);
		}
	}
	$('tblContent').observe("click", AddEditStudentListeners);																	 
});


function AddStudentDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: {type: "addStudent"},
   		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);			
			Event.observe($('addStudent'), "click", AddStudent);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddStudent()
{
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('addStudentForm').serialize(true),
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
	//alert(response);		
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
			
				ShowStatusPopUp(splitResponse[1]);
				
			}
			else
			{
			
			
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];
           
				var idsSplit = splitResponse[4].split(",");
				var prueba=splitResponse[4];
				var valor = parseInt(splitResponse[3]); 
				valor=valor+1;
                //alert(splitResponse[4])
				//alert(idsSplit[29])
				
				var ultimo=parseInt(idsSplit[29]);
                    ultimo=String(ultimo);  
				
				for(ii = -1; ii < splitResponse[3]; ii++)
				{
					new FancyZoom('foto-'+idsSplit[ii], {width:400, height:300});
				
			    }
	                  
					  new FancyZoom('foto-'+ultimo, {width:400, height:300});
				
				CloseFview();//cierra la ventana de editar despues de haber guardado los datos
			
				//reload event listeners here
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}




function EditStudentPopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: {type: "editStudent", id:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);			
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editStudent'), "click", EditStudent);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditStudent()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('editStudentForm').serialize(true),
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			
		//alert(response)	
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];
           
				var idsSplit = splitResponse[4].split(",");
				var prueba=splitResponse[4];
				var valor = parseInt(splitResponse[3]); 
				valor=valor+1;
      //alert(splitResponse[4])
				//alert(idsSplit[29])
				
				var ultimo=parseInt(idsSplit[29]);
                    ultimo=String(ultimo);  
				
				for(ii = -1; ii < splitResponse[3]; ii++)
				{
					new FancyZoom('foto-'+idsSplit[ii], {width:400, height:300});
				
			    }
	                  
					  new FancyZoom('foto-'+ultimo, {width:400, height:300});
				
				CloseFview();//cierra la ventana de editar despues de haber guardado los datos
			}

		},
	onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function desactivar(id,activo){

//alert(id+"->"+activo)
	capa="loader_"+id;
new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{

		method:'post',
		parameters: {type: "desactivar", id: id, activo: activo},
		onLoading: function(){
		 // $(capa).innerHTML = "maldicion";
		  $(capa).innerHTML = "<image src='"+WEB_ROOT+"/images/cargando.gif' >Cargando...";
		  
	  },
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			console.log(response);
			$('vista_filtro').innerHTML = '<select id="vista" onchange="filtro();" > <option value="1" >Todos</option>  <option value="2" >Activos</option>  <option value="3" >Inactivos</option>     </select>';		
	
			var splitResponse = response.split("[#]");
			
	//alert(response);	
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];
           
				var idsSplit = splitResponse[4].split(",");
				var prueba=splitResponse[4];
				var valor = parseInt(splitResponse[3]); 
				valor=valor+1;
   
				
				var ultimo=parseInt(idsSplit[29]);
                    ultimo=String(ultimo);  
				
				for(ii = -1; ii < splitResponse[3]; ii++)
				{
					new FancyZoom('foto-'+idsSplit[ii], {width:400, height:300});
				
			    }
	                  
					  new FancyZoom('foto-'+ultimo, {width:400, height:300});
				
				CloseFview();//cierra la ventana de editar despues de haber guardado los datos
			}

		},
	onFailure: function(){ alert('Something went wrong...') }
  });

}

function activar(id,activo){

//alert(id+"->"+activo)
capa="loader_"+id;

new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: {type: "activar", id: id, activo: activo},
			onLoading: function(){
		  $(capa).innerHTML = "<image src='"+WEB_ROOT+"/images/cargando.gif' >Cargando... ";
		  //$(capa).innerHTML = "putamadre";
	  },
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			//$('vista_filtro').innerHTML = '<select id="vista" onchange="filtro();" > <option value="1" >Todos</option>  <option value="2" >Activos</option>  <option value="3" >Inactivos</option>     </select>';		
	
			var splitResponse = response.split("[#]");
			
				//alert(response);	
			console.log(splitResponse[0]);
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				console.log(splitResponse[1]);
				ShowStatus(splitResponse[1])
				console.log("dsdsad");
				$('tblContent').innerHTML = splitResponse[2];
				console.log(splitResponse[2]);
           
				var idsSplit = splitResponse[4].split(",");
				var prueba=splitResponse[4];
				var valor = parseInt(splitResponse[3]); 
				valor=valor+1;
   
				
				var ultimo=parseInt(idsSplit[29]);
                    ultimo=String(ultimo);  
				
				for(ii = -1; ii < splitResponse[3]; ii++)
				{
					new FancyZoom('foto-'+idsSplit[ii], {width:400, height:300});
				
			    }
	                  
					  new FancyZoom('foto-'+ultimo, {width:400, height:300});
				
				CloseFview();//cierra la ventana de editar despues de haber guardado los datos
			}

		},
	onFailure: function(){ alert('Something went wrong...') }
  });

}



function DeleteStudentPopup(id)
{
	
	var message = "Esta seguro de eliminar este alumno?  Se elimara todo rastro que haya pagos, cursos, calificaciones";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "deleteStudent", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];			

				var idsSplit = splitResponse[4].split(",");
				
				for(ii = 0; ii <= splitResponse[3]; ii++)
				{
					new FancyZoom('foto-'+idsSplit[ii], {width:400, height:300});
				}
					
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}


function filtro(){

//alert($('vista').value)
//alert("cambio")

vista=$('vista').value;

new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "filtro", vista: vista},
				onLoading: function(){
		 // $(capa).innerHTML = "maldicion";
		  $('carga_filtro').innerHTML = "<image src='"+WEB_ROOT+"/images/cargando.gif' >Cargando...";
		  
	      },
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
	$('carga_filtro').innerHTML ="";
        	var splitResponse = response.split("[#]");
				
				$('tblContent').innerHTML = splitResponse[1];
				$('pagination').innerHTML = '';				
				$('divLoading').hide();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });



}

function buscar(){
	
	var buscar = document.getElementById('buscando').value;
//alert(buscar);
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "buscarStudent", buscar: buscar},
			onLoading: function(){				
				$('divLoading').show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
	//alert(response)
        	var splitResponse = response.split("[#]");
				
				$('tblContent').innerHTML = splitResponse[1];
				$('pagination').innerHTML = '';				
				$('divLoading').hide();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}


function DoSearch(){
	//alert("buscar")
	var txtName = document.getElementById('nombre').value;
	var txtApPaterno = document.getElementById('apPaterno').value;
	var txtApMaterno = document.getElementById('apMaterno').value;
	var txtControlNumber = document.getElementById('noControl').value;
	var txtfiltro = document.getElementById('vista').value;
	//alert(txtfiltro)
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "searchStudent", name: txtName, controlNumber: txtControlNumber, apPaterno:txtApPaterno, apMaterno:txtApMaterno, activo:txtfiltro},
			onLoading: function(){				
				$('divLoading').show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				//alert(response)
				var splitResponse = response.split("[#]");
				
				$('tblContent').innerHTML = splitResponse[1];
				$('pagination').innerHTML = '';				
				$('divLoading').hide();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  }); 
}

function ChangeStatus(idUser){
	
	var txtStatus = document.getElementById('usrStatus_'+idUser).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "changeStatus", status: txtStatus, userId: idUser},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
			
				var splitResponse = response.split("[#]");
				
				ShowStatus(splitResponse[1]);
				CloseFview();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function change_status(form){
		
	var status = form.status.value;
	var objMotivo = document.getElementById('motivoBaja');
	var objAnioEgreso = document.getElementById('egresoAnio');
	
	if(status == 'baja')
		objMotivo.style.display = 'block';
	else
		objMotivo.style.display = 'none';
	
	if(status == 'egresado')
		objAnioEgreso.style.display = 'block';
	else
		objAnioEgreso.style.display = 'none';

}//change_status

function changeStatusListado(idUser){
	
	var combo = document.getElementById('status_'+idUser);
	var txtStatus = combo.options[combo.options.selectedIndex].text;

	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "changeStatus", status: txtStatus, userId: idUser},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				console
			
				var splitResponse = response.split("[#]");
				
				ShowStatus(splitResponse[1]);
				CloseFview();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });

 
	  
}

///////////////////////////////////////////////////////////////////////combox dependencia de trabajo

function estado_dependenciat()
{
//alert("hola")
   var tam = $("tam").value;
   var paisId = $("paist").value;
//alert(tam);

   new Ajax.Request(WEB_ROOT+'/ajax/dependencia-estadot.php',{
   method:'post',
   parameters: {type: "loadCities", paisId: paisId, tam: tam },
   
   onSuccess: function(transport){
    var response = transport.responseText || "no response text";    
    var splitResponse = response.split("[#]");
  
     $('Statepositiont').innerHTML = splitResponse[0];
    
    	 if(tam==1)
     $('Citypositiont').innerHTML = "<select id='ciudadt' name='ciudadt' style='width:300px' > <option value='0'>Elige tu ciudad</option></select>";
      else
       $('Citypositiont').innerHTML = "<select id='ciudadt' name='ciudadt' style='width:350px' > <option value='0'>Elige tu ciudad</option></select>";
  },
  onFailure: function(){ alert('Something went wrong...') }
   });

   
   
  }

function ciudad_dependenciat()
{    var tam = $("tam").value;
   var estadoId = $("estadot").value;
	 new Ajax.Request(WEB_ROOT+'/ajax/dependencia-ciudadest.php',{
   method:'post',
   parameters: {type: "loadCities", estadoId: estadoId, tam:tam},
   
   onSuccess: function(transport){
    var response = transport.responseText || "no response text";    
    var splitResponse = response.split("[#]");
  
     $('Citypositiont').innerHTML = splitResponse[0];
    
    
   },
  onFailure: function(){ alert('Something went wrong...') }
   });
}


/**************************************** fin combox dependientes trabajo  ***************************/

function estado_dependencia()
{
    var tam = $("tam").value;
   var paisId = $("pais").value;
//alert(tam);

   new Ajax.Request(WEB_ROOT+'/ajax/dependencia-estado.php',{
   method:'post',
   parameters: {type: "loadCities", paisId: paisId, tam: tam },
   
   onSuccess: function(transport){
    var response = transport.responseText || "no response text";    
    var splitResponse = response.split("[#]");
	//alert(response)
  
     $('Stateposition').innerHTML = splitResponse[0];
	 if(tam==1)
     $('Cityposition').innerHTML = "<select id='ciudad' name='ciudad' style='width:300px' > <option value='0'>Elige tu ciudad</option></select>";
      else
       $('Cityposition').innerHTML = "<select id='ciudad' name='ciudad' style='width:350px' > <option value='0'>Elige tu ciudad</option></select>";
   },
  onFailure: function(){ alert('Something went wrong...') }
   });
}

function ciudad_dependencia()
{
   var estadoId = $("estado").value;
  var tam = $("tam").value;
	//alert("hola");
	 new Ajax.Request(WEB_ROOT+'/ajax/dependencia-ciudades.php',{
   method:'post',
   parameters: {type: "loadCities", estadoId: estadoId, tam: tam},
   
   onSuccess: function(transport){
    var response = transport.responseText || "no response text";    
    var splitResponse = response.split("[#]");
  
     $('Cityposition').innerHTML = splitResponse[0];
    
    
   },
  onFailure: function(){ alert('Something went wrong...') }
   });
}

