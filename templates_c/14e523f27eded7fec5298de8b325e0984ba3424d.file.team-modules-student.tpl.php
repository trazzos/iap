<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:48
         compiled from "C:/wamp/www/iap/templates/new/team-modules-student.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54745930c1e49851b4-01646225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14e523f27eded7fec5298de8b325e0984ba3424d' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/team-modules-student.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '54745930c1e49851b4-01646225',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include 'C:\wamp\www\iap\libs\plugins\modifier.truncate.php';
?><div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Equipo <?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('myModule')->value['name'],45,"...");?>

        </div>

    </div>
    <div class="portlet-body">


<form class="form-horizontal" id="addPersonalForm" name="addPersonalForm" method="post">
    <input type="hidden" id="type" name="type" value="saveAddPersonal"/>
    <input type="hidden" id="list_roles" name="list_roles" value="" />

    <div class="form-body">

        <table width="92%" cellpadding="0" cellspacing="5" border="0" class="tblGral table table-bordered table-striped table-condensed flip-content">

            <tr>
                <td width="180">Enviar Correo:</td>
                <td align="center">
                    <select class="textfield" style="width:250px" name="role_from" id="role_from" size="6" multiple >
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myTeam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                            <option value="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
"><?php echo $_smarty_tpl->getVariable('item')->value['names'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastNameMaterno'];?>
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
                    <select class="textfield" style="width:250px" name="role_to" id="role_to" size="6" multiple >
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
            <tr>
                <td width="180">Asunto:</td>
                <td colspan="3" height="10" align="center">
                    <input type="text" name="subject" id="subject" size="50" />
                </td></tr>
            <tr>
                <td width="180">Descripci&oacute;n:</td>
                <td colspan="4" height="10" align="center">
                    <textarea name="body" id="body" cols="50" rows="6"></textarea>
                </td></tr>
            <tr>
                <td width="180">Archivo:</td>
                <td colspan="4" height="10" align="center">
                    <input type="file" name="file" id="file" size="50" class="btn btn-circle default" />
                </td></tr>

    </div>
            <tr>

                <td colspan="4" height="10" align="center">

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green submitForm" onclick="SubmitForm()">Enviar Correo</button>

                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        </table>




</form>

    </div>
</div>