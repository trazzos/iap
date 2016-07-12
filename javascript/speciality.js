Event.observe(window, 'load', function() {
	
	Event.observe($('btnAddSpeciality'), "click", AddSpecialityDiv);
	
	AddEditSpecialityListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSpecialityPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSpecialityPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditSpecialityListeners);																	 

});

function EditSpecialityPopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/speciality.php', 
	{
		method:'post',
		parameters: {type: "editSpeciality", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editSpeciality'), "click", EditSpeciality);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSpeciality()
{
	new Ajax.Request(WEB_ROOT+'/ajax/speciality.php', 
	{
		method:'post',
		parameters: $('editSpecialityForm').serialize(true),
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

function DeleteSpecialityPopup(id)
{
	
	var message = "Esta seguro de eliminar esta especialidad?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/speciality.php',{
			method:'post',
			parameters: {type: "deleteSpeciality", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];			
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddSpecialityDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/speciality.php', 
	{
		method:'post',
		parameters: {type: "addSpeciality"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addSpeciality'), "click", AddSpeciality);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddSpeciality()
{
	new Ajax.Request(WEB_ROOT+'/ajax/speciality.php', 
	{
		method:'post',
		parameters: $('addSpecialityForm').serialize(true),
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
