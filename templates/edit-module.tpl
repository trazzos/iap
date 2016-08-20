<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left-wide" style="width:960px">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" /></a>
            <h2>Editar Módulo para {$subject.name}
            {if $docente}
            	| <a href="{$WEB_ROOT}/edit-modules-course/id/{$courseId}" style="color:#000000">Regresar</a>
            {else}
	            | <a href="{$WEB_ROOT}/subject" style="color:#000000">Regresar</a>
            {/if}
            </h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
        {include file="boxes/status_no_ajax.tpl"}                                     
        <div id="tblContent">{include file="forms/edit-module.tpl"}</div>
                         
    </div> 
   </li>                                                              
 </ul>
