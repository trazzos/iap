{foreach from=$announcements item=item}
    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i><b>{$item.title} - Fecha: {$item.date|date_format:"%d-%m-%Y %H:%M:%S"}</b>
            </div>
            <div class="actions">
                {if $User.positionId == "1"}
                    <a class="btn {$BUTTON_COLOR}" href="{$WEB_ROOT}/homepage/id/{$item.announcementId}" onclick="return confirm('&iquest;Desea eliminar la noticia?')"> Eliminar Noticia </a>
                {/if}
            </div>
        </div>
        <div class="portlet-body">
            {$item.description}
        </div>
    </div>
{/foreach}
