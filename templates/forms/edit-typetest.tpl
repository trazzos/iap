<form id="editTypetestForm" name="editTypetestForm" method="post">
<input type="hidden" id="type" name="type" value="saveEditTypetest"/>
<input type="hidden" id="testId" name="testId" value="{$post.testId}"/>
<ul id="sort-box" class="sorts">
  <li>              
    <div class="content-in-popup">
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Clave:</label>
            <input type="text" name="identifier" id="identifier" value="{$post.identifier}" />
            <div id="identifierTip" class="textoEjemplo" style="visibility:hidden" align="right">
                CLAVE DEL EXAMEN.
            </div>                     
      </div>
            
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Tipo:</label>
            <input type="text" name="typetest" id="typetest" value="{$post.typetest}" />
            <div id="typetestTip" class="textoEjemplo" style="visibility:hidden;" align="right">                
                DESCRIPCION DEL EXAMEN. EJEMPLO: PARCIAL, GLOBAL, ETC.
            </div>                     
      </div>
      
      <div class="content-settings-row">
            <label for="f1"><span class="reqField">*</span> Es regularizaci&oacute;n?:</label>
            <select name="regularization" id="regularization" />
                <option value="*" selected="selected">--Selecciona una Opcion--</option>
                <option value="yes" {if $post.regularization == "yes"} selected="selected" {/if}>SI</option>
                <option value="no" {if $post.regularization == "no"} selected="selected" {/if}>NO</option>
            </select>
      </div>
      
      <div style="float:left"><span class="reqField">*</span> Campo requerido</div>
      <div style="padding-right:60px">                 
      <input type="button" class="btnCancel" style="margin-left:10px;" id="btnCancel" />
      <input type="button" class="btn-70-l" id="editTypetest" name="editTypetest" />                  
      </div>
      
    </div>
   </li>                              
 </ul>    
</form>