{foreach from=$announcements item=item}
    <tr>
        <td align="center">{$item.date|date_format:"%d-%m-%Y %H:%M:%S"} </td>
        <td align="center">{$item.title}</td>
        <td align="center">{$item.description}</td>
        <td align="center">
            <a href="{$WEB_ROOT}/homepage/id/{$item.announcementId}" onclick="return confirm('&iquest;Desea eliminar la noticia?')">
            <img src="{$WEB_ROOT}/images/icons/16/delete.png" class="spanDeleteNoticia" data-id="{$subject.announcementId}" id="d-{$subject.announcementId}" name="d-{$subject.name}" title="Eliminar" />
            </a>
        </td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>
{/foreach}
