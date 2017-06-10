<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Topico {$topic.nombre}
        </div>
        <div class="actions">
            <a href="{$WEB_ROOT}/forumsub-modules-student/id/{$id}/topicId/{$topic.topicId}" class="btn btn-default btn-sm">Regresar</a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent" class="content-in">
            {include file="boxes/status_no_ajax.tpl"}
            {include file="{$DOC_ROOT}/templates/lists/new/topic-replies.tpl"}

            {include file="{$DOC_ROOT}/templates/forms/new/add-reply.tpl"}
        </div>
    </div>
</div>
<input type="hidden" id="viewPage" name="viewPage" value="{$arrPage.currentPage}" />


