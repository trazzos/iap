Event.observe(window, 'load', function() {
	Event.observe($('btnAddPeriodo'), "click", AddPeriodoDiv);

	AddEditPeriodoListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeletePeriodoPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditPeriodoPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditPeriodoListeners);

});

function EditPeriodoPopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/periodo.php',
	{
		method:'post',
		parameters: {type: "editPeriodo", periodoId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editPeriodo'), "click", EditPeriodo);
			$('identifier').observe('focus', function(){ $('PeriodoEjemplo').setStyle({ visibility : 'visible'}); });
			$('identifier').observe('blur', function(){ $('PeriodoEjemplo').setStyle({ visibility : 'hidden'}); });
			$('name').observe('focus', function(){ $('nameEjemplo').setStyle({ visibility : 'visible'}); });
			$('name').observe('blur', function(){ $('nameEjemplo').setStyle({ visibility : 'hidden'}); });
			$('starts').observe('focus', function(){ $('startsEjemplo').setStyle({ visibility : 'visible'}); });
			$('starts').observe('blur', function(){ $('startsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('ends').observe('focus', function(){ $('endsEjemplo').setStyle({ visibility : 'visible'}); });
			$('ends').observe('blur', function(){ $('endsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('fichasStarts').observe('focus', function(){ $('fichasStartsEjemplo').setStyle({ visibility : 'visible'}); });
			$('fichasStarts').observe('blur', function(){ $('fichasStartsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('fichasEnds').observe('focus', function(){ $('fichasEndsEjemplo').setStyle({ visibility : 'visible'}); });
			$('fichasEnds').observe('blur', function(){ $('fichasEndsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('vacationsStarts').observe('focus', function(){ $('vacationsStartsEjemplo').setStyle({ visibility : 'visible'}); });
			$('vacationsStarts').observe('blur', function(){ $('vacationsStartsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('vacationsEnds').observe('focus', function(){ $('vacationsEndsEjemplo').setStyle({ visibility : 'visible'}); });
			$('vacationsEnds').observe('blur', function(){ $('vacationsEndsEjemplo').setStyle({ visibility : 'hidden'}); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditPeriodo()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/periodo.php',
	{
		method:'post',
		parameters: $('editPeriodoForm').serialize(true),
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

function DeletePeriodoPopup(id)
{
	var message = "Esta seguro de eliminar este periodo?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/periodo.php',
	{
		method:'post',
		parameters: {type: "deletePeriodo", periodoId: id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1])
			$('tblContent').innerHTML = splitResponse[2];			
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddPeriodoDiv()
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/periodo.php',
	{
		method:'post',
		parameters: {type: "addPeriodo"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addPeriodo'), "click", AddPeriodo);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			$('identifier').observe('focus', function(){ $('PeriodoEjemplo').setStyle({ visibility : 'visible'}); });
			$('identifier').observe('blur', function(){ $('PeriodoEjemplo').setStyle({ visibility : 'hidden'}); });
			$('name').observe('focus', function(){ $('nameEjemplo').setStyle({ visibility : 'visible'}); });
			$('name').observe('blur', function(){ $('nameEjemplo').setStyle({ visibility : 'hidden'}); });
			$('starts').observe('focus', function(){ $('startsEjemplo').setStyle({ visibility : 'visible'}); });
			$('starts').observe('blur', function(){ $('startsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('ends').observe('focus', function(){ $('endsEjemplo').setStyle({ visibility : 'visible'}); });
			$('ends').observe('blur', function(){ $('endsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('fichasStarts').observe('focus', function(){ $('fichasStartsEjemplo').setStyle({ visibility : 'visible'}); });
			$('fichasStarts').observe('blur', function(){ $('fichasStartsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('fichasEnds').observe('focus', function(){ $('fichasEndsEjemplo').setStyle({ visibility : 'visible'}); });
			$('fichasEnds').observe('blur', function(){ $('fichasEndsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('vacationsStarts').observe('focus', function(){ $('vacationsStartsEjemplo').setStyle({ visibility : 'visible'}); });
			$('vacationsStarts').observe('blur', function(){ $('vacationsStartsEjemplo').setStyle({ visibility : 'hidden'}); });
			$('vacationsEnds').observe('focus', function(){ $('vacationsEndsEjemplo').setStyle({ visibility : 'visible'}); });
			$('vacationsEnds').observe('blur', function(){ $('vacationsEndsEjemplo').setStyle({ visibility : 'hidden'}); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddPeriodo()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/periodo.php',
	{
		method:'post',
		parameters: $('addPeriodoForm').serialize(true),
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

