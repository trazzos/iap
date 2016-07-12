<?php /* Smarty version Smarty3-b7, created on 2016-01-12 11:35:56
         compiled from "/home/iapchiap/public_html//templates/forms/add-role.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20249116675695397c1b3438-97772790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c557e2594fc1e9e32d1785b81745a88872d3d7c' => 
    array (
      0 => '/home/iapchiap/public_html//templates/forms/add-role.tpl',
      1 => 1379525009,
    ),
  ),
  'nocache_hash' => '20249116675695397c1b3438-97772790',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="addRoleForm" name="addRoleForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddRole"/>
<input type="hidden" name="list_modules" value="" />
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="clave" id="clave" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="" />                      
      </div>
            
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;n:</label>
            <textarea name="description" id="description" cols="50" rows="6"></textarea>                   
      </div>
      
      <div class="_content-settings-row" style="border-bottom:1px dotted #CCCCCC;">
            
            <table width="92%" cellpadding="0" cellspacing="0" border="0">
            <tr><td colspan="4" height="10"></td></tr>
            <tr>
              <td width="300">M&oacute;dulo de Acceso:</td>
              <td align="center">
              <select class="textfield" style="width:160px" name="module_from" size="6" multiple >
              <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                  <option value="<?php echo $_smarty_tpl->getVariable('item')->value['moduleId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>        			
              <?php }} ?>
              </select>
              </td>
              <td align="center" width="20">
              <div style="width:60px;">
              <input type="button" class="button" onclick="javascript:MoveModule(document.addRoleForm.module_from,document.addRoleForm.module_to)" value="&gt;&gt;">
              <br />
              <input type="button" class="button" onclick="javascript:MoveModule(document.addRoleForm.module_to,document.addRoleForm.module_from)" value="&lt;&lt;">            
              </div>
              </td>
              <td align="center">
              <select class="textfield" style="width:160px" name="module_to" size="6" multiple ></select>
              </td>
            </tr>
            <tr><td colspan="4" height="10"></td></tr>
            </table>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addRole" name="addRole" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>