<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:18
         compiled from ".\templates\menus/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1826259308eea71eee2-29081711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '765bdd323e3a409166c21b0091b851c4456d67f0' => 
    array (
      0 => '.\\templates\\menus/main.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '1826259308eea71eee2-29081711',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="hiddenmenu" align="center">
         
      <div class="icon-no-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('page')->value=="homepage"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
" title="Inicio">
             <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/home.png" />Inicio</a>
          </p>
      </div>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[32]==1||$_smarty_tpl->getVariable('AccessMod')->value[33]==1){?>

      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cursos"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/alumn-services" title="Cursos">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/user.png" />Mis Datos</a>
          </p>
      </div>
      
      
      <?php }?>

      <?php if ($_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[1]==1||$_smarty_tpl->getVariable('AccessMod')->value[2]==1||$_smarty_tpl->getVariable('AccessMod')->value[3]==1||$_smarty_tpl->getVariable('AccessMod')->value[4]==1||$_smarty_tpl->getVariable('AccessMod')->value[5]==1||$_smarty_tpl->getVariable('AccessMod')->value[6]==1||$_smarty_tpl->getVariable('AccessMod')->value[7]==1||$_smarty_tpl->getVariable('AccessMod')->value[9]==1||$_smarty_tpl->getVariable('AccessMod')->value[10]==1){?>
      
         <?php $_smarty_tpl->assign("iniPage",'',null,null);?>
         
         <?php if ($_smarty_tpl->getVariable('AccessMod')->value[1]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","major",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[3]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","personal",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[4]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","student",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[5]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","position",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[9]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","role",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[35]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","profesion",null,null);?>     
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[36]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","recording",null,null);?>      
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[17]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?> 
                <?php $_smarty_tpl->assign("iniPage","classroom",null,null);?>     
          <?php }elseif($_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","cancel-code",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","school-type",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[19]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","kardex-calificacion",null,null);?>
          <?php }?>     
     
      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="catalogos"){?>id="active-icon"<?php }?>
		  href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/<?php echo $_smarty_tpl->getVariable('iniPage')->value;?>
" 
		   
		  
		  
		  
		  title="Cat&aacute;logos">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/catalogos.png" />Cat&aacute;logos</a>
          </p>
      </div>
      <?php }?>
      
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[34]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cobranza"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/invoices" title="Pagos">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/money.png" />Cobranza</a>
          </p>
      </div>
      <?php }?>
      
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[11]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[31]==1||$_smarty_tpl->getVariable('AccessMod')->value[8]==1){?>
      <div class="icon-spacer">
          <p>
          <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
          <a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cursos"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/subject" title="Cursos">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/wordprocessing.png" />Curricula</a>
          <?php }else{ ?>
          <a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cursos"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/history-subject" title="Cursos">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/wordprocessing.png" />Curricula</a>
          <?php }?>  
          </p>
      </div>
      <?php }?>
      
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[21]==1||$_smarty_tpl->getVariable('AccessMod')->value[25]==1||$_smarty_tpl->getVariable('AccessMod')->value[26]==1||$_smarty_tpl->getVariable('AccessMod')->value[27]==1||$_smarty_tpl->getVariable('AccessMod')->value[29]==1||$_smarty_tpl->getVariable('AccessMod')->value[30]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      
          <?php $_smarty_tpl->assign("iniPage",'',null,null);?>
          
          <?php if ($_smarty_tpl->getVariable('AccessMod')->value[21]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-redi",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[25]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-cancel",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[26]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-regular",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[27]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-desercion",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[29]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-calificacion",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[30]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","study-constancy",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('User')->value['positionId']==1){?>
                <?php $_smarty_tpl->assign("iniPage","report-excel",null,null);?>
          <?php }?>
      
      
      <?php }?>
      
      
      
      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="tv"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tv" title="Tv">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/tv.png" />&nbsp;&nbsp;Tv&nbsp;&nbsp;</a>
          </p>
      </div>
      
      
      <?php if ($_smarty_tpl->getVariable('User')->value['positionId']==1||$_smarty_tpl->getVariable('AccessMod')->value[13]==1||$_smarty_tpl->getVariable('AccessMod')->value[14]==1||$_smarty_tpl->getVariable('AccessMod')->value[15]==1||$_smarty_tpl->getVariable('AccessMod')->value[16]==1){?>
      	
          <?php $_smarty_tpl->assign("iniPage",'',null,null);?>
      
          <?php if ($_smarty_tpl->getVariable('AccessMod')->value[13]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
          		<?php $_smarty_tpl->assign("iniPage","institution",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[14]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
          		<?php $_smarty_tpl->assign("iniPage","periodo",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[15]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
          		<?php $_smarty_tpl->assign("iniPage","schedule_test",null,null);?>
          <?php }elseif($_smarty_tpl->getVariable('AccessMod')->value[16]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
          		<?php $_smarty_tpl->assign("iniPage","schedule-time",null,null);?>
          <?php }?>
      
      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="reportes"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/reporte-general" title="Configuraci&oacute;n">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/view_statistics.png" />Reportes</a>
          </p>
      </div>
      
      <div class="icon-spacer">
          <p><a <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="configuracion"){?>id="active-icon"<?php }?> href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/<?php echo $_smarty_tpl->getVariable('iniPage')->value;?>
" title="Configuraci&oacute;n">
            <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/48/applications_systemg.png" />Configuraci&oacute;n</a>
          </p>
      </div>
      <?php }?>
                         
 </div>