<html>
<head>
<script src="{$WEB_ROOT}/assets/jquery.multiple.select.js"></script>
<link rel="stylesheet" type="text/css" href="{$WEB_ROOT}/assets/multiple-select.css" />
<script>
 $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
</head>
<body>
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bullhorm"></i>Nuevo Mensaje
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body">
        <div id="tblContent">
		
<form class="form-horizontal" id="frmGral" name="frmGral" method="post" >
    <input type="hidden" id="auxTpl" name="auxTpl" value="{$auxTpl}"/>
    <input type="hidden" id="id" name="id" value="{$id}"/>
   
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Docentes:</label>
            <div class="col-md-8">
                <select  name="profesores[]" class=""  id="ms" multiple="multiple">
				{foreach from=$personals item=subject}
				<option value="{$subject.personalId}">
					{$subject.lastname_paterno} {$subject.lastname_materno} {$subject.name}
				</option>
				{/foreach}
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Titulo:</label>
            <div class="col-md-8">
                <input type="text" name="titulo" id="titulo" value="" maxlength="30" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Mensaje:</label>
            <div class="col-md-8">

                <textarea name="description" id="description" style="width:150px"></textarea>

            </div>
        </div>
        
    </div>
</form>
<div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="button" class="btn green submitForm" id="addMajor" name="addMajor" onClick="onEnviaMsj()" >Guardar</button>
                    <button type="button" class="btn default closeModal" onClick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"

    });
</script>

        </div>
    </div>
</div>
</body>
</html>

