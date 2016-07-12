Event.observe(window, 'load', function() {
	Event.observe($('btnAddTypetest'), "click", AddTypetestDiv);

	AddEditTypetestListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteTypetestPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditTypetestPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditTypetestListeners);

});

function EditTypetestPopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/typetest.php',
	{
		method:'post',
		parameters: {type: "editTypetest", testId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editTypetest'), "click", EditTypetest);
			$('identifier').observe('change', function()
												{
													if($F('identifier')=='P')
														$('typetest').value = 'PARCIAL';
													if($F('identifier')=='G')
														$('typetest').value = 'GLOBAL';
													if($F('identifier')=='E')
														$('typetest').value = 'EXTRAORDINARIO';
													if($F('identifier')=='*')
														$('typetest').value = '';
												});
			$('identifier').observe('focus', function(){ $('identifierTip').setStyle({ visibility : 'visible'}); });
			$('identifier').observe('blur', function(){ $('identifierTip').setStyle({ visibility : 'hidden'}); });
			$('typetest').observe('focus', function(){ $('typetestTip').setStyle({ visibility : 'visible'}); });
			$('typetest').observe('blur', function(){ $('typetestTip').setStyle({ visibility : 'hidden'}); });
			$('datetest').observe('focus', function(){ $('datetestTip').setStyle({ visibility : 'visible'}); });
			$('datetest').observe('blur', function(){ $('datetestTip').setStyle({ visibility : 'hidden'}); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditTypetest()
{
	new Ajax.Request(WEB_ROOT+'/ajax/typetest.php',
	{
		method:'post',
		parameters: $('editTypetestForm').serialize(true),
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

function DeleteTypetestPopup(id)
{
	var message = "Esta seguro de eliminar este tipo de examen?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/typetest.php',
	{
		method:'post',
		parameters: {type: "deleteTypetest", testId: id},
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

function AddTypetestDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/typetest.php',
	{
		method:'post',
		parameters: {type: "addTypetest"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addTypetest'), "click", AddTypetest);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			$('identifier').observe('change', function()
												{
													if($F('identifier')=='P')
														$('typetest').value = 'PARCIAL';
													if($F('identifier')=='G')
														$('typetest').value = 'GLOBAL';
													if($F('identifier')=='E')
														$('typetest').value = 'EXTRAORDINARIO';
													if($F('identifier')=='*')
														$('typetest').value = '';
												});
			$('identifier').observe('focus', function(){ $('identifierTip').setStyle({ visibility : 'visible'}); });
			$('identifier').observe('blur', function(){ $('identifierTip').setStyle({ visibility : 'hidden'}); });
			$('typetest').observe('focus', function(){ $('typetestTip').setStyle({ visibility : 'visible'}); });
			$('typetest').observe('blur', function(){ $('typetestTip').setStyle({ visibility : 'hidden'}); });
			$('datetest').observe('focus', function(){ $('datetestTip').setStyle({ visibility : 'visible'}); });
			$('datetest').observe('blur', function(){ $('datetestTip').setStyle({ visibility : 'hidden'}); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddTypetest()
{
	new Ajax.Request(WEB_ROOT+'/ajax/typetest.php',
	{
		method:'post',
		parameters: $('addTypetestForm').serialize(true),
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

