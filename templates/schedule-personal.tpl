<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="{$WEB_ROOT}/images/new/docentes.png" alt="" />
            <h2>Horario</h2>
        </div>                  
    </div>
    <div class="content-in" id="tab">
                                             
        <div align="center">
        	{if $User.positionId == 4}
            <input type="hidden" id="personalId" name="personalId" value="{$personalId}" />
            {else}
            <select name="personalId" id="personalId" onchange="load_personal()" class="frmSelect" style="width:250px">
            <option value="0">Seleccione</option>
            {foreach from=$personals item=item}
            <option value="{$item.personalId}" {if $item.personalId == $personalId}selected{/if} >{$item.name}</option>
            {/foreach}
            </select>
            <br />
            {/if}
            <input type="button" name="imprimir" value="Imprimir" onclick="imprimir_horario()" class="btnSearch" />
        </div>
        <br />
         <div style="font-size:16px" align="center"><b>{$name}</b></div>
        <br />
        <div id="tblContent">{include file="lists/schedule-personal.tpl"}</div>
                         
       <br />              
            
    </div> 
   </li>                                                              
 </ul> 