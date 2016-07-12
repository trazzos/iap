Event.observe(window, 'load', function() {
	Event.observe($('editStudent'), "click", EditStudent);											 
});


function EditStudent()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('editStudentForm').serialize(true),
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				//$('tblContent').innerHTML = splitResponse[2];
				CloseFview();
			}

		},
	onFailure: function(){ alert('Something went wrong...') }
  });
 } 
    
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

  
  
  
  function estado_dependenciat()
{
//alert("hola")
   var tam = $("tam").value;
   var paisId = $("paist").value;


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

  
	
