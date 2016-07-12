Event.observe(window, 'load', function() {
	
	Event.observe($('noControl'), "keyup", SuggestStudent);
		
});

function SuggestStudent(e){
	
	var noControl = $('noControl').value;
	
	if(e.keyCode == Event.KEY_ESC){
		HideSuggestions();
		return;
	}
	
	if(noControl == ""){
		HideSuggestions();		
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/suggest.php', 
	{
  	parameters: {value: noControl, type: "sugStudent" },
		method:'post',
    onSuccess: function(transport){
      var response = transport.responseText || "no response text";
	  	 
			$('suggestionDiv').show();
			$('suggestionDiv').innerHTML = response;
			var elements = $$('span.resultSuggestUser');
			AddSuggestListener(elements);
		
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function HideSuggestions()
{
	if($('suggestionDiv') != undefined)
		$('suggestionDiv').hide();
}

function AddSuggestListener(elements)
{
	elements.each(
		function(e) {
			var id = $(e).innerHTML;
			$('suggestionDiv').show();
			Event.observe(e, "click", function (e) {
				var idS = id.split(" ");				
				FillNoControl(parseInt(idS[0]));
			});
		}
	);
}

function FillNoControl(id){
	
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php',
	{
		method:'post',
		parameters: {type: "GetNoControl", idUser : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
						
			$('noControl').value = response;
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
	HideSuggestions();
}

function searchSubjects(){
	
	var majorId = document.getElementById("majorId").value;
	var semesterId = document.getElementById("semesterId").value;
	var noControl = document.getElementById("noControl").value;
	
	if(noControl == ""){
		alert("Escriba el No. de Control");
		return;
	}
	
	if(majorId == 0){
		alert("Elija la carrera");
		return;
	}
	
	if(semesterId == 0){
		alert("Elija el semestre");
		return;
	}
	
	//Verificamos si existe el alumno antes de mandar el formulario
	
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php', 
	{
		method:'post',
		parameters: {type: "verifyControlNumber", controlNumber:noControl},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
				grayOut(false);
			}
			else
			{
				document.getElementById("frmKardex").submit();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddCalifDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
}

function SaveData()
{
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php', 
	{
		method:'post',
		parameters: $('frmCalificaciones').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
			}
			else
			{
				ShowStatus(splitResponse[1])				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteData()
{
	var message = "Realmente deseas eliminar este kardex?";
	if(!confirm(message))
  	{
		return;
	}	
	
	document.getElementById('type').value = 'deleteCalif';
	document.getElementById('frmCalificaciones').submit();
	
}