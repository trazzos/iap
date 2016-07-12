Event.observe(window, 'load', function() {
	
	Event.observe($('addGroupDiv'), "click", AddGroupDiv);
	
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

	$('content').observe("click", AddEditGroupListeners);																	 

});

function EditGroupPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php', 
	{
		method:'post',
		parameters: {type: "editGroup", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditGroupPopup(0); });
			Event.observe($('semesterId'), "change", LoadGrupos);
			Event.observe($('majorId'), "change", LoadGrupos);
			Event.observe($('editGroup'), "click", EditGroup);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditGroup()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php', 
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
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddGroupDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteGroupPopup(id)
{
	
	var message = "Realmente deseas eliminar este grupo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php',{
			method:'post',
			parameters: {type: "deleteGroup", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddGroupDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddGroupDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php', 
	{
		method:'post',
		parameters: {type: "addGroup"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('semesterId'), "change", LoadGrupos);
			Event.observe($('majorId'), "change", LoadGrupos);
			Event.observe($('addGroup'), "click", AddGroup);
			Event.observe($('fviewclose'), "click", function(){ AddGroupDiv(0); });

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddGroup()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php', 
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
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];				
				AddGroupDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function LoadGrupos(){
	
	var idSemester = document.getElementById("semesterId").value;
	var idMajor = document.getElementById("majorId").value;
	
	if(idSemester == '')
		idSemester = 0;
		
	if(idMajor == '')
	   	idMajor = 0;
	
	new Ajax.Request(WEB_ROOT+'/ajax/schedule-groups.php', 
	{
		method:'post',
		parameters: {type: "LoadGroups", semesterId : idSemester, majorId : idMajor},
   		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				
			}
			else
			{
				$('grupos').innerHTML = splitResponse[1];				
			}
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}