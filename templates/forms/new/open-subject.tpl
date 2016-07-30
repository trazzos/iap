<form id="editSubjectForm" name="editSubjectForm" method="post" class="form-horizontal" action="{$WEB_ROOT}/open-subject">
    <input type="hidden" id="subjectId" name="subjectId" value="{$post.subjectId}"/>
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Selecciona Curricula:</label>
            <div class="col-md-8">
                <select name="subjectId" id="subjectId" style="width:350px" class="form-control">
                    {foreach from=$cursos item=curso}
                        <option value="{$curso.subjectId}">{$curso.majorName} - {$curso.name}</option>
                    {/foreach}
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Modalidad:</label>
            <div class="col-md-8">
                <select name="modality" id="modality" class="form-control">
                    <option value="Local">Local</option>
                    <option value="Online">Online</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Fecha Inicial:</label>
            <div class="col-md-8">
                <input type="text" name="initialDate" id="initialDate" size="10" class="form-control date-picker " required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Fecha Final:</label>
            <div class="col-md-8">
                <input type="text" name="finalDate" id="finalDate" size="10"  class="form-control date-picker"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Dias para terminar:</label>
            <div class="col-md-8">
                <input type="text" name="daysToFinish" id="daysToFinish" class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Personal Administrativo Asignado:</label>
            <div class="col-md-8">
                <select name="personalId" id="personalId" class="form-control">
                <option value="-1">Seleccione...</option>
                {foreach from=$empleados item=personal}
                    <option value="{$personal.personalId}" >{$personal.lastname_paterno} {$personal.lastname_materno} {$personal.name}</option>
                {/foreach}
            </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Activo:</label>
            <div class="col-md-8">
                <select name="active" id="active" class="form-control">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Grupo:</label>
            <div class="col-md-8">
                <input type="text" name="group" id="group" value="{$post.group}"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Turno:</label>
            <div class="col-md-8">
                <input type="text" name="turn" id="turn" value="{$post.turn}"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Ciclo Escolar:</label>
            <div class="col-md-8">
                <input type="text" name="scholarCicle" id="scholarCicle" value="{$post.scholarCicle}"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Libro:</label>
            <div class="col-md-8">
                <input type="text" name="libro" id="libro" value="{$post.libro}"  class="form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label"> Folio:</label>
            <div class="col-md-8">
                <input type="text" name="folio" id="folio" value="{$post.folio}"  class="form-control"/>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn green submitForm">Guardar</button>
            </div>
        </div>
    </div>
</form>