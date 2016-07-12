// JavaScript Document
Event.observe(window, 'load', initSemester);

function initSemester()
{
	$('tblContent').observe('click', addEditSemesterListeners);
}

function addEditSemesterListeners(e)
{
	var element = e.element();
	var id = element.identify();
	
	if(element.hasClassName('spanEdit'))
	{
		EditSemesterPopUp(id);
		return;
	}
}

function addSemesterDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT + '/ajax/semester.php',
   {
	  method : 'post',
	  parameters : {type : 'addSemester'},
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  FViewOffSet(respuesta);
		  Event.observe( $('saveAddSemester'), 'click', saveSemester);
		  Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
		  Event.observe( $('closePopUpDiv'), 'click', function(){ CancelFview(); } );
	  },
	  onFailure : function()
	  {
		  alert('Se detecto un problema con el servidor');
	  }
   });
}

function saveSemester()
{
	new Ajax.Request(WEB_ROOT + '/ajax/semester.php',
   {	
	  method: 'post',
	  parameters : 'type=saveAddSemester&' + $('addSemesterForm').serialize(),
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

function DeleteSemesterPopUp(id)
{
	var cSemestre = '';
	cSemestre = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar este semestre?'))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT + '/ajax/semester.php',
   {
	  method : 'post',
	  parameters : 'type=deleteSemester&semesterId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('|');
		  if(divRespuesta[0] == 'Ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContent').innerHTML = divRespuesta[2];			 
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

function EditSemesterPopUp(id)
{
	grayOut(true);
	$('fview').show();
	
	id = id.substring(2, id.length);
	new Ajax.Request(WEB_ROOT + '/ajax/semester.php',
   {
	   method : 'post',
	   parameters : 'type=editSemester&id='+id,
	   onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  FViewOffSet(respuesta);
		  Event.observe($('closePopUpDiv'), 'click',function(){ CancelFview(); });
		  Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
		  Event.observe($('saveEditSemester'), 'click', editSemester);
	  },
	  onFailure : function()
	  {
		  alert('se detecto un problema con el servidor'); 
	  }
   });
}

function editSemester()
{
	new Ajax.Request(WEB_ROOT + '/ajax/semester.php',
   {
	   method : 'post',
	   parameters : 'type=saveEditSemester&' + $('editSemesterForm').serialize(),
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