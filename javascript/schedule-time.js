Event.observe(window, 'load', function() {
	Event.observe($('btnAddSchedule_time'), "click", AddSchedule_timeDiv);

	AddEditSchedule_timeListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSchedule_timePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSchedule_timePopup(id);
		}
	}

	$('tblContent').observe("click", AddEditSchedule_timeListeners);

});

function EditSchedule_timePopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-time.php',
	{
		method:'post',
		parameters: {type: "editSchedule_time", schtimeId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editSchedule_time'), "click", EditSchedule_time);
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditSchedule_time()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-time.php',
	{
		method:'post',
		parameters: $('editSchedule_timeForm').serialize(true),
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

function DeleteSchedule_timePopup(id)
{
	var message = "Esta seguro de eliminar este horario?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-time.php',
	{
		method:'post',
		parameters: {type: "deleteSchedule_time", schtimeId: id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1])
			$('tblContent').innerHTML = splitResponse[2];
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchedule_timeDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-time.php',
	{
		method:'post',
		parameters: {type: "addSchedule_time"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addSchedule_time'), "click", AddSchedule_time);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddSchedule_time()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-time.php',
	{
		method:'post',
		parameters: $('addSchedule_timeForm').serialize(true),
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