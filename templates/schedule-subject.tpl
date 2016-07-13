<div align="center">
    <select name="subjectId" id="subjectId" onchange="load_subject()">
    <option value="0">Seleccione</option>
    {foreach from=$subjects item=item}
    <option value="{$item.subjectId}" {if $item.subjectId == $subjectId}selected{/if} >{$item.name}</option>
    {/foreach}
    </select>
    <input type="button" name="imprimir" value="imprimir" onclick="imprimir_horario()" />
</div>
{foreach from=$groups item=itm}
<br />
<div align="left">GRUPO: {$itm.clave}</div>
<br />
<div id="content">
{include file="lists/schedule-subject.tpl"}
</div>
{foreachelse}
<div align="center"><br />&nbsp;No se encontraron registros</div>
{/foreach}