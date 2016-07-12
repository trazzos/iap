Event.observe(window, 'load', function() {
	Event.observe($('btnAddGradereport'), "click", AddGradereportDiv);

	AddEditGradereportListeners = function(e) {
		var el = e.element();
		var id = el.identify();
		
		//alert('id : ' + id);

		var del = el.hasClassName('spanDelete');
		if(del == true)
		{
			DeleteGradereportPopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditGradereportPopup(id);
		}
		
	}

	$('tblContent').observe("click", AddEditGradereportListeners);

});

function EditGradereportPopup(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',
	{
		method:'post',
		parameters: {type: "editGradereport", gradereportId:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editGradereport'), "click", EditGradereport);
			$('selPeriodo').disable();
			$('selSemestre').disable();
			$('groupId').disable();
			//$('regularization').disable();
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function EditGradereport()
{
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',
	{
		method:'post',
		parameters: $('editGradereportForm').serialize(true),
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
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function DeleteGradereportPopup(id)
{
	var message = "Esta seguro de eliminar esta acta?";
	if(!confirm(message))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',
	{
		method:'post',
		parameters: {type: "deleteGradereport", gradereportId: id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			ShowStatus(splitResponse[1]);
			$('tblContent').innerHTML = splitResponse[2];
		},
		onFailure: function(){ alert('Something went wrong...'); }
	});
}

function AddGradereportDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',
	{
		method:'post',
		parameters: {type: "addGradereport"},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);
			Event.observe($('addGradereport'), "click", AddGradereport);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('selPeriodo'), 'change', function(){ requestNewDataOpts(); });
			Event.observe($('selSemestre'), 'change', function(){ requestNewDataOpts(); });
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}

function AddGradereport()
{
	
	if( $F('selPeriodo') == 0)
	{
		alert('debes elegir un periodo');
		return;
	}
	if($F('selSemestre') == 0)
	{
		alert('debes elegir un semestre');
		return;
	}
	if($F('groupId') == 0)
	{
		alert('debes elegir un grupo');
		return;
	}
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',
	{
		method:'post',
		parameters: $('addGradereportForm').serialize(true),
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

function requestNewDataOpts()
{
	//alert('entrando');
	new Ajax.Request(WEB_ROOT + '/ajax/gradereport.php',
					 {
					 	method : 'post',
						parameters : 'type=requestDataOpts&selPeriodo=' + $F('selPeriodo') + '&selSemestre=' + $F('selSemestre'),
						onSuccess : function(transporta)
									{
										var respuesta = transporta.responseText;
										var respuestaDiv = respuesta.split('[#]');
										//alert(respuesta);
										$('updateDataGroup').update(respuestaDiv[0]);
										$('generation').value = respuestaDiv[1];
									},
					 	onFailure : function(){ alert('Problema en la comunicacion con el servidor'); }
					 });
}

function DoSearch(){
	
	var txtParcial = document.getElementById('parcial').value;
	var txtStatus = document.getElementById('status').value;
	var txtSemester = document.getElementById('semesterId').value;
	
	if(txtParcial == "" && txtStatus != ""){
		alert("Seleccione un parcial");
		return;
	}
	if(txtStatus == "" && txtParcial != ""){
		alert("Seleccione el status");
		return;
	}
	
	new Ajax.Request(WEB_ROOT+'/ajax/gradereport.php',{
			method:'post',
			parameters: {type: "searchGradereport", parcial: txtParcial, status:txtStatus, semesterId:txtSemester},
			onLoading: function(){				
				$('divLoading').show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				
				var splitResponse = response.split("[#]");
				
				$('tblContent').innerHTML = splitResponse[1];						
				$('divLoading').hide();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}