
{if $positionId==1}
   {assign var="Color" value="#3e9129"}
   {*}  <img src="{$WEB_ROOT}/images/admin.jpg" width="100%"> {*}
    {assign var="imagen" value="admin"}
   {/if}

   {if $positionId!=1 && $positionId!=0}
   {assign var="Color" value="#3e9129"}
   {*}<img src="{$WEB_ROOT}/images/docente.jpg" width="100%"> {*}
   {assign var="imagen" value="docente"}

   {/if}



  {*}#3e9129{*}


   {assign var="Color" value="#3e9129"}
   {if $positionId==1 ||  $positionId==4}
<div style="background:url('{$WEB_ROOT}/images/{$imagen}.jpg');background-repeat:repeat; width:100%; min-height:59px">
{else}
<div style="background:url('{$WEB_ROOT}/images/general.jpg');background-repeat:repeat; width:100%; min-height:59px">

{/if}
<div id="topbar" style="background-color:#000;">

  <a class="none" style="width:1%" href="{$WEB_ROOT}x">&nbsp;</a>
  <a class="image" style=""  href="{$WEB_ROOT}><img src="{$WEB_ROOT}/images/logos/logo_2.png" /></a>
  <a target="_blank" class="none" style="width:1%" href="{$WEB_ROOT}">&nbsp;</a>

</div><!--topbar-->
</div>

