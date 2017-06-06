<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:12:03
         compiled from "C:/wamp/www/iap/templates/items/student-base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2619159302ec3488c86-14610964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06229d434a90c737a718657f45228bba6f908e8' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/student-base.tpl',
      1 => 1496329920,
    ),
  ),
  'nocache_hash' => '2619159302ec3488c86-14610964',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('students')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <tr>
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
</td>       
        <td align="center" class="id"><?php echo $_smarty_tpl->getVariable('item')->value['foto'];?>
	
		
		
	    	<script src="http://www.iapchiapasenlinea.mx/javascript/util.js" type="text/javascript"></script>      
			<script>				new FancyZoom('foto-<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
', {width:400, height:300});		</script>
			</td>       
        
		
		<td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['lastNamePaterno'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['lastNameMaterno'];?>
</td>
         <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['names'];?>
</td>
        <td align="center"><?php echo $_smarty_tpl->getVariable('item')->value['controlNumber'];?>
</td>
        <td align="left">
        <form name="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="userId" id="userId" value="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" />
        	<input type="file" name="foto" id="foto" /><br>
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
<div id="loader_<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
"> </div>
		         <?php if ($_smarty_tpl->getVariable('item')->value['activo']==1){?>
              <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/ok.png"  id="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" onclick="desactivar(<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
,<?php echo $_smarty_tpl->getVariable('item')->value['activo'];?>
);" title="Dar de Baja" />&nbsp;
          	     <?php }else{ ?>
		      <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/cancel.png"  id="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Dar de Alta" onclick="activar(<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
,<?php echo $_smarty_tpl->getVariable('item')->value['activo'];?>
);" />
				 <?php }?>
			
			<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/pencil.png" class="spanEdit" id="<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Editar" />
		   <a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/student-curricula/id/<?php echo $_smarty_tpl->getVariable('item')->value['userId'];?>
" title="Ver Curricula de Estudiante" onclick="return parent.GB_show('Ver Curricula', this.href,650,700) " style="color:#000" ><img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/16/subject.gif" title="Ver Curricula Estudiante" /></a>            
        <?php }?>
        </td>       
    </tr>
<?php }} else { ?>
	<tr>
    	<td colspan="11" align="center">No se encontr&oacute; ning&uacute;n registro.</td>
    </tr>				
<?php } ?>
