Event.observe(window, 'load', function() {
//	Event.observe($('btnAddStudent'), "click", AddStudentDiv);
	
	AddEditStudentListeners = function(e) {
		var el = e.element();
		var del = el.hasClassName('spanDelete');
		var id = el.identify();
		if(del == true)
		{
			DeleteInvoicePopup(id);
			return;
		}

		del = el.hasClassName('spanEdit');
		if(del == true)
		{
			EditStudentPopup(id);
		}
	}
	$('tblContent').observe("click", AddEditStudentListeners);																	 
});


function AddStudentDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: {type: "addStudent"},
   		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);			
			Event.observe($('addStudent'), "click", AddStudent);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function AddStudent()
{
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('addStudentForm').serialize(true),
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
				//reload event listeners here
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}


function EditStudentPopup(id)
{
	grayOut(true);
	$('fview').show();
		
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: {type: "editStudent", id:id},
		onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			FViewOffSet(response);			
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editStudent'), "click", EditStudent);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function EditStudent()
{
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php', 
	{
		method:'post',
		parameters: $('editStudentForm').serialize(true),
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

function DeleteInvoicePopup(id)
{
	
	var message = "Esta seguro de eliminar este Recibo de Pago, Esto tambien borrara los pagos asociados. No podra deshacer esta accion?";
	if(!confirm(message))
  	{
		return;
	}	
	
	id = id.substr(2);

	new Ajax.Request(WEB_ROOT+'/ajax/invoice.php',{
			method:'post',
			parameters: {type: "deleteInvoice", id: id},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				ShowStatus(splitResponse[1])
				$('tblContent').innerHTML = splitResponse[2];				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function DoSearch(){
	var txtCurricula = document.getElementById('courseId').value;
	var txtName = document.getElementById('nombre').value;
	var txtControlNumber = document.getElementById('noControl').value;
	var desde = document.getElementById('desde').value;
	var hasta = document.getElementById('hasta').value;
	var txtStatus = document.getElementById('status').value;
	new Ajax.Request(WEB_ROOT+'/ajax/invoice.php',{
			method:'post',
			parameters: {type: "searchInvoice", courseId: txtCurricula, name: txtName, controlNumber: txtControlNumber, desde:desde, hasta:hasta, status:txtStatus},
			onLoading: function(){				
				$('divLoading').show();
			},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
				var splitResponse = response.split("[#]");
				
				$('tblContent').innerHTML = splitResponse[1];
				$('pagination').innerHTML = '';				
				$('divLoading').hide();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
}

function ChangeStatus(idUser){
	
	var txtStatus = document.getElementById('usrStatus_'+idUser).value;
	
	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "changeStatus", status: txtStatus, userId: idUser},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
			
				var splitResponse = response.split("[#]");
				
				ShowStatus(splitResponse[1]);
				CloseFview();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });
	
}

function change_status(form){
		
	var status = form.status.value;
	var objMotivo = document.getElementById('motivoBaja');
	var objAnioEgreso = document.getElementById('egresoAnio');
	
	if(status == 'baja')
		objMotivo.style.display = 'block';
	else
		objMotivo.style.display = 'none';
	
	if(status == 'egresado')
		objAnioEgreso.style.display = 'block';
	else
		objAnioEgreso.style.display = 'none';

}//change_status

function changeStatusListado(idUser){
	
	var combo = document.getElementById('status_'+idUser);
	var txtStatus = combo.options[combo.options.selectedIndex].text;

	new Ajax.Request(WEB_ROOT+'/ajax/student.php',{
			method:'post',
			parameters: {type: "changeStatus", status: txtStatus, userId: idUser},
			onSuccess: function(transport){
				var response = transport.responseText || "no response text";
			
				var splitResponse = response.split("[#]");
				
				ShowStatus(splitResponse[1]);
				CloseFview();
				
			},
		onFailure: function(){ alert('Something went wrong...') }
	  });

}