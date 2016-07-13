<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left-wide">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Presentaci&oacute;n de Clase {$myModule.name}  {if $vistaPrevia==0} &raquo; <a style="color:#000" href="{$WEB_ROOT}/flash/flash_{$id}.swf" target="_blank">Ver en Pantalla Completa</a> &raquo; <a href="{$WEB_ROOT}/curricula" style="color:#000">Regresar</a> {/if}
</h2>
        </div>                  
    </div>
        {include file="boxes/status_no_ajax.tpl"}
				<div style="text-align:center">                                             
				<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="1150" HEIGHT="650" id="Presentacion" ALIGN="">
<PARAM NAME=movie VALUE="{$WEB_ROOT}/flash/flash_{$id}.swf"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#333399> <EMBED src="{$WEB_ROOT}/flash/flash_{$id}.swf" quality=high bgcolor=#333399 WIDTH="1150" HEIGHT="650" NAME="Yourfilename" ALIGN="" TYPsE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED> </OBJECT>                          
				</div>
        <div>
        </div>
   </li>                                                              
 </ul>

