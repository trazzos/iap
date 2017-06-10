<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:18
         compiled from ".\templates\top-bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:796059308eea2e8be4-36483699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d8a2fc98722f2da1afbdebf467146d2f30fad2d' => 
    array (
      0 => '.\\templates\\top-bar.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '796059308eea2e8be4-36483699',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ($_smarty_tpl->getVariable('positionId')->value==1){?>
   <?php $_smarty_tpl->assign("Color","#3e9129",null,null);?>
   
    <?php $_smarty_tpl->assign("imagen","admin",null,null);?>
   <?php }?>
   
   <?php if ($_smarty_tpl->getVariable('positionId')->value!=1&&$_smarty_tpl->getVariable('positionId')->value!=0){?>
   <?php $_smarty_tpl->assign("Color","#3e9129",null,null);?>
   
   <?php $_smarty_tpl->assign("imagen","docente",null,null);?>
   
   <?php }?>
   
   
   
  
   
   
   <?php $_smarty_tpl->assign("Color","#3e9129",null,null);?>
   <?php if ($_smarty_tpl->getVariable('positionId')->value==1||$_smarty_tpl->getVariable('positionId')->value==4){?>
<div style="background:url('<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/<?php echo $_smarty_tpl->getVariable('imagen')->value;?>
.jpg');background-repeat:repeat; width:100%; min-height:59px">
<?php }else{ ?>
<div style="background:url('<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/general.jpg');background-repeat:repeat; width:100%; min-height:59px">

<?php }?>
<div id="topbar" style="background-color:#000;">

  <a class="none" style="width:1%" href="http://www.iapchiapas.org.mx">&nbsp;</a>




  <a class="image" style=""  href="http://www.iapchiapas.org.mx"><img src="http://iapchiapas.org.mx/images/logos/logo_2.png" /></a>
  <a target="_blank" class="none" style="width:1%" href="http://www.iapchiapas.org.mx">&nbsp;</a>

  <?php if (!$_smarty_tpl->getVariable('User')->value['username']){?>


        <?php }?>
  
</div><!--topbar-->
</div> 

