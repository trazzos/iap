// JavaScript Document
Event.observe(window, 'load', function() {
	//Event.observe($('addGradescore'), "click", AddGradescoreDiv);

	AddEditGradereportListeners = function(e) {
		var el = e.element();
		var id = el.identify();
		
		//alert('id : ' + id);

		var del = el.hasClassName('spanDelete');
		if(del == true)
		{
			DeleteGradescorePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditGradescorePopup(id);
		}
		
	}

	$('tblContent').observe("click", AddEditGradereportListeners);

});


function DeleteGradescorePopup(id)
{
	var message = "Esta seguro de eliminar esta calificacion?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/gradescore-user.php',
	{
		method:'post',
		parameters: {type : "deleteGradescore", gradReportUserId : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1]);
			if(splitResponse[0] == 'ok')
				$('tblContent').innerHTML = splitResponse[2];
		},
		onFailure: function(){ alert('Something went wrong...'); }
	});
}

function EditGradescorePopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/gradescore-user.php',
	{
		method:'post',
		parameters: {type : "editGradescore", gradReportUserId : id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			if(response.substr(0, 4) == 'fail')
			{
				var splitResponse = response.split('[#]');
				ShowStatus(splitResponse[1]);
				$('fview').hide();
				$('fview').innerHTML = '';
				grayOut(false);
			}
			else
			{
				FViewOffSet(response);
				Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
				Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
				Event.observe($('editGradescore'), "click", EditGradescore);
			}
		},
		onFailure: function(){ alert('Something went wrong...'); }
	});
}

function EditGradescore()
{
	new Ajax.Request(WEB_ROOT+'/ajax/gradescore-user.php',
	{
		method:'post',
		parameters: $('editGradescoreForm').serialize(true),
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			
			var splitResponse = response.split("[#]");
			
			if(splitResponse[0] == "fail")
			{
				ShowStatusPopUp(splitResponse[1]);
			}
			else
			{
				ShowStatus(splitResponse[1]);
				$('tblContent').innerHTML = splitResponse[2];
				CloseFview();
			}
		},
		onFailure: function(){ alert('Something went wrong...'); }
	});
}