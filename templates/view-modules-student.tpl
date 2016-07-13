<ul id="sort-box" class="sorts">
 <li>
 
    <div class="content-header">
        <div class="content-header-left-wide">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2 title="{$myModule.name}">Anuncios {$myModule.name|truncate:45:"..."} &raquo; 
			{if $vistaPrevia==0}<a href="{$WEB_ROOT}/curricula" style="color:#000">Regresar</a>{/if}</h2>
        </div>                  
    </div>
        {include file="boxes/status_no_ajax.tpl"}                                     
      	{include file="{$DOC_ROOT}/templates/lists/module-announcements.tpl"}
                         
   </li>                                                              
 </ul>

