Event.observe(window, 'load', function() {
	Event.observe($('login'), "click", DoLogin);
	Event.observe($('username'), 'keypress', function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) DoLogin();
	});
	Event.observe($('passwd'), 'keypress', function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) DoLogin();
	});
	
});

function DoLogin()
{	
	$("msgWarning").hide();
	$("msgError").hide();
		
	new Ajax.Request(WEB_ROOT+'/ajax/personal.php', 
	{
		method:'post',
		parameters: $('frmLogin').serialize(true),
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			var splitResponse = response.split("[#]");
			if(splitResponse[0] == "fail")
			{	
				if(splitResponse[1] == "data")
					$("msgError").show();
				else if(splitResponse[1] == "empty")
				{
					$("msgWarning").show();
				}
			}
			else if(splitResponse[0] == "ok")
			{
				location.href = WEB_ROOT;				
			}

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}

function ClosePopUp(){
	
	$('fview').hide();
	grayOut(false);
		
}