Event.observe(window, 'load', function() {
	Event.observe($('btnAddSchedule_test'), "click", AddSchedule_testDiv);

	AddEditSchedule_testListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSchedule_testPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSchedule_testPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditSchedule_testListeners);

});

function EditSchedule_testPopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule_test.php',
	{
		method:'post',
		parameters: {type: "editSchedule_test", scheduletestId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editSchedule_test'), "click", EditSchedule_test);
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditSchedule_test()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule_test.php',
	{
		method:'post',
		parameters: $('editSchedule_testForm').serialize(true),
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

function DeleteSchedule_testPopup(id)
{
	var message = "Esta seguro de eliminar esta fecha de examen?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/schedule_test.php',
	{
		method:'post',
		parameters: {type: "deleteSchedule_test", scheduletestId: id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1])
			if(splitResponse[0] == 'ok')
				$('tblContent').innerHTML = splitResponse[2];
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchedule_testDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule_test.php',
	{
		method:'post',
		parameters: {type: "addSchedule_test"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addSchedule_test'), "click", AddSchedule_test);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchedule_test()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule_test.php',
	{
		method:'post',
		parameters: $('addSchedule_testForm').serialize(true),
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

