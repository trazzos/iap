Event.observe(window, 'load', function() {
	
	Event.observe($('btnAddGroup'), "click", AddGroupDiv);
	
	AddEditGroupListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteGroupPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditGroupPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditGroupListeners);																	 

});

function EditGroupPopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/group.php', 
	{
		method:'post',
		parameters: {type: "editGroup", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editGroup'), "click", EditGroup);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditGroup()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/group.php', 
	{
		method:'post',
		parameters: $('editGroupForm').serialize(true),
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

function DeleteGroupPopup(id)
{
	
	var message = "Esta seguro de eliminar este grupo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/group.php',{
			method:'post',
			parameters: {type: "deleteGroup", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddGroupDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/group.php', 
	{
		method:'post',
		parameters: {type: "addGroup"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addGroup'), "click", AddGroup);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddGroup()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/group.php', 
	{
		method:'post',
		parameters: $('addGroupForm').serialize(true),
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
