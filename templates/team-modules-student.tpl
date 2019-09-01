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
{include file="boxes/status_no_ajax.tpl"}  
    				<form name="addPersonalForm" id="addPersonalForm" method="post" enctype="multipart/form-data">
            <input type="hidden" id="list_roles" name="list_roles" />
<ul id="sort-box" class="sorts">
 <li>
    <div class="content-header">
        <div class="content-header-left-wide">
          <img src="{$WEB_ROOT}/images/new/catalogos.png" alt="" />
            <h2 title="{$myModule.name}">Equipo {$myModule.name|truncate:45:"..."} {if $vistaPrevia==0}&raquo; <a href="{$WEB_ROOT}/curricula" style="color:#000">Regresar</a>{/if}</h2>
        </div>                  
    </div>
                    <table width="92%" cellpadding="0" cellspacing="5" border="0">
            <tr><td colspan="4" height="10"></td></tr>
            <tr>
              <td width="180">Enviar Correo:</td>
              <td align="center">
              	<select class="textfield" style="width:250px" name="role_from" id="role_from" size="6" multiple >
                {foreach from=$myTeam item=item key=key}
                    <option value="{$item.userId}">{$item.names} {$item.lastNamePaterno} {$item.lastNameMaterno}</option>        			
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
              <select class="textfield" style="width:250px" name="role_to" id="role_to" size="6" multiple >
              	{foreach from=$usrRoles item=item key=key}
                    <option value="{$item.roleId}">{$item.name}</option>        			
                {/foreach}
              </select>
              </td>
            </tr>
            <tr>
            <td width="180">Asunto:</td>
            <td colspan="3" height="10" align="center">
            <input type="text" name="subject" id="subject" size="50" />
            </td></tr>
            <tr>
            <td width="180">Descripci&oacute;n:</td>
            <td colspan="4" height="10" align="center">
            <textarea name="body" id="body"></textarea>
            </td></tr>
            <tr>
            <td width="180">Archivo:</td>
            <td colspan="4" height="10" align="center">
            <input type="file" name="file" id="file" size="50" />
            </td></tr>

          {if $vistaPrevia==0}  <tr><td colspan="4" height="10" align="center"><input type="button" value="Enviar Correo" onclick="SubmitForm()" /></td></tr>{/if}
            </table>

                         
   </li>                                                              
 </ul>

            </form>
