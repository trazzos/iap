
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
		DeleteSubjectPopUp(id);
		return;
	}
	if(element.hasClassName('spanViewModule'))
	{
		ViewModulePopUp(id);
		return;
	}
}

function addSubjectDiv(id)
{
	grayOut(true);
	$('fview').show();
	
	new Ajax.Request(WEB_ROOT + '/ajax/subject.php',
   {
	  method : 'post',
	  parameters : {type : 'addSubject'},
	  onSuccess : function(transporta)
				  {
					  var respuesta = transporta.responseText;
					  FViewOffSet(respuesta);
					  Event.observe( $('saveAddSubject'), 'click', saveSubject);
					  Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
					  Event.observe( $('closePopUpDiv'), 'click', function(){ CancelFview(); } );
				  },
	  onFailure : function()
				  {
					  alert('Se detecto un problema con el servidor');
				  }
   });
}

function saveSubject()
{
	new Ajax.Request(WEB_ROOT+'/ajax/subject.php',
   {	
	  method: 'post',
	  parameters : 'type=saveAddSubject&' + $('addSubjectForm').serialize() + '&viewPage=' + $('viewPage').value,
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

function DeleteSubjectPopUp(id)
{
	var cSubject = '';
	cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar esta materia?'))
	{
		return;
	}
	new Ajax.Request(WEB_ROOT + '/ajax/subject.php',
   {
	  method : 'post',
	  parameters : 'type=deleteSubject&subjectId=' + id,
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
   });
}

function ViewModulePopUp(id)
{
	grayOut(true);
	$('fview').show();
	
	id = id.substring(2, id.length);
	new Ajax.Request(WEB_ROOT + '/ajax/module.php',
   {
	   method : 'post',
	   parameters : 'type=viewModules&id='+id,
	   onSuccess : function(transporta)
				  {
					  var respuesta = transporta.responseText;
					  FViewOffSet(respuesta);
					  Event.observe($('closePopUpDiv'), 'click',function(){ CancelFview(); });
					  Event.observe($('btnCancel'), "click", function(){ CancelFview(); });
				  },
	  onFailure : function()
				  {
					  alert('Se detecto un problema con el servidor'); 
				  }
   });
}

function editSubject()
{
	
	new Ajax.Request(WEB_ROOT + '/ajax/subject.php',
   {
	   method : 'post',
	   parameters : 'type=saveEditSubject&' + $('editSubjectForm').serialize() + '&viewPage=' + $('viewPage').value,
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
   });
}