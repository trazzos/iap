<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in">

		 	<div class="content-settings-row-register" align="center">
            <b>.:: {$item.resumen} - Fecha Inicio: {$item.initialDate|date_format:"%d-%m-%Y"} - Fecha L&iacute;mite: {$item.finalDate|date_format:"%d-%m-%Y %H:%M:%S"} 
            {if $timestamp > $item.initialDateTimestamp && $timestamp < $item.finalDateTimestamp}
	            <span style="color:#0C0">Esta actividad se encuentra disponible</span>
            {/if}
            {if $timestamp > $item.finalDateTimestamp}
	            <span style="color:#C00">El tiempo de esta actividad ha terminado</span>
            {/if}
            {if $timestamp < $item.initialDateTimestamp}
	            <span style="color:#C00">Esta actividad aun no ha iniciado</span>
            {/if}::.
            </b>
            <a href="{$WEB_ROOT}/view-description-activity/id/{$item.activityId}" onclick="return parent.GB_show('Ver Actividad', this.href,700,800)">Ver Descripci&oacute;n</a>
      </div>      
      <div class="content-settings-row-register">
            Modalidad: <b>{$item.modality}</b>
            <br />
            {if $item.requerida.activityId}
			       {if $item.activityType == "Tarea"}
	               Tarea Requerida: <b>Para realizar esta Actividad necesitas terminar la Actividad {$item.numreq}</b>
  	               {/if}
				     {if $item.activityType == "Examen"}
	               Tarea Requerida: <b>Para realizar este Examen necesitas terminar la Actividad {$item.numreq}</b>
  	               {/if}
				   
				   
			  <br />
            {/if}
            {if $timestamp > $item.initialDateTimestamp && $timestamp < $item.finalDateTimestamp && $item.available}
	            Entregable: <b>
              {if $item.activityType == "Lectura"}
              	Ninguno.
              {/if}
              {if $item.activityType == "Tarea"}
              	       {if $vistaPrevia==0}<a href="{$WEB_ROOT}/upload-homework/id/{$item.activityId}" onclick="return parent.GB_show('Subir Tarea', this.href,350,700) " style="color:#000000">Subir Tarea al Sistema de Tareas.</a>{else} Subir Tarea al Sistema de Tareas.{/if}
              {/if}
              {if $item.activityType == "Examen"}

							{if $majorModality == "Local"}
								El Docente lo presentara Localmente
							{else}
									{if $vistaPrevia==0}	<a style="cursor:pointer; color:#000" onclick="DoTest({$item.activityId})">Presentar Ex&aacute;men.</a>{else}  Presentar Ex&aacute;men.  {/if}
                	
                {/if}
              {/if}
              {if $item.activityType == "Otro"}
              	Ninguno.
              {/if}
              </b>
            {/if}
              {if $item.homework}
              <br />
              	Tarea Entregada. <a href="{$WEB_ROOT}/download.php?file=homework/{$item.homework.path}&mime={$item.homework.mime}" style="color:#000">Ver Tarea</a>
              {/if}
              {if $item.ponderation}
              <br />
              	Calificacion: <b>{$item.ponderation}</b>
                Ponderacion Real: <b>{$item.realScore}%</b>
              {/if}

              {if $item.retro}
              <br />
              	Retro: <b>{$item.retro}</b>
              {/if}
			{*}{$majorModality[$item.activityId]}{*}
      </div>
    </div>
   </li>                              
 </ul>   