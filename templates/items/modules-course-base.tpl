{foreach from=$subjects item=subject}
    <tr>
       <!-- <td align="center" class="id">{$subject.courseModuleId}</td>-->
       <!-- <td align="center">{$subject.clave}</td>-->
        <td align="center">{$subject.semesterId}</td>
        <td align="left">{$subject.name}</td>
        <td align="left">{$subject.initialDate|date_format:"%d-%m-%Y"}</td>
        <td align="left">{$subject.finalDate|date_format:"%d-%m-%Y"}</td>
		<!-- <td align="left">{$subject.daysToFinish}</td>
		<td align="left">{$subject.active}</td>-->
		{if $User.type == "student"}
		<td align="center">{$subject.totalScore} <br/>
		<a href="javascript:void(0)" onclick="CalificacionesAct({$subject.courseModuleId});"> Actividades</a>
		<br/>
		<!--<a href="javascript:void(0)" onclick="CalificacionesExa({$subject.courseModuleId});"> Examenes</a>-->
		</td>
		<td align="center">

			{if  $timestamp < $subject.initialDateStamp}
					No Disponible <!-- no iniciada -->
			{else}
				{if $subject.finalDateStamp > 0 AND $timestamp > $subject.finalDateStamp}
					<!-- materia finalizada -->
					{if $subject.countEval >=1}
						{$subject.calificacionFinal}
					{else}
						Contestar Evaluación
					{/if}
				{elseif $subject.active == "no"}
					 <!-- materia finalizada -->
					 {if $subject.countEval >=1}
						{$subject.calificacionFinal}
					{else}
						Contestar Evaluación
					{/if}
				{elseif $subject.finalDateStamp <= 0 AND $initialDateStamp < $subject.daysToFinishStamp AND $timestamp > $subject.daysToFinishStamp}
					  <!-- materia finalizada -->
					{if $subject.countEval >=1}
						{$subject.calificacionFinal}
					{else}
						Contestar Evaluación
					{/if}
				{else}
					Contestar Evaluación<!-- materia activa -->
				{/if}
			{/if}
		</td>
		<td>
			{if $subject.countEval >=1}
				Contestada
			{else}
					{if  $timestamp < $subject.initialDateStamp}
						No Disponible
					{else}
						{if $subject.finalDateStamp > 0 AND $timestamp > ($subject.finalDateStamp - (3600 * 24 * 30))}
							<a href="{$WEB_ROOT}/test-docente/id/{$subject.courseModuleId}">Disponible</a>
						{elseif $subject.active == "no"}
							<a href="{$WEB_ROOT}/test-docente/id/{$subject.courseModuleId}">Disponible</a>
						{elseif $subject.finalDateStamp <= 0 AND $initialDateStamp < $subject.daysToFinishStamp AND $timestamp > $subject.daysToFinishStamp}
							<a href="{$WEB_ROOT}/test-docente/id/{$subject.courseModuleId}">Disponible</a>
						{else}
							No Disponible
						{/if}
				  {/if}
			{/if}
		</td>
		{/if}

        <td align="center">
        {if $User.type == "student"}
	        {if  $timestamp < $subject.initialDateStamp}
				No Iniciado
			{else}
				{if $subject.finalDateStamp > 0 AND $timestamp > $subject.finalDateStamp}
					Finalizado
				{elseif $subject.active == "no"}
					Finalizado
				{elseif $subject.finalDateStamp <= 0 AND $initialDateStamp < $subject.daysToFinishStamp AND $timestamp > $subject.daysToFinishStamp}
					Finalizado
					{else}
					<br />
					<a href="{$WEB_ROOT}/view-modules-student/id/{$subject.courseModuleId}" title="Ver Modulo de Curso"  style="color:#000" target="_top" >
						<i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
					</a>
			{/if}
          {/if}
        {else}
        <a href="{$WEB_ROOT}/edit-modules-course/id/{$subject.courseModuleId}" title="Ver Modulos de Curso"  style="color:#000" target="_top" >
			<i class="fa fa-sign-in fa-2x" aria-hidden="true" style='color:black'></i>
        {/if}
        </td>



    </tr>
	<tr>
		<td id="td_{$subject.courseModuleId}" colspan="10" style="display:none">

		</td>
	</tr>
{foreachelse}
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
{/foreach}
