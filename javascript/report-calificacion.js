Event.observe(window, 'load', function() {
	
	Event.observe($('noControl'), "keyup", SuggestStudent);
	Event.observe($('noControl2'), "keyup", SuggestStudent2);
	Event.observe($('noControl3'), "keyup", SuggestStudent3);
	Event.observe($('noControl4'), "keyup", SuggestStudent4);
		
});

/**** NoControl 1 ****/

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
	
	if($('suggestionDiv2') != undefined)
		$('suggestionDiv2').hide();
	
	if($('suggestionDiv3') != undefined)
		$('suggestionDiv3').hide();
	
	if($('suggestionDiv4') != undefined)
		$('suggestionDiv4').hide();
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

/**** NoControl 2 ****/

function SuggestStudent2(e){
	
	var noControl = $('noControl2').value;
	
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
	  	 
			$('suggestionDiv2').show();
			$('suggestionDiv2').innerHTML = response;
			var elements = $$('span.resultSuggestUser');
			AddSuggestListener2(elements);
		
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddSuggestListener2(elements)
{
	elements.each(
		function(e) {
			var id = $(e).innerHTML;
			$('suggestionDiv2').show();
			Event.observe(e, "click", function (e) {
				var idS = id.split(" ");				
				FillNoControl2(parseInt(idS[0]));
			});
		}
	);
}

function FillNoControl2(id){
	
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php',
	{
		method:'post',
		parameters: {type: "GetNoControl", idUser : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
						
			$('noControl2').value = response;
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
	HideSuggestions();
}

/**** NoControl 3 ****/

function SuggestStudent3(e){
	
	var noControl = $('noControl3').value;
	
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
	  	 
			$('suggestionDiv3').show();
			$('suggestionDiv3').innerHTML = response;
			var elements = $$('span.resultSuggestUser');
			AddSuggestListener3(elements);
		
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddSuggestListener3(elements)
{
	elements.each(
		function(e) {
			var id = $(e).innerHTML;
			$('suggestionDiv3').show();
			Event.observe(e, "click", function (e) {
				var idS = id.split(" ");				
				FillNoControl3(parseInt(idS[0]));
			});
		}
	);
}

function FillNoControl3(id){
	
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php',
	{
		method:'post',
		parameters: {type: "GetNoControl", idUser : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
						
			$('noControl3').value = response;
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
	HideSuggestions();
}

/**** NoControl 4 ****/

function SuggestStudent4(e){
	
	var noControl = $('noControl4').value;
	
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
	  	 
			$('suggestionDiv4').show();
			$('suggestionDiv4').innerHTML = response;
			var elements = $$('span.resultSuggestUser');
			AddSuggestListener4(elements);
		
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function AddSuggestListener4(elements)
{
	elements.each(
		function(e) {
			var id = $(e).innerHTML;
			$('suggestionDiv4').show();
			Event.observe(e, "click", function (e) {
				var idS = id.split(" ");				
				FillNoControl4(parseInt(idS[0]));
			});
		}
	);
}

function FillNoControl4(id){
	
	new Ajax.Request(WEB_ROOT+'/ajax/kardex-calificacion.php',
	{
		method:'post',
		parameters: {type: "GetNoControl", idUser : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
						
			$('noControl4').value = response;
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
	
	HideSuggestions();
}

/********************/

function DoSearch(){

	var txtName = document.getElementById('name').value;
	var txtApPaterno = document.getElementById('apPaterno').value;
	var txtApMaterno = document.getElementById('apMaterno').value;
	var txtControlNumber = document.getElementById('controlNumber').value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "searchStudentCalificacion", name: txtName, controlNumber: txtControlNumber, apPaterno:txtApPaterno, apMaterno:txtApMaterno},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				
				$('content').innerHTML = splitResponse[1];
				$('pagination').innerHTML = '';
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}

function imprimir_reporte(){
		
	var semesterId = document.getElementById("semesterId").value;
	var noControl = document.getElementById("noControl").value;
	
	if(semesterId == 0){
		alert('Seleccione un semestre');
	}else if(noControl == ''){
		alert('Escriba el No. de Control');			
	}else
		document.frmReport.submit();			
			
}//imprimir_reporte

function imprimir_reporte_sem(){
		
	var semesterId = document.getElementById("semesterId2").value;
	var noControl = document.getElementById("noControl2").value;
	
	if(semesterId == 0){
		alert('Seleccione un semestre');
	}else if(noControl == ''){
		alert('Escriba el No. de Control');			
	}else
		document.frmReportSem.submit();			
			
}//imprimir_reporte_sem

function imprimir_reporte_const(){
		
	var noControl = document.getElementById("noControl3").value;
	
	if(noControl == ''){
		alert('Escriba el No. de Control');			
	}else
		document.frmReportConst.submit();			
			
}//imprimir_reporte_const

function imprimir_reporte_parcial(){
		
	var semesterId = document.getElementById("semesterId4").value;
	var noControl = document.getElementById("noControl4").value;
	
	if(semesterId == 0){
		alert('Seleccione un semestre');
	}else if(noControl == ''){
		alert('Escriba el No. de Control');			
	}else
		document.frmReportParcial.submit();			
			
}//imprimir_reporte_parcial