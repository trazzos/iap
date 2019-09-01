<!-- TinyMCE -->
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
      mode : "textareas",
      theme : "silver",
      skin : "oxide",
      menubar:false,
    });
</script>
<!-- /TinyMCE -->
<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" action="{$WEB_ROOT}/edit-resource/id/{$id}" enctype="multipart/form-data">
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>
	<input type="hidden" id="auxTpl" name="auxTpl" value="{$auxTpl}"/>
	<input type="hidden" id="cId" name="cId" value="{$cId}"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Nombre:</label>
            <div class="col-md-8">
                <input type="text" name="name" id="name" value="{$resource.name}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Descripcion:</label>
            <div class="col-md-8">
                <input type="text" name="description" id="description" value="{$resource.description}" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Archivo:</label>
            <div class="col-md-8">
                <input type="file" name="path" id="path" value="" maxlength="30" class="form-control"/>
            </div>
        </div>

        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <input type="submit" class="btn {$BUTTON_COLOR} submitForm" id="addMajor" name="addMajor"/>
                    {*
                                        <button type="submit" class="btn {$BUTTON_COLOR} submitForm">Guardar</button>
                    *}
                    <button type="button" class="btn default closeModal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>