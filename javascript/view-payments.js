
Event.observe(window, 'load', initSubject);

function initSubject()
{
//	Event.observe($('btnAddSubject'), 'click', addSubjectDiv);
	$('tblContent').observe('click', addEditSubjectListeners);
}

function addEditSubjectListeners(e)
{
	var element = e.element();
	var id = element.identify();
	if(element.hasClassName('spanDelete'))
	{
		DeletePayment(id);
		return;
	}

	if(element.hasClassName('spanCancel'))
	{
		CancelPayment(id);
		return;
	}

}

function DeletePayment(id)
{
	var cSubject = '';
	cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar este pago?'))
	{
		return;
	}

	new Ajax.Request(WEB_ROOT + '/ajax/payment.php',
   {
	  method : 'post',
	  parameters : 'type=deletePayment&paymentId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
			console.log(respuesta);
		  var divRespuesta = respuesta.split('[#]');
		  if(divRespuesta[0] == 'Ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContent').innerHTML = divRespuesta[2];
			  CloseFview();
		  }else{
			ShowStatus(divRespuesta[1]);  
		  }
	  },
	  onFailure : function()
				  {
					  alert('Se detecto un problema con el servidor');
				  }
   });
}

function CancelPayment(id)
{
	var cSubject = '';
	cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de cambiar el estatus de este pago?'))
	{
		return;
	}

	new Ajax.Request(WEB_ROOT + '/ajax/payment.php',
   {
	  method : 'post',
	  parameters : 'type=cancelPayment&paymentId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('[#]');

		  if(divRespuesta[0] == 'ok'){
			  $('status-no-ajax').innerHTML = divRespuesta[1];
			  $('tblContent').innerHTML = divRespuesta[2];
			  CloseFview();
		  }else{
				//ShowStatus(divRespuesta[1]);  
		  }
	  },
	  onFailure : function()
				  {
					  alert('Se detecto un problema con el servidor');
				  }
   });
}