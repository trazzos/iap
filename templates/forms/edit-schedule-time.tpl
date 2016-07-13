<form id="editSchedule_timeForm" name="editSchedule_timeForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditSchedule_time"/>
<input type="hidden" id="schtimeId" name="schtimeId" value="{$info.schtimeId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Hora Inicial:</label>
            	<table width="180" border="0">
                <tr>
                	<td>
                        <select name="hr_start" id="hr_start" style="width:50px">
                        {foreach from=$hours item=item}
                        <option value="{$item.value}" {if $info.hr_start == $item.value}selected{/if}>{$item.name}</option>
                        {/foreach}
                        </select>
                     </td>
                     <td>&nbsp; <b>:</b> &nbsp;</td>
                     <td>
                        <select name="min_start" id="min_start" style="width:50px">
                        {foreach from=$minutes item=item}
                        <option value="{$item.value}" {if $info.min_start == $item.value}selected{/if}>{$item.name}</option>
                        {/foreach}
                        </select>
                     </td>
                     <td>&nbsp;&nbsp;Hrs.</td>
                </tr>
                </table>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Hora Final:</label>
            	<table width="180" border="0">
                <tr>
                	<td>
                        <select name="hr_end" id="hr_end" style="width:50px">
                        {foreach from=$hours item=item}
                        <option value="{$item.value}" {if $info.hr_end == $item.value}selected{/if}>{$item.name}</option>
                        {/foreach}
                        </select>
                     </td>
                     <td>&nbsp; <b>:</b> &nbsp;</td>
                     <td>
                        <select name="min_end" id="min_end" style="width:50px">
                        {foreach from=$minutes item=item}
                        <option value="{$item.value}" {if $info.min_end == $item.value}selected{/if}>{$item.name}</option>
                        {/foreach}
                        </select>
                     </td>
                     <td>&nbsp;&nbsp;Hrs.</td>
                </tr>
                </table>                              
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Hora Libre:</label>           
            <input type="checkbox" name="free_time" id="free_time" value="1" style="border:0; width:30px"  {if $info.free_time}checked{/if} />
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;n:</label>
            <input type="text" name="description" id="description" value="{$info.description}" />                   
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editSchedule_time" name="editSchedule_time" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>