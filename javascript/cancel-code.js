Event.observe(window, 'load', function() {
	
	Event.observe($('btnAddCode'), "click", AddCodeDiv);
	
	AddEditCodeListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteCodePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditCodePopup(id);
		}
	}

	$('tblContent').observe("click", AddEditCodeListeners);																	 

});

function EditCodePopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/cancel-code.php', 
	{
		method:'post',
		parameters: {type: "editCode", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editCode'), "click", EditCode);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditCode()
{
			
	new Ajax.Request(WEB_ROOT+'/ajax/cancel-code.php', 
	{
		method:'post',
		parameters: $('editCodeForm').serialize(true),
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
				$('tblContent').innerHTML = splitResponse[2];
				CloseFview();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteCodePopup(id)
{
	
	var message = "Esta seguro de eliminar este codigo de baja?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/cancel-code.php',{
			method:'post',
			parameters: {type: "deleteCode", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddCodeDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/cancel-code.php', 
	{
		method:'post',
		parameters: {type: "addCode"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addCode'), "click", AddCode);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddCode()
{
		
	new Ajax.Request(WEB_ROOT+'/ajax/cancel-code.php', 
	{
		method:'post',
		parameters: $('addCodeForm').serialize(true),
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
				$('tblContent').innerHTML = splitResponse[2];				
				CloseFview();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}