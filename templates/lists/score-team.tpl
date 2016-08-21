<form method="post"  action="{$WEB_ROOT}/score-activity/id/{$id}">
<input type="hidden" name="modality" id="modality" value="Por Equipo" />

<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
<thead>      
   {include file="{$DOC_ROOT}/templates/items/score-team-header.tpl"}
</thead>
<tbody>
   {include file="{$DOC_ROOT}/templates/items/score-team-base.tpl"}
</tbody>
</table>
</form>