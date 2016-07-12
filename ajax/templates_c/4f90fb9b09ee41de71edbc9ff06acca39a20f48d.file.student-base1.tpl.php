<?php /* Smarty version Smarty3-b7, created on 2015-09-30 11:40:24
         compiled from "/home/iapchiap/public_html/templates/items/student-base1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:589133923560c107874f566-42293090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f90fb9b09ee41de71edbc9ff06acca39a20f48d' => 
    array (
      0 => '/home/iapchiap/public_html/templates/items/student-base1.tpl',
      1 => 1379525105,
    ),
  ),
  'nocache_hash' => '589133923560c107874f566-42293090',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_upper')) include '/home/iapchiap/public_html/libs/plugins/modifier.upper.php';
?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('students')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <tr>
      <!--  <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
</td>       
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['foto'];?>
	
		
		
	    	<script src="http://www.iapchiapasenlinea.mx/javascript/util.js" type="text/javascript"></script>      
			<script>				new FancyZoom('foto-<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
', {width:400, height:300});		</script>
			</td> -->      
        
		
		<td align="center"><?php echo smarty_modifier_upper($_smarty_tpl->getVariable('item')->value['lastNamePaterno']);?>
</td>
        <td align="center"><?php echo smarty_modifier_upper($_smarty_tpl->getVariable('item')->value['lastNameMaterno']);?>
</td>
         <td align="center"><?php echo smarty_modifier_upper($_smarty_tpl->getVariable('item')->value['names']);?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['controlNumber'];?>
</td>
		<td align="center"> <a href="#" onclick="DeleteStudentCurricula(<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
,<?php echo $_smarty_tpl->getVariable('courseId')->value;?>
);" title="Eliminar Alumno de esta Curricula"> <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png"></a></td>
		
        <!--<td align="center">
        <form name="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="userId" id="userId" value="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" />
        	<input type="file" name="foto" id="foto" />
        	<input type="submit" value="Cambiar Foto" />
        </form>
        </td>
        <td align="center">   
        <?php if ($_smarty_tpl->getVariable('page')->value=="course-student"){?>
					<?php if ($_smarty_tpl->getVariable('status')->value=="inactivo"){?>
                        	<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/invoices/id/<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
/course/<?php echo $_smarty_tpl->getVariable('course')->value;?>
"><img src="http://trazzos.com/sie/admin/images/edit.gif" title="Realizar Pagos" /></a>
                    <?php }else{ ?>  
          	                <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/student-actions/<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
/course/<?php echo $_smarty_tpl->getVariable('course')->value;?>
"><img src="http://trazzos.com/sie/admin/images/icons/browser.png" title="Acciones" /></a>
                    <?php }?>		        
        <?php }else{ ?>                     
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/delete.png" class="spanDelete" id="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Eliminar" />&nbsp;
          	<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Editar" />
		   <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/student-curricula/id/<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Ver Curricula de Estudiante" onclick="return parent.GB_show('Ver Curricula', this.href,650,700) " style="color:#000" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/subject.gif" title="Ver Curricula Estudiante" /></a>            
        <?php }?>
        </td>-->       
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
<?php } ?>
