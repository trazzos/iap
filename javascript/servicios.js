function UpdateCuentas()
{
	new Ajax.Request(WEB_ROOT + '/ajax/servicios.php',
   {
	  method : 'post',
	  parameters : 'type=updateCuentas&customerId=' + $('cliente').value,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
			$('updateCuentas').innerHTML = respuesta
	  },
	  onFailure : function()
				  {
					  alert('Se detecto un problema con el servidor');
				  }
   });
}

