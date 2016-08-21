{if $actividad.modality == "Individual"}
	<div id="tblContent">{include file="{$DOC_ROOT}/templates/lists/score.tpl"}</div>
{else}
	<div id="tblContent">{include file="{$DOC_ROOT}/templates/lists/score-team.tpl"}</div>
{/if}
