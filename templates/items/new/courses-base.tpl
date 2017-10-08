<input type="hidden" value="0" id="recarga" name="recarga">
{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.courseId}</td>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}-{$subject.group}</td>
        <td align="center">{$subject.modality}</td>
        <td align="center">{if $subject.initialDate != "0000-00-00"} {$subject.initialDate|date_format:"%d-%m-%Y"}{else} S/F {/if}</td>
        <td align="center">{if $subject.finalDate != "0000-00-00"}  {$subject.finalDate|date_format:"%d-%m-%Y"}  {else} S/F  {/if}   </td>
        <td align="center">{$subject.daysToFinish}</td>
        <td align="center">
            {if $docente == 1}
                {$subject.courseModuleActive}
            {else}
                {$subject.courseModule}
            {/if}
            /{$subject.modules}

            {*} Flecha verde {*}
			<br>
            {if ($docente == 1 AND $subject.courseModuleActive > 0) || !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=view-modules-course&id={$subject.courseId}" title="Ver Modulos de Curso" data-target="#ajax" data-toggle="modal" >
				<img src="{$WEB_ROOT}/images/icons/16/applications-blue.png" style="width:16px" title="Ver Modulos del Curso" />

				</a>
            {/if}

            {if !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=add-modules-course&id={$subject.courseId}" title="Agregar Modulo a Curso" data-target="#ajax" data-toggle="modal" style="color:#000" >
				<!--<img src="{$WEB_ROOT}/images/add_small.png " style="width:16px" title="Agregar Modulo a Curso" />-->
				<i class="fa fa-plus-circle" aria-hidden="true" ></i>


				</a>
            {/if} 
        </td>
        <td align="center">

            {if !$docente}
                <span style="cursor:pointer" class="spanActive" onclick="VerGrupoAdmin({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">{$subject.alumnActive}</span>             /
                <span style="cursor:pointer" class="spanInactive" onclick="VerGrupoInactivoAdmin({$subject.courseId});"  id="{$subject.courseId}">{$subject.alumnInactive}</span>
            {else}
                <span style="cursor:pointer" class="spanActive" onclick="VerGrupo({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">{$subject.alumnActive}</span>             /
                <span style="cursor:pointer" class="spanInactive" onclick="VerGrupoInactivo({$subject.courseId});"  id="{$subject.courseId}">{$subject.alumnInactive}</span>
            {/if}
			


        </td>
        <td align="center">{$subject.active}</td>
        {if !$docente}
            <td align="center">
				
				<!--
				<a href="javascript:void(0)" onClick="verAcciones({$subject.courseId})" title="VER ACCIONES">
					Ver Acciones
				</a>-->
				
				<div id="divAccion_{$subject.courseId}" >
					{*TODO este boton no funciona de cualquier manera asi que lo quite por lo pronto
					<img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" data-id="{$subject.courseId}" id="d-{$subject.courseId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
					*}

					{if $subject.majorName=="ESPECIALIDAD" || $subject.majorName=="MAESTRIA"}<!--
						<img src="{$WEB_ROOT}/images/engrane.png" onclick="generar({$subject.courseId},'{$subject.majorName}');" title="Generar Matriculas"  style="width:16px" />-->
						<i class="fa fa-cog" aria-hidden="true" onclick="generar({$subject.courseId},'{$subject.majorName}');" title="Generar Matriculas"></i>
						&nbsp;
					{/if}

					<a href="{$WEB_ROOT}/graybox.php?page=edit-course&id={$subject.courseId}" data-target="#ajax" data-toggle="modal"><!--
						<img src="{$WEB_ROOT}/images/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" style="width:16px" />-->
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>

					{*TODO creo que seria mejor abrir un modal ancho*}
					{*TODO falta la parte de generar certificado*}
					<a href="{$WEB_ROOT}/graybox.php?page=ver-sabana-course&id={$subject.courseId}" data-target="#ajax" data-toggle="modal" title="Sabana de Calificaciones">
						<!--<img src="{$WEB_ROOT}/images/cal.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}"  style="width:16px"  />
						--><i class="fa fa-clone" aria-hidden="true"></i>
					</a>

					<a href="{$WEB_ROOT}/diplomas.php?id={$subject.courseId}" target="_blank" >
						<i class="fa fa-certificate" aria-hidden="true"></i>
						<!--<img src="{$WEB_ROOT}/images/cer.jpg" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Impresion de Diplomas"  style="width:16px" />
						-->
					</a>

					<a href="{$WEB_ROOT}/reporte.php?id={$subject.courseId}" target="_blank" >
						<i class="fa fa-line-chart" aria-hidden="true"></i>
						<!--<img src="{$WEB_ROOT}/images/graf.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Reporte General" style="width:16px"  />
						-->
					</a>
				</div>
				<span style="cursor:pointer" class="spanActive" onclick="VerGrupo({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">
				<i class="fa fa-university" aria-hidden="true"></i>
				</span>  
            </td>
        {/if}
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
