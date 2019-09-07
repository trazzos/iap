{foreach from=$students item=item key=key}
        <tr>
        <td align="center" class="id">{$item.userId}</td>
        <td align="center" class="id">{$item.foto}
			</td>
        
		
		<td align="center">{$item.lastNamePaterno|upper}</td>
        <td align="center">{$item.lastNameMaterno|upper}</td>
         <td align="center">{$item.names|upper}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="left">
        <form name="{$item.userId}" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="userId" id="userId" value="{$item.userId}" />
        	<input type="file" name="foto" id="foto" /><br>
        	<input type="submit" value="Cambiar Foto" />
        </form>
        </td>
        <td align="center">   
        {if $page == "course-student"}
		
					{if $status == "inactivo"}
                        	<a href="{$WEB_ROOT}/invoices/id/{$item.userId}/course/{$course}"><img src="http://trazzos.com/sie/admin/images/edit.gif" title="Realizar Pagos" /></a>
                    {else}  
          	                <a href="{$WEB_ROOT}/student-actions/{$item.userId}/course/{$course}"><img src="http://trazzos.com/sie/admin/images/icons/browser.png" title="Acciones" /></a>
                    {/if}		        
        {else} 
<div id="loader_{$item.userId}"> </div>
		         {if $item.activo ==1}
					 <i class="fa fa-toggle-on" aria-hidden="true"  onclick="desactivar({$item.userId},{$item.activo});" title="Dar de baja"></i>
          	     {else}
					 <i class="fa fa-toggle-off icon-blue" aria-hidden="true"  onclick="activar({$item.userId},{$item.activo});" title="Dar de alta"></i>
				 {/if}
			<a href="{$WEB_ROOT}/graybox.php?page=edit-student&id={$item.userId}&auxImagen=1" data-target="#ajax" data-toggle="modal" data-width="1000px">
				<i class="fa fa-pencil spanEdit" aria-hidden="true"  id="{$item.userId}" title="Editar"></i>
			</a>
			<a href="{$WEB_ROOT}/graybox.php?page=student-curricula&id={$item.userId}&auxTpl=1" data-target="#ajax" data-toggle="modal" data-width="1000px">
				<i class="fa fa-book spanEdit" aria-hidden="true"  id="{$item.userId}" title="Ver Curricula Estudiante"></i>
			</a>

			<a href="#" onclick="reloadCedulaInscripcion({$item.userId},{$item.courseId});">
				<i class="fa fa-file-alt spanEdit" aria-hidden="true"  id="{$item.userId}" title="Ficha de Registro"></i>
			</a>
		{/if}
        </td>       
    </tr>
{foreachelse}
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
{/foreach}
