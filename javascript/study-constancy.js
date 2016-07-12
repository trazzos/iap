// JavaScript Document
Event.observe(window, 'load', function() {

	SelectStudentListeners = function(e) {
		var el = e.element();
		if(el.hasClassName('spanSelect') == true)
		{
			SelectStudentConstancy(el.identify());
			return;
		}

	}
	$('tblContent').observe("click", SelectStudentListeners);																	 
});


function DoSearchConstancy(){
	/*
	if( ($F('studentName') == "") && ($F('studentPaterno') == "") && ($F('studentMaterno') == "") && ($F('controlNumber') == ""))
	{
		alert("debes proporcionar los datos de busqueda en los campos requeridos");
		return;
	}

	alert($F('studentName') + ", " + $F('studentPaterno') + ", " + $F('studentMaterno') + ", " + $F('controlNumber'));
	return;
	*/
	$('submit').disable();
	new Ajax.Request(WEB_ROOT+'/ajax/study-constancy.php',{
			method:'post',
			parameters: {type: "searchStudent", studentName : $F('studentName'), studentPaterno : $F('studentPaterno'), studentMaterno : $F('studentMaterno'), controlNumber: $F('controlNumber')},
			onSuccess: function(transport){
					var response = transport.responseText || "no response text";
					var splitResponse = response.split("[#]");
					if(splitResponse[0] == 'error')
						ShowStatus(splitResponse[1]);
					if(splitResponse[0] == 'dataFound')
						$('student-constancy').innerHTML = splitResponse[1];
					if(splitResponse[0] == 'listFound')
						$('tblContent').innerHTML = splitResponse[1];
					$('submit').enable()
				},
			onFailure: function(){ alert('Something went wrong...'); }
	  });
}