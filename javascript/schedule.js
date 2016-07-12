Event.observe(window, 'load', function() {
	
	Event.observe($('addSchedule'), "click", AddScheduleDiv);
	
	AddEditScheduleListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteSchedulePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditSchedulePopup(id);
		}
	}

	$('content').observe("click", AddEditScheduleListeners);																	 

});

function EditSchedulePopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule.php', 
	{
		method:'post',
		parameters: {type: "editSchedule", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditSchedulePopup(0); });
			Event.observe($('editSchedule'), "click", EditSchedule);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditSchedule()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule.php', 
	{
		method:'post',
		parameters: $('editScheduleForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddScheduleDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteSchedulePopup(id)
{
	
	var message = "Realmente deseas eliminar este horario?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule.php',{
			method:'post',
			parameters: {type: "deleteSchedule", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddScheduleDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddScheduleDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule.php', 
	{
		method:'post',
		parameters: {type: "addSchedule"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addSchedule'), "click", AddSchedule);
			Event.observe($('fviewclose'), "click", function(){ AddScheduleDiv(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddSchedule()
{
	new Ajax.Request(WEB_ROOT+'/ajax/schedule.php', 
	{
		method:'post',
		parameters: $('addScheduleForm').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];				
				AddScheduleDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}
