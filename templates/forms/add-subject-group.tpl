<form id="addGroupForm" name="addGroupForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddGroup"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Docente:</label>
            <select name="personalId" id="personalId" style="width:350px">
             <option value="">Seleccione</option>
            {include file="{$DOC_ROOT}/templates/lists/enum-personal.tpl"}
            </select>                      
      </div>
      
      {if $tipo == "a"}      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="clave" id="clave" value="" />                      
      </div>
      {else}
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
			<select name="groupId" id="groupId">
            <option value="">Seleccione</option>
            {include file="{$DOC_ROOT}/templates/items/enum-group-origen.tpl"}
            </select>                     
      </div>
      {/if}
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Sal&oacute;n:</label>
            <select name="classroomId" id="classroomId">
             <option value="">Seleccione</option>
            {include file="{$DOC_ROOT}/templates/lists/enum-classroom.tpl"}
            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Es Materia de Recursamiento?</label>
            <select name="recursamiento" id="recursamiento">
             <option value="0">No</option>
			 <option value="1">Si</option>
            </select>
      </div>
      
      <div style="clear:both"></div>
      
      <div class="_content-settings-row" style="padding-top:10px">
            <div style="float:left"><span class="reqField">*</span> Horario:</div>
          <table width="320" cellpadding="0" cellspacing="0" border="0" align="right" style="margin-right:90px">
          <tr>
          	<td>&nbsp;</td>
            <td width="40">Lun</td>
            <td width="40">Mar</td>
            <td width="40">Mie</td>
            <td width="40">Jue</td>
            <td width="40">Vie</td>
          </tr>
          {foreach from=$scheduleTimes item=item}
          <tr>
          	<td height="25">{$item.hrStart} - {$item.hrEnd} Hrs.</td>
            {if $item.free_time}
            <td colspan="5" align="center">{$item.description}</td>
            {else}
            <td><input type="checkbox" name="sch[]" value="{$item.schtimeId}_1" /></td>
            <td><input type="checkbox" name="sch[]" value="{$item.schtimeId}_2" /></td>
            <td><input type="checkbox" name="sch[]" value="{$item.schtimeId}_3" /></td>
            <td><input type="checkbox" name="sch[]" value="{$item.schtimeId}_4" /></td>
            <td><input type="checkbox" name="sch[]" value="{$item.schtimeId}_5" /></td>
          	{/if}
          </tr>
          {/foreach}
          <tr><td colspan="6" height="10"></td></tr>
          </table>                      
      </div>
      
      <div style="clear:both; border-top:1px dotted #CCCCCC; width:630px;"></div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addGroup" name="addGroup" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>