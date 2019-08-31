<input type="hidden" value="0" id="recarga" name="recarga">
{foreach from=$subjects item=subject}
    <tr>
        <td align="center" class="id">{$subject.courseId}</td>
        <td align="center">{$subject.clave}</td>
        <td align="center">{$subject.majorName}</td>
        <td align="center">{$subject.name}</td>
		 <td align="center">{$subject.group}</td>
        <td align="center">{if $subject.modality eq 'Local'}Presencial{else}{$subject.modality}{/if}</td>
        <td align="center">{if $subject.initialDate != "0000-00-00"} {$subject.initialDate|date_format:"%d-%m-%Y"}{else} S/F {/if}</td>
        <td align="center">{if $subject.finalDate != "0000-00-00"}  {$subject.finalDate|date_format:"%d-%m-%Y"}  {else} S/F  {/if}   </td>
        <!--<td align="center">{$subject.daysToFinish}</td>-->
        <td align="center">
            {if $docente == 1}
                {if !$docente} {$subject.courseModuleActive} {/if}
            {else}
               {if !$docente}  {$subject.courseModule} {/if}
            {/if}
             {if !$docente}  /{$subject.modules} {/if}

            {*} Flecha verde {*}
			<br>
            {if ($docente == 1 AND $subject.courseModuleActive > 0) || !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=view-modules-course&id={$subject.courseId}" title="Ver Modulos de Curso" data-target="#ajax" data-toggle="modal" >
					<i class="fas fa-eye"></i>
				</a>
            {/if}

            {if !$docente}
                <a href="{$WEB_ROOT}/graybox.php?page=add-modules-course&id={$subject.courseId}" title="Agregar Modulo a Curso" data-target="#ajax" data-toggle="modal">
					<i class="fas fa-plus-circle" aria-hidden="true" ></i>
				</a>
            {/if} 
        </td>
        <td align="center">
            {if !$docente}
                <span style="cursor:pointer; text-decoration: underline" class="spanActive" onclick="VerGrupoAdmin({$subject.courseId});" title="Alumnos" id="{$subject.courseId}">{$subject.alumnActive}</span>             /
                <span style="cursor:pointer; text-decoration: underline" class="spanInactive" onclick="VerGrupoInactivoAdmin({$subject.courseId});"  id="{$subject.courseId}">{$subject.alumnInactive}</span>
            {else}
				{$subject.alumnActive}<!--</span>-->             /
            {/if}
        </td>
        <td align="center">{$subject.active}</td>
        {if !$docente}
            <td align="center">
				<div class="btn-group">
					<a class="btn btn-primary" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-list-alt"></i>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu" style="left: -146px">
					<li>
						{if $subject.majorName=="ESPECIALIDAD" || $subject.majorName=="MAESTRIA"}
							<a style="cursor:pointer" class="spanActive" onclick="VerGrupo({$subject.courseId},'matricula');" title="Usuarios" id="{$subject.courseId}">
							<i class="material-icons md-16">settings</i>
							Usuarios
							</a>  
							&nbsp;
						{/if}
						
					</li>
					<li>
						<a href="{$WEB_ROOT}/graybox.php?page=edit-course&id={$subject.courseId}" data-target="#ajax" data-toggle="modal"><!--
							<img src="{$WEB_ROOT}/images/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" style="width:16px" />-->
							<i class="material-icons md-16">create</i>
							Editar
						</a>
					</li>
					</ul>
				</div> 	
				<div id="divAccion_{$subject.courseId}" >
					{*TODO este boton no funciona de cualquier manera asi que lo quite por lo pronto
					<img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDelete" data-id="{$subject.courseId}" id="d-{$subject.courseId}" name="d-{$subject.name}" title="Eliminar" />&nbsp;
					*}
					{*TODO creo que seria mejor abrir un modal ancho*}
					{*TODO falta la parte de generar certificado*}
				</div>	
            </td>
        {/if}
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
