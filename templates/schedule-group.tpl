<div>
<b>Carrera:</b> {$infG.major}
<br /><b>Semestre:</b> {$infG.semester}
<br /><b>Grupo:</b> {$infG.group}
</div>
       
    <div align="center">
        <span id="addScheduleDiv" style="cursor:pointer">
            <img src="{$WEB_ROOT}/images/addn.png" border="0" />Agregar/Editar Horario
        </span>   
    </div>
	<div style="float:left">
        <span id="impScheduleDiv" style="cursor:pointer">
        	<a href="javascript:void(0)" onclick="DeleteSchedule({$infG.scheduleGroupId})" style="text-decoration:none;  color:#000000">
            <img src="{$WEB_ROOT}/images/icons/delete.png" border="0" />Eliminar Horario
        	</a>
        </span>   
    </div>
    <div style="float:right">
        <span id="impScheduleDiv" style="cursor:pointer">
        	<a href="javascript:void(0)" onclick="PrintSchedule({$infG.scheduleGroupId})" style="text-decoration:none;  color:#000000">
            <img src="{$WEB_ROOT}/images/icons/ok.png" border="0" />Imprimir Horario
        	</a>
        </span>   
    </div>
    <div style="clear:both"></div>

<div id="content">
{include file="lists/schedule-group.tpl"}
</div>
<br />
<div align="center"><a href="{$WEB_ROOT}/schedule-groups">Regresar</a></div>
<br />