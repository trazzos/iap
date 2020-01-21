<form class="form-horizontal" id="editStudentForm" name="editStudentForm" method="post">
    <input type="hidden" name="cancelPeriodoId" id="cancelPeriodoId" value="{$info.cancelPeriodoId}" />
    <input type="hidden" id="type" name="type" value="saveEditStudentAlumn"/>
    <input type="hidden" id="id" name="id" value="{$info.userId}"/>
    <input type="hidden" id="tam" name="tam" value="1"/>
    <input type="hidden" id="semestreId" name="semestreId" value="{$sId}"/>
    <input type="hidden" id="courseMxId" name="courseMxId" value="{$courseMId}"/>
    <input type="hidden" id="subjecxtId" name="subjecxtId" value="{$subjectId}"/>
	 <input type="hidden" id="coursexId" name="coursexId" value="{$courseId}"/>
    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Información Personal
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-8">
                    <input type="text" name="names" id="names" class="form-control"  value="{$info.names}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Apellido Paterno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNamePaterno" id="lastNamePaterno" class="form-control" value="{$info.lastNamePaterno}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Apellido Materno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNameMaterno" id="lastNameMaterno" class="form-control" value="{$info.lastNameMaterno}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Sexo:</label>
                <div class="col-md-8">
                    <select name='sexo' id="sexo" class="form-control">
                        <option value="m"  {if $info.sexo == "m"}selected{/if}>Masculino</option>
                        <option value="f"  {if $info.sexo == "f"}selected{/if}>Femenino</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Fecha de Nacimiento:</label>
                <div class="col-md-8">
                    <select name="day" id="day" style="width:70px; display: inline" class="form-control">
                        {section name=foo start=1 loop=32 step=1}
                            {$smarty.section.foo.index}
                            <option value="{$smarty.section.foo.index}" {if $info.dayBirthdate == $smarty.section.foo.index}selected{/if}>{$smarty.section.foo.index}</option>
                        {/section}
                    </select>
                    <select name="month" id="month" class="form-control" style="width:100px; display: inline">
                        <option value="1" {if $info.monthBirthdate == 1}selected{/if}>Enero</option>
                        <option value="2" {if $info.monthBirthdate == 2}selected{/if}>Febrero</option>
                        <option value="3" {if $info.monthBirthdate == 3}selected{/if}>Marzo</option>
                        <option value="4" {if $info.monthBirthdate == 4}selected{/if}>Abril</option>
                        <option value="5" {if $info.monthBirthdate == 5}selected{/if}>Mayo</option>
                        <option value="6" {if $info.monthBirthdate == 6}selected{/if}>Junio</option>
                        <option value="7" {if $info.monthBirthdate == 7}selected{/if}>Julio</option>
                        <option value="8" {if $info.monthBirthdate == 8}selected{/if}>Agosto</option>
                        <option value="9" {if $info.monthBirthdate == 9}selected{/if}>Septiembre</option>
                        <option value="10" {if $info.monthBirthdate == 10}selected{/if}>Octubre</option>
                        <option value="11" {if $info.monthBirthdate == 11}selected{/if}>Noviembre</option>
                        <option value="12" {if $info.monthBirthdate == 12}selected{/if}>Diciembre</option>
                    </select>
                    {include file="{$DOC_ROOT}/templates/forms/year.tpl" name="year" selected=$info.yearBirthdate}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Estado Civil:</label>
                <div class="col-md-8">
                    {include file="{$DOC_ROOT}/templates/forms/maritalStatus.tpl" selected=$info.maritalStatus}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Dependo economicamente de:</label>
                <div class="col-md-8">
                    <select name="provider" id="provider"  style="width:100px; display: inline" class="form-control">
                        <option value="Padres">Padres</option>
                        <option value="Mi mismo">Mi mismo</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"># Control):</label>
                <div class="col-md-8" style="padding-top: 8px">
                    {$info.controlNumber}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Contraseña del Sistema (Minimo 6 caracteres):</label>
                <div class="col-md-8" style="padding-top: 8px">
                    <input type="password" name="street" id="street" class="form-control" value="{$info.password}" />
                </div>
            </div>
        </div>
    </div>

    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Domicilio
            </div>
        </div>
        <div class="portlet-body">


            <div class="form-group">
                <label class="col-md-3 control-label">Calle</label>
                <div class="col-md-8">
                    <input type="text" name="street" id="street" class="form-control" value="{$info.street}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Número</label>
                <div class="col-md-8">
                    <input type="text" name="number" id="number" class="form-control" value="{$info.number}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Colonia:</label>
                <div class="col-md-8">
                    <input type="text" name="colony" id="colony" class="form-control" value="{$info.colony}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">País</label>
                <div class="col-md-8">
                    <select id="pais" name="pais" style="width:300px" onChange="estado_dependencia();" class="form-control" >
                        <option value="0">Selecciona Tu Pa&iacute;s</option>
                        {foreach from=$paises item=pais}
                            {if $pais.paisId == $info.pais}
                                <option selected="selected" value="{$pais.paisId}">{$pais.nombre} </option>
                            {else}
                                <option value="{$pais.paisId}">{$pais.nombre} </option>
                            {/if}
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Estado:</label>
                <div class="col-md-8">
                    <div id="Stateposition">
                        <select id="estado" name="estado" style="width:300px" onChange="ciudad_dependencia();" class="form-control">
                            <option value="0">Selecciona Tu Estado</option>
                            {foreach from=$estados item=estado}
                                {if $estado.estadoId == $info.estado}
                                    <option selected="selected" value="{$estado.estadoId}">{$estado.nombre} </option>
                                {else}
                                    <option value="{$estado.estadoId}">{$estado.nombre} </option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Municipio</label>
                <div class="col-md-8">
                    <div id="Cityposition">
                        <select id="ciudad" name="ciudad" style="width:300px" class="form-control" >
                            <option value="0">Selecciona Tu ciudad</option>
                            {foreach from=$ciudades item=ciudad}
                                {if $ciudad.municipioId == $info.ciudad}
                                    <option selected="selected" value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
                                {else}
                                    <option value="{$ciudad.municipioId}">{$ciudad.nombre} </option>
                                {/if}
                            {/foreach}
                        </select>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Código Postal:</label>
                <div class="col-md-8">
                    <input type="text" name="postalCode" id="postalCode" class="form-control" value="{$info.postalCode}" />
                </div>
            </div>

        </div>
    </div>

    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Datos de contacto
            </div>
        </div>
        <div class="portlet-body">

            <div class="form-group">
                <label class="col-md-3 control-label">Email:</label>
                <div class="col-md-8">
                    <input type="text" name="email" id="email" class="form-control" value="{$info.email}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Telefono:</label>
                <div class="col-md-8">
                    <input type="text" name="phone" id="phone" class="form-control" value="{$info.phone}" />
                </div>
            </div>

        </div>
    </div>

    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Datos del tutor
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Nombre:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_name" id="tutor_name" value="{$info.tutor_name}"  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Domicilio:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_address" id="tutor_address" value="{$info.tutor_address}"  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Lugar de trabajo:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_work" id="tutor_work" value="{$info.tutor_work}"  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Telefono:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_phone" id="tutor_phone" value="{$info.tutor_phone}"  class="form-control" />
                </div>
            </div>
        </div>
    </div>

    <div class="portlet box {$PORTLET_COLOR}">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bullhorm"></i>Estudios
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group">
                <label class="col-md-3 control-label">Escuela de procedencia:</label>
                <div class="col-md-8">
                    <input type="text" name="school" id="school" class="form-control" value="{$info.school}" />
                </div>
            </div>

        </div>
    </div>

</form>
<div id="res_">

</div>
 <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
				{if $alumnoSer eq "si"}
				<button type="button" onclick=" location.href='{$WEB_ROOT}/index' " class="btn default" data-dismiss="modal">Regresar</button>
				{else}
				<button type="button" class="btn default" data-dismiss="modal">Salir</button>
				{/if}
                
                <button type="submit" class="btn {$BUTTON_COLOR} submitForm" onClick="saveEditStudentAlumn()">Guardar</button>
            </div>
        </div>
    </div>