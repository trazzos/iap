function borrarNot(id){
new Ajax.Request(WEB_ROOT+'/ajax/notificacion.php', 
	{
		method:'post',
		parameters: {type: "deleteNot",id : id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			alert(response)
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{
				ShowStatus(splitResponse[1])
			}
			else
			{
				ShowStatus(splitResponse[1])
				$('tblNot').innerHTML = splitResponse[2];
				CloseFview();
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}