<?php /* Smarty version Smarty3-b7, created on 2015-11-05 13:35:33
         compiled from "/home/iapchiap/public_html//templates/forms/add-personal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:415843950563baf85150461-51882892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18aac3a0728bba712bf6002be034018176c461f4' => 
    array (
      0 => '/home/iapchiap/public_html//templates/forms/add-personal.tpl',
      1 => 1379525007,
    ),
  ),
  'nocache_hash' => '415843950563baf85150461-51882892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="addPersonalForm" name="addPersonalForm" method="post">
<input type="hidden" id="type" name="type" value="saveAddPersonal"/>
<input type="hidden" id="list_roles" name="list_roles" value="" />
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
            <input type="text" name="name" id="name" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
            <input type="text" name="lastname_paterno" id="lastname_paterno" value="" />                      
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span>  Apellido Materno:</label>
            <input type="text" name="lastname_materno" id="lastname_materno" value="" />                      
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
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="" maxlength="10" />
            <div align="right">(dd-mm-AAAA)</div>
      </div>
      
      <div class="content-settings-row">
            <label for="f1">CURP:</label>
            <input type="text" name="curp" id="curp" value="" />
            <div align="right" class="lnkGral">
            <a href="javascript:void(0)" onclick="GetCurp()">
                <img src="images/icons/overlays.png" /> Generar</a>
            </div>
      </div>
      
       <div class="content-settings-row">
            <label for="f1">RFC:</label>
            <input type="text" name="rfc" id="rfc" value="" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Perfil:</label>
            <input type="text" name="perfil" id="perfil" value="" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Usuario:</label>
            <input type="text" name="username" id="username" value="" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Contrase&ntilde;a:</label>
            <input type="password" name="passwd" id="passwd" value="" />                                 
      </div>
      
      <div class="content-settings-row">
            <label for="f1">Descripci&oacute;n:</label>
            <textarea name="description" id="description" cols="50" rows="6"></textarea>                   
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
              <select class="textfield" style="width:160px" name="role_to" size="6" multiple ></select>
              </td>
            </tr>
            <tr><td colspan="4" height="10"></td></tr>
            </table>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="addPersonal" name="addPersonal" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>