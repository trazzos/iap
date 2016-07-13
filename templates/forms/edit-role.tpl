<form id="editRoleForm" name="editRoleForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditRole"/>
<input type="hidden" id="id" name="id" value="{$info.roleId}" />
<input type="hidden" name="list_modules" value="" />
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="clave" id="clave" value="{$info.clave}" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="{$info.name}" />                      
      </div>
            
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;:</label>
            <textarea name="description" id="description" cols="50" rows="6">{$info.description}</textarea>                   
      </div>
      
      <div class="content-settings-row" style="border-bottom:1px dotted #CCCCCC;">
            
			
            <table width="92%" cellpadding="0" cellspacing="0" border="0">
            <tr><td colspan="4" height="10"></td></tr>
            <tr>
              <td width="300">M&oacute;dulo de Acceso:</td>
              <td align="center">
              <select class="textfield" style="width:160px;height:80px;" name="module_from" size="6" multiple >
              {foreach from=$modules item=item key=key}
                  <option value="{$item.moduleId}">{$item.name}</option>        			
              {/foreach}
              </select>
              </td>
              <td align="center" width="20">
              <div style="width:60px;">
              <input type="button" width="60px"  style="width:60px;" class="button" onclick="javascript:MoveModule(document.editRoleForm.module_from,document.editRoleForm.module_to)" value="&gt;&gt;">
              <br />
              <input type="button" width="60px"  style="width:60px;" class="button" onclick="javascript:MoveModule(document.editRoleForm.module_to,document.editRoleForm.module_from)" value="&lt;&lt;">            
              </div>
              </td>
              <td align="center">
              <select class="textfield" style="width:160px;height:80px;" name="module_to" size="6" multiple >
              	{foreach from=$roleModules item=item key=key}
                	<option value="{$item.moduleId}">{$item.name}</option>        			
            	{/foreach}
              </select>
              </td>
            </tr>
            <tr><td colspan="4" height="10"></td></tr>
            </table>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editRole" name="editRole" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>


