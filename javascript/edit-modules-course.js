
Event.observe(window, 'load', initSubject);

function initSubject()
{
//	Event.observe($('btnAddSubject'), 'click', addSubjectDiv);
	$('tblContent').observe('click', addEditSubjectListeners);
	$('tblContentResources').observe('click', addEditResourcesListeners);
}

function addEditSubjectListeners(e)
{
	var element = e.element();
	var id = element.identify();
	if(element.hasClassName('spanDelete'))
	{
		DeleteActivity(id);
		return;
	}

}

function addEditResourcesListeners(e)
{
	var element = e.element();
	var id = element.identify();
	if(element.hasClassName('spanDeleteResource'))
	{
		DeleteResource(id);
		return;
	}

}
function DeleteResource(id)
{
	var cSubject = '';
	cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar este recurso?'))
	{
		return;
	}

	new Ajax.Request(WEB_ROOT + '/ajax/resource.php',
   {
	  method : 'post',
	  parameters : 'type=deleteResource&resourceId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('[#]');
		  if(divRespuesta[0] == 'ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContentResources').innerHTML = divRespuesta[2];
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


function DeleteActivity(id)
{
	var cSubject = '';
	cSubject = $(id).readAttribute('name').substring(2, $(id).readAttribute('name').length);
	id = id.substring(2, id.length);
	if(!confirm('Esta seguro de eliminar esta actividad?'))
	{
		return;
	}

	new Ajax.Request(WEB_ROOT + '/ajax/activity.php',
   {
	  method : 'post',
	  parameters : 'type=deleteActivity&activityId=' + id,
	  onSuccess : function(transporta)
	  {
		  var respuesta = transporta.responseText;
		  var divRespuesta = respuesta.split('[#]');
		  if(divRespuesta[0] == 'ok'){
			  ShowStatus(divRespuesta[1]);
			  $('tblContent-activities').innerHTML = divRespuesta[2];
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

// function borrarCalendario(id){
// alert(id);

// new Ajax.Request(WEB_ROOT + '/ajax/moduleCourse.php',
   // {
	  // method : 'post',
	  // parameters : 'type=borrarCalendario&moduleId=' + id,
	  // onSuccess : function(transporta)
	  // {
		  // var respuesta = transporta.responseText;
		  // var divRespuesta = respuesta.split('[#]');
		  // alert(divRespuesta)
		  // if(divRespuesta[0] == 'ok'){
			  // ShowStatus(divRespuesta[1]);
			  // $('tab').innerHTML = divRespuesta[2];
			  // CloseFview();
		  // }else{
			// ShowStatus(divRespuesta[1]);  
		  // }
	  // },
	  // onFailure : function()
				  // {
					  // alert('Se detecto un problema con el servidor');
				  // }
   // });

// }

function DeleteModuleFromCourse(id)
{
	if(!confirm('Esta seguro de eliminar este modulo de este curso?'))
	{
		return;
	}
	
	window.location = WEB_ROOT+"/history-subject/borrars/"+id;
}