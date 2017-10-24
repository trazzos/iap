<form method="post" id="frmCal" >
<input type="hidden" name="type" id="type" value="addCalificacion">
<input type="hidden" name="id" id="id" value="{$id}">
<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
   <tr>
      <th width="100" height="28">ID</th>
      <th width="80">No. Control</th>
      <th width="200">Nombre</th>
      <th width="200">Promedio</th>
      <th width="200">Calificacion Final</th>
	</tr>
</thead>
<tbody>
  {foreach from=$noTeam item=item key=key}
        <tr id="1">
        <td align="center">{$item.alumnoId}</td>
        <td align="center">{$item.controlNumber}</td>
        <td align="center">{$item.lastNamePaterno} {$item.lastNameMaterno} {$item.names}</td>
		<td align="center">
           <input type="text" readonly name="pro_{$item.alumnoId}" id="pro_{$item.alumnoId}" value="{$item.scorePromedio}" class="form-control" style="width:60px">
        </td>
        <td align="center">
           <input type="text" name="cal_{$item.alumnoId}" id="cal_{$item.alumnoId}" value="{$item.score}" class="form-control" style="width:60px">
        </td>
    </tr>
{foreachelse}
	<tr><td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td></tr>
{/foreach}

        <tr>
        <td colspan="4" align="center">

			
        </td>
    </tr>

</tbody>
</table>
</form>
<center>
<div id="loader"></div>
<div id="msjd"></div>
<button class="btn " onClick="closeModal()">Cerrar</button>
<button class="btn green" onClick="SaveCalificacion()" id="btnSave">Guardar</button>
{if $infoUser.perfil eq 'Administrador'}
<button class="btn green" style='background:#4CAF50' onClick="validarCal()" id="btnSave">Publicar</button>
{/if}
</center>