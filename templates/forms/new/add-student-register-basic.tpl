<form class="form-horizontal" id="addStudentForm" name="addStudentForm" method="post"   >
    <input type="hidden" id="type" name="type" value="saveAddStudentRegisterBasic"/>
    <input type="hidden" id="redireccion" name="redireccion" value="1"/>
    <input type="hidden" id="tam" name="tam" value="0"/>
    <input type="hidden" id="permiso" name="permiso" value="0"/>
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
                    <input type="text" name="names" id="names" class="form-control" value="" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"> Apellido Paterno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNamePaterno" id="lastNamePaterno" value="" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Apellido Materno:</label>
                <div class="col-md-8">
                    <input type="text" name="lastNameMaterno" id="lastNameMaterno"  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Sexo:</label>
                <div class="col-md-8">
                    <select name='sexo' id="sexo" class="form-control">
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Fecha de Nacimiento:</label>
                <div class="col-md-8">
                    <select name="day" id="day" style="width:70px; display: inline" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="month" id="month"  style="width:100px; display: inline" class="form-control">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    {include file="forms/year.tpl" name="year"}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Estado Civil:</label>
                <div class="col-md-8">
                    {include file="forms/maritalStatus.tpl" selected=$info.maritalStatus}
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
                <label class="col-md-3 control-label">Calle:</label>
                <div class="col-md-8">
                    <input type="text" name="street" id="street" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Número:</label>
                <div class="col-md-8">
                    <input type="text" name="number" id="number"  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Colonia:</label>
                <div class="col-md-8">
                    <input type="text" name="colony" id="colony" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">País:</label>
                <div class="col-md-8">
                    <select id="pais" name="pais" style="width:350px" onChange="estado_dependencia();"  class="form-control">
                        <option value="0">Selecciona Tu Pa&iacute;s</option>
                        {foreach from=$paises item=pais}
                            <option value="{$pais.paisId}">{$pais.nombre} </option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Estado:</label>
                <div class="col-md-8">
                    <div id="Stateposition">
                        <select id="estado" name="estado" onChange='ciudad_dependencia();' style="width:350px" class="form-control">
                            <option value="0">Selecciona tu Estado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"> Municipio:</label>
                <div class="col-md-8">
                    <div id="Cityposition">
                        <select id="ciudad" name="ciudad" style="width:350px" class="form-control">
                            <option value="0">Selecciona tu Ciudad</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">C&oacute;digo Postal:</label>
                <div class="col-md-8">
                    <input type="text" name="postalCode" id="postalCode" value=""  class="form-control" />
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
                <label class="col-md-3 control-label">Correo Electr&oacute;nico:</label>
                <div class="col-md-8">
                    <input type="text" name="email" id="email" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Tel&eacute;fono:</label>
                <div class="col-md-8">
                    <input type="text" name="phone" id="phone" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Contraseña del Sistema (Minimo 6 caracteres):</label>
                <div class="col-md-8">
                    <input type="password" name="password" id="password" value=""  class="form-control" />
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
                    <input type="text" name="tutor_name" id="tutor_name" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Domicilio:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_address" id="tutor_address" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Lugar de trabajo:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_work" id="tutor_work" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Telefono:</label>
                <div class="col-md-8">
                    <input type="text" name="tutor_phone" id="tutor_phone" value=""  class="form-control" />
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
                    <input type="text" name="school" id="school" value=""  class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Selecciona el programa académico al que te quieres registrar:</label>
                <div class="col-md-8">
                    <select name='curricula' id="curricula" style="width:400px" class="form-control">
                        {foreach from=$activeCourses item=course}
                            <option value="{$course.courseId}">{$course.majorName} - {$course.name} - {$course.group}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
        </div>
    </div>




</form>
<div id="loader">
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <a href="{$WEB_ROOT}" class="btn default" data-dismiss="modal">Cerrar</a>
            <button type="button" class="btn {$BUTTON_COLOR} submitForm" onclick="AddStudentRegister();" id="addStudent" >Guardar</button>
        </div>
    </div>
</div>
