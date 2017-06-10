<?php /* Smarty version Smarty3-b7, created on 2017-06-01 17:13:04
         compiled from "C:/wamp/www/iap/templates/new/homepage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27924593091704fbe75-98746645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19651f9882d61e624289cd22f98ebb98fbcd1128' => 
    array (
      0 => 'C:/wamp/www/iap/templates/new/homepage.tpl',
      1 => 1496355156,
    ),
  ),
  'nocache_hash' => '27924593091704fbe75-98746645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('User')->value['type']=='student'){?>
    <?php $_template = new Smarty_Internal_Template('templates/new/student_profile.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php }else{ ?>


<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">
    <img src="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/images/icons/22/display.png" alt="" />
    Inicio
</h1>
<!-- END PAGE TITLE-->


<!-- BEGIN Portlet PORTLET-->
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?>
                <img alt="" width="32px" class="img-circle" src="<?php echo $_smarty_tpl->getVariable('infoStudent')->value['imagen'];?>
">
            <?php }else{ ?>
                <i class="fa fa-gift"></i>
            <?php }?>
            Bienvenido(a) <?php echo $_smarty_tpl->getVariable('User')->value['username'];?>
</div>
    </div>
    <div class="portlet-body">
        <div class="scroller" style="" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
            <p class="left">
                El <b>Instituto de Administración Pública del Estado de Chiapas, A. C.</b><br />te da la mas cordial bienvenida a nuestro Sistema de Educación en Línea
            </p>
            <p class="right">
                El <b>IAP Chiapas</b> coadyuva desde hace 39 años en el fortalecimiento de la gestión pública de los tres órdenes de gobierno, así como con la realización de investigación, consultoría y difusión del desarrollo de las ciencias administrativas, en beneficio de la sociedad
            </p>
        </div>
    </div>
</div>
<!-- END Portlet PORTLET-->

<?php if ($_smarty_tpl->getVariable('User')->value['type']!="student"){?>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Notificaciones
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/notificacionesadmin.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

        </div>
    </div>
</div>
<?php }?>

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Noticias
            <?php if ($_smarty_tpl->getVariable('User')->value['positionId']=="1"){?>
                | &raquo; <a style="color:#000000" href="<?php echo $_smarty_tpl->getVariable('WEB_ROOT')->value;?>
/add-noticia/id/0" onclick="return parent.GB_show('Agregar Noticia', this.href,650,700) ">Agregar Noticia</a>
            <?php }?>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/module-announcements.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </div>
</div>

<?php if ($_smarty_tpl->getVariable('User')->value['type']=="student"){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Curricula Activa
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-activa.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </div>
        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Curricula Inactiva (Falta de pago, baja, etc)
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-inactiva.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </div>
        </div>
    </div>

    <div class="portlet box red">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Curricula Finalizada
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <?php $_template = new Smarty_Internal_Template("{$_smarty_tpl->getVariable('DOC_ROOT')->value}/templates/lists/student-curricula-finalizada.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

            </div>
        </div>
    </div>
    <input type="hidden" value="0" id="recarga" name="recarga">
<?php }?>
<?php }?>
