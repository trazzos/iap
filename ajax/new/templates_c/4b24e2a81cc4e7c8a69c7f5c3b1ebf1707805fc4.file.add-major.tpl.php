<?php /* Smarty version Smarty3-b7, created on 2017-05-30 15:40:31
         compiled from "C:/wamp/www/iap/templates/forms/new/add-major.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1164592dd8bfc07266-90070376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b24e2a81cc4e7c8a69c7f5c3b1ebf1707805fc4' => 
    array (
      0 => 'C:/wamp/www/iap/templates/forms/new/add-major.tpl',
      1 => 1496156723,
    ),
  ),
  'nocache_hash' => '1164592dd8bfc07266-90070376',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post">
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Nombre:</label>
            <div class="col-md-8">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Descripcion:</label>
            <div class="col-md-8">
                <textarea class="form-control" name="description" id="description" cols="50" rows="6"></textarea>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn green submitForm">Guardar</button>
                <button type="button" class="btn default closeModal">Cancelar</button>
            </div>
        </div>
    </div>
</form>