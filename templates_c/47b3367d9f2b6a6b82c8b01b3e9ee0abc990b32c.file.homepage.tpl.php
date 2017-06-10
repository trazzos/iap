<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:02:20
         compiled from "C:/wamp/www/iap/templates/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1630159308eecb9fc90-76355133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47b3367d9f2b6a6b82c8b01b3e9ee0abc990b32c' => 
    array (
      0 => 'C:/wamp/www/iap/templates/homepage.tpl',
      1 => 1496354134,
    ),
  ),
  'nocache_hash' => '1630159308eecb9fc90-76355133',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
 <ul id="sort-box" class="sorts">
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/display.png" alt="" />
            <h2>Inicio</h2>
        </div>
    </div>
    <div class="content-in" id="dashboard">
    
          <div id="content-dashboard-pro-photo">
              <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?> 
                          <?php echo $_smarty_tpl->getVariable('infoStudent')->value['foto'];?>

          	  <?php }?>
          </div>
          <div id="content-dashboard-pro-info">
                 <h2>Bienvenido(a) <?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
</h2>
                 <p class="left">
                 El <b>Instituto de Administración Pública del Estado de Chiapas, A. C.</b><br />te da la mas cordial bienvenida a nuestro Sistema de Educación en Línea
                 </p>
                 <p class="right">
                 El <b>IAP Chiapas</b> coadyuva desde hace 39 años en el fortalecimiento de la gestión pública de los tres órdenes de gobierno, así como con la realización de investigación, consultoría y difusión del desarrollo de las ciencias administrativas, en beneficio de la sociedad
                 </p>
          </div>
         
        </div>
 </li>
<?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?> 



  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/display.png" alt="" />
            <h2>Curricula Activa</h2>
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-activa.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
 </li>
  <li>
  
    <div class="content-header">
        <div class="content-header-left">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/display.png" alt="" />
            <h2>Curricula Inactiva (Falta de pago, baja, etc)</h2> 
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-inactiva.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

         
        </div>
 </li>
  <li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/display.png" alt="" />
            <h2>Curricula Finalizada</h2> 
        </div>                 
    </div>
    <div class="content-in" id="dashboard">
          <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-finalizada.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

         
        </div>
 </li>
<?php }?>


 <li>
    <div class="content-header">
        <div class="content-header-left">
<a href="#" style="float:right;" onclick="Effect.toggle('notificaciones', 'appear'); return false;">Ocultar/Mostrar</a> 
 <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/kontact_news.png" alt="" />
          
		 <h2>Notificaciones</h2>
        </div>

    </div>
	
	
    <div class="content-in" id="tblNot">         
              <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/notificacionesadmin.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
   </li>  

   <input type="hidden" value="0" id="recarga" name="recarga">
<li>
    <div class="content-header">
        <div class="content-header-left">
          <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/kontact_news.png" alt="" />
            <h2>Noticias <?php if ($_smarty_tpl->getVariable('User')->value['positionId']=="1"){?> | &raquo; <a style="color:#000000" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-noticia/id/0" onclick="return parent.GB_show('Agregar Noticia', this.href,650,700) ">Agregar Noticia</a> <?php }?></h2>
        </div>

    </div>
    <div class="content-in">         
          <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/module-announcements.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
   </li>
   

   
   
 </ul>

