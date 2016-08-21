<script type="text/javascript">
    function confirmando()
    {

        if (confirm("Estas seguro que deseas eliminar la respuesta a este Topico? "))
            return true
        else
            return false
    }
</script>

{foreach from=$replies item=item}
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i> Respuesta por:
            {if $item.positionId == NULL || $item.positionId == 0}aaa
                {if $item.names}{$item.names} {$item.lastNamePaterno} {$item.lastNameMaterno}{else}Profesor{/if}
            {else}
                {$item.name} {$item.lastname_paterno} {$item.lastname_materno}
            {/if}
            &nbsp;Fecha: {$item.replyDate|date_format:"%d-%m-%Y %H:%M"}
        </div>
        <div class="actions">
            {if $positionId == 1}

                <form id="deleteReplay" name="deleteReplay" method="post">
                    <input type="hidden" id="moduleId" name="moduleId" value="{$moduleId}">
                    <input type="hidden"  id="replyId" name="replyId" value="{$item.replyId}" />
                    <input value="Eliminar" type="submit" class="btn-70-delete"  onClick="return confirmando();" style="border:none; height:24px;" name="eliminar" id="eliminar" >
                </form>
            {/if}
            <a href="{$WEB_ROOT}/graybox.php?page=add-comment&id={$item.replyId}&moduleId={$moduleId}&topicsubId={$topicsubId}" data-target="#ajax" data-toggle="modal" class="btn btn-default btn-sm">
                Agregar Comentario
            </a>

        </div>
    </div>
    <div class="portlet-body">
            <div>{$item.content}</div>
            <div>{if $item.path}<img src="{$WEB_ROOT}/forofiles/{$item.path}" > {/if}</div>

            {foreach from=$item.replies item=reply}
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bullhorm"></i> Comentario por:
                        {if $reply.positionId == NULL || $reply.positionId == 0}aaa
                            {if $reply.names}{$item.names} {$reply.lastNamePaterno} {$reply.lastNameMaterno}{else}Profesor{/if}
                        {else}
                            {$reply.name} {$reply.lastname_paterno} {$reply.lastname_materno}
                        {/if}
                        &nbsp;Fecha: {$reply.replyDate|date_format:"%d-%m-%Y %H:%M"}
                    </div>
                    <div class="actions">
                        {if $positionId == 1}

                            <form id="deleteReplay" name="deleteReplay" method="post">
                                <input type="hidden" id="moduleId" name="moduleId" value="{$moduleId}">
                                <input type="hidden"  id="replyId" name="replyId" value="{$reply.replyId}" />
                                <input value="Eliminar" type="submit" class="btn-70-delete"  onClick="return confirmando();" style="border:none; height:24px;" name="eliminar" id="eliminar" >
                            </form>
                        {/if}
                    </div>
                </div>
                <div class="portlet-body">
                    <b>
                        <div>{$reply.content}</div>
                        <div>{if $reply.path}<img src="{$WEB_ROOT}/forofiles/{$reply.path}" > {/if}</div>
                </div>
             </div>
            {/foreach}
    </div>
</div>
{/foreach}