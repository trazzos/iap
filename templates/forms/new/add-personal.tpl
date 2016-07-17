<form class="form-horizontal" id="addPersonalForm" name="addPersonalForm" method="post">
    <input type="hidden" id="type" name="type" value="saveAddPersonal"/>
    <input type="hidden" id="list_roles" name="list_roles" value="" />

    <div class="form-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Puesto:</label>
            <div class="col-md-8">
                <select name="positionId" id="positionId" style="width:250px">
                    <option value="">Seleccione</option>
                    {include file="{$DOC_ROOT}/templates/lists/enum-position.tpl"}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Nombre:</label>
            <div class="col-md-8">
                <input type="text" name="name" id="name" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Apellido Paterno:</label>
            <div class="col-md-8">
                <input type="text" name="lastname_paterno" id="lastname_paterno" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Apellido Materno:</label>
            <div class="col-md-8">
                <input type="text" name="lastname_materno" id="lastname_materno" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Estado:</label>
            <div class="col-md-8">
                <select name="stateId" id="stateId" style="width:250px">
                    <option value="">Seleccione</option>
                    {include file="{$DOC_ROOT}/templates/lists/enum-state.tpl"}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Sexo:</label>
            <div class="col-md-8">
                <select name="sexo" id="sexo">
                    <option value="">Seleccione</option>
                    {include file="{$DOC_ROOT}/templates/lists/enum-sexo.tpl"}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Fecha de Nacimiento:</label>
            <div class="col-md-8">
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="" maxlength="10" />
                <div align="right">(dd-mm-AAAA)</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">CURP:</label>
            <div class="col-md-8">
                <input type="text" name="curp" id="curp" value="" />
                <div align="right" class="lnkGral">
                    <a href="javascript:void(0)" onclick="GetCurp()">
                        <img src="images/icons/overlays.png" /> Generar</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">RFC:</label>
            <div class="col-md-8">
                <input type="text" name="rfc" id="rfc" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Perfil:</label>
            <div class="col-md-8">
                <input type="text" name="perfil" id="perfil" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Usuario:</label>
            <div class="col-md-8">
                <input type="text" name="username" id="username" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Contraseña:</label>
            <div class="col-md-8">
                <input type="password" name="passwd" id="passwd" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Descripción:</label>
            <div class="col-md-8">
                <textarea name="description" id="description" cols="50" rows="6"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Rol:</label>
            <div class="col-md-8">
                <table width="92%" cellpadding="0" cellspacing="0" border="0">
                    <tr><td colspan="4" height="10"></td></tr>
                    <tr>
                        <td width="300">Roles:</td>
                        <td align="center">
                            <select class="textfield" style="width:160px" name="role_from" size="6" multiple >
                                {foreach from=$roles item=item key=key}
                                    <option value="{$item.roleId}">{$item.name}</option>
                                {/foreach}
                            </select>
                        </td>
                        <td align="center" width="20">
                            <div style="width:60px">
                                <input type="button" class="button" onclick="javascript:MoveRole(document.addPersonalForm.role_from,document.addPersonalForm.role_to)" value="&gt;&gt;">
                                <br />
                                <input type="button" class="button" onclick="javascript:MoveRole(document.addPersonalForm.role_to,document.addPersonalForm.role_from)" value="&lt;&lt;">
                            </div>
                        </td>
                        <td align="center">
                            <select class="textfield" style="width:160px" name="role_to" size="6" multiple ></select>
                        </td>
                    </tr>
                    <tr><td colspan="4" height="10"></td></tr>
                </table>
            </div>
        </div>


    </div>


</form>