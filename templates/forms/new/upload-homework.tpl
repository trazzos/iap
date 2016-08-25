<form class="form-horizontal" id="addMajorForm" name="addMajorForm" method="post" enctype="multipart/form-data" action="{$WEB_ROOT}/upload-homework">
    <input type="hidden" name="modality" id="modality" value="{$actividad.modality}"
    <input type="hidden" id="type" name="type" value="saveAddMajor"/>

    <div class="form-body">
        <div class="form-group">
            {if $homework}
            <label class="col-md-3 control-label">Ya has subido esta Tarea.</label>
            <div class="col-md-8">
                <a href="{$WEB_ROOT}/download.php?file=homework/{$homework.path}&mime={$homework.mime}">Ver Tarea</a>
            </div>
            {/if}
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Actividad:</label>
            <div class="col-md-8">
                {$actividad.modality}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Limite:</label>
            <div class="col-md-8">
                {$actividad.finalDate}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Título:</label>
            <div class="col-md-8">
                <input type="text" name="nombre" id="nombre" value="" maxlength="100" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Tarea:</label>
            <div class="col-md-8">
                <input type="file" name="path" id="path" size="34"/>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green submitForm">Guardar</button>
                </div>
        </div>
    </div>

</form>