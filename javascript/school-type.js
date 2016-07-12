Event.observe(window, 'load', function() {
	Event.observe($('btnAddSchoolType'), "click", AddSchoolTypeDiv);

	AddEditSchoolTypeListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSchoolTypePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSchoolTypePopup(id);
		}
	}

	$('tblContent').observe("click", AddEditSchoolTypeListeners);

});

function EditSchoolTypePopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/school-type.php',
	{
		method:'post',
		parameters: {type: "editSchoolType", schtypId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editSchoolType'), "click", EditSchoolType);
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditSchoolType()
{
	new Ajax.Request(WEB_ROOT+'/ajax/school-type.php',
	{
		method:'post',
		parameters: $('editSchoolTypeForm').serialize(true),
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

function DeleteSchoolTypePopup(id)
{
	var message = "Esta seguro de eliminar este tipo de escuela?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/school-type.php',
	{
		method:'post',
		parameters: {type: "deleteSchoolType", schtypId: id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1])
			$('tblContent').innerHTML = splitResponse[2];				
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchoolTypeDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/school-type.php',
	{
		method:'post',
		parameters: {type: "addSchoolType"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addSchoolType'), "click", AddSchoolType);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchoolType()
{
	new Ajax.Request(WEB_ROOT+'/ajax/school-type.php',
	{
		method:'post',
		parameters: $('addSchoolTypeForm').serialize(true),
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

