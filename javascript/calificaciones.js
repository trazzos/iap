// JavaScript Document
Event.observe(window, 'load', fncInicio);

function fncInicio()
{
	$('btnGenerarNvActa').disable();
	Event.observe('btnVerificarActa', 'click', fncVerificarActa);
}

function fncVerificarActa()
{
	if($F('selPeriodo') == 0)
	{
		alert('debes seleccionar un Periodo');
		return;
	}
	if($F('selSemestre') == 0)
	{
		alert('debes seleccionar un Semestre');
		return;
	}
	if($F('selGrupo') == 0)
	{
		alert('debes seleccionar un Grupo');
		return;
	}
	alert($('frmCalificaciones').serialize());
	//new Ajax.Request();
}