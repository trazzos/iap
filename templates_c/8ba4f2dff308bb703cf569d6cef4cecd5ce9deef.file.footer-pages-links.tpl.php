<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:57
         compiled from ".\templates\footer-pages-links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7763592dd8d9989300-34828009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ba4f2dff308bb703cf569d6cef4cecd5ce9deef' => 
    array (
      0 => '.\\templates\\footer-pages-links.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '7763592dd8d9989300-34828009',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_count_characters')) include 'C:\wamp\www\iap\libs\plugins\modifier.count_characters.php';
?>














<div id="footerPagesLinks">
    <div style="text-align:left; float:left">
        Mostrando regs. <?php echo $_smarty_tpl->getVariable('arrPage')->value['rowBegin'];?>
 al <?php echo $_smarty_tpl->getVariable('arrPage')->value['rowEnd'];?>
 de <?php echo $_smarty_tpl->getVariable('arrPage')->value['totalTableRows'];?>
 - <a href="<?php echo $_smarty_tpl->getVariable('arrPage')->value['refreshPage'];?>
" title="Refrescar Datos">Refrescar Datos</a>
    </div>
    <div style="text-align:right; float:right">
		<?php if (smarty_modifier_count_characters($_smarty_tpl->getVariable('arrPage')->value['startPage'])>0){?>
			<a href="<?php echo $_smarty_tpl->getVariable('arrPage')->value['startPage'];?>
" title="Pagina inicio">Inicio</a> |
		<?php }else{ ?>
			Inicio |
		<?php }?>
		<?php if (smarty_modifier_count_characters($_smarty_tpl->getVariable('arrPage')->value['previusPage'])>0){?>
			<a href="<?php echo $_smarty_tpl->getVariable('arrPage')->value['previusPage'];?>
" titulo="Pagina anterior">Anterior</a> |
		<?php }else{ ?>
			Anterior |
		<?php }?>
		pagina <?php echo $_smarty_tpl->getVariable('arrPage')->value['currentPage'];?>
 de <?php echo $_smarty_tpl->getVariable('arrPage')->value['totalPages'];?>
 |
		<?php if (smarty_modifier_count_characters($_smarty_tpl->getVariable('arrPage')->value['nextPage'])>0){?>
			<a href="<?php echo $_smarty_tpl->getVariable('arrPage')->value['nextPage'];?>
" title="Pagina siguiente">Siguiente</a> |
		<?php }else{ ?>
			Siguiente |
		<?php }?>
		<?php if (smarty_modifier_count_characters($_smarty_tpl->getVariable('arrPage')->value['endPage'])>0){?>
			<a href="<?php echo $_smarty_tpl->getVariable('arrPage')->value['endPage'];?>
" titulo="Pagina final">Final</a>
		<?php }else{ ?>
			Final
		<?php }?>
    </div>
    <div style="clear:both"></div>
</div>