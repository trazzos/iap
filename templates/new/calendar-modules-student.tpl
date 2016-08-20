<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i><b>Calificación acumulada:</b> {$totalScore}% &raquo;
        </div>
    </div>
    <input type="hidden" value="0" id="recarga" name="recarga">
    <div class="portlet-body">
        {foreach from=$actividades item=item}
            {if $timestamp > $item.initialDateTimestamp && $timestamp < $item.finalDateTimestamp}
                <div class="portlet box red">
            {/if}
            {if $timestamp > $item.finalDateTimestamp}
                    <div class="portlet box blue">
            {/if}
            {if $timestamp < $item.initialDateTimestamp}
                        <div class="portlet box green">
            {/if}


                <div class="portlet-title">
                    <!-- TODO Poner al centro el título-->
                    <div class="caption" >
                        <b>Actividad  {$item.count} - </b> {$item.resumen}
                    </div>
                </div>
                <div class="portlet-body">
                    {include file="{$DOC_ROOT}/templates/lists/new/module-calendar.tpl"}
                </div>
            </div>
        {/foreach}
    </div>
</div>

