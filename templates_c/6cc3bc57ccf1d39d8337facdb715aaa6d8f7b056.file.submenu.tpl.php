<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:19
         compiled from ".\templates\menus/submenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1736759308eeb707b73-34143753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cc3bc57ccf1d39d8337facdb715aaa6d8f7b056' => 
    array (
      0 => '.\\templates\\menus/submenu.tpl',
      1 => 1496156724,
    ),
  ),
  'nocache_hash' => '1736759308eeb707b73-34143753',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div align="center" style="padding-top:10px" class="subMnu">
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="catalogos"){?>
  <table width="750" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td class="tbMnuIzq" width="20"></td>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[1]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/major">Programas Acad&eacute;micos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[3]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/personal">Personal</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[4]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/student">Alumnos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[5]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/position">Puestos</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[9]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center" width="60"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/role">Roles</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[35]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center" width="60"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/profesion">Profesiones</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
   
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[36]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center" width="60"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/recording">Videoconferencias</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
   
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[17]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>      
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/classroom">Salones</a></td>
      <td class="tbMnu" align="center" width="10"></td>
      <?php }?>
      <td class="tbMnuDer" width="20"></td>
      
  </tr>      
  </table>    
  </div>
  
  <?php }?>
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="reportes"){?>
  
  
  <?php }?>
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="admision"){?>
	  <?php if ($_smarty_tpl->getVariable('AccessMod')->value[20]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <table width="150" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/ficha">Fichas</a></td>                  
          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/ficha">Fichas</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
      <?php }?>
  <?php }?>
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cursos"){?>
  		<?php $_smarty_tpl->assign("inicio","0",null,null);?>
          <table width="400" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
		     <?php if ($_smarty_tpl->getVariable('AccessMod')->value[8]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
			 <?php $_smarty_tpl->assign("inicio","1",null,null);?>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/subject">Curricula</a></td>
              <?php }?>
			
			  <?php if ($_smarty_tpl->getVariable('AccessMod')->value[11]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
			    <?php if ($_smarty_tpl->getVariable('inicio')->value!=0){?><td class="tbMnu" align="center" width="10">|</td><?php }?>
              <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/history-subject">Historial</a></td>
              
			      
			   <?php }?>
			   <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
        
  <?php }?>

<?php if ($_smarty_tpl->getVariable('vistaPrevia')->value==1){?>

  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo"){?>
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="view-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="information-modules-student"){?>current-link-menu<?php }?>"href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/information-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Informaci&oacute;n</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-image-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-image-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Calendario</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="presentation-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/presentation-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Clase</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="examen-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/examen-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Ex&aacute;menes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="resources-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resources-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="forum-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="team-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/team-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  <?php }?>
 
 
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo1"){?>
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="view-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="information-modules-student"){?>current-link-menu<?php }?>"href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/information-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Informacion</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-image-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-image-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Calendario</a></td>-->
            
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="presentation-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/presentation-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Clase</a></td>-->
          
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="examen-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/examen-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Examenes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="resources-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resources-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="forum-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="team-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/team-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
/vp/1">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  <?php }?>
  
  
  <?php }else{ ?>
  
  
  
  
    <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo"){?>
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="view-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="information-modules-student"){?>current-link-menu<?php }?>"href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/information-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Informaci&oacute;n</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-image-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-image-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Calendario</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="presentation-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/presentation-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Clase</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="examen-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/examen-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Ex&aacute;menes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="resources-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resources-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="forum-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="team-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/team-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  <?php }?>
 
 
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="modulo1"){?>
          <table width="900" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="view-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/view-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Anuncios</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="information-modules-student"){?>current-link-menu<?php }?>"href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/information-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Informacion</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-image-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-image-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Calendario</a></td>-->
            
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="calendar-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/calendar-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Actividades</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
		          <!--<td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="presentation-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/presentation-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Clase</a></td>-->
          
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="examen-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/examen-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Examenes</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="resources-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/resources-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Recursos de Apoyo</a></td>
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="forum-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/forum-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Foro</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a class="link-menu <?php if ($_smarty_tpl->getVariable('page')->value=="team-modules-student"){?>current-link-menu<?php }?>" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/team-modules-student/id/<?php echo $_smarty_tpl->getVariable('id')->value;?>
">Mi Equipo</a></td>
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
  <?php }?>
  <?php }?>
  
  
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="cobranza"){?>
  		<?php if ($_smarty_tpl->getVariable('AccessMod')->value[34]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
          <table width="600" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td class="tbMnuIzq" width="20"></td>
		          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/invoices">Recibos</a></td>

       
              
              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/sistema/consultar-facturas">Consultar Facturas</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/admin-folios/nuevos-folios">Lista de Folios</a></td>

              <td class="tbMnu" align="center" width="10">|</td>
              <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/admin-folios/actualizar-certificado">Actualizar Certificado</a></td>
              
              <td class="tbMnuDer" width="20"></td>
          </tr>      
          </table>
        <?php }?>
  <?php }?>
  
  
  
  
  
   <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="tv"){?>
      <table width="300" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/tv">Videoconferencia en Vivo</a></td>                  
          <td class="tbMnu" align="center">|</td>                  
          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/recorded">Grabaciones</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
  <?php }?>
 
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="docentes"){?>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[12]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <table width="150" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td class="tbMnuIzq" width="20"></td>
          <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/schedule-personal">Horario</a></td>                  
          <td class="tbMnuDer" width="20"></td>
      </tr>      
      </table>
      <?php }?>
  <?php }?>
  
  <?php if ($_smarty_tpl->getVariable('mnuMain')->value=="configuracion"){?>
  <table width="500" height="40" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td class="tbMnuIzq" width="20"></td>
      <?php if ($_smarty_tpl->getVariable('AccessMod')->value[13]==1||$_smarty_tpl->getVariable('User')->value['positionId']==1){?>
      <td class="tbMnu" align="center"><a href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/institution">Datos de la Escuela</a></td>
      <td class="tbMnu" align="center" width="10">|</td>
      <?php }?>
      <td class="tbMnuDer" width="20"></td>
  </tr>      
  </table>
  <?php }?>
  </div>