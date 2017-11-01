<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>
<tr>
    <th width="300"></th>
    <th width="500"></th>
    <th width="50"></th>
    <th width="60"></th>
</tr>
</thead>
<tbody>
{foreach from=$resources item=subject}
    <tr>
        <td align="center">{$subject.name}</td>
        <td align="center">{$subject.description}</td>
        <td align="center"><a href="{$WEB_ROOT}/download.php?file=resources/{$subject.path}"><i class="fa fa-download"></i></a></td>
        <td align="center">
            {if $page != "resources-modules-student"}
			<a href="javascript:void(0)" onClick="DeleteResource({$subject.resourceId})" title="ELIMINAR">
                <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDeleteResource" id="d-{$subject.resourceId}" name="d-{$subject.name}" title="Eliminar" />
			</a>	
				&nbsp;<!--
                <a style="color:#000000" href="{$WEB_ROOT}/edit-resource/id/{$subject.resourceId}" onclick="return parent.GB_show('Editar Recurso de Apoyo', this.href,650,700) ">-->
				<a href="{$WEB_ROOT}/graybox.php?page=edit-resource&id={$subject.resourceId}&auxTpl=admin&cId={$myModule.courseModuleId}" data-target="#ajax" data-toggle="modal">
				<img src="{$WEB_ROOT}/images/icons/16/pencil.png" class="spanEdit" id="d-{$subject.subjectId}" name="d-{$subject.name}" title="Editar" /></a>
            {/if}
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="4" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
   </tbody>
</table>