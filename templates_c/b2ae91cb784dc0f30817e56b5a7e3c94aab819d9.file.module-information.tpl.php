<?php /* Smarty version Smarty3-b7, created on 2017-06-01 20:39:03
         compiled from "C:/wamp/www/iap/templates/boxes/new/module-information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:955930c1b7722d36-04196195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2ae91cb784dc0f30817e56b5a7e3c94aab819d9' => 
    array (
      0 => 'C:/wamp/www/iap/templates/boxes/new/module-information.tpl',
      1 => 1496156722,
    ),
  ),
  'nocache_hash' => '955930c1b7722d36-04196195',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['welcomeTextDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Bienvenida
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['welcomeTextDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['introductionDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Introducci&oacute;n
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['introductionDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['intentionsDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Intenciones del Curso
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['intentionsDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['objectivesDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Objetivos del Curso
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['objectivesDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['themesDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Temas
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['themesDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['schemeDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Esquema
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['schemeDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['methodologyDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Metodología
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['methodologyDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['politicsDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Políticas
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['politicsDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['evaluationDecoded']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Evaluación
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['evaluationDecoded'];?>

        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('myModule')->value['bibliography']!=''){?>
    <div class="portlet box red">
        <div class="portlet-title">
            <!-- TODO Poner al centro el título-->
            <div class="caption" >
                Bibliografía
            </div>
        </div>
        <div class="portlet-body">
            <?php echo $_smarty_tpl->getVariable('myModule')->value['bibliographyDecoded'];?>

        </div>
    </div>
<?php }?>
