<?php /* Smarty version Smarty3-b7, created on 2017-06-05 07:36:57
         compiled from "C:/wamp/www/iap/templates/items/modules-course-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2393559355069466574-94976520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '884fa7d84c7cfe89716ff7f3ea870cf33138b273' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/modules-course-base.tpl',
      1 => 1496666213,
    ),
  ),
  'nocache_hash' => '2393559355069466574-94976520',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subjects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subject']->key => $_smarty_tpl->tpl_vars['subject']->value){
?>
    <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleId'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['clave'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('subject')->value['semesterId'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['name'];?>
</td>
        <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['initialDate'],"%d-%m-%Y");?>
</td>
        <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('subject')->value['finalDate'],"%d-%m-%Y");?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['daysToFinish'];?>
</td>
        <td align="left"><?php echo $_smarty_tpl->getVariable('subject')->value['active'];?>
</td>
        <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?>
			    <td><?php echo $_smarty_tpl->getVariable('subject')->value['totalScore'];?>
 <br/>
				<a href="#" onclick="CalificacionesAct(<?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleId'];?>
);"> Actividades</a>
                <br/>
                 <a href="#" onclick="CalificacionesExa(<?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleId'];?>
);"> Examenes</a></td>			
			<?php }?>
				
        <td align="center">
    
							<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleId'];?>
" title="Ver Modulo de Curso"  style="color:#000" target="_top" ><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i>
                            </a>
          
        <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/edit-modules-course/id/<?php echo $_smarty_tpl->getVariable('subject')->value['courseModuleId'];?>
" title="Ver Modulos de Curso"  style="color:#000" target="_top" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/arrow.png" title="Configurar Modulo" /></a>
     
        </td>
		
   
		
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="12" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
	</tr>
<?php } ?>
