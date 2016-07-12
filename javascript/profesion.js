// JavaScript Document
Event.observe(window, 'load', initPosition);

function initPosition()
{
	Event.observe($('btnAddPosition'), 'click', addPositionDiv);
	$('tblContent').observe('click', addEditPositionListeners);
}

function addEditPositionListeners(e)
{
	var element = e.element();
	var id = element.identify();
	if(element.hasClassName('spanDelete'))
	{
		DeletePositionPopUp(id);
		return;
	}
	if(element.hasClassName('spanEdit'))
	{
		EditPositionPopUp(id);
		return;
	}
}

function addPositionDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT + '/ajax/profesion.php',
	 {
		method : 'post',
		parameters : {type : 'addPosition'},
		onSuccess : function(transporta)
		{
			var respuesta = transporta.responseText;
			FViewOffSet(respuesta);
			Event.observe( $('saveAddPosition'), 'click', savePosition);
			Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
			Event.observe( $('closePopUpDiv'), 'click', function(){ CancelFview(); } );
		},
		onFailure : function()
		{
			alert('Se detecto un problema con el servidor');
		}
	 });
}

function savePosition()
{
	new Ajax.Request(WEB_ROOT + '/ajax/profesion.php',
   {	
	  method: 'post',
	  parameters : 'type=saveAddPosition&' + $('addPositionForm').serialize(),
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('|');
		  if(divRespuesta[0] == 'Ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContent').innerHTML = divRespuesta[2];
			  CloseFview();
		  }else{
			ShowStatusPopUp(divRespuesta[1]);  
		  }
	  },
	  onFailure : function()
	  {
		  alert('Se detecto un problema con el servidor');
	  }
   }
  );
}

function DeletePositionPopUp(id)
{
	var cPuesto = '';
	cPuesto = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar esta profesion?'))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT + '/ajax/profesion.php',
   {
	  method : 'post',
	  parameters : 'type=deletePosition&positionId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('|');
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
		  alert('se detecto un problema con el servidor');
	  }
   });
}

function EditPositionPopUp(id)
{
	grayOut(true);
	$('fview').show();
	
	id = id.substring(2, id.length);
	new Ajax.Request(WEB_ROOT + '/ajax/profesion.php',
   {
	   method : 'post',
	   parameters : 'type=editPosition&id='+id,
	   onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  FViewOffSet(respuesta);
		  Event.observe($('closePopUpDiv'), 'click',function(){ CancelFview(); });
		  Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
		  Event.observe($('saveEditPosition'), 'click', editPosition);
	  },
	  onFailure : function()
	  { 
		  alert('se detecto un problema con el servidor'); 
	  }
   });
}

function editPosition()
{
	new Ajax.Request(WEB_ROOT + '/ajax/profesion.php',
   {
	   method : 'post',
	   parameters : 'type=saveEditPosition&' + $('editPositionForm').serialize(),
	   onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('|');
		  if(divRespuesta[0] == 'Ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContent').innerHTML = divRespuesta[2];
			  CloseFview();
		  }else{
			ShowStatusPopUp(divRespuesta[1]);  
		  }
	  },
	  onFailure : function()
	  {
		  alert('se detecto un problema con el servidor');
	  }
   });
}