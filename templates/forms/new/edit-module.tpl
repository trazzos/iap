<!-- TinyMCE -->
{*
<script type="text/javascript" src="{$WEB_ROOT}/tinymce/tiny_mce.js"></script>
*}
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        skin : "o2k7"
    });
</script>
<!-- /TinyMCE -->
<form id="editSubjectForm" name="editSubjectForm" method="post" class="form-horizontal">
    <input type="hidden" id="subjectModuleId" name="subjectModuleId" value="{$post.subjectModuleId}"/>
    <input type="hidden" id="subjectId" name="subjectId" value="{$post.subjectId}"/>

    <div class="form-body">

        <div class="form-group">
            <label class="col-md-3 control-label">Nombre:</label>
            <div class="col-md-8">
                <input type="text" name="frmName" id="frmName" value="{$post.name}" {if $docente} readonly="readonly"{/if} class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Clave:</label>
            <div class="col-md-8">
                <input type="text" name="frmClave" id="frmClave" value="{$post.clave}" {if $docente} readonly="readonly"{/if} class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Perteneciente al Cuatrimestre Numero?:</label>
            <div class="col-md-8">
                <input type="text" name="semesterId" id="semesterId" value="{$post.semesterId}" maxlength="2" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Texto de Bienvenida:</label>
            <div class="col-md-8">
                <textarea id="welcomeText" name="welcomeText" rows="15" cols="" style="width: 100%">{$post.welcomeText}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Introduccion:</label>
            <div class="col-md-8">
                <textarea id="introduction" name="introduction" rows="15" cols="" style="width: 100%">{$post.introduction}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Intenciones:</label>
            <div class="col-md-8">
                <textarea id="intentions" name="intentions" rows="15" cols="" style="width: 100%">{$post.intentions}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Objetivos:</label>
            <div class="col-md-8">
                <textarea id="objectives" name="objectives" rows="15" cols="" style="width: 100%"">{$post.objectives}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Temario:</label>
            <div class="col-md-8">
                <textarea id="objectives" name="objectives" rows="15" cols="" style="width: 100%">{$post.objectives}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Esquema:</label>
            <div class="col-md-8">
                <textarea id="scheme" name="scheme" rows="15" cols="" style="width: 100%">{$post.scheme}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Metodologia:</label>
            <div class="col-md-8">
                <textarea id="methodology" name="methodology" rows="15"cols="" style="width: 100%"">{$post.methodology}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Politicas:</label>
            <div class="col-md-8">
                <textarea id="politics" name="politics" rows="15" cols="" style="width: 100%">{$post.politics}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Evaluacion:</label>
            <div class="col-md-8">
                <textarea id="evaluation" name="evaluation" rows="15" cols="" style="width: 100%">{$post.evaluation}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Bibliografia:</label>
            <div class="col-md-8">
                <textarea id="bibliography" name="bibliography" rows="15" cols="" style="width: 100%">{$post.bibliography}</textarea>
            </div>
        </div>
     </div>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green submitForm btn-70-l" id="saveEditSubject" name="saveEditSubject">Guardar</button>
            </div>
        </div>
    </div>

</form>