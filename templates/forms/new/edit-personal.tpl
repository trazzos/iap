<form id="addPersonalForm" name="addPersonalForm" method="post">
    <input type="hidden" id="type" name="type" value="saveEditPersonal"/>
    <input type="hidden" id="id" name="id" value="{$info.personalId}" />
    <input type="hidden" name="list_roles" value="" />
    <ul id="sort-box" class="sorts">
        <li>
            <div class="content-in-popup">

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span> Puesto:</label>
                    <select name="positionId" id="positionId" style="width:250px">
                        <option value="">Seleccione</option>
                        {include file="{$DOC_ROOT}/templates/lists/enum-position.tpl"}
                    </select>
                </div>

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span> Nombre:</label>
                    <input type="text" name="name" id="name" value="{$info.name}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span> Apellido Paterno:</label>
                    <input type="text" name="lastname_paterno" id="lastname_paterno" value="{$info.lastname_paterno}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span>  Apellido Materno:</label>
                    <input type="text" name="lastname_materno" id="lastname_materno" value="{$info.lastname_materno}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span> Estado:</label>
                    <select name="stateId" id="stateId" style="width:250px">
                        <option value="">Seleccione</option>
                        {include file="{$DOC_ROOT}/templates/lists/enum-state.tpl"}
                    </select>
                </div>

                <div class="content-settings-row">
                    <label for="f1"><span class="reqField">*</span> Sexo:</label>
                    <select name="sexo" id="sexo">
                        <option value="">Seleccione</option>
                        {include file="{$DOC_ROOT}/templates/lists/enum-sexo.tpl"}
                    </select>
                </div>

                <div class="content-settings-row">
                    <label for="f1">Fecha Nacimiento:</label>
                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{$info.fecha_nacimiento}" maxlength="10" />
                    <div align="right">(dd-mm-AAAA)</div>
                </div>

                <div class="content-settings-row">
                    <label for="f1">CURP:</label>
                    <input type="text" name="curp" id="curp" value="{$info.curp}" />
                    <div align="right" class="lnkGral">
                        <a href="javascript:void(0)" onclick="GetCurp()">
                            <img src="images/icons/overlays.png" /> Generar</a>
                    </div>
                </div>

                <div class="content-settings-row">
                    <label for="f1">RFC:</label>
                    <input type="text" name="rfc" id="rfc" value="{$info.rfc}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1">Perfil:</label>
                    <input type="text" name="perfil" id="perfil" value="{$info.perfil}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1">Usuario:</label>
                    <input type="text" name="username" id="username" value="{$info.username}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1">Contrase&ntilde;a:</label>
                    <input type="password" name="passwd" id="passwd" value="{$info.passwd}" />
                </div>

                <div class="content-settings-row">
                    <label for="f1">Descripci&oacute;n:</label>
                    <textarea name="description" id="description" cols="50" rows="6">{$info.description}</textarea>
                </div>

                <div class="_content-settings-row" style="border-bottom:1px dotted #CCCCCC;">

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
                                <select class="textfield" style="width:160px" name="role_to" size="6" multiple >
                                    {foreach from=$usrRoles item=item key=key}
                                        <option value="{$item.roleId}">{$item.name}</option>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr><td colspan="4" height="10"></td></tr>
                    </table>
                </div>

                <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
                <div style="padding-right:60px">
                    <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
                    <input type="button" class="btn-70-l" id="editPersonal" name="editPersonal" />
                </div>

            </div>
        </li>
    </ul>
</form>