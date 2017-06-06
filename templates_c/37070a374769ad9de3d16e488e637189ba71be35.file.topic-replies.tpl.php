<?php /* Smarty version Smarty3-b7, created on 2017-06-05 20:04:30
         compiled from "C:/wamp/www/iap/templates/lists/new/topic-replies.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259195935ff9ec9a018-43644238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37070a374769ad9de3d16e488e637189ba71be35' => 
    array (
      0 => 'C:/wamp/www/iap/templates/lists/new/topic-replies.tpl',
      1 => 1496711068,
    ),
  ),
  'nocache_hash' => '259195935ff9ec9a018-43644238',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\iap\libs\plugins\modifier.date_format.php';
?><script type="text/javascript">
    function confirmando()
    {

        if (confirm("Estas seguro que deseas eliminar la respuesta a este Topico? "))
            return true
        else
            return false
    }
</script>


	<div class="portlet-title">
		<div class="caption"><i class="icon-reorder"></i></div>
		<div class="tools">
			
		</div>
	</div>
	<div class="portlet-body">
		<div class="accordion" id="accordion1">
				Aportaciones:
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('replies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<div class="accordion-group">
						<div class="accordion-heading" >
							
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $_smarty_tpl->getVariable('key')->value+1;?>
" style="color:#73b760">
							<i class="icon-angle-left"></i>
									<i class="fa fa-bullhorm"></i> 
									> 
									<?php if ($_smarty_tpl->getVariable('item')->value['positionId']==NULL||$_smarty_tpl->getVariable('item')->value['positionId']==0){?>
										<?php if ($_smarty_tpl->getVariable('item')->value['names']){?><?php echo $_smarty_tpl->getVariable('item')->value['names'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastNameMaterno'];?>
<?php }else{ ?><?php }?>
									<?php }else{ ?>
										<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['lastname_materno'];?>

									<?php }?>
									&nbsp;Fecha: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['replyDate'],"%d-%m-%Y %H:%M");?>

									<?php if ($_smarty_tpl->getVariable('positionId')->value==1){?>

										<form id="deleteReplay" name="deleteReplay" method="post">
											<input type="hidden" id="moduleId" name="moduleId" value="<?php echo $_smarty_tpl->getVariable('moduleId')->value;?>
">
											<input type="hidden"  id="replyId" name="replyId" value="<?php echo $_smarty_tpl->getVariable('item')->value['replyId'];?>
" />
											<input value="Eliminar" type="submit" class="btn-70-delete"  onClick="return confirmando();" style="border:none; height:24px;" name="eliminar" id="eliminar" >
										</form>
									<?php }?>
							</a>
						</div>
					
					<div id="collapse_<?php echo $_smarty_tpl->getVariable('key')->value+1;?>
" class="accordion-body collapse">
						<div class="accordion-inner">
							<br>
							<br>
													
							<table width="100%" class="tblGral table table-bordered table-striped table-condensed flip-content">
								<thead>
								<tr>
									<td>Aportación</td>
									<td>Archivo Adjunto</td>
									<td></td>
								</tr>
								<tr>
									<td><?php echo $_smarty_tpl->getVariable('item')->value['content'];?>
</td>
									<td>
										<?php if ($_smarty_tpl->getVariable('item')->value['existeArchivo']=="si"){?>
											<?php if ($_smarty_tpl->getVariable('item')->value['path']){?>
												<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forofiles/<?php echo $_smarty_tpl->getVariable('item')->value['path'];?>
" target="_black" title="VER ARCHIVO ADJUNTO"> 
													<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/file.png" style="max-width: 40px;height: auto;" title="VER ARCHIVO ADJUNTO"> 
												</a>
												<br>
											<?php }?>
										<?php }?>
									</td>
									<td>
										<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/graybox.php?page=add-comment&id=<?php echo $_smarty_tpl->getVariable('item')->value['replyId'];?>
&moduleId=<?php echo $_smarty_tpl->getVariable('moduleId')->value;?>
&topicsubId=<?php echo $_smarty_tpl->getVariable('topicsubId')->value;?>
" data-target="#ajax" data-toggle="modal" class="btn green">
											Agregar Comentario
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<b>Autor / Fecha Publicación</b>
									</td>
									<td>
										<b>Mensaje</b>
									</td>
									<td>
										<b>Archivo Adjunto</b>
									</td>
								</tr>
								</thead>
							<?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['replies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value){
?>
								<tr>
									<td>
										<i class="fa fa-bullhorm"></i>
										<b>
										<font style="text-transform: uppercase; font-size:12px; color:gray" >
										<?php if ($_smarty_tpl->getVariable('reply')->value['positionId']==NULL||$_smarty_tpl->getVariable('reply')->value['positionId']==0){?>
											<?php if ($_smarty_tpl->getVariable('reply')->value['names']){?><?php echo $_smarty_tpl->getVariable('reply')->value['names'];?>
  <?php echo $_smarty_tpl->getVariable('reply')->value['lastNamePaterno'];?>
 <?php echo $_smarty_tpl->getVariable('reply')->value['lastNameMaterno'];?>
<?php }else{ ?><?php }?>
										<?php }else{ ?>
											<?php echo $_smarty_tpl->getVariable('reply')->value['names'];?>
 <?php echo $_smarty_tpl->getVariable('reply')->value['lastname_paterno'];?>
 <?php echo $_smarty_tpl->getVariable('reply')->value['lastname_materno'];?>

										<?php }?>
										</font>
										</b>
										<br><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('reply')->value['replyDate'],"%d-%m-%Y %H:%M");?>

										<?php if ($_smarty_tpl->getVariable('positionId')->value==1){?>

											<form id="deleteReplay" name="deleteReplay" method="post">
												<input type="hidden" id="moduleId" name="moduleId" value="<?php echo $_smarty_tpl->getVariable('moduleId')->value;?>
">
												<input type="hidden"  id="replyId" name="replyId" value="<?php echo $_smarty_tpl->getVariable('reply')->value['replyId'];?>
" />
												<input value="Eliminar" type="submit" class="btn-70-delete"  onClick="return confirmando();" style="border:none; height:24px;" name="eliminar" id="eliminar" >
											</form>
										<?php }?>
									</td>
									<td>
										<div><?php echo $_smarty_tpl->getVariable('reply')->value['content'];?>
</div>
									</td>
									<td>
										<div>
										<?php if ($_smarty_tpl->getVariable('reply')->value['existeArchivo']=="si"){?>
											<?php if ($_smarty_tpl->getVariable('reply')->value['path']){?>
											
											<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forofiles/<?php echo $_smarty_tpl->getVariable('reply')->value['path'];?>
" target="_black" title="VER ARCHIVO ADJUNTO">
												<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/file.png" style="max-width: 40px;height: auto;" title="VER ARCHIVO ADJUNTO"> 
											</a>
											<?php }?>
										<?php }?>
										
										</div>
									</td>
								</tr>
						<!--	<div class="portlet box grey-steel">
								<div class="portlet-title">
									<div class="caption">
										
									</div>
									<div class="actions">
										
									</div>
								</div>
								<div class="portlet-body">
									<b>
										
								</div>
							 </div>-->
							<?php }} ?>
							</table>
						</div>
					</div>
					</div>
				<?php }} ?>
			

		</div>
	</div>


