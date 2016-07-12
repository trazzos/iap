Event.observe(window, 'load', function() {
	
	Event.observe($('btnAddPersonal'), "click", AddPersonalDiv);
	
	AddEditPersonalListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeletePersonalPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditPersonalPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditPersonalListeners);																	 

});

function EditPersonalPopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "editPersonal", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editPersonal'), "click", EditPersonal);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditPersonal()
{
		
	SendRolesData(document.addPersonalForm.role_to,document.addPersonalForm.list_roles)
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('addPersonalForm').serialize(true),
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

function DeletePersonalPopup(id)
{
	
	var message = "Esta seguro de eliminar este personal?";
	if(!confirm(message))
  	{
		return;
	}	
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php',{
			method:'post',
			parameters: {type: "deletePersonal", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function GetCurp()
{
	
	var name = $('name').value;
	var paterno = $('lastname_paterno').value;
	var materno = $('lastname_materno').value;
	var stateId = $('stateId').value;
	var sexo = $('sexo').value;
	var fecha = $('fecha_nacimiento').value;
		
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "getCurp", name: name, paterno:paterno, materno:materno, stateId:stateId, sexo:sexo, fecha:fecha},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
						
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "ok"){	
				$('curp').value = splitResponse[1];				
			}else if(splitResponse[0] == "fail"){
				alert("Lo sentimos, pero no se pudo generar la CURP");
			}else{
				alert(response);	
			}
			

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPersonalDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: {type: "addPersonal"},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addPersonal'), "click", AddPersonal);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddPersonal()
{
	
	SendRolesData(document.addPersonalForm.role_to,document.addPersonalForm.list_roles)
		
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('addPersonalForm').serialize(true),
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

function MoveRole(From, To){
	var LOptions = new Array();
	var j=0;
	var k=0;		
	OptFrom = From.options;
	OptTo = To.options;		
	for(i=0;i<OptFrom.length;i++){
		if(OptFrom[i].selected == true){
			OptTo[OptTo.length] = 
			new Option(OptFrom[i].text,OptFrom[i].value);
			OptFrom[i] = null;
			LOptions[j] = i;
			j++;
			i--;				
		}//if
	}//for
}//MoveOptions

function SendRolesData(listFrom, fieldTo){
	var ResultLine = "";
	OptionsHandlerSrc = listFrom.options;
	for(i=0;i<OptionsHandlerSrc.length;i++){
		ResultLine+= OptionsHandlerSrc[i].value + ",";
	}//for
	fieldTo.value = ResultLine;		
}//SendRolesData