<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorn"></i>Evaluación Docente
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body">
	
		<b>{$myModule.subjectName}</b><br>
		<b>Asesor:{$docente.name}  {$docente.lastname_materno}  {$docente.lastname_paterno}  </b> 
 		<br>

		<br>
		<br>
		El objetivo de este cuestionario es valorar la calidad de los procesos de enseñanza y aprendizaje desde el punto de vista
		de los estudiantes de posgrado. Se solicita tu opinión sobre el desempeño de Asesor. Las respuestas son anónimas y los resultados
		se comunican a los Asesores despues de que han entregado las calificaciones a la coordinación. Por favor conteste reflexivamente
		y con sinceridad.
		<br>
		
		
		<br>
		<br>
		
		<form id='frmGral'>
			<input type='hidden' name='courseModuleId' value='{$myModule.courseModuleId}'>
			<input type='hidden' name='personalId' value='{$docente.personalId}'>
			<div id='container'>
			{include file="{$DOC_ROOT}/templates/lists/test-docente.tpl"}
			</div>
			<div id="msj">
			</div>
		</form>
		<center>
			<a href="javascript:void(0)" onclick="SaveEncuesta()" class="btn green submitForm">Enviar Evaluación</a>
		</center>
		
    </div>
</div>