Event.observe(window, 'load', function() {
	
	Event.observe($('addAssignDiv'), "click", AddAssignDiv);
	
	AddEditAssignListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteAssignPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditAssignPopup(id);
		}
	}

	$('content').observe("click", AddEditAssignListeners);																	 

});

function EditAssignPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: {type: "editAssign", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditAssignPopup(0); });
			Event.observe($('editAssign'), "click", EditAssign);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditAssign()
{
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: $('editAssignForm').serialize(true),
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
				AddAssignDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function DeleteAssignPopup(id)
{
	
	var message = "Realmente deseas eliminar este grupo?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php',{
			method:'post',
			parameters: {type: "deleteAssign", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatusPopUp(splitResponse[1])
				$('content').innerHTML = splitResponse[2];
				AddAssignDiv(0);
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function AddAssignDiv(id)
{
	grayOut(true);
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: {type: "addAssign"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addAssign'), "click", AddAssign);
			Event.observe($('fviewclose'), "click", function(){ AddAssignDiv(0); });
			Event.observe($('semesterId'), "change", loadSpecialities);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddAssign()
{
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: $('addAssignForm').serialize(true),
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
				AddAssignDiv(0);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function loadSpecialities(){
		
	var semesterId = $('semesterId').value;	
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: {type:'loadSpecialities', id:semesterId},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{							
				$('specialities').innerHTML = splitResponse[1];
				$('subjects').innerHTML = splitResponse[2];
				Event.observe($('specialityId'), "change", loadSubjects);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}


function loadSubjects(){
	
	var semesterId = $('semesterId').value;	
	var specialityId = $('specialityId').value;	
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: {type:'loadSubjects', idSpeciality:specialityId, idSemester:semesterId},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{							
				$('subjects').innerHTML = splitResponse[1];
				Event.observe($('subjectId'), "change", loadGroups);
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}

function loadGroups(){
	
	var semesterId = $('semesterId').value;	
	var specialityId = $('specialityId').value;
	var subjectId = $('subjectId').value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/assign.php', 
	{
		method:'post',
		parameters: {type:'loadGroups', idSpeciality:specialityId, idSemester:semesterId, idSubject:subjectId},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1])
			}
			else
			{							
				$('groups').innerHTML = splitResponse[1];
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
	
}
