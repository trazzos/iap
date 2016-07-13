    <table width="100%" class="tblGral">
    <thead>
        {include file="{$DOC_ROOT}/templates/items/school-type-header.tpl"}
    </thead>
    <tbody>
        {include file="{$DOC_ROOT}/templates/items/school-type-base.tpl"}
    </tbody>
    </table>
	{if count($resSchoolType.pages)}
	{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$resSchoolType.pages}
	{/if}
