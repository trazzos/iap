<?php /* Smarty version Smarty3-b7, created on 2017-06-01 10:19:06
         compiled from "C:/wamp/www/iap/templates/items/new/courses-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267905930306acf9258-76457232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b21dfc06da58bd1218505a5fc27513e84987ca5' => 
    array (
      0 => 'C:/wamp/www/iap/templates/items/new/courses-header.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '267905930306acf9258-76457232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<tr>
    <th width="30" height="28">ID</th>
    <th width="100">Clave</th>
    <th width="100">Tipo</th>
    <th width="200">Nombre</th>
    <th width="80">Modalidad</th>
    <th width="80">Fecha Inicial</th>
    <th width="80">Fecha Final</th>
    <th width="50">Dias Activo</th>
    <th width="100">Modulos (A/T)</th>
    <th width="60">Alumnos (A/I)</th>
    <th width="50">Activo</th>
    <?php if (!$_smarty_tpl->getVariable('docente')->value){?>
        <th width="100">Acciones</th>
    <?php }?>
</tr>