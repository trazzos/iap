<?php /* Smarty version Smarty3-b7, created on 2015-10-23 13:33:08
         compiled from "/home/iapchiap/public_html//templates/forms/edit-personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1412655691562a7d64e69498-79530694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc2be821a6c4b7da34a7ca08979fad2df35ea1b5' => 
    array (
      0 => '/home/iapchiap/public_html//templates/forms/edit-personal.tpl',
      1 => 1379525020,
    ),
  ),
  'nocache_hash' => '1412655691562a7d64e69498-79530694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="addPersonalForm" name="addPersonalForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditPersonal"/>
<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['personalId'];?>
" />
<input type="hidden" name="list_roles" value="" />
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Puesto:</label>
            <select name="positionId" id="positionId" style="width:250px">
             <option value="">Seleccione</option>
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enum-position.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </select>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Nombre:</label>
            <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastname_paterno" id="lastname_paterno" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastname_paterno'];?>
" />
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>  Apellido Materno:</label>
            <input type="text" name="lastname_materno" id="lastname_materno" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastname_materno'];?>
" />
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Estado:</label>
            <select name="stateId" id="stateId" style="width:250px">
             <option value="">Seleccione</option>
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enum-state.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Sexo:</label>
            <select name="sexo" id="sexo">
             <option value="">Seleccione</option>
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/enum-sexo.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </select>
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Fecha Nacimiento:</label>
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $_smarty_tpl->getVariable('info')->value['fecha_nacimiento'];?>
" maxlength="10" />
            <div align="right">(dd-mm-AAAA)</div>
      </div>
            
      <div class="content-settings-row">
            <label for="f1">CURP:</label>
            <input type="text" name="curp" id="curp" value="<?php echo $_smarty_tpl->getVariable('info')->value['curp'];?>
" />
            <div align="right" class="lnkGral">
            	<a href="javascript:void(0)" onclick="GetCurp()">
                <img src="images/icons/overlays.png" /> Generar</a>
            </div>
      </div>
      
       <div class="content-settings-row">
            <label for="f1">RFC:</label>
            <input type="text" name="rfc" id="rfc" value="<?php echo $_smarty_tpl->getVariable('info')->value['rfc'];?>
" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Perfil:</label>
            <input type="text" name="perfil" id="perfil" value="<?php echo $_smarty_tpl->getVariable('info')->value['perfil'];?>
" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Usuario:</label>
            <input type="text" name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('info')->value['username'];?>
" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Contrase&ntilde;a:</label>
            <input type="password" name="passwd" id="passwd" value="<?php echo $_smarty_tpl->getVariable('info')->value['passwd'];?>
" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;n:</label>
            <textarea name="description" id="description" cols="50" rows="6"><?php echo $_smarty_tpl->getVariable('info')->value['description'];?>
</textarea>                   
      </div>
      
      <div class="_content-settings-row" style="border-bottom:1px dotted #CCCCCC;">
            
            <table width="92%" cellpadding="0" cellspacing="0" border="0">
            <tr><td colspan="4" height="10"></td></tr>
            <tr>
              <td width="300">Roles:</td>
              <td align="center">
              	<select class="textfield" style="width:160px" name="role_from" size="6" multiple >
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('roles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('item')->value['roleId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>        			
                <?php }} ?>
                </select>
              </td>
              <td align="center" width="20">
              	<div style="width:60px">
                <input type="button" class="button" onclick="javascript:MoveRole(document.addPersonalForm.role_from,document.addPersonalForm.role_to)" value="&gt;&gt;">
                <br />
                <input type="button" class="button" onclick="javascript:MoveRole(document.addPersonalForm.role_to,document.addPersonalForm.role_from)" value="&lt;&lt;">            
                </div>
              </td>
              <td align="center">
              <select class="textfield" style="width:160px" name="role_to" size="6" multiple >
              	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('usrRoles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <option value="<?php echo $_smarty_tpl->getVariable('item')->value['roleId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</option>        			
                <?php }} ?>
              </select>
              </td>
            </tr>
            <tr><td colspan="4" height="10"></td></tr>
            </table>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editPersonal" name="editPersonal" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>