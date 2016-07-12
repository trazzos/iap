Event.observe(window, 'load', function() {
	Event.observe($('Recuperacion'), "click", Recuperacion);
	
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


function Recuperacion(){
//alert("hola");

	new Ajax.Request(WEB_ROOT+'/ajax/recuperacion.php', 
	{
		method:'post',
		parameters: $('emailrecuperacion').serialize(true),
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			//alert(response)
			if(splitResponse[0] == "fail")
			{
			$('redireccion').value=0;
				ShowStatus(splitResponse[1]);
				CloseFview();
				//setTimeout('location.href=WEB_ROOT+"/login"',5000);
				
			}
			else if(splitResponse[0] == "ok")
			{
			
			    $('redireccion').value=1;
				ShowStatus(splitResponse[1]);
					CloseFview();
			
				//setTimeout('location.href=WEB_ROOT+"/login"',5000);
		
				
				
			}else{alert("no puedo hacer conexion!!!")}
			

		},
    onFailure: function(){ alert('Something went wrong...') }
  });

}