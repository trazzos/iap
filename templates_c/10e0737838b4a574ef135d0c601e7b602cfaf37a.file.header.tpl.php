<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:18
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1572959308eea555df8-69006480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '1572959308eea555df8-69006480',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="header">
      <div id="user-info" align="center">
          <p><b>.:: Sistema Educación en Línea - IAP ::.</b></p>            	
      </div>
      
      <div class="wlcRight"><?php if ($_smarty_tpl->getVariable('User')->value['username']){?><b>Bienvenido <?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
 :: <?php }?><?php echo $_smarty_tpl->getVariable('fechaHoy')->value;?>
</b> | 
      <span class="lnkSalir">
      <?php if ($_smarty_tpl->getVariable('User')->value['username']){?>
				<?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==0){?>
						<a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/logout" class="lnkSalir">
						<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/logout.png" /> Salir
						</a>
				<?php }else{ ?>
						<img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/logout.png" /> Vista Previa
				<?php }?>
	  
	  
      <?php }?></span>
      </div> 
                  
      
      <div id="toggle-box-1" style="display:block">
        <?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==0){?> <?php $_template = new Smarty_Internal_Template("menus/main.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		<?php }else{ ?>
		<div id="hiddenmenu" align="center">
		 <br/>
		 <br/>
		<h1 style="font-family: sans-serif;color:#088A08; font-size: 300%; font-style: normal; ">VISTA PREVIA DEL MODULO</h1>
		</div>
		<?php }?>
		
      </div>
      
      <div style="clear:both"></div>
	  
	      <?php $_template = new Smarty_Internal_Template("menus/submenu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

		  </div>