<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left-wide">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Calificaci&oacute;n a la Fecha: {$totalScore}%</h2>
        </div>                  
    </div>
   </li>                                                              
 </ul>
  <input type="hidden" value="0" id="recarga" name="recarga">
{foreach from=$actividades item=item}
<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left-wide">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2>Examen {$item.count}</h2>
        </div>                  
    </div>
      	{include file="{$DOC_ROOT}/templates/lists/module-calendar.tpl"}
   </li>                                                              
 </ul>
{/foreach}
