function CalificacionesAct(id){

//alert(id)
grayOut(true);
	$('fview').show();

		
	new Ajax.Request(WEB_ROOT+'/ajax/studentCurricula.php', 
	{
		method:'post',
		parameters: {type: "calificaciones", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			//alert(response)
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editRole'), "click", EditRole);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}


function CalificacionesExa(id){

//alert(id)
grayOut(true);
	$('fview').show();

		
	new Ajax.Request(WEB_ROOT+'/ajax/studentCurricula.php', 
	{
		method:'post',
		parameters: {type: "calificacionesExa", id:id},
    onSuccess: function(transport){
			var response = transport.responseText || "no response text";
			//alert(response)
			FViewOffSet(response);
			Event.observe($('closePopUpDiv'), "click", function(){ CancelFview(); });
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe($('editRole'), "click", EditRole);

		},
    onFailure: function(){ alert('Something went wrong...') }
  });
}