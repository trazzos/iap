Event.observe(window, 'load', function() {
	
	AddEditInstitutionListeners = function(e) {
		var el = e.element();
		var id = el.identify();
		
		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditInstitutionPopup(id);
		}
	}

	$('tblContent').observe("click", AddEditInstitutionListeners);

});

function EditInstitutionPopup(id)
{
	grayOut(true);
	$('fview').show();
	if(id == 0)
	{
		$('fview').hide();
		grayOut(false);
		return;
	}

	new Ajax.Request(WEB_ROOT+'/ajax/institution.php',
	{
		method:'post',
		parameters: {type: "editInstitution", institutionId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ EditInstitutionPopup(0); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editInstitution'), "click", EditInstitution);
			$('phone').observe('focus', function(){ $('telefonoTip').setStyle({ visibility : 'visible'}); });
			$('phone').observe('blur', function(){ $('telefonoTip').setStyle({ visibility : 'hidden'}); });
			$('fax').observe('focus', function(){ $('faxTip').setStyle({ visibility : 'visible'}); });
			$('fax').observe('blur', function(){ $('faxTip').setStyle({ visibility : 'hidden'}); });			
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditInstitution()
{
	new Ajax.Request(WEB_ROOT+'/ajax/institution.php',
	{
		method:'post',
		parameters: $('editInstitutionForm').serialize(true),
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
